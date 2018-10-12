<?php
/**
 * Created by PhpStorm.
 * User: amelie
 * Date: 12/10/18
 * Time: 09:45
 */

namespace Controller;


use Model\FormManager;

class FormController extends AbstractController
{


    /**
     * Display form listing
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $formManager = new FormManager($this->getPdo());
        $forms = $formManager->selectAll();

        return $this->twig->render('Form/index.html.twig', ['forms' => $forms]);
    }


    /**
     * Display form informations specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function show(int $id)
    {
        $formManager = new FormManager($this->getPdo());
        $form = $formManager->selectOneById($id);

        return $this->twig->render('Form/show.html.twig', ['form' => $form]);
    }


    /**
     * Display form edition page specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function edit(int $id): string
    {
        $formManager = new FormManager($this->getPdo());
        $form = $formManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $form->setTitle($_POST['title']);
            $formManager->update($form);
        }

        return $this->twig->render('Form/edit.html.twig', ['form' => $form]);
    }


    /**
     * Display form creation page
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formManager = new FormManager($this->getPdo());
            $form = new Form();
            $form->setTitle($_POST['title']);
            $id = $formManager->insert($form);
            header('Location:/form/' . $id);
        }

        return $this->twig->render('Form/add.html.twig');
    }


    /**
     * Handle form deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $formManager = new FormManager($this->getPdo());
        $formManager->delete($id);
        header('Location:/');
    }
}