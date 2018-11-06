<?php
/**
 * Created by PhpStorm.
 * User: jovanela
 * Date: 12/10/18
 * Time: 13:13
 */

namespace Controller;

use Model\EventManager;

/**
 * Class HomeController
 * @package Controller
 */
class HomeController extends AbstractController
{

    public function index()
    {
        $eventManager = new EventManager($this->getPdo());
        $nextEvents = $eventManager->selectNextEvent();
        return $this->twig->render('Home/index.html.twig', ['homeBackImg'=>'home','nextEvents' => $nextEvents]);
    }
}
