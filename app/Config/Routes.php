<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->setAutoRoute(true);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('/home', 'Pages::index');
$routes->get('/service-detail/(:any)', 'Services::detail/$1');
$routes->get('/posts-by-category/(:any)', 'Services::postByCategory/$1');
$routes->get('/podcasts', 'Podcasts::index');
$routes->get('/services', 'Services::serviceList');
$routes->get('/live-radio', 'Pages::liveRadio');
$routes->get('/contact', 'Pages::contact');
$routes->get('/about', 'Pages::about');
$routes->post('/search-service', 'Services::search');

$routes->match(['get', 'post'],'message', 'Messages::index');

$routes->get('/logout', 'Auth::logout');

$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    //Protected routes
    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/profile', 'Auth::profile');
    $routes->get('/settings', 'Auth::settings');


    $routes->get('list-users', 'Users::index');
    $routes->get('/add-picture', 'Users::addImage');
    $routes->get('/save-picture', 'Users::saveImage');
    $routes->get('/delete-user/(:any)', 'Users::deleteUser/$1');
    $routes->get('/active-user/(:any)', 'Users::active/$1');

    $routes->post('/save-picture', 'Users::saveImage');
    $routes->get('/add-user', 'Users::create');
    $routes->post('/add-user', 'Users::create');

    $routes->get('/add-member', 'Team::create');
    $routes->get('/change-pwd', 'Auth::change');

    $routes->get('add-post', 'Posts::create');
    $routes->post('add-post', 'Posts::create');

    $routes->get('post-edit/(:any)', 'Posts::edit/$1');
    $routes->post('edit-post/(:any)', 'Posts::edit/$1');

    $routes->get('remove-as-featured/(:any)', 'Posts::removeAsFeatured/$1');
    $routes->get('make-as-featured/(:any)', 'Posts::makeAsFeatured/$1');

    $routes->get('remove-as-most-format/(:any)', 'Posts::removeAsMostFormat/$1');
    $routes->get('make-as-most-format/(:any)', 'Posts::makeAsMostFormat/$1');

    $routes->get('delete-post/(:any)', 'Posts::delete/$1');
    $routes->get('list-posts', 'Posts::index');
    $routes->get('post-image/(:any)', 'Posts::addImage/$1');
    $routes->post('post-image/(:any)', 'Posts::addImage/$1');
    $routes->post('save-post-picture', 'Posts::saveImage');


    $routes->get('list-podcasts', 'Podcasts::list');
    $routes->get('add-podcast', 'Podcasts::create');
    $routes->post('add-podcast', 'Podcasts::create');
    $routes->get('delete-podcast/(:any)', 'Podcasts::delete/$1');
    $routes->get('podcast-edit/(:any)', 'Podcasts::edit/$1');
    $routes->post('podcast-edit/(:any)', 'Podcasts::edit/$1');




    $routes->get('coords', 'Coords::index');
    $routes->get('coords-update', 'Coords::update');

});

$routes->group('', ['filter' => 'AlreadyLoggedIn'], function ($routes) {
    //Protected routes
    $routes->get('login', 'Auth::index');
    $routes->post('login', 'Auth::index');
    $routes->get('signup', 'Auth::signup');
    $routes->post('signup', 'Auth::signup');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}