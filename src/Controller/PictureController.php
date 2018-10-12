<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\Picture;
use Model\PictureManager;

/**
 * Class PictureController
 *
 */
class PictureController extends AbstractController
{


    /**
     * Display picture listing
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $pictureManager = new PictureManager($this->getPdo());
        $pictures = $pictureManager->selectAllReverse('id');

        return $this->twig->render('Picture/index.html.twig', ['pictures' => $pictures]);
    }

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function addPic()
    {

        $maxSize = 5000000;
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');

        if(isset($_POST['submit'])) {
            if (count($_FILES['upload']['name']) > 0) {
                for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
                    $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                    $size = filesize($_FILES['upload']['tmp_name'][$i]);
                    $extension = strrchr($_FILES['upload']['name'][$i], '.');

                    if (!in_array($extension, $extensions)) {
                        $errors['name'] = 'Vous devez uploader un fichier de type ' . implode(', ', $extensions);
                        return $this->twig->render('Picture/add.html.twig', ['error' => $errors]);
                    }

                    if ($size > $maxSize) {
                        $errors['name'] = 'Le fichier est trop gros...';
                        return $this->twig->render('Picture/add.html.twig', ['error' => $errors]);
                    }

                    if ($tmpFilePath != "") {
                        $shortName = $_FILES['upload']['name'][$i];
                        //save the url and the file

                        $filePath = "assets/images/galerie/" . 'image' . date('d-m-Y-H-i-s') . '-' . $_FILES['upload']['name'][$i];
                        if (!isset($errors)) {
                            if (move_uploaded_file($tmpFilePath, $filePath))
                            {
                                $files[] = $shortName;

                                $imgTitle = 'image' . date('d-m-Y-H-i-s') . '-' . $_FILES['upload']['name'][$i];
                                if ($_SERVER['REQUEST_METHOD'] === 'POST')
                                {
                                    $pictureManager = new PictureManager($this->getPdo());
                                    $picture = new Picture();
                                    $picture->setTitle($imgTitle);
                                    $id = $pictureManager->insert($picture);
                                    header('Location:/galeryadmin');
                                }
                            }
                        }
                    }
                }
            }
        }

        return $this->twig->render('Picture/add.html.twig');
    }


}