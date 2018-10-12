<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\Event;
use Model\EventManager;

/**
 * Class EventController
 *
 */
class EventController extends AbstractController
{


    /**
     * Display item listing
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $eventManager = new EventManager($this->getPdo());
        $events = $eventManager->selectAll('date', 'DESC');

        return $this->twig->render('Event/index.html.twig', ['events' => $events]);
    }


    /**
     * Display event informations specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function show(int $id)
    {
        $eventManager = new EventManager($this->getPdo());
        $event = $eventManager->selectOneById($id);

        return $this->twig->render('Event/show.html.twig', ['event' => $event]);
    }


    /**
     * Display event edition page specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function edit(int $id): string
    {
        $eventManager = new EventManager($this->getPdo());
        $event = $eventManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $event->setTitle($_POST['title']);
            $eventManager->update($event);
        }

        return $this->twig->render('Event/edit.html.twig', ['event' => $event]);
    }


    /**
     * Display event creation page
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
            $id = $eventManager->insert($event);
            header('Location:/event/' . $id);
        }

        return $this->twig->render('Event/add.html.twig');
    }


    /**
     * Handle event deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $eventManager = new EventManager($this->getPdo());
        $eventManager->delete($id);
        header('Location:/');
    }
}
