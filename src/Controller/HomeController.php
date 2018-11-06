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
 * Class ArtistController
 *
 */
class HomeController extends AbstractController
{
    public function index()
    {
        $eventManager = new EventManager($this->getPdo());
        $nextEvents = $eventManager->selectClosedEvent();
        return $this->twig->render('Home/index.html.twig', ['homeBackImg'=>'home','nextEvents' => $nextEvents]);
    }
}
