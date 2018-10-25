<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */
namespace Controller;

use Model\Artist;
use Model\ArtistManager;

/**
 * Class ArtistController
 *
 */
class ArtistController extends AbstractController
{
    /**
     * Display artist listing
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index(): string
    {
        $artistManager = new ArtistManager($this->getPdo());
        $artists = $artistManager->selectAll();
        return $this->twig->render('Artist/index.html.twig', ['artists' => $artists]);
    }
}
