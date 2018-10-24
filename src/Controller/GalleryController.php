<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\Gallery;
use Model\GalleryManager;

/**
 * Class GalleryController
 *
 */
class GalleryController extends AbstractController
{
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $galleryManager = new GalleryManager($this->getPdo());
        $gallerys = $galleryManager->selectAll('id', 'DESC');

        return $this->twig->render('Gallery/gallery.html.twig', ['gallerys' => $gallerys]);
    }
}
