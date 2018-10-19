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
     * Class CardController
     *
     */
class DrinkController extends AbstractController
{
    /**
     * Display item listing
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $drinkManager = new DrinkManager($this->getPdo());
        $drinks = $drinkManager->selectAllDrink();

        $types= [];
        foreach ($drinks as $drink){
            $type_name = $drink['type_name'];
            if (!in_array($type_name, $types)) {
                $types[]= $type_name;
            }
        }
//        foreach ($types as $type){
//            foreach ($drinks as $drink){
//                foreach($drink as $key => $value) {
//                    if ($value = $type && !in_array()) {
//                        $categoryDrink[$type][] = array($drinks[$type]['name'], $drink['volume']);
//                    }
//                }
//            }
//        }
//        var_dump($categoryDrink[$type]);
        return $this->twig->render('Drink/index.html.twig', ['drinks' => $drinks, 'types'=> $types]);
    }


}
