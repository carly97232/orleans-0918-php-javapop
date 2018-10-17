<?php
/**
 * Created by PhpStorm.
 * User: patricia
 * Date: 17/10/18
 * Time: 10:30
 */

namespace Controller;


class AdminController extends AbstractController
{
    /**
     * Display item listing
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function admin()

    {

         return $this->twig->render('Admin/index.html.twig');
    }


}