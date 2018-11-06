<?php
/**
 * Created by PhpStorm.
 * User: patricia
 * Date: 25/10/18
 * Time: 10:19
 */

namespace Controller;

use Model\EventManager;
use Model\Event;
use Filter\Text;

class EventAdminController extends AbstractController
{
    public function index()
    {
        $eventManager = new EventManager($this->getPdo());
        $events = $eventManager->selectAll('date', 'DESC');

        return $this->twig->render('EventAdmin/index.html.twig', ['events' => $events]);
    }

    /**
     * @param array $userData
     * @return array
     */
    private function check(array $userData):array
    {
        $errorsForm = [];
        if (empty($userData['title'])) {
            $errorsForm[] = "Ecrire le titre de l'événement";
        }
        if (empty($userData["date"])) {
            $errorsForm[] = "Ecrire la date";
        } else {
            $data=explode('-', $userData["date"]);
            if (checkdate($data[1], $data[2], $data[0])==false) {
                $errorsForm[] = "Ecrire la date au bon format";
            }
        }
        return $errorsForm;
    }


    /**
     * Display item creation page
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function add()
    {

        $errors = $userData = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData = $_POST;
            $textFilter = new Text();
            $textFilter->setTexts($userData);
            $userData = $textFilter->filter();

            $errors = $this->check($userData);
            if (empty($errors)) {
                $eventManager = new EventManager($this->getPdo());
                $event = new Event();
                $event->setTitle($userData['title']);
                $event->setDate(new \DateTime($userData['date']));
                $event->setComment($userData['comment']);
                $id = $eventManager->insert($event);
                header('Location: /admin/eventAdmin/add');
            }
        }
        return $this->twig->render('EventAdmin/add.html.twig', ['errors' => $errors]);
    }


    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['deleteEvent'])) {
                $eventManager = new EventManager($this->getPdo());
                $eventManager->delete($_POST['deleteEvent']);
                header('location:/admin/eventAdmin/index');
                exit();
            }
        }
    }

    /**
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function update(int $id): string
    {
        $eventManager = new EventManager($this->getPdo());
        $event = $eventManager->selectOneById($id);

        $errors = $userData = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData = $_POST;
            $textFilter = new Text();
            $textFilter->setTexts($userData);
            $userData = $textFilter->filter();
            $errors = $this->check($userData);

            if (isset($_POST['validate'])) {
                $event->setTitle($userData['title']);
                $event->setDate($userData['date']);
                $event->setComment($userData['comment']);
                $eventManager->update($event);
            }
        }
        return $this->twig->render('EventAdmin/update.html.twig', ['event' => $event]);
    }
}
