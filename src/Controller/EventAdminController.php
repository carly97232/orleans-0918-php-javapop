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
     * Display item creation page
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $eventManager = new EventManager($this->getPdo());
            $event = new Event();
            $event->setTitle($_POST['title']);
            $event->setDate($_POST['date']);
            $event->setComment($_POST['comment']);
            $id = $eventManager->insert($event);
        }

        return $this->twig->render('EventAdmin/add.html.twig');
    }
}
