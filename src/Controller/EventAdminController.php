<?php
/**
 * Created by PhpStorm.
 * User: patricia
 * Date: 23/10/18
 * Time: 16:18
 */

namespace Controller;

class EventAdminController extends AbstractController
{


    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        return $this->twig->render('EventAdmin/index.html.twig');
    }
    /**
     * Display item creation page
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function add()
    {



        return $this->twig->render('EventAdmin/add.html.twig');
    }
}
