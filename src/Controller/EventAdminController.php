<?php
/**
 * Created by PhpStorm.
 * User: patricia
 * Date: 25/10/18
 * Time: 10:19
 */

namespace Controller;


use Model\EventManager;

class EventAdminController extends AbstractController
{
    public function index()
    {
        $eventManager = new EventManager($this->getPdo());
        $events = $eventManager->selectAll('date', 'DESC');

        return $this->twig->render('EventAdmin/index.html.twig', ['events' => $events]);
    }
}
