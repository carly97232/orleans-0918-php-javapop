<?php
/**
 * Created by PhpStorm.
 * User: patricia
 * Date: 23/10/18
 * Time: 16:18
 */

namespace Controller;

use Model\Event;
use Model\EventManager;
use Filter\Text;

class EventAdminController extends AbstractController
{


    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        return $this->twig->render('EventAdmin/index.html.twig');
    }


    /**
     * @param array $userData
     * @return array
     */
    private function check(array $userData)
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
        header('Location: /admin/eventAdmin/add');
        exit();
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
                exit();
            }
        }
        return $this->twig->render('EventAdmin/add.html.twig', ['errors' => $errors]);
    }
}
