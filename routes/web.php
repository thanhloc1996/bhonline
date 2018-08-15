<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'layoutcontroller@getindex');

route::get('layout',[
        'as'=>'index',
        'uses'=>'layoutcontroller@getindex'
]);

route::get('type_product/{type}',[
    'as'=>'type_product',
    'uses'=>'layoutcontroller@gettype_product'
]);

route::get('product/{id}', [
    'as' => 'product',
    'uses' => 'layoutcontroller@get_product'
]);

route::get('about', [
    'as' => 'about',
    'uses' => 'layoutcontroller@get_about'
]);

route::get('contacts', [
    'as' => 'contacts',
    'uses' => 'layoutcontroller@get_contacts'
]);

route::get('add-to-cart/{id}',[
    'as'=>'addtocart',
    'uses'=>'layoutcontroller@get_addtocart'
]);

route::get('delete-to-cart/{id}', [
    'as' => 'deletetocart',
    'uses' => 'layoutcontroller@get_deletetocart'
]);

route::get('checkout', [
    'as' => 'checkout',
    'uses' => 'layoutcontroller@get_checkout'
]);
route::post('checkout', [
    'as' => 'checkout',
    'uses' => 'layoutcontroller@post_checkout'
]);

route::get('login', [
    'as' => 'login',
    'uses' => 'layoutcontroller@get_login'
]);

route::post('login', [
    'as' => 'login',
    'uses' => 'layoutcontroller@post_login'
]);
route::get('signup', [
    'as' => 'signup',
    'uses' => 'layoutcontroller@get_signup'
]);

route::post('signup', [
    'as' => 'signup',
    'uses' => 'layoutcontroller@post_signup'
]);

route::get('logout', [
    'as' => 'logout',
    'uses' => 'layoutcontroller@get_logout'
]);

route::get('search', [
    'as' => 'search',
    'uses' => 'layoutcontroller@get_search'
]);

route::group(['prefix' => 'admin'], function () { 
        route::group(['prefix' => 'product_type'], function () {
        route::get('list', 'admincontroller@get_list_type');

        route::get('add', 'admincontroller@get_add_type');
        route::post('add', 'admincontroller@post_add_type');

        route::get('edit/{id}', 'admincontroller@get_edit_type');
        route::post('edit/{id}','admincontroller@post_edit_type');

        route::get('delete/{id}', 'admincontroller@get_delete_type');
        route::post('delete/{id}', 'admincontroller@post_delete_type');
    });
    route::group(['prefix' => 'product'], function () {
        route::get('list', 'admincontroller@get_list_pro');
        route::get('add', 'admincontroller@get_add_pro');
        
        route::get('edit', 'admincontroller@get_edit_pro');
    });


});