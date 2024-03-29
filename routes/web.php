<?php


// Route::get('/', 'PagesController@home')->name('pages.home');

// Route::get('nosotros', 'PagesController@about')->name('pages.about');
// Route::get('archivo', 'PagesController@archive')->name('pages.archive');
// Route::get('contacto', 'PagesController@contact')->name('pages.contact');


// Route::get('blog/{post}', 'PostsController@show')->name('posts.show');
// Route::get('categorias/{category}', 'CategoriesController@show')->name('categories.show');
// Route::get('etiquetas/{tag}', 'TagsController@show')->name('tags.show');

Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'middleware' => 'auth'],
function (){
	Route::get('/', 'AdminController@index')->name('dashboard');
	Route::resource('posts', 'PostsController', ['as' => 'admin']);
	Route::resource('users', 'UsersController', ['as' => 'admin']);
	Route::resource('roles', 'RolesController', ['except' => 'show', 'as' => 'admin']);
	Route::resource('permissions', 'PermissionsController', ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);

	Route::middleware('role:Admin')
		->put('users/{user}/roles', 'UsersRolesController@update')
		->name('admin.users.roles.update');

	Route::middleware('role:Admin')
		->put('users/{user}/permissions', 'UsersPermissionsController@update')->name('admin.users.permissions.update');

	Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
	Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');

});
Route::Auth(['register' => false]);

Route::get('/{any?}', 'PagesController@spa')->name('pages.home')->where('any', '.*');