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
            if (!preg_match("/(2\d{3})-(0[0-9]|1[0-2])-([0-3][0-9])/", $userData["date"])) {
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
                $event->setDate($userData['date']);
                $event->setComment($userData['comment']);
                $id = $eventManager->insert($event);
                header('Location: /admin/eventAdmin/add');
                exit();
            }
        }
        return $this->twig->render('EventAdmin/add.html.twig', ['errors' => $errors]);
    }
}
