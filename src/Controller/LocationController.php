<?php
/**
 * Created by PhpStorm.
 * User: patricia
 * Date: 17/10/18
 * Time: 16:23
 */

namespace Controller;



class LocationController extends AbstractController
{
    public function index()
    {
      return $this->twig->render('Location/index.html.twig');
    }
}