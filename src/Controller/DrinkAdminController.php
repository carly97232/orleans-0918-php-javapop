<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 27/10/18
 * Time: 16:14
 */

namespace Controller;

use Model\Drink;
use Model\DrinkManager;

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

        $drinksByType= [] ;
        foreach ($drinks as $drink) {
            $typeName = str_replace(' ', '', $drink['type_name']);
            $drinksByType[$typeName][]= $drink;
        }
        return $this->twig->render('DrinkAdmin/index.html.twig', ['drinks' => $drinks]);
    }
}
