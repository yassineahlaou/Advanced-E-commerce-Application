<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\SubCategoriesController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Models\User;

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



Route::middleware('admin:admin')->group(function(){
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');

});
Route::middleware('auth:admin')->group(function(){
Route::middleware([
    'auth:sanctum,admin', 
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');//adding middleware prevent users from accessing the admin dashboard
});


Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('admin/update/password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('admin.update.password');
});
//User




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('dashboard', compact('userData'));
    })->name('dashboard');
});

Route::get('/', [IndexController::class, 'index']);


Route::get('user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

Route::get('user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('user/change/password', [IndexController::class, 'UserChangePassword'])->name('user.change.password');
Route::post('user/update/password', [IndexController::class, 'UserUpdatePassword'])->name('user.update.password');



//prefix means all routs in the group will have the same start , i mean 127.0.0.1:8000/brand/...

Route::middleware('auth:admin')->group(function(){
Route::prefix('brand')->group(function(){
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brands');
    Route::post('/add', [BrandController::class, 'BrandAdd'])->name('brand.add');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/store/{id}', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');


});

Route::prefix('categories')->group(function(){
    Route::get('/allCategories', [CategoriesController::class, 'CategoryView'])->name('all.Categories');
    Route::post('/add', [CategoriesController::class, 'CategoryAdd'])->name('category.add');
    Route::get('/edit/{id}', [CategoriesController::class, 'CategorydEdit'])->name('category.edit');
    Route::post('/store/{id}', [CategoriesController::class, 'CategoryStore'])->name('category.store');
    Route::get('/delete/{id}', [CategoriesController::class, 'CategoryDelete'])->name('category.delete');
    /*--------------SubCategories*/
    Route::get('/SubCategories', [SubCategoriesController::class, 'SubCategoryView'])->name('all.SubCategories');
    Route::post('/addSub', [SubCategoriesController::class, 'SubCategoryAdd'])->name('sub_category.add');
    Route::get('/editSub/{id}', [SubCategoriesController::class, 'SubCategorydEdit'])->name('sub_category.edit');
    Route::post('/storeSub/{id}', [SubCategoriesController::class, 'SubCategoryStore'])->name('sub_category.store');
    Route::get('/deleteSub/{id}', [SubCategoriesController::class, 'SubCategoryDelete'])->name('sub_category.delete');
    /*-------SubSubCategories ---------*/
    Route::get('/SubSubCategories', [SubCategoriesController::class, 'SubSubCategoryView'])->name('all.SubSubCategories');
    Route::get('/subcategory/ajax/{category_id}', [SubCategoriesController::class, 'GetSubCategoryAdd']);
    Route::post('/addSubSub', [SubCategoriesController::class, 'SubSubCategoryAdd'])->name('subsub_category.add');
    Route::get('/editSubSub/{id}', [SubCategoriesController::class, 'SubSubCategorydEdit'])->name('subsub_category.edit');
    Route::post('/storeSubSub/{id}', [SubCategoriesController::class, 'SubSubCategoryStore'])->name('subsub_category.store');
    Route::get('/deleteSubSub/{id}', [SubCategoriesController::class, 'SubSubCategoryDelete'])->name('subsub_category.delete');
    




});

//products routes

Route::prefix('products')->group(function(){
    Route::get('/addproduct', [ProductsController::class, 'AddProduct'])->name('add.product');
    Route::get('/subcategory/ajax/{category_id}', [ProductsController::class, 'GetSubCategoryAdd']);
    Route::get('/subsubcategory/ajax/{sub_category_id}', [ProductsController::class, 'GetSubSubCategoryAdd']);
    Route::post('/storeproduct', [ProductsController::class, 'StoreProduct'])->name('product.store');
    Route::get('/manageproduct', [ProductsController::class, 'ManageProduct'])->name('manage.product');
    Route::get('/editproduct/{id}', [ProductsController::class, 'EditProduct'])->name('product.edit');
    Route::post('/updateproduct/{id}', [ProductsController::class, 'UpdateProduct'])->name('product.update');
    Route::post('/addmulimage/{idproduct}', [ProductsController::class, 'AddMulImage'])->name('mulimage.add');
    Route::post('/updatemulimage', [ProductsController::class, 'UpdateMulImage'])->name('mulimage.update');
    Route::get('/deleteemulimage/{id}', [ProductsController::class, 'DeleteMulImage'])->name('mulimage.delete');
    Route::get('/deleteproduct/{id}', [ProductsController::class, 'DeleteProduct'])->name('product.delete');
    Route::get('/statusdown/{idproduct}', [ProductsController::class, 'StatusDown'])->name('status.down');
    Route::get('/statusup/{idproduct}', [ProductsController::class, 'StatusUp'])->name('status.up');
   
    




});

//slider routes
Route::prefix('slider')->group(function(){
    Route::get('/view', [SliderController::class, 'SliderView'])->name('slider.content');
    Route::post('/add', [SliderController::class, 'SliderAdd'])->name('slider.add');
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/store/{id}', [SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('/sliderdown/{id}', [SliderController::class, 'SliderDown'])->name('slider.down');
    Route::get('/sliderup/{id}', [SliderController::class, 'SliderUp'])->name('slider.up');


});

//coupons routes
Route::prefix('coupons')->group(function(){
    Route::get('/view', [CouponController::class, 'ViewCoupons'])->name('manage.coupon');
    Route::post('/add', [CouponController::class, 'CouponAdd'])->name('coupon.add');
    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::post('/store/{id}', [CouponController::class, 'CouponStore'])->name('coupon.store');
    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
    Route::get('/coupondown/{id}', [CouponController::class, 'CouponDown'])->name('coupon.down');
    Route::get('/couponup/{id}', [CouponController::class, 'CouponUp'])->name('coupon.up');
    
    


});

//shipping routes
Route::prefix('shipping')->group(function(){
    //divisions
    Route::get('/viewDivisions', [ShippingController::class, 'ManageDivision'])->name('manage.division');
    Route::post('/addDivisions', [ShippingController::class, 'DivisionAdd'])->name('division.add');
    Route::get('/editDivision/{id}', [ShippingController::class, 'DivisionEdit'])->name('division.edit');
    Route::post('/storeDivision/{id}', [ShippingController::class, 'DivisionStore'])->name('division.store');
    Route::get('/deleteDivision/{id}', [ShippingController::class, 'DivisionDelete'])->name('division.delete');
    Route::get('/viewDivisions', [ShippingController::class, 'ManageDivision'])->name('manage.division');
    //districts
    Route::get('/viewDistricts', [ShippingController::class, 'ManageDistrict'])->name('manage.district');
    Route::post('/addDistricts', [ShippingController::class, 'DistrictAdd'])->name('district.add');
    Route::get('/editDistrict/{id}', [ShippingController::class, 'DistrictEdit'])->name('district.edit');
    Route::post('/storeDistrict/{id}', [ShippingController::class, 'DistrictStore'])->name('district.store');
    Route::get('/deleteDistrict/{id}', [ShippingController::class, 'DistrictDelete'])->name('district.delete');
    //states

    Route::get('/viewStates', [ShippingController::class, 'ManageState'])->name('manage.state');
    Route::get('/district/ajax/{division_id}', [ShippingController::class, 'GetDistrictAdd']);
    Route::post('/addStates', [ShippingController::class, 'StateAdd'])->name('state.add');
    Route::get('/editState/{id}', [ShippingController::class, 'StateEdit'])->name('state.edit');
    Route::post('/storeState/{id}', [ShippingController::class, 'StateStore'])->name('state.store');
    Route::get('/deleteState/{id}', [ShippingController::class, 'StateDelete'])->name('state.delete');

    
    


});

});

//multi language

Route::get('/language/english', [LanguageController::class, 'LanEnglish'])->name('language.english');

Route::get('/language/frensh', [LanguageController::class, 'LanFrensh'])->name('language.frensh');

//frontend product details

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'GetProductDetails']);
Route::get('/products/tag/{tag}', [IndexController::class, 'GetProductsTag']);
Route::get('/products/subcategory/{id}/{slug}', [IndexController::class, 'GetSubCategoryProducts']);
Route::get('/products/subsubcategory/{id}/{slug}', [IndexController::class, 'GetSubSubCategoryProducts']);

//dispalay product view with modal

Route::get('/product/view/modal/{id}', [IndexController::class, 'GetProductViewAjax']);

//stor data in cart

Route::post('/cart/data/store/{id}', [CartController::class, 'StoreInCart']);
Route::get('/product/mini/cart', [CartController::class, 'MiniCart']);
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveFromCart']);

//add to wishlist

Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishList']);
Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){
        Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist'); // just the page without info
        Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']); //wishlist load info
        Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveFromWishList']); //remove with ajax
        Route::get('/cart', [CartPageController::class, 'ViewCart'])->name('cart');
       
        Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']); //card load info

        Route::get('/cart-remove/{id}', [CartPageController::class, 'RemoveFromCart']); //remove with ajax

        Route::get('/quantity-decrement/{rowId}', [CartPageController::class, 'quantityDecrement']); //decrease with ajax
        Route::get('/quantity-increment/{rowId}', [CartPageController::class, 'quantityIncrement']); //increase with ajax
        Route::post('/coupon-apply/{coupon_name}', [CartPageController::class, 'CouponApply']);
        Route::get('/coupon-calculation', [CartPageController::class, 'CouponCalculation']);
        Route::get('/remove-coupon', [CartPageController::class, 'RemoveCoupon']);
        Route::get('/checkout', [CartPageController::class, 'ViewCheckout'])->name('checkout');

        Route::get('/district/ajax/{division_id}', [CheckoutController::class, 'GetDistrictUser']);
        Route::get('/state/ajax/{district_id}', [CheckoutController::class, 'GetStatetUser']);
        Route::post('/checkout/process', [CheckoutController::class, 'CheckoutProcess'])->name('checkout.store');
});

