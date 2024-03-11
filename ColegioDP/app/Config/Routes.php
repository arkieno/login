<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 * 
 */

//  $routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
// $routes->setTranslateURIDashes(false);
// $routes->set404Override();
// $routes->setAutoRoute(true);
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::register',['filter' => 'noauth']);
$routes->post('get-token', 'AuthController::getToken');

$routes->get('/test', 'AuthController::testSession');
$routes->post('/login', 'AuthController::login', ['filter' => 'noauth']);
$routes->post('/login', 'AuthController::login');
$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);
$routes->get('/dashboards', 'Dashboard::dashboards');
$routes->get('/profile', 'ProfileSetting::index',['filter' => 'auth']);
// $routes->get('/profiles', 'ProfileSetting::profiles');






//forgot password//

$routes->get('forgot-password', 'ForgotPassword::index');
$routes->post('forgot-password/send-reset-link', 'ForgotPassword::sendResetLink');
$routes->get('forgot-password/reset-password/(:any)', 'ForgotPassword::resetPassword/$1');
$routes->post('forgot-password/update-password', 'ForgotPassword::updatePassword');

// app/Config/Routes.php
$routes->add('/login', 'AuthController:::index');
$routes->add('/profile-setting', 'ProfileSetting::index');

// $routes->get('dashboard', 'ForgotPassword::profile');

//protected routes//

$routes->get('logout', 'AuthController::logout');


