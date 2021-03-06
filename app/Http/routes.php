<?php

//Event::listen('illuminate.query', function($sql)
//{
	//echo $sql . '<br>';
	//die();
   // dd([
   //     $query,  // prepared statement
    //    $params, // query params (? symbols will be replaced with)
   //     $time    // execution time
   // ]);
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// ****************************** ADMIN ****************************** //
Route::resource('admin/brands', 'BrandController');
Route::resource('admin/brandproducts', 'BrandProductController');
Route::resource('admin/brands.products', 'BrandProductController');

Route::resource('admin/products', 'ProductController');
Route::resource('admin/types', 'TypeController');
Route::resource('admin/products.types', 'TypeController');

Route::resource('admin/brands.products.inventory', 'InventoryController');
Route::resource('admin/inventory', 'InventoryController');

Route::resource('admin/announcements', 'AnnouncementController');
Route::resource('admin/events', 'EventController');
Route::resource('admin/editorials', 'EditorialController');
Route::get('admin/editorials/updateCurrent/{id}', 'EditorialController@updateCurrent');

Route::resource('admin/team', 'TeamController');

Route::resource('admin', 'AdminController');
// ****************************** ADMIN ****************************** //


// ****************************** HOME ****************************** //
Route::get('/', 'HomeController@home');
Route::get('home', 'HomeController@home');
Route::get('acceuil', 'HomeController@acceuil');
// ****************************** HOME ****************************** //

// ****************************** ABOUT US ****************************** //
Route::get(ABOUTUS, 'AboutUsController@aboutus');
Route::get(ABOUTUS_FR, 'AboutUsController@aboutusfr');

Route::get(ABOUTUS . '/' . CULTURE, 'AboutUsController@culture');
Route::get(ABOUTUS_FR . '/' . CULTURE, 'AboutUsController@culturefr');

Route::get(ABOUTUS . '/' . EXPERIENCE, 'AboutUsController@experience');
Route::get(ABOUTUS_FR . '/' . replaceAccents(EXPERIENCE_FR), 'AboutUsController@experiencefr');

Route::get(ABOUTUS . '/' . STUDIOSRERVICES, 'AboutUsController@services');
Route::get(ABOUTUS_FR . '/' . replaceAccents(STUDIOSRERVICES_FR), 'AboutUsController@servicesfr');

Route::get(ABOUTUS . '/' . TEAM, 'AboutUsController@team');
Route::get(ABOUTUS_FR . '/' . replaceAccents(TEAM_FR), 'AboutUsController@teamfr');
// ****************************** ABOUT US ****************************** //

// ****************************** JOURNAL ****************************** //
Route::get(JOURNAL, 'JournalController@journal');
Route::get(JOURNAL_FR, 'JournalController@journalfr');

Route::get(ANNOUNCEMENTS, 'AnnouncementController@announcements');
Route::get(replaceAccents(ANNOUNCEMENTS_FR), 'AnnouncementController@announcementsfr');

Route::get(rtrim(ANNOUNCEMENTS, 's') . '/{id}', 'AnnouncementController@announcement');
Route::get(rtrim(replaceAccents(ANNOUNCEMENTS_FR), 's') . '/{id}', 'AnnouncementController@announcementfr');

Route::get(EDITORIALS, 'EditorialController@editorials');
Route::get(replaceAccents(EDITORIALS_FR), 'EditorialController@editorialsfr');

Route::get(rtrim(EDITORIALS, 's') . '/{id}', 'EditorialController@editorial');
Route::get(rtrim(replaceAccents(EDITORIALS_FR), 's') . '/{id}', 'EditorialController@editorialfr');

Route::get(EVENTS, 'EventController@events');
Route::get(replaceAccents(EVENTS_FR), 'EventController@eventsfr');

Route::get(rtrim(EVENTS, 's') . '/{id}', 'EventController@event');
Route::get(rtrim(replaceAccents(EVENTS_FR), 's') . '/{id}', 'EventController@eventfr');
// ****************************** JOURNAL ****************************** //

// ****************************** BRANDS ****************************** //
Route::get('brands', 'BrandController@brands');
Route::get('marques', 'BrandController@marques');

Route::get('brands/{brand}/{id}', 'BrandController@brand');
Route::get('marques/{brand}/{id}', 'BrandController@marque');

Route::get('brands/{brand}/{product}/{brand_id}/{product_id}', 'BrandController@brandProductEn');
Route::get('marques/{brand}/{product}/{brand_id}/{product_id}', 'BrandController@brandProductFr');
// ****************************** BRANDS ****************************** //

// ****************************** PRODUCTS ****************************** //
Route::get('products/{product}/{product_id}', 'InventoryController@products');
Route::get('produits/{product}/{product_id}', 'InventoryController@produits');

Route::get('products/{product}/{type}/{product_id}/{type_id}', 'InventoryController@typesen');
Route::get('produits/{product}/{type}/{product_id}/{type_id}', 'InventoryController@typesfr');

Route::get('products/{product}/{product_id}/brand/{brand}/{brand_id}', 'InventoryController@products');
Route::get('produits/{product}/{product_id}/marque/{brand}/{brand_id}', 'InventoryController@produits');

Route::get('products/{product}/{type}/{product_id}/{type_id}/brand/{brand}/{brand_id}', 'InventoryController@typesen');
Route::get('produits/{product}/{type}/{product_id}/{type_id}/marque/{brand}/{brand_id}', 'InventoryController@typesfr');

// ****************************** PRODUCTS ****************************** //

// ****************************** TEST ****************************** //
Route::get('test', 'TestController@index');
Route::get('test/brands', 'TestController@brands');
Route::get('test/products', 'TestController@products');
// ****************************** TEST ****************************** //

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
