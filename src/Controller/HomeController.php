<?php
/**
 * Created by PhpStorm.
 * User: jovanela
 * Date: 12/10/18
 * Time: 13:13
 */

namespace Controller;

/**
 * Class ArtistController
 *
 */
class HomeController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Home/index.html.twig', ['homeBackImg'=>'home']);
    }
}
