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

class EventAdminController extends AbstractController
{
    public function index()
    {
        $eventManager = new EventManager($this->getPdo());
        $events = $eventManager->selectAll('date', 'DESC');

        return $this->twig->render('EventAdmin/index.html.twig', ['events' => $events]);
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

        //var_dump($event);die();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['validate'])) {
                $event->setTitle($_POST['title']);
                $event->setDate($_POST['date']);
                $event->setComment($_POST['comment']);
                $eventManager->update($event);
            }
        }
        return $this->twig->render('EventAdmin/update.html.twig', ['event' => $event]);
    }

}
