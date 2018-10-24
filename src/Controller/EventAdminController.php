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
     * @param $data
     * @return string
     */
    private function testInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    private function check()
    {
        $err=[];
// Traitement du formulaire
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Teste si tous les champs sont remplis
            if (empty($_POST["title"])) {
                $err[] = "ecrire le titre de l'événement";
            }
            if (empty($_POST["date"])) {
                $err[] = "Ecrire la date";
            } else {
                if (!preg_match("/(2\d{3})-(0[0-9]|1[0-2])-([0-3][0-9])/", $_POST["date"])) {
                    $err[] = "Ecrire la date au format YYYY-MM-DD";
                }
            }
        }
        return $err;
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

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty(self::check())) {
            $eventManager = new EventManager($this->getPdo());
            $event = new Event();
            $event->setTitle(self::testInput($_POST['title']));
            $event->setDate(self::testInput($_POST['date']));
            $event->setComment($_POST['comment']);
            $id = $eventManager->insert($event);
        }

        return $this->twig->render('EventAdmin/add.html.twig', ['errors'=> self::check()]);
    }
}
