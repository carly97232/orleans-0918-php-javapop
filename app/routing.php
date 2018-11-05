<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */
$routes = [
    'Home' => [ // Controller
        ['index', '/', 'GET'], // action, url, method
    ],
  
    'Item' => [ // Controller
        ['index', '/item', 'GET'], // action, url, method
        ['add', '/item/add', ['GET', 'POST']], // action, url, method
        ['edit', '/item/edit/{id:\d+}', ['GET', 'POST']], // action, url, method
        ['show', '/item/{id:\d+}', 'GET'], // action, url, method
        ['delete', '/item/delete/{id:\d+}', 'GET'], // action, url, method
    ],
    'Contact' => [ // Controller
        ['index', '/contact', ['GET', 'POST']], // action, url, method
    ],
    'Drink' => [ // Controller
        ['index', '/drink', 'GET'], // action, url, method
    ],
    'Admin' => [ // Controller
        ['admin', '/admin', 'GET'], // action, url, method
    ],
  
    'Location' => [ // Controller
        ['index', '/location', 'GET'], // action, url, method
    ],

    'Event' => [ // Controller
        ['index', '/event', 'GET'], // action, url, method

     ],

    'Gallery' => [
        ['index', '/gallery', 'GET'],
    ],

    'GalleryAdmin' => [
        ['index', '/admin/galleryAdmin', 'GET'],
    ],

    'EventAdmin' => [ // Controller
        ['index', '/admin/eventAdmin/index', 'GET'], // action, url, method
    ],


    'DrinkAdmin' => [ // Controller
        ['index', '/admin/drinkAdmin/index', 'GET'], // action, url, method
    ],

];
