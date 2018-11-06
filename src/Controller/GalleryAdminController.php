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
 * Class GalleryController
 *
 */
class GalleryAdminController extends AbstractController
{
    const AUTH_EXT = array('.png', '.gif', '.jpg', '.jpeg');

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $pictureManager = new PictureManager($this->getPdo());
        $pictures = $pictureManager->selectAll('id', 'DESC');

        return $this->twig->render('GalleryAdmin/index.html.twig', ['pictures' => $pictures]);
    }

    private function pictureVerification()
    {
        $errors = [];
            if (count($_FILES['upload']['name']) > 0) {
                for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
                    $size = filesize($_FILES['upload']['tmp_name'][$i]);

                    $extension = strrchr($_FILES['upload']['name'][$i], '.');

                    if (!in_array($extension, self::AUTH_EXT)) {
                        $errors['name'] = 'Vous devez uploader un fichier de type ' . implode(', ', self::AUTH_EXT);
                    }

                    if (($size > 2097152) or ($size == 0)) {
                        $errors['name'] = 'Le fichier est trop gros...';
                    }
                }
            }

        return $errors;
    }

    public function addPic()
    {
            $errors = [];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $errors = $this->pictureVerification();
                if (empty($errors)) {
                    for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
                    $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                    $shortName = $_FILES['upload']['name'][$i];
                    $filePath = "assets/images/gallery/" . 'image' . date('d-m-Y-H-i-s')
                        . '-' . $_FILES['upload']['name'][$i];
                    if (move_uploaded_file($tmpFilePath, $filePath)) {
                        $imgName = 'image' . date('d-m-Y-H-i-s') . '-' . $shortName;
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $pictureManager = new PictureManager($this->getPdo());
                            $picture = new Picture();
                            $picture->setImgName($imgName);
                            $id = $pictureManager->insert($picture);
                            header('Location:/admin/galleryAdmin');
                        }
                    }
                }
            }
        }
        return $this->twig->render('GalleryAdmin/add.html.twig', ['errors' => $errors]);
    }
    /**
     *
     */
    public function delete()
    {
        $pictureManager = new PictureManager($this->getPdo());
        $pictureManager->delete($_POST['id']);
        unlink("assets/images/gallery/" .$_POST['imgName']);
        header('Location: /admin/galleryAdmin');
    }
}
