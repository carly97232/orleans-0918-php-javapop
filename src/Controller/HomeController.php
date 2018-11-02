<?php
/**
 * Created by PhpStorm.
 * User: jovanela
 * Date: 12/10/18
 * Time: 13:13
 */

namespace Controller;

use Model\HomeManager;

/**
 * Class ArtistController
 *
 */
class HomeController extends AbstractController
{
    public function index()
    {
        $homeManager = new HomeManager($this->getPdo());
        $homes = $homeManager->selectClosedEvent();
        return $this->twig->render('Home/index.html.twig', ['homeBackImg'=>'home','homes' => $homes]);
    }
}
