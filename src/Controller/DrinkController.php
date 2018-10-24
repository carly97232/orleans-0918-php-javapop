<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 17/10/18
 * Time: 06:09
 */


namespace Controller;

    use Model\Drink;
    use Model\DrinkManager;

    /**
     * Class DrinkController
     * @package Controller
     */
    class DrinkController extends AbstractController
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
                $type_name = str_replace(' ', '', $drink['type_name']);
                $drinksByType[$type_name][]= $drink;
            }
            return $this->twig->render('Drink/index.html.twig', ['drinksByType' => $drinksByType]);
        }
    }
