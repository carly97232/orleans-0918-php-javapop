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
class AccueilController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Accueil/accueil.html.twig');
    }
}