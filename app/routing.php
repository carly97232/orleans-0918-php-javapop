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

    'Contact' => [ // Controller
        ['index', '/contact', ['GET', 'POST']], // action, url, method
    ],

    'Drink' => [ // Controller
        ['index', '/drink', 'GET'], // action, url, method
    ],

    'Admin' => [ // Controller
        ['admin', '/admin', 'GET'], // action, url, method
    ],

    'EventAdmin' => [ // Controller
        ['index', '/admin/eventAdmin/index', 'GET'], // action, url, method
        ['add', '/admin/eventAdmin/add', ['GET', 'POST']], // action, url, method
        ['delete', '/admin/eventAdmin/index', 'POST'], // action, url, method
        ['update', '/admin/eventAdmin/update/{id:\d+}', ['GET', 'POST']], // action, url, method
    ],

    'Location' => [ // Controller
        ['index', '/location', 'GET'], // action, url, method
    ],

    'Event' => [ // Controller
        ['index', '/event', 'GET'], // action, url, method
     ],
  
    'Artist' => [ // Controller
        ['index', '/artist', 'GET'], // action, url, method
    ],

    'Gallery' => [
        ['index', '/gallery', 'GET'],
    ],

    'GalleryAdmin' => [
        ['index', '/admin/galleryAdmin', 'GET'],
        ['delete', '/admin/galleryAdmin', 'POST'],
        ['addPic', '/admin/galleryAdmin/add', ['GET','POST']],
    ],

    'DrinkAdmin' => [ // Controller
        ['index', '/admin/drinkAdmin/index', 'GET'], // action, url, method
        ['add', '/admin/drinkAdmin/add', 'GET'],
        ['insert', '/admin/drinkAdmin/insert', 'POST'],
    ],
];
