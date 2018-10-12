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
    public function index()
    {
        $artistManager = new ArtistManager($this->getPdo());
        $artists = $artistManager->selectAll();

        return $this->twig->render('Artist/index.html.twig', ['artists' => $artists]);
    }


    /**
     * Display artist informations specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function show(int $id)
    {
        $artistManager = new ArtistManager($this->getPdo());
        $artist = $artistManager->selectOneById($id);

        return $this->twig->render('Artist/show.html.twig', ['artist' => $artist]);
    }


    /**
     * Display artist edition page specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function edit(int $id): string
    {
        $artistManager = new ArtistManager($this->getPdo());
        $artist = $artistManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $artist->setTitle($_POST['title']);
            $artistManager->update($artist);
        }

        return $this->twig->render('Artist/edit.html.twig', ['artist' => $artist]);
    }


    /**
     * Display artist creation page
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $artistManager = new ArtistManager($this->getPdo());
            $artist = new Artist();
            $artist->setTitle($_POST['title']);
            $id = $artistManager->insert($artist);
            header('Location:/artist/' . $id);
        }

        return $this->twig->render('Artist/add.html.twig');
    }


    /**
     * Handle artist deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $artistManager = new ArtistManager($this->getPdo());
        $artistManager->delete($id);
        header('Location:/');
    }
}
