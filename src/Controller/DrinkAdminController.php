<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 27/10/18
 * Time: 16:14
 */

namespace Controller;

use Filter\Text;
use Model\Drink;
use Model\DrinkManager;
use Model\DrinkVolume;
use Model\RealDrink;
use Model\RealDrinkManager;
use Model\TypeManager;
use Model\VolumeManager;

/**
 * Class DrinkController
 * @package Controller
 */
class DrinkAdminController extends AbstractController
{
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $drinkManager = new DrinkManager($this->getPdo());
        $drinks = $drinkManager->selectAllDrink();
        return $this->twig->render('DrinkAdmin/index.html.twig', ['drinks' => $drinks]);
    }

    public function add()
    {
        $volumeManager = new VolumeManager($this->getPdo());
        $volumes = $volumeManager->selectAll();

        $typeManager = new TypeManager($this->getPdo());
        $types = $typeManager->selectAll();

        return $this->twig->render('DrinkAdmin/add.html.twig', ['volumes' =>  $volumes, 'types' => $types]);
    }

    public function insert()
    {
        $userData = $_POST;
        $textFilter = new Text();
        $textFilter->setTexts($userData);
        $userData = $textFilter->filter();

        $drinkManager = new RealDrinkManager($this->getPdo());
        $drink = new RealDrink();
        $drink->setName($userData['name']);
        $drink->setIngredients($userData['ingredients']);
        $drink->setTypeId($userData['type']);
        $drinkId = $drinkManager->insert($drink);

        $drinkVolumeManager = new DrinkManager($this->getPdo());
        $drinkVolume = new DrinkVolume();
        $drinkVolume->setDrinkId($drinkId);
        $drinkVolume->setVolumeId($userData['volume']);
        $drinkVolume->setPrix($userData['prix']);
        $drinkVolId = $drinkVolumeManager->insert($drinkVolume);

        header('location:/admin/drinkAdmin/index');
        exit();
    }
}
