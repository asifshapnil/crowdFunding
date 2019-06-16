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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'Front\HomeController@index')->name('front-home');
Route::get('/test', 'Front\HomeController@test');
Route::get('/project-list', 'Front\HomeController@projectList')->name('front-project-list');
Route::get('/rated-list', 'Front\HomeController@ratingProjectList')->name('front-rating-list');
// Route::get('/contact-us', 'Front\HomeController@contactUs')->name('front-cont/act');

Route::get('/project-details/{id}', 'Front\HomeController@projectDetails')->name('front-project-details');

Route::get('/product-list', 'Front\HomeController@productList')->name('front-product-list');
Route::get('/product-details/{id}', 'Front\HomeController@productDetails')->name('front-product-details');
Route::get('/login/{id}', 'Front\HomeController@projectDetailsAfterLogin')->name('front-project-details-login');
Route::get('/login/toProduct/{id}', 'Front\HomeController@projectDetailsAfterLogin')->name('front-product-details-login');
Route::get('/login/toProduct/{id}', 'Front\HomeController@projectDetailsAfterLogin')->name('front-product-details-login');
Route::post('/login/toProduct/{id}', 'Front\HomeController@login_product_details_action')->name('login-product-details-action');

Route::post('/login/{id}', 'Front\HomeController@login_project_details_action')->name('login-project-details-action');



Route::get('/cart', 'Front\HomeController@cart')->name('front-cart');


Route::get('/contact', 'Front\HomeController@contact')->name('front-contact');
Route::post('/contact', 'Front\HomeController@contactAction')->name('front-contact-action');

Route::get('/company-profile', 'Front\HomeController@companyProfile')->name('front-company-profile');

Route::get('/user-profile', 'Front\HomeController@userProfile')->name('front-user-profile');
Route::get('/my-project-details/{id}', 'Front\HomeController@userProjectDetails')->name('front-user-project-details');

Route::get('/register-request', 'User\AuthController@registerRequest')->name('user-register-request');
Route::post('/register-request', 'User\AuthController@registerRequestAction')->name('user-register-request-action');

Route::get('/register/{token}', 'User\AuthController@register')->name('user-register');
Route::post('/register/{token}', 'User\AuthController@registerAction')->name('user-register-action');



Route::get('/about', 'Front\HomeController@about')->name('front-about');
Route::get('/faq', 'Front\HomeController@faq')->name('front-faq');
Route::get('/how-to-use', 'Front\HomeController@howToUse')->name('front-how-to-use');
Route::get('/media', 'Front\HomeController@media')->name('front-media');
Route::get('/terms', 'Front\HomeController@terms')->name('front-terms');
Route::get('/privacy', 'Front\HomeController@privacy')->name('front-privacy');
Route::get('/transaction-law', 'Front\HomeController@transactionLaw')->name('front-transaction-law');


Route::get('/search', 'Front\HomeController@search')->name('front-search');

Route::get('/cart-add', 'Front\HomeController@cartAdd')->name('front-cart-add');
Route::get('/cart-update', 'Front\HomeController@cartUpdate')->name('front-cart-update');
Route::get('/cart-remove', 'Front\HomeController@cartRemove')->name('front-cart-remove');


Route::get('/profile/{id}', 'Front\HomeController@profile')->name('front-profile');


Route::get('/facebook', 'User\AuthController@facebook')->name('front-facebook');
Route::any('/facebook-action', 'User\AuthController@facebookAction')->name('front-facebook-action');
Route::get('/google', 'User\AuthController@google')->name('front-google');
Route::any('/google-action', 'User\AuthController@googleAction')->name('front-google-action');
Route::get('/twitter', 'User\AuthController@twitter')->name('front-twitter');
Route::any('/twitter-action', 'User\AuthController@twitterAction')->name('front-twitter-action');
Route::get('/yahoo', 'User\AuthController@yahoo')->name('front-yahoo');
Route::any('/yahoo-action', 'User\AuthController@yahooAction')->name('front-yahoo-action');





Route::group(['prefix' => 'admin'], function () {

	Route::get('/login', 'Admin\AuthController@login')->name('admin-login');
	Route::post('/login', 'Admin\AuthController@loginAction')->name('admin-login-action');
	Route::get('/logout', 'Admin\AuthController@logout')->name('admin-logout');


	Route::group(['middleware' => 'admin-auth'], function () {
        Route::get('/', 'Admin\DashboardController@index')->name('admin-dashboard');
        Route::get('/change-password', 'Admin\ProfileController@changePassword')->name('admin-change-password');
        Route::post('/change-password', 'Admin\ProfileController@changePasswordAction')->name('admin-change-password-action');


        Route::group(['prefix' => 'project-category'], function () {
	        Route::get('/list', 'Admin\ProjectCategoryController@categoryList')->name('admin-project-category-list');
	        Route::get('/list-data', 'Admin\ProjectCategoryController@data')->name('admin-project-category-list-data');
	        Route::get('/add', 'Admin\ProjectCategoryController@add')->name('admin-project-category-add');
	        Route::post('/add', 'Admin\ProjectCategoryController@addAction')->name('admin-project-category-add-action');
	        Route::get('/edit/{id}', 'Admin\ProjectCategoryController@edit')->name('admin-project-category-edit');
	        Route::post('/edit/{id}', 'Admin\ProjectCategoryController@editAction')->name('admin-project-category-edit-action');
	        Route::get('/delete/{id}', 'Admin\ProjectCategoryController@delete')->name('admin-project-category-delete');
	        Route::get('/status-change/{id}/{status}', 'Admin\ProjectCategoryController@statusChange')->name('admin-project-category-status-change');
	    });
        Route::group(['prefix' => 'project'], function () {
	        Route::get('/list', 'Admin\ProjectController@projectList')->name('admin-project-list');
	        Route::get('/list-data', 'Admin\ProjectController@data')->name('admin-project-list-data');
	        Route::get('/status-change/{id}/{status}', 'Admin\ProjectController@statusChange')->name('admin-project-status-change');
	        Route::get('/delete/{id}', 'Admin\ProjectController@delete')->name('admin-project-delete');
	        Route::get('/details/{id}', 'Admin\ProjectController@details')->name('admin-project-details');
	    });

        Route::group(['prefix' => 'product-category'], function () {
	        Route::get('/list', 'Admin\ProductCategoryController@categoryList')->name('admin-product-category-list');
	        Route::get('/list-data', 'Admin\ProductCategoryController@data')->name('admin-product-category-list-data');
	        Route::get('/add', 'Admin\ProductCategoryController@add')->name('admin-product-category-add');
	        Route::post('/add', 'Admin\ProductCategoryController@addAction')->name('admin-product-category-add-action');
	        Route::get('/edit/{id}', 'Admin\ProductCategoryController@edit')->name('admin-product-category-edit');
	        Route::post('/edit/{id}', 'Admin\ProductCategoryController@editAction')->name('admin-product-category-edit-action');
	        Route::get('/delete/{id}', 'Admin\ProductCategoryController@delete')->name('admin-product-category-delete');
	        Route::get('/status-change/{id}/{status}', 'Admin\ProductCategoryController@statusChange')->name('admin-product-category-status-change');
	    });

        Route::group(['prefix' => 'product-subcategory'], function () {
	        Route::get('/list', 'Admin\ProductSubcategoryController@categoryList')->name('admin-product-subcategory-list');
	        Route::get('/list-data', 'Admin\ProductSubcategoryController@data')->name('admin-product-subcategory-list-data');
	        Route::get('/add', 'Admin\ProductSubcategoryController@add')->name('admin-product-subcategory-add');
	        Route::post('/add', 'Admin\ProductSubcategoryController@addAction')->name('admin-product-subcategory-add-action');
	        Route::get('/edit/{id}', 'Admin\ProductSubcategoryController@edit')->name('admin-product-subcategory-edit');
	        Route::post('/edit/{id}', 'Admin\ProductSubcategoryController@editAction')->name('admin-product-subcategory-edit-action');
	        Route::get('/delete/{id}', 'Admin\ProductSubcategoryController@delete')->name('admin-product-subcategory-delete');
	        Route::get('/status-change/{id}/{status}', 'Admin\ProductSubcategoryController@statusChange')->name('admin-product-subcategory-status-change');
	    });

	    Route::group(['prefix' => 'product'], function () {
	        Route::get('/list', 'Admin\ProductController@productList')->name('admin-product-list');
	        Route::get('/list-data', 'Admin\ProductController@data')->name('admin-product-list-data');
	        Route::get('/status-change/{id}/{status}', 'Admin\ProductController@statusChange')->name('admin-product-status-change');
	        Route::get('/feature-status-change/{id}/{status}', 'Admin\ProductController@featureStatusChange')->name('admin-product-feature-status-change');
	        Route::get('/delete/{id}', 'Admin\ProductController@delete')->name('admin-product-delete');
	        Route::get('/details/{id}', 'Admin\ProductController@details')->name('admin-product-details');
	    });

	    Route::group(['prefix' => 'user'], function () {
	        Route::get('/list', 'Admin\UserController@index')->name('admin-user-list');
	        Route::get('/list-data', 'Admin\UserController@data')->name('admin-user-list-data');
	        Route::get('/delete/{id}', 'Admin\UserController@delete')->name('admin-user-delete');
	    });

	    Route::group(['prefix' => 'admin-user'], function () {
	        Route::get('/list', 'Admin\AdminUserController@index')->name('admin-admin-user-list');
	        Route::get('/list-data', 'Admin\AdminUserController@data')->name('admin-admin-user-list-data');
	        Route::get('/add', 'Admin\AdminUserController@add')->name('admin-admin-user-add');
	        Route::post('/add', 'Admin\AdminUserController@addAction')->name('admin-admin-user-add-action');
	        Route::get('/edit/{id}', 'Admin\AdminUserController@edit')->name('admin-admin-user-edit');
	        Route::post('/edit/{id}', 'Admin\AdminUserController@editAction')->name('admin-admin-user-edit-action');
	        Route::get('/delete/{id}', 'Admin\AdminUserController@delete')->name('admin-admin-user-delete');
	        Route::get('/status-change/{id}/{status}', 'Admin\AdminUserController@statusChange')->name('admin-admin-user-status-change');
	    });

	    Route::group(['prefix' => 'videos'], function () {
	        Route::get('/list', 'Admin\VideoController@categoryList')->name('admin-videos-list');
	        Route::get('/list-data', 'Admin\VideoController@data')->name('admin-videos-list-data');
	        Route::get('/add', 'Admin\VideoController@add')->name('admin-videos-add');
	        Route::post('/add', 'Admin\VideoController@addAction')->name('admin-videos-add-action');
	        Route::get('/edit/{id}', 'Admin\VideoController@edit')->name('admin-videos-edit');
	        Route::post('/edit/{id}', 'Admin\VideoController@editAction')->name('admin-videos-edit-action');
	        Route::get('/delete/{id}', 'Admin\VideoController@delete')->name('admin-videos-delete');
	        Route::get('/status-change/{id}/{status}', 'Admin\VideoController@statusChange')->name('admin-videos-status-change');
	    });

        Route::group(['prefix' => 'content'], function () {
	        Route::get('/list', 'Admin\ContentController@contentList')->name('admin-content-list');
	        Route::get('/list-data', 'Admin\ContentController@data')->name('admin-content-list-data');
	        Route::get('/add', 'Admin\ContentController@add')->name('admin-content-add');
	        Route::post('/add', 'Admin\ContentController@addAction')->name('admin-content-add-action');
	        Route::get('/edit/{id}', 'Admin\ContentController@edit')->name('admin-content-edit');
	        Route::post('/edit/{id}', 'Admin\ContentController@editAction')->name('admin-content-edit-action');
	        Route::get('/delete/{id}', 'Admin\ContentController@delete')->name('admin-content-delete');
	        Route::get('/status-change/{id}/{status}', 'Admin\ContentController@statusChange')->name('admin-content-status-change');
	    });


	    Route::get('/user-quit-request/{id}/{status}', 'Admin\UserController@quitRequest')->name('admin-user-quit-request');


    });
});



Route::group(['prefix' => 'user'], function () {
	Route::group(['middleware' => 'auth'], function () {

		Route::get('my-page', 'User\ProfileController@mypage')->name('user-my-page');




		Route::get('/invest-list', 'User\InvestController@index')->name('user-invest-list');
		Route::get('/invest/{id}', 'User\InvestController@invest')->name('user-invest');
		Route::post('/invest/{id}', 'User\InvestController@investAction')->name('user-invest-action');
		Route::get('/user-withdrawal', 'User\InvestController@user_withdrawal')->name('user-withdrawal');
		Route::get('/user-withdrawal2', 'User\InvestController@user_withdrawal2')->name('user-withdrawal2');
		Route::post('/user-withdrawal2', 'User\InvestController@user_withdrawal_action')->name('user-withdrawal-action');

		Route::get('/user-withdrawal3', 'User\InvestController@user_withdrawal3')->name('user-withdrawal3');
		Route::get('/user-withdrawal4', 'User\InvestController@user_withdrawal4')->name('user-withdrawal4');

		Route::get('/project-list', 'User\ProjectController@index')->name('user-project-list');
		Route::get('/project-pre-add', 'User\ProjectController@preNew')->name('user-project-pre-add');
		Route::get('/project-add', 'User\ProjectController@add')->name('user-project-add');
		Route::post('/project-add', 'User\ProjectController@addAction')->name('user-project-add-action');
		Route::get('/project-edit/{id}', 'User\ProjectController@edit')->name('user-project-edit');
		Route::post('/project-edit/{id}', 'User\ProjectController@editAction')->name('user-project-edit-action');

		Route::get('/purchase-list', 'User\ProductController@purchaseList')->name('user-purchase-list');
		Route::post('/purchase-list', 'User\ProductController@productRating')->name('user-product-rating');

		Route::get('/product-list', 'User\ProductController@index')->name('user-product-list');
		Route::get('/product-pre-add', 'User\ProductController@preNew')->name('user-product-pre-add');
		Route::get('/product-add', 'User\ProductController@add')->name('user-product-add');
		Route::post('/product-add', 'User\ProductController@addAction')->name('user-product-add-action');
		Route::get('/product-edit/{id}', 'User\ProductController@edit')->name('user-product-edit');
		Route::post('/product-edit/{id}', 'User\ProductController@editAction')->name('user-product-edit-action');

		Route::get('/favourite-add-project/{id}', 'User\ProjectController@addFavourite')->name('user-favourite-add-project');
		Route::get('/favourite-project-list', 'User\ProjectController@favouriteList')->name('user-favourite-project-list');
		Route::get('/favourite-remove-project/{id}', 'User\ProjectController@removeFavourite')->name('user-favourite-remove-project');
		Route::get('/send-message', 'User\ProfileController@sendMessage')->name('user-send-message');
		Route::get('/inbox', 'User\ProfileController@readMessage')->name('user-read-message');
		Route::post('/send-reply', 'User\ProfileController@replyMessage')->name('send-reply');
		Route::get('/delete-message', 'User\ProfileController@deleteMessage')->name('delete-message');


		Route::post('/inbox', 'User\ProfileController@deleteMultipleMessage')->name('user-delete-multiple-message');

		Route::get('/show-message/{id}', 'User\ProfileController@showMessage')->name('show-message');

		Route::get('/send-rank', 'User\ProductController@sendRank')->name('user-send-rank');

		Route::get('/favourite-add-product/{id}', 'User\ProductController@addFavourite')->name('user-favourite-add-product');
		Route::get('/favourite-product-list', 'User\ProductController@favouriteList')->name('user-favourite-product-list');
		Route::get('/favourite-remove-product/{id}', 'User\ProductController@removeFavourite')->name('user-favourite-remove-product');

		Route::post('/project-payment', 'User\ProjectController@payment')->name('user-project-payment');
		Route::post('/product-payment', 'User\ProductController@payment')->name('user-product-payment');


		Route::post('/product-purchase', 'User\ProductController@purchase')->name('user-product-purchase');


		Route::get('/checkout', 'Front\HomeController@checkout')->name('front-checkout');
		Route::post('/cart', 'Front\HomeController@checkout')->name('front-checkout');


		Route::get('/change-password', 'User\AuthController@changePassword')->name('user-change-password');
		Route::post('/change-password', 'User\AuthController@changePasswordAction')->name('user-change-password-action');

		Route::get('/sub-category/{id}', 'User\ProductController@getSubCategory')->name('user-sub-category');


		Route::get('/profile', 'User\ProfileController@index')->name('user-profile-update');
		Route::post('/profile', 'User\ProfileController@indexAction')->name('user-profile-update-action');
		Route::get('/email', 'User\ProfileController@emailChange')->name('user-email-update');
		Route::post('/email', 'User\ProfileController@emailChangeAction')->name('user-email-update-action');
		Route::get('/address-update', 'User\ProfileController@shippingAddressUpdate')->name('user-shipping-address-update');
		Route::post('/address-update', 'User\ProfileController@shippingAddressUpdateAction')->name('user-shipping-address-update-action');
		Route::get('/quit-membership', 'User\ProfileController@quitMembership')->name('user-quit-membership');
		Route::post('/quit-membership', 'User\ProfileController@quitMembershipUpdate')->name('user-quit-membership-action');

		Route::get('/order-list', 'User\OrderController@index')->name('user-order-list');
		Route::get('/order-list-data', 'User\OrderController@data')->name('user-order-list-data');
		Route::get('/order-status-change/{id}/{status}', 'User\OrderController@statusChange')->name('user-order-status-change');
		Route::get('/order-details-status-change/{id}/{status}', 'User\OrderController@orderStatusChange')->name('user-order-details-status-change');

		Route::get('/order-shipping-info', 'User\OrderController@shippingInfo')->name('user-order-shipping-info');
		Route::get('/order-cancel', 'User\OrderController@orderCancel')->name('user-order-cancel');


		Route::get('/order-details/{id}', 'User\OrderController@orderDetails')->name('user-order-details');

		//user card
		Route::group(['prefix' => 'cards'], function () {
	        Route::get('/list', 'User\CardController@index')->name('user-cards-list');
	        Route::get('/list-data', 'User\CardController@data')->name('user-cards-list-data');
	        Route::get('/add', 'User\CardController@add')->name('user-cards-add');
	        Route::post('/add', 'User\CardController@addAction')->name('user-cards-add-action');
	        Route::get('/edit/{id}', 'User\CardController@edit')->name('user-cards-edit');
	        Route::post('/edit/{id}', 'User\CardController@editAction')->name('user-cards-edit-action');
	        Route::get('/delete/{id}', 'User\CardController@delete')->name('user-cards-delete');
	        Route::get('/status-change/{id}/{status}', 'User\CardController@statusChange')->name('user-cards-status-change');
	    });


		Route::get('/social', 'User\ProfileController@social')->name('user-social');

		Route::get('/video', 'User\VideoController@index')->name('user-video');
		Route::get('/video-watch/{id}', 'User\VideoController@videoWatch')->name('user-video-watch');

		Route::get('/logout', 'User\AuthController@logout')->name('user-logout');
	});
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/11', function(){
	return view('user.11');
});
Route::get('/200-1', function(){
	return view('user.200(1)');
});
Route::get('/200-2', function(){
	return view('user.200(2)');
});
Route::get('/200-3', function(){
	return view('user.200(3)');
});
Route::get('/301', function(){
	return view('user.301');
});
Route::get('/201', function(){
	return view('user.201');
});
Route::get('/202', function(){
	return view('user.202');
});
Route::get('/202-2', function(){
	return view('user.202-2');
});
Route::get('/204', function(){
	return view('user.204');
});
Route::get('/205', function(){
	return view('user.205');
});
Route::get('/206', function(){
	return view('user.206');
});
Route::get('/302', function(){
	return view('user.302');
});
Route::get('/303', function(){
	return view('user.303');
});
Route::get('/304', function(){
	return view('user.304');
});
Route::get('/305', function(){
	return view('user.305');
});
Route::get('/306', function(){
	return view('user.306');
});
Route::get('/307', function(){
	return view('user.307');
});
Route::get('/140', function(){
	return view('user.140');
});
Route::get('/162', function(){
	return view('user.162');
});
Route::get('/101.2', function(){
	return view('user.101(2)');
})->name('101.2');
