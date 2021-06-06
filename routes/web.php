<?php

use App\User;
use Illuminate\Support\Facades\Route;

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

//new laravel project

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::get('/verify','Auth\RegisterController@verifyUser')->name('verify.user');


//admin route
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/','Admin\AdminController@index')->name('admin.index');
    Route::get('/profile/index','Admin\ProfileController@index')->name('admin.profile.index');
    Route::get('/profile/edit','Admin\ProfileController@edit')->name('admin.profile.edit');
    Route::post('/profile/update','Admin\ProfileController@update')->name('admin.porfile-update');
});




//supplier route
Route::prefix('supplier')->middleware('supplier')->group(function(){
    //all Supplier route will gose here
    Route::get('/','Supplier\SupplierController@index')->name('supplier.index');

//    Propose Product
    Route::get('/propose/product','Supplier\ProductController@propose_product')->name('propose.product');
    Route::get('/propose/product/accepted/{id}','Supplier\ProductController@propose_accept')->name('propose.product.accept');
    Route::get('/propose/product/reject/{id}','Supplier\ProductController@propose_reject')->name('propose.product.reject');
    Route::post('/propose/product/propose/{id}','Supplier\ProductController@propose_update')->name('supplier.udpate.propose.prodcut');
    Route::get('/propose/product/reject/{id}','Supplier\ProductController@propose_reject')->name('propose.product.reject');
    //    Supplier Buyer Route
    Route::get('/buyer/index','Supplier\BuyerController@index')->name('supplier.buyer.index');
    Route::get('/buyer/create','Supplier\BuyerController@create')->name('supplier.buyer.create');
    Route::post('/buyer/store','Supplier\BuyerController@store')->name('supplier.buyer.store');
    Route::get('/buyer/delete/{id}','Supplier\BuyerController@delete')->name('supplier.buyer.delete');
    Route::get('/buyer/edit/{id}','Supplier\BuyerController@edit')->name('supplier.buyer.edit');
    Route::get('/buyer/profile/{id}','Supplier\BuyerController@profile')->name('supplier.buyer.profile');
    Route::post('/buyer/update/{id}','Supplier\BuyerController@update')->name('supplier.buyer.update');

    // unite route
    Route::get('/unit/index','Supplier\UnitController@index')->name('unit.index');
    Route::post('/unit/store','Supplier\UnitController@store')->name('supplier.unit.store');
    Route::get('/unit/delete/{id}','Supplier\UnitController@delete')->name('supplier.unit.delete');
    Route::post('/unit/update/{id}','Supplier\UnitController@update')->name('supplier.unit.update');
// Supplier Profile

    Route::get('/profile/index','Supplier\ProfileController@index')->name('supplier.profile.index');
    Route::get('/profile/edit/{id}','Supplier\ProfileController@edit')->name('supplier.profile.edit');
    Route::post('/profile/update','Supplier\ProfileController@update')->name('supplier.porfile-update');

    //products route
    Route::resource('/products','Supplier\ProductController');
    Route::get('/product/delete/{id}','Supplier\ProductController@delete')->name('product.delete');

    //support user
    Route::resource('/users', 'Supplier\UserController');

    //Supplier seller route

    Route::get('/seller/index','Supplier\SellerController@index')->name('supplier.seller.index');
    Route::get('/seller/create','Supplier\SellerController@create')->name('supplier.seller.create');
    Route::post('/seller/store','Supplier\SellerController@store')->name('supplier.seller.store');
    Route::get('/seller/delete/{id}','Supplier\SellerController@delete')->name('supplier.seller.delete');
    Route::get('/seller/edit/{id}','Supplier\SellerController@edit')->name('supplier.seller.edit');
    Route::post('/seller/update/{id}','Supplier\SellerController@update')->name('supplier.seller.update');
    Route::get('/seller/profile/{id}','Supplier\SellerController@profile')->name('supplier.seller.profile');



    //order
    Route::get('/orders','Supplier\OrderController@index')->name('order.index');
    Route::get('/order/show/{id}','Supplier\OrderController@show')->name('order.show');
    Route::put('/order/status/{id}','Supplier\OrderController@status')->name('supplier.order.status');
    Route::get('/order/invoice/{id}','Supplier\OrderController@invoice')->name('order.invoice');
    Route::get('/order/index/pdf','Supplier\OrderController@generatePdf')->name('order.index.pdf');

    //order search
    // Route::get('/order/filter','FilterController@filter')->name('order.filter');

    //order change price
    Route::put('/order/product/update/{id}','Supplier\OrderController@orderProductUpdate')->name('order.product.update');



    //purchase
    Route::resource('/purchases','Supplier\PurchaseController');
    Route::get('/purchase/invoice/{id}','Supplier\PurchaseController@invoice')->name('purchase.invoice');



    Route::get('/supplier-markread',function(){
        $user = User::find(auth()->user()->id);
        $user->notifications()->delete();
        return redirect()->back();
    })->name('supplier.markread');


});


//buyer route
Route::prefix('buyer')->middleware('buyer')->group(function(){
    //all Buyer route will gose here
    Route::get('/','Buyer\BuyerController@index')->name('buyer.index');

//    Profile ROute
     Route::get('/profile/index','Buyer\ProfileController@index')->name('buyer.profile.index');
     Route::get('/profile/edit','Buyer\ProfileController@edit')->name('profile.edit');
     Route::post('/profile/update/{id}','Buyer\ProfileController@update')->name('buyer.profile.update');
     Route::get('/profile/user_edit','Buyer\ProfileController@user_edit')->name('buyer.user.update');
     Route::post('/profile/user_update','Buyer\ProfileController@user_update')->name('buyer.user.porfile-update');



    //order
    Route::resource('/orders', 'Buyer\OrderController');
    Route::put('/order/received/{id}', 'Buyer\OrderController@received')->name('orders.received');

    Route::post('/order/payment','Buyer\BillingController@store')->name('buyer.order.payment');

    //buyer user
    Route::resource('/buyer-users', 'Buyer\UserController');
    Route::post('/user/update/{id}','Buyer\UserController@update_user')->name('buyer.users.update');

    //support route
     Route::get('/support/index','Buyer\SupportController@index')->name('supports.index');
     Route::post('/support/send-message','Buyer\SupportController@sendMessage')->name('support.send-message');


     Route::get('/markread',function(){
        // auth()->user()->unreadNotifications->markAsRead();
        $user = User::find(auth()->user()->id);
        $user->notifications()->delete();
        return redirect()->back();
    })->name('markread');

});

//seller route
Route::prefix('seller')->middleware('seller')->group(function(){
    Route::get('/','Seller\SellerController@index')->name('seller.index');



// Seller Product
    Route::get('/product/index','Seller\ProductController@index')->name('seller.product.index');
    Route::post('/product/create','Seller\ProductController@create')->name('seller.product.create');
    Route::get('/propose/product','Seller\ProductController@propose_product')->name('seller.propose.product');
    Route::get('/propose/product/delete/{id}','Seller\ProductController@pproduct_delete')->name('propose.product.delete');
    Route::get('/propose/product/edit/{id}','Seller\ProductController@pproduct_edit')->name('propose.product.edit');
    Route::post('propose/product/udpate/{id}','Seller\ProductController@update')->name('udpate.propose.prodcut');
    Route::get('/propose/product/accepted/{id}','Seller\ProductController@propose_accept')->name('seller.propose.product.accept');
    Route::get('/propose/product/reject/{id}','Seller\ProductController@propose_reject')->name('seller.propose.product.reject');
    Route::post('/propose/product/propose/{id}','Seller\ProductController@propose_update')->name('seller.udpate.propose.prodcut');

    //all Seller route will gose here


    //profile route
    Route::get('/profile/index','Seller\ProfileController@index')->name('seller.profile.index');
    Route::get('/profile/edit','Seller\ProfileController@edit')->name('seller.profile.edit');
    Route::post('/profile/update/{id}','Seller\ProfileController@update')->name('seller.porfile-update');


    //support route
     Route::get('/support/index','Seller\SupportController@index')->name('support.index');
     Route::post('/support/contact','Seller\SupportController@sendMessage')->name('contact.submit');
    //seller purchase
    Route::get('/sales','Seller\PurchaseController@index')->name('seller-purchase.index');
    Route::get('/sales/show/{id}','Seller\PurchaseController@show')->name('seller.purchase.show');


     Route::get('/markasread',function(){
        $user = User::find(auth()->user()->id);
        $user->notifications()->delete();
        return redirect()->back();
     })->name('seller.markasread');
});





