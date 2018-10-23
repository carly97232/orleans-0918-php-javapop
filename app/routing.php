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

    'Admin' => [ // Controller
        ['admin', '/admin', 'GET'], // action, url, method
    ],
  
    'Location' => [ // Controller
        ['index', '/location', 'GET'], // action, url, method
    ],

    'Event' => [ // Controller
        ['index', '/event', 'GET'], // action, url, method

     ],
    'Artist' => [ // Controller
        ['index', '/artist', 'GET'], // action, url, method
        ['add', '/artist/add', ['GET', 'POST']], // action, url, method
        ['edit', '/artist/edit/{id:\d+}', ['GET', 'POST']], // action, url, method
        ['show', '/artist/{id:\d+}', 'GET'], // action, url, method
        ['delete', '/artist/delete/{id:\d+}', 'GET'], // action, url, method
    ],
    'ArtistAdmin' => [ // Controller
        ['index', '/artistadmin', 'GET'], // action, url, method
        ['add', '/artistadmin/add', ['GET', 'POST']], // action, url, method
        ['edit', '/artistadmin/edit/{id:\d+}', ['GET', 'POST']], // action, url, method
        ['show', '/artistadmin/{id:\d+}', 'GET'], // action, url, method
        ['delete', '/artistadmin/delete/{id:\d+}', 'GET'], // action, url, method
    ],
];

