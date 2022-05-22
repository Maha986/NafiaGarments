<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Account\AssetController;
use App\Http\Controllers\Account\EquityController;
use App\Http\Controllers\Account\ExpenseController;
use App\Http\Controllers\Account\IncomeController;
use App\Http\Controllers\Account\LiabilityController;
use App\Http\Controllers\Account\VoucherController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AddressPhoneEmailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CatalogueProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColourController;
use App\Http\Controllers\ColourImageProductSizeController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\CountryStateCityController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\DeliveryChargesController;
use App\Http\Controllers\ForgotpasswordController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\GeneralDiscountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeSettingController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductForOwnerController;
use App\Http\Controllers\ProductForSaleCenterController;
use App\Http\Controllers\ProductResellerController;
use App\Http\Controllers\PurchasereturnController;
use App\Http\Controllers\ResellerCartController;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewReplyController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\RiderOrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleCenterController;
use App\Http\Controllers\SaleCenterOrderController;
use App\Http\Controllers\SalereturnController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCustomerController;
use App\Http\Controllers\UserResellerController;
use App\Http\Controllers\UserRiderController;
use App\Http\Controllers\UserSaleCenterController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();



// Route::post('/single/{product}/product',[App\Http\Controllers\FrontEndController::class, 'single_product'])->name('single_product');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','checkStatus']], function (){

    Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/reseller',[App\Http\Controllers\UserResellerController::class, 'index'])->name('reseller.dashboard')->middleware('role:reseller');
    Route::get('/salecenter',[App\Http\Controllers\UserSaleCenterController::class, 'index'])->name('salecenter.dashboard')->middleware('role:salecenter');
    Route::get('/rider',[App\Http\Controllers\UserRiderController::class, 'index'])->name('rider.dashboard')->middleware('role:rider');
    Route::get('/customer',[App\Http\Controllers\UserCustomerController::class, 'index'])->name('customer.dashboard')->middleware('role:customer');

    Route::get('/owner',[App\Http\Controllers\ProductForOwnerController::class, 'index1'])->name('owner.dashboard')->middleware('role:owner');

Route::get('/owner/inventory_reportt',[App\Http\Controllers\ProductForOwnerController::class, 'inventory_report'])->name('inventoryreport_owner');

Route::get('/owner/order_report',[App\Http\Controllers\ProductForOwnerController::class, 'order_report'])->name('orderreport_owner');

Route::post('/owner/order_report/two-dates',[App\Http\Controllers\ProductForOwnerController::class, 'order_Report_twodates'])->name('tofrom_orderreport_owner');

Route::post('/owner/inventory_report/two-dates',[App\Http\Controllers\ProductForOwnerController::class, 'inventory_Report_twodates'])->name('tofrom_inventoryreport_owner');




    //product details of owner route
    Route::get('/productdetails/',[App\Http\Controllers\ProductForOwnerController::class, 'productdetails']);

    
   
    //end route

    Route::get('/admin/user',[App\Http\Controllers\UserController::class, 'index'])->name('user.index')->middleware('permission:show users');
    Route::get('/admin/user/create',[App\Http\Controllers\UserController::class, 'create'])->name('user.create')->middleware('permission:create users');
    Route::post('/admin/user/store',[App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/admin/user/{user}/edit',[\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit')->middleware('permission:edit users');
    Route::put('/admin/user/{user}/update',[\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::delete('/admin/user/{user}/delete',[\App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy')->middleware('permission:delete users');
    Route::put('/admin/user/{user}/status',[\App\Http\Controllers\UserController::class, 'status'])->name('user.status')->middleware('permission:users status');

//admin roles
    Route::get('/admin/role',[App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
    // ->middleware('permission:show roles')
    Route::get('/admin/role/create',[App\Http\Controllers\RoleController::class, 'create'])->name('role.create');
    // ->middleware('permission:create roles')
    Route::post('/admin/role/store',[App\Http\Controllers\RoleController::class, 'store'])->name('role.store');
    Route::get('/admin/role/{role}/edit',[\App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
    // ->middleware('permission:edit roles')
    Route::put('/admin/role/{role}/update',[\App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
    Route::delete('/admin/role/{role}/delete',[\App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy')->middleware('permission:delete roles');

//admin category
    Route::get('/admin/category',[App\Http\Controllers\CategoryController::class, 'index'])->name('category.index')->middleware('permission:show categories');
    Route::get('/admin/category/create',[App\Http\Controllers\CategoryController::class, 'create'])->name('category.create')->middleware('permission:create categories');
    Route::post('/admin/category/store',[App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/category/{category}/edit',[App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit')->middleware('permission:edit categories');
    Route::put('/admin/category/{category}/update',[App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::delete('/admin/category/{category}/delete',[App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy')->middleware('permission:delete categories');



//admin colours
    Route::get('/admin/colour',[App\Http\Controllers\ColourController::class, 'index'])->name('colour.index')->middleware('permission:show colours');
    Route::get('/admin/colour/create',[App\Http\Controllers\ColourController::class, 'create'])->name('colour.create')->middleware('permission:create colours');
    Route::post('/admin/colour/store',[App\Http\Controllers\ColourController::class, 'store'])->name('colour.store');
    Route::get('/admin/colour/{colour}/edit',[App\Http\Controllers\ColourController::class, 'edit'])->name('colour.edit')->middleware('permission:edit colours');
    Route::put('/admin/colour/{colour}/update',[App\Http\Controllers\ColourController::class, 'update'])->name('colour.update');
    Route::delete('/admin/colour/{colour}/delete',[App\Http\Controllers\ColourController::class, 'destroy'])->name('colour.destroy')->middleware('permission:delete colours');

//admin sizes
    Route::get('/admin/size',[App\Http\Controllers\SizeController::class, 'index'])->name('size.index')->middleware('permission:show sizes');
    Route::get('/admin/size/create',[App\Http\Controllers\SizeController::class, 'create'])->name('size.create')->middleware('permission:create sizes');
    Route::post('/admin/size/store',[App\Http\Controllers\SizeController::class, 'store'])->name('size.store');
    Route::get('/admin/size/{size}/edit',[App\Http\Controllers\SizeController::class, 'edit'])->name('size.edit')->middleware('permission:edit sizes');
    Route::put('/admin/size/{size}/update',[App\Http\Controllers\SizeController::class, 'update'])->name('size.update');
    Route::delete('/admin/size/{size}/delete',[App\Http\Controllers\SizeController::class, 'destroy'])->name('size.destroy')->middleware('delete sizes');

//admin batches
    Route::get('/admin/batch',[App\Http\Controllers\BatchController::class, 'index'])->name('batch.index')->middleware('permission:show batches');
    Route::get('/admin/batch/create',[App\Http\Controllers\BatchController::class, 'create'])->name('batch.create')->middleware('permission:create batches');
    Route::post('/admin/batch/store',[App\Http\Controllers\BatchController::class, 'store'])->name('batch.store');
    Route::get('/admin/batch/{batch}/edit',[App\Http\Controllers\BatchController::class, 'edit'])->name('batch.edit')->middleware('permission:edit batches');
    Route::put('/admin/batch/{batch}/update',[App\Http\Controllers\BatchController::class, 'update'])->name('batch.update');
    Route::delete('/admin/batch/{batch}/delete',[App\Http\Controllers\BatchController::class, 'destroy'])->name('batch.destroy')->middleware('permission:delete batches');
    Route::get('/admin/batch/{batch}/show',[App\Http\Controllers\BatchController::class, 'show'])->name('batch.show')->middleware('permission:view batches');

//admin Product

    Route::get('/admin/product',[App\Http\Controllers\ProductController::class, 'index'])->name('product.index')->middleware('permission:show products');

    Route::get('/admin/product/create',[App\Http\Controllers\ProductController::class, 'create'])->name('product.create')->middleware('permission:create products');

     Route::get('/admin/product/pdf',[App\Http\Controllers\ProductController::class, 'index_pdf'])->name('productindex_pdf');

   Route::post('/admin/product/dates',[App\Http\Controllers\ProductController::class, 'index_date'])->name('productdatewise');


// if user select one field in product table 
 Route::get('/admin/product/pdf/{pro1}/',[App\Http\Controllers\ProductController::class, 'index_pdf1'])->name('productindex_pdf1');
 // if user select two field in product table 
 Route::get('/admin/product/pdf2/{pro1}/{pro2}',[App\Http\Controllers\ProductController::class, 'index_pdf2'])->name('productindex_pdf2');
 // if user select three field in product table 
 Route::get('/admin/product/pdf3/{pro1}/{pro2}/{pro3}',[App\Http\Controllers\ProductController::class, 'index_pdf3'])->name('productindex_pdf3');
  // if user select four field in product table 
 Route::get('/admin/product/pdf4/{pro1}/{pro2}/{pro3}/{pro4}',[App\Http\Controllers\ProductController::class, 'index_pdf4'])->name('productindex_pdf4');
 // if user select five field in product table 
 Route::get('/admin/product/pdf5/{pro1}/{pro2}/{pro3}/{pro4}/{pro5}',[App\Http\Controllers\ProductController::class, 'index_pdf5'])->name('productindex_pdf5');
  Route::get('/admin/product/pdf6/{pro1}/{pro2}/{pro3}/{pro4}/{pro5}/{pro6}',[App\Http\Controllers\ProductController::class, 'index_pdf6'])->name('productindex_pdf6');



    Route::post('/admin/product/store',[App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/admin/product/{product}/edit',[App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit')->middleware('permission:edit products');
    Route::put('/admin/product/{product}/update',[App\Http\Controllers\ProductController::class, 'update'])->name('product.update');


    Route::delete('/admin/product/{product}/delete',[App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy')->middleware('permission:delete products');



Route::get('/admin/view/product/{id}',[App\Http\Controllers\ProductController::class, 'view_product_details'])->name('viewproduct');




    Route::put('/admin/product/{product}/status',[App\Http\Controllers\ProductController::class, 'status'])->name('product.status')->middleware('permission:Products status');

// admin product assign to sale center

    Route::get('/admin/salecenter/product',[App\Http\Controllers\ProductForSaleCenterController::class, 'index'])->name('product_salecenter.index');


 Route::get('/admin/salecenter/product/create',[App\Http\Controllers\ProductForSaleCenterController::class, 'create'])->name('salecenterproductcreate');

    Route::post('/admin/salecenter/product/store',[App\Http\Controllers\ProductForSaleCenterController::class, 'store2'])->name('productsalecenter_store');



 Route::post('/admin/salecenter/product/dates',[App\Http\Controllers\ProductForSaleCenterController::class, 'index_date'])->name('productsalecenterdatewise');


    // edit productsalecenter
    
    Route::get('/admin/salecenter/product/edit/{id}',[App\Http\Controllers\ProductForSaleCenterController::class, 'productsalecenter_edit_view'])->name('productsalecenteredit');

     Route::post('/admin/salecenter/product/update',[App\Http\Controllers\ProductForSaleCenterController::class, 'productsalecenter_edit_post'])->name('productsalecenter_store_edit');
     // delete

Route::get('/admin/salecenter/product/delete/{id}',[App\Http\Controllers\ProductForSaleCenterController::class, 'productsalecenter_delete'])->name('productsalecenterdelete');






// admin product assign to owners

    Route::post('/admin/salecenter/datesss',[App\Http\Controllers\SaleCenterController::class, 'index_dates'])->name('sc_datewise');



    Route::get('/admin/owner/product',[App\Http\Controllers\ProductForOwnerController::class, 'index'])->name('product_owner.index');
    Route::post('/admin/owner/product/store',[App\Http\Controllers\ProductForOwnerController::class, 'store'])->name('product_owner.store');

    Route::get('/admin/owner/product/assign',[App\Http\Controllers\ProductForOwnerController::class, 'assign'])->name('owner.assign');

    // productowneredit
     Route::get('/admin/owner/product/edit/{id}',[App\Http\Controllers\ProductForOwnerController::class, 'productowneredit_view'])->name('productownersedit');
     Route::post('/admin/owner/product/edit/',[App\Http\Controllers\ProductForOwnerController::class, 'productowneredit_post'])->name('productownersedit_post');

      Route::get('/admin/owner/product/delete/{id}',[App\Http\Controllers\ProductForOwnerController::class, 'productowner_delete'])->name('productownersdelete');



    Route::post('/productassign',[App\Http\Controllers\ProductForOwnerController::class, 'assign_products']);


//admin ColourImageProductSize
    Route::delete('/admin/colourimageproductsize/{id}/delete',[App\Http\Controllers\ColourImageProductSizeController::class, 'destroy'])->name('colourimageproductsize.destroy');

//admin SaleCenter

    Route::get('/admin/salecenter',[App\Http\Controllers\SaleCenterController::class, 'index'])->name('saleCenter.index')->middleware('permission:show sale centers');





      Route::get('/admin/salecenter/pdf',[App\Http\Controllers\SaleCenterController::class, 'index_pdf'])->name('salecenterindex_pdf')->middleware('permission:show sale centers');

       



      // Route::get('/admin/salecenter/pdf1',[App\Http\Controllers\SaleCenterController::class, 'index_pdf1'])->name('salecenterindex_pdf1')->middleware('permission:show sale centers');





    Route::get('/admin/salecenter/create',[App\Http\Controllers\SaleCenterController::class, 'create'])->name('saleCenter.create')->middleware('permission:create sale centers');
    Route::post('/admin/salecenter/store',[App\Http\Controllers\SaleCenterController::class, 'store'])->name('saleCenter.store');
    Route::get('/admin/salecenter/{salecenter}/edit',[App\Http\Controllers\SaleCenterController::class, 'edit'])->name('salecenter.edit')->middleware('permission:edit sale centers');
    Route::put('/admin/salecenter/{salecenter}/update',[App\Http\Controllers\SaleCenterController::class, 'update'])->name('salecenter.update');
    Route::delete('/admin/salecenter/{salecenter}/delete',[App\Http\Controllers\SaleCenterController::class, 'destroy'])->name('salecenter.destroy')->middleware('permission:delete sale centers');

//admin Rider



 Route::post('/admin/rider/datess',[App\Http\Controllers\RiderController::class, 'index_date'])->name('rider_datewise');

    Route::get('/admin/rider',[App\Http\Controllers\RiderController::class, 'index'])->name('rider.index')->middleware('permission:show riders');

    Route::get('/admin/rider/pdf',[App\Http\Controllers\RiderController::class, 'index_pdf'])->name('riderindex_pdf')->middleware('permission:show riders');
//select 1 field of rider table 
      Route::get('/admin/rider/pdf1/{pro1}',[App\Http\Controllers\RiderController::class, 'index_pdf1'])->name('riderindex_pdf1')->middleware('permission:show riders');
//select 2 field of rider table 
      Route::get('/admin/rider/pdf2/{pro1}/{pro2}',[App\Http\Controllers\RiderController::class, 'index_pdf2'])->name('riderindex_pdf2')->middleware('permission:show riders');
 //select 3 field of rider table 
      Route::get('/admin/rider/pdf3/{pro1}/{pro2}/{pro3}',[App\Http\Controllers\RiderController::class, 'index_pdf3'])->name('riderindex_pdf3')->middleware('permission:show riders');
 //select 4 field of rider table 
      Route::get('/admin/rider/pdf4/{pro1}/{pro2}/{pro3}/{pro4}',[App\Http\Controllers\RiderController::class, 'index_pdf4'])->name('riderindex_pdf4')->middleware('permission:show riders');
 //select 5 field of rider table 
      Route::get('/admin/rider/pdf5/{pro1}/{pro2}/{pro3}/{pro4}/{pro5}',[App\Http\Controllers\RiderController::class, 'index_pdf5'])->name('riderindex_pdf5')->middleware('permission:show riders');
 //select 6 field of rider table 
      Route::get('/admin/rider/pdf6/{pro1}/{pro2}/{pro3}/{pro4}/{pro5}/{pro6}',[App\Http\Controllers\RiderController::class, 'index_pdf6'])->name('riderindex_pdf6')->middleware('permission:show riders');


    Route::get('/admin/rider/create',[App\Http\Controllers\RiderController::class, 'create'])->name('rider.create')->middleware('permission:create riders');
    Route::post('/admin/rider/store',[App\Http\Controllers\RiderController::class, 'store'])->name('rider.store');
    Route::get('/admin/rider/{rider}/edit',[App\Http\Controllers\RiderController::class, 'edit'])->name('rider.edit')->middleware('permission:edit riders');
    Route::put('/admin/rider/{rider}/update',[App\Http\Controllers\RiderController::class, 'update'])->name('rider.update');
    Route::delete('/admin/rider/{rider}/delete',[App\Http\Controllers\RiderController::class, 'destroy'])->name('rider.destroy')->middleware('permission:delete riders');


//admin Rider Order Detail

    Route::get('/admin/riderorderdetail',[App\Http\Controllers\RiderOrderController::class, 'riderorder_detail'])->name('riderorderdetail');

Route::post('/admin/riderrdetails',[App\Http\Controllers\RiderOrderController::class, 'selectrider_work'])->name('selectrider');


Route::get('/admin/riderpickups/{id}',[App\Http\Controllers\RiderOrderController::class, 'rider_pickups'])->name('riderpickups');

Route::get('/admin/riderdeliveryy/{id}',[App\Http\Controllers\RiderOrderController::class, 'rider_delivery'])->name('riderdeliveryy');

Route::get('/admin/rider/wallet/{id}',[App\Http\Controllers\RiderOrderController::class, 'rider_wallet'])->name('riderwallet');

Route::get('/admin/editriderpickups/{id}',[App\Http\Controllers\RiderOrderController::class, 'edit_rider_pickups'])->name('editriderpickups');

Route::get('/admin/editriderdelivery/{id}',[App\Http\Controllers\RiderOrderController::class, 'edit_rider_delivery'])->name('editriderdeliveryy');

Route::post('/admin/editriderpickups/store',[App\Http\Controllers\RiderOrderController::class, 'edit_rider_pickups_post'])->name('editriderpickup_post');

Route::post('/admin/editriderdelivery/store',[App\Http\Controllers\RiderOrderController::class, 'edit_rider_delivery_post'])->name('editriderdelivery_post');


Route::get('/admin/riderwallet/update/{id}',[App\Http\Controllers\RiderOrderController::class, 'riderwalletupdate_view'])->name('riderwalletupdate');

Route::post('/admin/riderwallet/store/{id}',[App\Http\Controllers\RiderOrderController::class, 'riderwalletupdate_post'])->name('riderwalletedit_post');

// riderreport

Route::get('/admin/rider/pickupreportt',[App\Http\Controllers\ReportController::class, 'pickupreport'])->name('pickupreport_rider');
// rideraccesspanel

Route::post('/rider/pickupreport',[App\Http\Controllers\ReportController::class, 'pickup_Report_twodates'])->name('tofrom_pickupreport_rider');

    //Manual order

    Route::get('/admin/manualorder',[App\Http\Controllers\OrderController::class, 'manualorder'])->name('manualorder');
   


//admin Supplier

    Route::get('/admin/supplier',[App\Http\Controllers\SupplierController::class, 'index'])->name('supplier.index')->middleware('permission:show suppliers');

    Route::get('/admin/supplier/create',[App\Http\Controllers\SupplierController::class, 'create'])->name('supplier.create')->middleware('permission:create suppliers');

    Route::get('/admin/supplier/pdf',[App\Http\Controllers\SupplierController::class, 'index_pdf'])->name('supplierindex_pdf');

    //select 1 field on supplier 
        Route::get('/admin/supplier/pdf1/{pro1}',[App\Http\Controllers\SupplierController::class, 'index_pdf1'])->name('supplierindex_pdf1');
          //select 2 field on supplier 
        Route::get('/admin/supplier/pdf2/{pro1}/{pro2}',[App\Http\Controllers\SupplierController::class, 'index_pdf2'])->name('supplierindex_pdf2');
             //select 3 field on supplier 
        Route::get('/admin/supplier/pdf3/{pro1}/{pro2}/{pro3}',[App\Http\Controllers\SupplierController::class, 'index_pdf3'])->name('supplierindex_pdf3');
             //select 4 field on supplier 
        Route::get('/admin/supplier/pdf4/{pro1}/{pro2}/{pro3}/{pro4}',[App\Http\Controllers\SupplierController::class, 'index_pdf4'])->name('supplierindex_pdf4');
               //select 5 field on supplier 
        Route::get('/admin/supplier/pdf5/{pro1}/{pro2}/{pro3}/{pro4}/{pro5}',[App\Http\Controllers\SupplierController::class, 'index_pdf5'])->name('supplierindex_pdf5');
               //select 6 field on supplier 
        Route::get('/admin/supplier/pdf6/{pro1}/{pro2}/{pro3}/{pro4}/{pro5}/{pro6}',[App\Http\Controllers\SupplierController::class, 'index_pdf6'])->name('supplierindex_pdf6');


    Route::post('/admin/supplier/store',[App\Http\Controllers\SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/admin/supplier/{supplier}/edit',[App\Http\Controllers\SupplierController::class, 'edit'])->name('supplier.edit')->middleware('permission:edit suppliers');









    Route::put('/admin/supplier/{supplier}/update',[App\Http\Controllers\SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/admin/supplier/{supplier}/delete',[App\Http\Controllers\SupplierController::class, 'destroy'])->name('supplier.destroy')->middleware('permission:delete suppliers');





    //puchase return

    Route::get('purchasereturn',[App\Http\Controllers\purchasereturnController::class, 'select']);

    Route::post('purchase/{id}',[App\Http\Controllers\purchasereturnController::class, 'create']);

    Route::post('pur',[App\Http\Controllers\purchasereturnController::class,'storage']);


    Route::get('purchasereturnindex',[App\Http\Controllers\purchasereturnController::class, 'index']);

    Route::put('/admin/purchasereturn/{purchasereturn}/update',[App\Http\Controllers\purchasereturnController::class, 'update'])->name('purchasereturn.update');


    Route::get('/admin/purchasereturn/{purchasereturn}/edit',[App\Http\Controllers\purchasereturnController::class, 'edit'])->name('purchasereturn.edit');

    Route::delete('/admin/purchasereturn/{purchasereturn}/delete',[App\Http\Controllers\purchasereturnController::class, 'destroy'])->name('purchasereturn.destroy');



//admin home settings

// --- -o

    Route::get('/admin/logo',[App\Http\Controllers\HomeSettingController::class, 'logo_index'])->name('logo.index')->middleware('permission:show logos');
    Route::get('/admin/logo/create',[App\Http\Controllers\HomeSettingController::class, 'logo_create'])->name('logo.create')->middleware('permission:create logos');
    Route::get('/admin/logo/{logo}/edit',[App\Http\Controllers\HomeSettingController::class, 'logo_edit'])->name('logo.edit')->middleware('permission:edit logos');

// --- address phone email
    Route::get('/admin/ape',[App\Http\Controllers\HomeSettingController::class, 'ape_index'])->name('ape.index')->middleware('permission:show ape');
    Route::get('admin/ape/create',[App\Http\Controllers\HomeSettingController::class, 'ape_create'])->name('ape.create')->middleware('permission:create ape');
    Route::get('/admin/ape/{ape}/edit',[App\Http\Controllers\HomeSettingController::class, 'ape_edit'])->name('ape.edit')->middleware('permission:edit ape');

// --- slider
    Route::get('/admin/slider',[App\Http\Controllers\HomeSettingController::class, 'slider_index'])->name('slider.index')->middleware('permission:show sliders');
    Route::get('admin/slider/create',[App\Http\Controllers\HomeSettingController::class, 'slider_create'])->name('slider.create')->middleware('permission:create sliders');
    Route::get('/admin/slider/{slider}/edit',[App\Http\Controllers\HomeSettingController::class, 'slider_edit'])->name('slider.edit')->middleware('permission:edit sliders');

// --- banner
    Route::get('/admin/banner',[App\Http\Controllers\HomeSettingController::class, 'banner_index'])->name('banner.index')->middleware('permission:show banners');
    Route::get('admin/banner/create',[App\Http\Controllers\HomeSettingController::class, 'banner_create'])->name('banner.create')->middleware('permission:create banners');
    Route::get('/admin/banner/{banner}/edit',[App\Http\Controllers\HomeSettingController::class, 'banner_edit'])->name('banner.edit')->middleware('permission:edit banners');

    //menu banner
 Route::get('menubannerindex',[App\Http\Controllers\HomeSettingController::class, 'menubannerindex']);

 Route::get('menubanner',[App\Http\Controllers\HomeSettingController::class, 'menubanner']);

  Route::post('menubanner',[App\Http\Controllers\HomeSettingController::class, 'saviya']);

   Route::post('menubanneredit',[App\Http\Controllers\HomeSettingController::class,'saviyaupdate'])->name('menuedit');

 
  Route::get('editmenubanner/{id}',[App\Http\Controllers\HomeSettingController::class, 'menubanneredit']);


// --- service
    Route::get('/admin/service',[App\Http\Controllers\HomeSettingController::class, 'service_index'])->name('service.index')->middleware('permission:show services');
    Route::get('admin/service/create',[App\Http\Controllers\HomeSettingController::class, 'service_create'])->name('service.create')->middleware('permission:create services');
    Route::get('/admin/service/{service}/edit',[App\Http\Controllers\HomeSettingController::class, 'service_edit'])->name('service.edit')->middleware('permission:edit services');

// ---floor
    Route::get('/admin/floor',[App\Http\Controllers\HomeSettingController::class, 'floor_index'])->name('floor.index')->middleware('permission:show floors');
    Route::get('admin/floor/create',[App\Http\Controllers\HomeSettingController::class, 'floor_create'])->name('floor.create')->middleware('permission:create floors');
    Route::get('/admin/floor/{floor}/edit',[App\Http\Controllers\HomeSettingController::class, 'floor_edit'])->name('floor.edit')->middleware('permission:edit floors');
    Route::put('/admin/floor/{floor}/update',[App\Http\Controllers\HomeSettingController::class, 'floor_update'])->name('floor.update');
    Route::delete('/admin/floor/{floor}/delete',[App\Http\Controllers\HomeSettingController::class, 'floor_destroy'])->name('floor.destroy')->middleware('permission:delete floors');
    Route::put('/admin/floor/{floor}/status',[App\Http\Controllers\HomeSettingController::class, 'floor_status'])->name('floor.status')->middleware('permission:floors status');

// ---about
    Route::get('/admin/about',[App\Http\Controllers\AboutController::class,'index'])->name('aboutus.index');
    Route::get('admin/about/create',[App\Http\Controllers\AboutController::class,'create'])->name('aboutus.create');
    Route::post('/admin/about/store',[App\Http\Controllers\AboutController::class, 'store'])->name('aboutus.store');
    Route::get('/admin/about/{about}/edit',[App\Http\Controllers\AboutController::class,'edit'])->name('aboutus.edit');
    Route::put('/admin/about/{about}/update',[App\Http\Controllers\AboutController::class,'update'])->name('aboutus.update');
    Route::delete('/admin/about/{about}/delete',[App\Http\Controllers\AboutController::class,'destroy'])->name('aboutus.destroy');
    Route::put('/admin/about/{about}/status',[App\Http\Controllers\AboutController::class,'status'])->name('aboutus.status');

// --- general routes
    Route::post('/admin/homesetting/store',[App\Http\Controllers\HomeSettingController::class, 'store'])->name('homesetting.store');
    Route::put('/admin/homesetting/{homesetting}/update',[App\Http\Controllers\HomeSettingController::class, 'update'])->name('homesetting.update');
    Route::delete('/admin/homesetting/{homesetting}/delete',[App\Http\Controllers\HomeSettingController::class, 'destroy'])->name('homesetting.destroy')->middleware('permission:delete logos|delete ape|delete sliders|delete banners|delete services|delete floors');
    Route::put('/admin/homesetting/{homesetting}/status',[App\Http\Controllers\HomeSettingController::class, 'status'])->name('homesetting.status')->middleware('permission:logos status|ape status|sliders status|banners status|services status|floors status');

//admin courier

    Route::get('/admin/courier',[App\Http\Controllers\CourierController::class, 'index'])->name('courier.index')->middleware('permission:show couriers');
    Route::get('/admin/courier/create',[App\Http\Controllers\CourierController::class, 'create'])->name('courier.create')->middleware('permission:create couriers');
    Route::post('/admin/courier/store',[App\Http\Controllers\CourierController::class, 'store'])->name('courier.store');
    Route::get('/admin/courier/{courier}/edit',[App\Http\Controllers\CourierController::class, 'edit'])->name('courier.edit')->middleware('permission:edit couriers');
    Route::put('/admin/courier/{courier}/update',[App\Http\Controllers\CourierController::class, 'update'])->name('courier.update');
    Route::delete('/admin/courier/{courier}/delete',[App\Http\Controllers\CourierController::class, 'destroy'])->name('courier.destroy')->middleware('permission:delete couriers');

//admin Reseller

    Route::get('/admin/reseller',[App\Http\Controllers\ResellerController::class, 'index'])->name('reseller.index');

Route::get('/admin/reseller/account',[App\Http\Controllers\ResellerController::class, 'reseller_account'])->name('reselleraccount');

    Route::get('/admin/reseller/create',[App\Http\Controllers\ResellerController::class, 'create'])->name('reseller.create');

 Route::get('/admin/reseller/pdf',[App\Http\Controllers\ResellerController::class, 'index_pdf'])->name('resellerindex_pdf');
 //select 1 field in reseller table 
 Route::get('/admin/reseller/pdf1/{pro1}',[App\Http\Controllers\ResellerController::class, 'index_pdf1'])->name('resellerindex_pdf1');
  //select 2 field in reseller table 
 Route::get('/admin/reseller/pdf2/{pro1}/{pro2}',[App\Http\Controllers\ResellerController::class, 'index_pdf2'])->name('resellerindex_pdf2');
 //select 3 field in reseller table 
 Route::get('/admin/reseller/pdf3/{pro1}/{pro2}/{pro3}',[App\Http\Controllers\ResellerController::class, 'index_pdf3'])->name('resellerindex_pdf3');
  //select 4 field in reseller table 
 Route::get('/admin/reseller/pdf4/{pro1}/{pro2}/{pro3}/{pro4}',[App\Http\Controllers\ResellerController::class, 'index_pdf4'])->name('resellerindex_pdf4');
   //select 5 field in reseller table 
 Route::get('/admin/reseller/pdf5/{pro1}/{pro2}/{pro3}/{pro4}/{pro5}',[App\Http\Controllers\ResellerController::class, 'index_pdf5'])->name('resellerindex_pdf5');
  //select 6 field in reseller table 
 Route::get('/admin/reseller/pdf6/{pro1}/{pro2}/{pro3}/{pro4}/{pro5}/{pro6}',[App\Http\Controllers\ResellerController::class, 'index_pdf6'])->name('resellerindex_pdf6');

    Route::post('/admin/reseller/store',[App\Http\Controllers\ResellerController::class, 'store'])->name('reseller.store');
    Route::get('/admin/reseller/{reseller}/edit',[App\Http\Controllers\ResellerController::class, 'edit'])->name('reseller.edit');
    Route::put('/admin/reseller/{reseller}/update',[App\Http\Controllers\ResellerController::class, 'update'])->name('reseller.update');
    Route::delete('/admin/reseller/{reseller}/delete',[App\Http\Controllers\ResellerController::class, 'destroy'])->name('reseller.destroy');

// reseller salesreport
      Route::post('/reseller/sales-report/dates',[App\Http\Controllers\ResellerController::class, 'sales_report_twodates'])->name('tofrom_orderreport_reseller');

    Route::get('/reseller/sales-report',[App\Http\Controllers\ResellerController::class, 'sales_report'])->name('salesreport_reseller');

// reseller orderstatus
 Route::post('/reseller/order-status',[App\Http\Controllers\ResellerController::class, 'order_status_twodates'])->name('tofrom_orderstatus_reseller');

      Route::get('/admin/reseller/order-status',[App\Http\Controllers\ResellerController::class, 'order_status'])->name('orderstatus_reseller');



     Route::get('/admin/reseller/order-status',[App\Http\Controllers\ResellerController::class, 'order_status'])->name('orderstatus_reseller');

//reseller discountreport 
  


        Route::get('/admin/reseller/discount-report',[App\Http\Controllers\ResellerController::class, 'discount_report'])->name('discount_reseller');

 Route::post('/reseller/discount/dates',[App\Http\Controllers\ResellerController::class, 'discount_report_twodates'])->name('tofrom_discountorderreports_reseller');

      //offerreport
    

Route::post('/reseller/offer-reports/dates',[App\Http\Controllers\ResellerController::class, 'offer_report_twodates'])->name('tofrom_offers_reseller');

         Route::get('/admin/reseller/offer-report',[App\Http\Controllers\ResellerController::class, 'offer_report'])->name('offer_reseller');

    // ---contactus
    Route::get('/admin/contactus',[App\Http\Controllers\ContactusController::class,'index'])->name('contactus.index');
    Route::put('/admin/contactus/{contactus}/status',[App\Http\Controllers\ContactusController::class,'status'])->name('contactus.status');
    Route::delete('/admin/contactus/{contactus}/delete',[App\Http\Controllers\ContactusController::class,'destroy'])->name('contactus.destroy');

//admin Customer

    Route::get('/admin/customer',[App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
    Route::get('/admin/customer/create',[App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
    Route::post('/admin/customer/store',[App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
    Route::get('/admin/customer/{customer}/edit',[App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/admin/customer/{customer}/update',[App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/admin/customer/{customer}/delete',[App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.destroy');


//admin owner

    Route::get('/admin/owner',[App\Http\Controllers\OwnerController::class, 'index'])->name('owner.index');


    Route::get('/admin/owner/create',[App\Http\Controllers\OwnerController::class, 'create'])->name('owner.create');

     Route::get('/admin/owner/pdf',[App\Http\Controllers\OwnerController::class, 'index_pdf'])->name('ownerindex_pdf');


    Route::post('/admin/owner/store',[App\Http\Controllers\OwnerController::class, 'store'])->name('owner.store');
    Route::get('/admin/owner/{owner}/edit',[App\Http\Controllers\OwnerController::class, 'edit'])->name('owner.edit');
    Route::put('/admin/owner/{owner}/update',[App\Http\Controllers\OwnerController::class, 'update'])->name('owner.update');
    Route::delete('/admin/owner/{owner}/delete',[App\Http\Controllers\OwnerController::class, 'destroy'])->name('owner.destroy');

//admin SALE RETURN

    Route::get('/admin/salereturn',[App\Http\Controllers\salereturnController::class, 'index'])->name('salereturn.index');
    Route::get('/admin/salereturn/create',[App\Http\Controllers\salereturnController::class, 'create'])->name('salereturn.create');
    Route::post('/admin/salereturn/store',[App\Http\Controllers\salereturnController::class, 'store'])->name('salereturn.store');
    Route::get('/admin/salereturn/{salereturn}/edit',[App\Http\Controllers\salereturnController::class, 'edit'])->name('salereturn.edit');
    Route::put('/admin/salereturn/{salereturn}/update',[App\Http\Controllers\salereturnController::class, 'update'])->name('salereturn.update');
    Route::delete('/admin/salereturn/{salereturn}/delete',[App\Http\Controllers\salereturnController::class, 'destroy'])->name('salereturn.destroy');

    // END SALE RETURN
//admin discounts

//deals

    Route::get('/admin/deal',[App\Http\Controllers\DealController::class, 'index'])->name('deal.index');
    // ->middleware('permission:show deals')
    Route::get('/admin/deal/create',[App\Http\Controllers\DealController::class, 'create'])->name('deal.create');
    // ->middleware('permission:create deals')
    Route::post('/admin/deal/store',[App\Http\Controllers\DealController::class, 'store'])->name('deal.store');
    Route::get('/admin/deal/{deal}/edit',[App\Http\Controllers\DealController::class, 'edit'])->name('deal.edit');
    // ->middleware('permission:edit deals')
    Route::post('/admin/deal/{deal}/update',[App\Http\Controllers\DealController::class, 'update'])->name('deal.update');

Route::get('/admin/deal/show/{id}/',[App\Http\Controllers\DealController::class, 'show1'])->name('dealshow');


Route::get('/admin/deal-edit/{id}/',[App\Http\Controllers\DealController::class, 'edit_deall'])->name('deal-edit');


Route::post('/admin/deal-update/{id}/',[App\Http\Controllers\DealController::class, 'update_deall'])->name('deal-update');

    Route::delete('/admin/deal/{deal}/delete',[App\Http\Controllers\DealController::class, 'destroy'])->name('deal.destroy');
    // ->middleware('permission:delete deals')
    Route::put('/admin/deal/{deal}/status',[App\Http\Controllers\DealController::class, 'deal_status'])->name('deal.status');
    // ->middleware('permission:deals status')

// get sizes and specific deals for deals product

    Route::post('sizes',[App\Http\Controllers\DealController::class, 'getSize']);

    Route::post('specificdealfor',[App\Http\Controllers\DealController::class, 'getSpecificdealfor']);

//offers

    Route::get('/admin/offer',[App\Http\Controllers\OfferController::class, 'index'])->name('offer.index');

//offers   //Buy One Get One Free

    Route::get('/admin/buyonegetone/create',[App\Http\Controllers\OfferController::class, 'buy_1_get_1_offer_create'])->name('buy_1_get_1_offer.create');
    //buy 1 get 1 pdf 
    Route::get('/admin/buyonegetone/pdf',[App\Http\Controllers\OfferController::class, 'buy_1_get_1_offer_pdf'])->name('buy_1_get_1_offer_pdf');




    Route::post('/admin/buyonegetone/store',[App\Http\Controllers\OfferController::class, 'buy_1_get_1_offer_store'])->name('buy_1_get_1_offer.store');
    Route::get('/admin/buyonegetone/{buyonegetone}/edit',[App\Http\Controllers\OfferController::class, 'buy_1_get_1_offer_edit'])->name('buy_1_get_1_offer.edit');
    Route::put('/admin/buyonegetone/{buyonegetone}/update',[App\Http\Controllers\OfferController::class, 'buy_1_get_1_offer_update'])->name('buy_1_get_1_offer.update');
    Route::delete('/admin/buyonegetone/{buyonegetone}/delete',[App\Http\Controllers\OfferController::class, 'buy_1_get_1_offer_destroy'])->name('buy_1_get_1_offer.destroy');
    Route::put('/admin/buyonegetone/{buyonegetone}/status',[App\Http\Controllers\OfferController::class, 'buy_1_get_1_offer_status'])->name('buy_1_get_1_offer.status');

//offers  //free delivery

    Route::get('/admin/freedelivery/create',[App\Http\Controllers\OfferController::class, 'free_delivery_create'])->name('free_delivery.create');
    Route::post('/admin/freedelivery/store',[App\Http\Controllers\OfferController::class, 'free_delivery_store'])->name('free_delivery.store');
    Route::get('/admin/freedelivery/{freedelivery}/edit',[App\Http\Controllers\OfferController::class, 'free_delivery_edit'])->name('free_delivery.edit');
    Route::put('/admin/freedelivery/{freedelivery}/update',[App\Http\Controllers\OfferController::class, 'free_delivery_update'])->name('free_delivery.update');
    Route::delete('/admin/freedelivery/{freedelivery}/delete',[App\Http\Controllers\OfferController::class, 'free_delivery_destroy'])->name('free_delivery.destroy');
    Route::put('/admin/freedelivery/{freedelivery}/status',[App\Http\Controllers\OfferController::class, 'free_delivery_status'])->name('free_delivery.status');

//offers  //voucher code

    Route::get('/admin/vouchercode/create',[App\Http\Controllers\OfferController::class, 'voucher_code_create'])->name('voucher_code.create');
    Route::post('/admin/vouchercode/store',[App\Http\Controllers\OfferController::class, 'voucher_code_store'])->name('voucher_code.store');
    Route::get('/admin/vouchercode/{vouchercode}/edit',[App\Http\Controllers\OfferController::class, 'voucher_code_edit'])->name('voucher_code.edit');
    Route::put('/admin/vouchercode/{vouchercode}/update',[App\Http\Controllers\OfferController::class, 'voucher_code_update'])->name('voucher_code.update');
    Route::delete('/admin/vouchercode/{vouchercode}/delete',[App\Http\Controllers\OfferController::class, 'voucher_code_destroy'])->name('voucher_code.destroy');
    Route::put('/admin/vouchercode/{vouchercode}/status',[App\Http\Controllers\OfferController::class, 'voucher_code_status'])->name('voucher_code.status');

//general discount

    Route::get('/admin/generaldiscount',[App\Http\Controllers\GeneralDiscountController::class, 'index'])->name('general_discount.index');

//general discount //product

    Route::get('/admin/productdiscount/create',[App\Http\Controllers\GeneralDiscountController::class, 'product_discount_create'])->name('product_discount.create');
    Route::post('/admin/productdiscount/store',[App\Http\Controllers\GeneralDiscountController::class, 'product_discount_store'])->name('product_discount.store');
    Route::get('/admin/productdiscount/{productdiscount}/edit',[App\Http\Controllers\GeneralDiscountController::class, 'product_discount_edit'])->name('product_discount.edit');
    Route::put('/admin/productdiscount/{productdiscount}/update',[App\Http\Controllers\GeneralDiscountController::class, 'product_discount_update'])->name('product_discount.update');
    Route::delete('/admin/productdiscount/{productdiscount}/delete',[App\Http\Controllers\GeneralDiscountController::class, 'product_discount_destroy'])->name('product_discount.destroy');
    Route::put('/admin/productdiscount/{productdiscount}/status',[App\Http\Controllers\GeneralDiscountController::class, 'product_discount_status'])->name('product_discount.status');

//general discount //category

    Route::get('/admin/categorydiscount/create',[App\Http\Controllers\GeneralDiscountController::class, 'category_discount_create'])->name('category_discount.create');
    Route::post('/admin/categorydiscount/store',[App\Http\Controllers\GeneralDiscountController::class, 'category_discount_store'])->name('category_discount.store');
    Route::get('/admin/categorydiscount/{categorydiscount}/edit',[App\Http\Controllers\GeneralDiscountController::class, 'category_discount_edit'])->name('category_discount.edit');
    Route::put('/admin/categorydiscount/{categorydiscount}/update',[App\Http\Controllers\GeneralDiscountController::class, 'category_discount_update'])->name('category_discount.update');
    Route::delete('/admin/categorydiscount/{categorydiscount}/delete',[App\Http\Controllers\GeneralDiscountController::class, 'category_discount_destroy'])->name('category_discount.destroy');
    Route::put('/admin/categorydiscount/{categorydiscount}/status',[App\Http\Controllers\GeneralDiscountController::class, 'category_discount_status'])->name('category_discount.status');

//general discount //customer

    Route::get('/admin/customerdiscount/create',[App\Http\Controllers\GeneralDiscountController::class, 'customer_discount_create'])->name('customer_discount.create');
    Route::post('/admin/customerdiscount/store',[App\Http\Controllers\GeneralDiscountController::class, 'customer_discount_store'])->name('customer_discount.store');
    Route::get('/admin/customerdiscount/{customerdiscount}/edit',[App\Http\Controllers\GeneralDiscountController::class, 'customer_discount_edit'])->name('customer_discount.edit');
    Route::put('/admin/customerdiscount/{customerdiscount}/update',[App\Http\Controllers\GeneralDiscountController::class, 'customer_discount_update'])->name('customer_discount.update');
    Route::delete('/admin/customerdiscount/{customerdiscount}/delete',[App\Http\Controllers\GeneralDiscountController::class, 'customer_discount_destroy'])->name('customer_discount.destroy');
    Route::put('/admin/customerdiscount/{customerdiscount}/status',[App\Http\Controllers\GeneralDiscountController::class, 'customer_discount_status'])->name('customer_discount.status');

//general discount //reseller

    Route::get('/admin/resellerdiscount/create',[App\Http\Controllers\GeneralDiscountController::class, 'reseller_discount_create'])->name('reseller_discount.create');
    Route::post('/admin/resellerdiscount/store',[App\Http\Controllers\GeneralDiscountController::class, 'reseller_discount_store'])->name('reseller_discount.store');
    Route::get('/admin/resellerdiscount/{resellerdiscount}/edit',[App\Http\Controllers\GeneralDiscountController::class, 'reseller_discount_edit'])->name('reseller_discount.edit');
    Route::put('/admin/resellerdiscount/{resellerdiscount}/update',[App\Http\Controllers\GeneralDiscountController::class, 'reseller_discount_update'])->name('reseller_discount.update');
    Route::delete('/admin/resellerdiscount/{resellerdiscount}/delete',[App\Http\Controllers\GeneralDiscountController::class, 'reseller_discount_destroy'])->name('reseller_discount.destroy');
    Route::put('/admin/resellerdiscount/{resellerdiscount}/status',[App\Http\Controllers\GeneralDiscountController::class, 'reseller_discount_status'])->name('reseller_discount.status');

//front-end home

    Route::get('/home/',[App\Http\Controllers\FrontEndController::class, 'home']);


     Route::get('deletewishlist/{id}',[App\Http\Controllers\FrontEndController::class, 'delete_wishlist'])->name('deletewishlist');//wishlist delete by using ajax

//single-product rating

    Route::post('/rating',[App\Http\Controllers\ReviewController::class, 'store'])->name('rating');
    Route::get('/admin/reviews',[App\Http\Controllers\ReviewController::class,'index'])->name('review.index');
    Route::delete('/admin/reviews/{reviews}/delete',[App\Http\Controllers\ReviewController::class,'destroy'])->name('review.destroy');
    Route::post('/reply',[App\Http\Controllers\ReviewReplyController::class, 'store'])->name('reply');

//cart

    Route::post('/cart',[App\Http\Controllers\CartController::class, 'store'])->name('cart');
    Route::get('/cart/{cart}/delete',[App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');





    //add to wishlist

    Route::get('addtowishlist/{id}',[App\Http\Controllers\WishlistController::class, 'add_wishlist'])->name('addtowishlist');

    // reseller cart

    Route::get('/Reseller/cart',[App\Http\Controllers\ResellerCartController::class, 'index'])->name('reseller_cart.index');
    Route::post('/Reseller/cart/store',[App\Http\Controllers\ResellerCartController::class, 'store'])->name('reseller_cart.store');
    Route::get('/Reseller/cart/{cart}/delete',[App\Http\Controllers\ResellerCartController::class, 'destroy'])->name('reseller_cart.destroy');

    //reseller checkout

    Route::get('/Reseller/checkout',[App\Http\Controllers\ResellerCartController::class, 'checkout'])->name('reseller.checkout');

//checkout

    Route::get('/checkout',[App\Http\Controllers\FrontEndController::class, 'checkout'])->name('checkout');

// Ajax work of city - state - city delivery - batch

    Route::post('states',[App\Http\Controllers\CountryStateCityController::class, 'getState']);
    Route::post('cities',[App\Http\Controllers\CountryStateCityController::class, 'getCity']);
    Route::post('citydeliverycharges',[App\Http\Controllers\CountryStateCityController::class, 'getDeliveryCharges']);
    Route::post('batches',[App\Http\Controllers\CountryStateCityController::class, 'getBatch']);

// delivery charges

    Route::get('/admin/deliverycharges',[App\Http\Controllers\DeliveryChargesController::class, 'index'])->name('delivery_charges.index');


    Route::get('/admin/deliverycharges/create',[App\Http\Controllers\DeliveryChargesController::class, 'create'])->name('delivery_charges.create');


  Route::get('/admin/deliverycharges/pdf',[App\Http\Controllers\DeliveryChargesController::class, 'index_pdf'])->name('deliverychargesindex_pdf');


    Route::post('/admin/deliverycharges/store',[App\Http\Controllers\DeliveryChargesController::class, 'store'])->name('delivery_charges.store');
    Route::get('/admin/deliverycharges/{deliverycharges}/edit',[App\Http\Controllers\DeliveryChargesController::class, 'edit'])->name('delivery_charges.edit');
    Route::put('/admin/deliverycharges/{deliverycharges}/update',[App\Http\Controllers\DeliveryChargesController::class, 'update'])->name('delivery_charges.update');
    Route::delete('/admin/deliverycharges/{deliverycharges}/delete',[App\Http\Controllers\DeliveryChargesController::class, 'destroy'])->name('delivery_charges.destroy');
 
    Route::get('/admin/standard/deliverycharges/index',[App\Http\Controllers\DeliveryChargesController::class, 'standard_delivery_index'])->name('standarddelivery_charges.index');
    Route::get('/admin/standard/deliverycharges/create',[App\Http\Controllers\DeliveryChargesController::class, 'standard_delivery_create'])->name('standarddelivery_charges.create');
    Route::get('/admin/standard/deliverycharges/edit/{id}',[App\Http\Controllers\DeliveryChargesController::class, 'standard_delivery_edit'])->name('standard_delivery_edit');
    Route::post('/admin/standard/deliverycharges/update',[App\Http\Controllers\DeliveryChargesController::class, 'standard_delivery_update'])->name('update_standard_delivery_charges.store');
   
    Route::get('/admin/express/deliverycharges/edit/{id}',[App\Http\Controllers\DeliveryChargesController::class, 'express_delivery_edit'])->name('express_delivery_edit');
    Route::post('/admin/express/deliverycharges/update',[App\Http\Controllers\DeliveryChargesController::class, 'express_delivery_update'])->name('update_express_delivery_charges.store');
    

    
    Route::get('/admin/express/deliverycharges/index',[App\Http\Controllers\DeliveryChargesController::class, 'express_delivery_index'])->name('expressdelivery_charges.index');
    Route::get('/admin/express/deliverycharges/create',[App\Http\Controllers\DeliveryChargesController::class, 'express_delivery_create'])->name('expressdelivery_charges.create');
    //order



Route::get('orderdetails',[App\Http\Controllers\OrderController::class, 'index2'])->name('orderdetails');

Route::get('orderdetails/pdf',[App\Http\Controllers\OrderController::class, 'index2_pdf'])->name('orderdetails_pdf');

Route::post('orderdetails/edit/delivery-charges',[App\Http\Controllers\OrderController::class, 'edit_DC'])->name('edit_DC');

//select 1 field in order table 
Route::get('orderdetails/pdf1/{pro1}',[App\Http\Controllers\OrderController::class, 'index2_pdf1'])->name('orderdetails_pdf1');
//select 2 field in order table 
Route::get('orderdetails/pdf2/{pro1}/{pro2}',[App\Http\Controllers\OrderController::class, 'index2_pdf2'])->name('orderdetails_pdf2');
//select 3 field in order table 
Route::get('orderdetails/pdf3/{pro1}/{pro2}/{pro3}',[App\Http\Controllers\OrderController::class, 'index2_pdf3'])->name('orderdetails_pdf3');
//select 4 field in order table 
Route::get('orderdetails/pdf4/{pro1}/{pro2}/{pro3}/{pro4}',[App\Http\Controllers\OrderController::class, 'index2_pdf4'])->name('orderdetails_pdf4');
//select 5 field in order table 
Route::get('orderdetails/pdf5/{pro1}/{pro2}/{pro3}/{pro4}/{pro5}',[App\Http\Controllers\OrderController::class, 'index2_pdf5'])->name('orderdetails_pdf5');
//select 6 field in order table 
Route::get('orderdetails/pdf6/{pro1}/{pro2}/{pro3}/{pro4}/{pro5}/{pro6}',[App\Http\Controllers\OrderController::class, 'index2_pdf6'])->name('orderdetails_pdf6');



Route::get('cour',[App\Http\Controllers\OrderController::class, 'cour'])->name('cour');

Route::get('orderproductdetails/{id}',[App\Http\Controllers\OrderController::class, 'orderproduct_details']);

Route::get('orderproductdetails_delete/{id}',[App\Http\Controllers\OrderController::class, 'orderproduct_details_delete']);

Route::get('assignproduct/{id}/{name}',[App\Http\Controllers\OrderController::class, 'assign_product'])->name('assignproduct');

Route::post('salecenterorder',[App\Http\Controllers\OrderController::class, 'salecenter_order'])->name('salecenterorder');

Route::get('editassignproduct/{id}/{name}/{name2}',[App\Http\Controllers\OrderController::class, 'edit_assign_product_view'])->name('editassignproduct');

Route::post('editsalecenterorder',[App\Http\Controllers\OrderController::class, 'edit_assign_product'])->name('editsalecenterorder');


Route::get('assignrider/{id}/{name}/{name2}',[App\Http\Controllers\OrderController::class, 'assign_rider'])->name('assignrider');

Route::get('editassignrider/{id}/{name}/{name2}/{name3}',[App\Http\Controllers\OrderController::class, 'edit_assign_rider_view'])->name('editassignrider');


Route::post('riderorder',[App\Http\Controllers\OrderController::class, 'rider_order'])->name('riderorder');

Route::post('editriderorder',[App\Http\Controllers\OrderController::class, 'edit_assign_rider'])->name('editriderorder');

// order close 
Route::get('close/order/{ordernumber}/{id}',[App\Http\Controllers\OrderController::class, 'close_order_view'])->name('closingorder');

Route::get('check/close-order/{ordernumber}/{id}',[App\Http\Controllers\OrderController::class, 'close_order_check'])->name('closingorder_check');

Route::post('close/order/store',[App\Http\Controllers\OrderController::class, 'close_order_post'])->name('closeorder_post');


// salecenter my products module

Route::get('salecenter/myproducts',[App\Http\Controllers\ProductForSaleCenterController::class, 'salecenter_myproducts'])->name('salecenter_myproducts');



// salecenter access inventory report


Route::get('salecenter/reports/inventory',[App\Http\Controllers\ReportController::class, 'inventoryreport_salecenter'])->name('inventoryreport_salecenter');

Route::post('salecenter/reports/inventory/dates',[App\Http\Controllers\ReportController::class, 'inventoryreport_salecenter_twodates'])->name('tofrom_inventoryreport_salecenter');

//orderreport SS

Route::get('salecenter/reports/order-sale',[App\Http\Controllers\ReportController::class, 'orderreport_salecenter'])->name('orderreport_salecenter');


Route::post('salecenter/reports/order-sale/dates',[App\Http\Controllers\ReportController::class, 'orderreport_salecenter_twodates'])->name('tofrom_orderreport_salecenter');



// product details module #2


// 

Route::get('assignrider2/{id}/{name}/{name2}',[App\Http\Controllers\OrderController::class, 'assign_rider2'])->name('assignrider2');

Route::get('assignrider3/{id}/{name}/{name2}',[App\Http\Controllers\OrderController::class, 'assign_rider3'])->name('assignrider3');

Route::get('notavaialble/{pro_id}/{pro_order_id}/{pro_weight},/{pro_totalprice}',[App\Http\Controllers\OrderController::class, 'not_available'])->name('notavailable');


Route::get('not/recieved/{riderorderrr}',[App\Http\Controllers\OrderController::class, 'not_recieved'])->name('notrecieve');





Route::post('riderorder2',[App\Http\Controllers\OrderController::class, 'rider_order2'])->name('riderorder2');

Route::post('riderorder3',[App\Http\Controllers\OrderController::class, 'rider_order3'])->name('riderorder3');

Route::get('editassignrider2/{id}/{name}/{name2}',[App\Http\Controllers\OrderController::class, 'edit_assign_rider2_view'])->name('editassignrider2');

Route::post('editriderorder2',[App\Http\Controllers\OrderController::class, 'edit_assign_rider2'])->name('editriderorder2');

// end module #2


    Route::get('/admin/order',[App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
    Route::get('/admin/order/{order}/edit',[App\Http\Controllers\OrderController::class, 'edit'])->name('order.edit');
    Route::put('/admin/order/{order}/update',[App\Http\Controllers\OrderController::class, 'update'])->name('order.update');
    Route::delete('/admin/order/{order}/delete',[App\Http\Controllers\OrderController::class, 'destroy'])->name('order.destroy')->middleware('permission:delete orders');
    Route::get('/admin/order/{order}/show',[App\Http\Controllers\OrderController::class, 'show'])->name('order.show');
    Route::get('/customer/order_history',[App\Http\Controllers\OrderController::class, 'order_history'])->name('order.history');

    Route::post('/admin/order/{order}/couriercompany',[App\Http\Controllers\OrderController::class, 'couriercompanyorder']);

// -- order for frontend
    Route::post('/order',[App\Http\Controllers\OrderController::class, 'store'])->name('order');

    Route::post('/coupon',[App\Http\Controllers\OfferController::class, 'coupon_check'])->name('coupon_code');

    //reseller Products

    Route::get('/reseller/product',[App\Http\Controllers\ProductResellerController::class, 'index'])->name('product_reseller.index');
    Route::get('/reseller/product/{product}/show',[App\Http\Controllers\ProductResellerController::class, 'show'])->name('product_reseller.show');

    //reseller Catalogue

    Route::get('/reseller/catalogue',[App\Http\Controllers\CatalogueController::class, 'index'])->name('catalogue.index');
    Route::get('/reseller/catalogue/create',[App\Http\Controllers\CatalogueController::class, 'create'])->name('catalogue.create');
    Route::post('/reseller/catalogue/store',[App\Http\Controllers\CatalogueController::class, 'store'])->name('catalogue.store');
    Route::get('/reseller/catalogue/{catalogue}/edit',[App\Http\Controllers\CatalogueController::class, 'edit'])->name('catalogue.edit');
    Route::put('/reseller/catalogue/{catalogue}/update',[App\Http\Controllers\CatalogueController::class, 'update'])->name('catalogue.update');
    Route::delete('/reseller/catalogue/{catalogue}/delete',[App\Http\Controllers\CatalogueController::class, 'destroy'])->name('catalogue.destroy');

    //reseller Catalogue product

    Route::post('/reseller/catalogue/product/store',[App\Http\Controllers\CatalogueProductController::class, 'store'])->name('catalogue_product.store');

    //sale center order assign and show on salecenter

    Route::post('/salecenter/order/assign',[App\Http\Controllers\SaleCenterOrderController::class, 'assign'])->name('sale_center_order.assign');
    Route::get('/salecenter/order',[App\Http\Controllers\SaleCenterOrderController::class, 'index'])->name('sale_center_order.index');
    Route::get('/salecenter/order/{order}/edit',[App\Http\Controllers\SaleCenterOrderController::class, 'edit'])->name('sale_center_order.edit');
    Route::put('/salecenter/order/{order}/update',[App\Http\Controllers\SaleCenterOrderController::class, 'update'])->name('sale_center_order.update');

    //Rider order assign  rider module order
Route::get('riderorderindex',[App\Http\Controllers\RiderOrderController::class, 'index'])->name('riderorderindex');

Route::get('riderorderindex2',[App\Http\Controllers\RiderOrderController::class, 'index2'])->name('riderorderindex2');

Route::get('/rider/order/{order}/edit',[App\Http\Controllers\RiderOrderController::class, 'edit'])->name('rider_order.edit');

Route::get('/rider/order/{order}/edit2',[App\Http\Controllers\RiderOrderController::class, 'edit2'])->name('rider_order.edit2');

Route::get('/pick',[App\Http\Controllers\RiderOrderController::class, 'pick'])->name('pick');

Route::get('/todaypick',[App\Http\Controllers\RiderOrderController::class, 'todaypick'])->name('today');

 Route::put('/rider/order/{order}/update',[App\Http\Controllers\RiderOrderController::class, 'update'])->name('rider_order.update');

 Route::put('/rider2/order/{order}/update2',[App\Http\Controllers\RiderOrderController::class, 'update2'])->name('rider_order.update2');

Route::post('/checkdate',[App\Http\Controllers\RiderOrderController::class, 'date'])->name('checkdate');

Route::get('rider/defer/{id}',[App\Http\Controllers\RiderOrderController::class, 'defer'])->name('rider_defer');

Route::post('rider/defer/store/{id}',[App\Http\Controllers\RiderOrderController::class, 'defer_update'])->name('defernewdate');



    //contact us from frontend

    Route::post('/frontend/contact/store',[App\Http\Controllers\ContactusController::class, 'store'])->name('contactus.store');

    //Routes for accounts

    Route::group(['prefix' => 'account'], function () {

        Route::Resources([
            'assets' => AssetController::class,
            'equity' => EquityController::class,
            'liabilities' => LiabilityController::class,
            'expenses' => ExpenseController::class,
            'income' => IncomeController::class,
        ]);

    });
    Route::post('account/assetstore',[App\Http\Controllers\Account\AssetController::class, 'store']);

    Route::post('account/liabilitystore',[App\Http\Controllers\Account\LiabilityController::class, 'store']);

    Route::post('account/equitystore',[App\Http\Controllers\Account\EquityController::class, 'store']);

    Route::post('account/incomestore',[App\Http\Controllers\Account\IncomeController::class, 'store']);

    Route::post('account/expensestore',[App\Http\Controllers\Account\ExpenseController::class, 'store']);




    Route::get('generate_voucher',[App\Http\Controllers\Account\AssetController::class, 'voucher']);

    Route::post('generate_voucher',[App\Http\Controllers\Account\AssetController::class, 'voucher_store']);

    //order status

    Route::put('/admin/order/{order}/status',[App\Http\Controllers\OrderController::class, 'status'])->name('order.status');


    //ACCOUNT -> VOUCHER
    Route::get('bankpaymentvoucher',[App\Http\Controllers\Account\VoucherController::class, 'bankpaymentvoucher']);

    Route::get('bankrecievevoucher',[App\Http\Controllers\Account\VoucherController::class, 'bankrecievevoucher']);

    Route::get('cashpaymentvoucher',[App\Http\Controllers\Account\VoucherController::class, 'cashpaymentvoucher']);

    Route::get('cashrecievevoucher',[App\Http\Controllers\Account\VoucherController::class, 'cashrecievevoucher']);

    Route::get('journalvoucher',[App\Http\Controllers\Account\VoucherController::class, 'journalvoucher']);

//post

    Route::post('bankpaymentvoucher',[App\Http\Controllers\Account\VoucherController::class, 'bankpaymentvoucher_post']);

    Route::post('bankrecievevoucher',[App\Http\Controllers\Account\VoucherController::class, 'bankrecievevoucher_post']);

    Route::post('cashpaymentvoucher',[App\Http\Controllers\Account\VoucherController::class, 'cashpaymentvoucher_post']);

    Route::post('cashrecievevoucher',[App\Http\Controllers\Account\VoucherController::class, 'cashrecievevoucher_post']);


    Route::post('journalvoucher',[App\Http\Controllers\Account\VoucherController::class, 'journalvoucher_post']);

    //ACCOUNT ->HEADER
    Route::get('addsubheader',[App\Http\Controllers\Account\HeaderController::class, 'subheader']);
    Route::get('addthirdsubheader',[App\Http\Controllers\Account\HeaderController::class, 'thirdsubheader']);

    Route::post('subheader_post',[App\Http\Controllers\Account\HeaderController::class, 'subheader_post']);

    Route::post(' thirdsubheader_post',[App\Http\Controllers\Account\HeaderController::class, 'ThirdSubheaderPost']);


    Route::get('ajax-autocomplete-search', [VoucherController::class,'selectSearch']);





});


//front-end

Route::get('/',[App\Http\Controllers\FrontEndController::class, 'index']);
Route::get('/about',[App\Http\Controllers\FrontEndController::class, 'about'])->name('about');
Route::get('/category',[App\Http\Controllers\FrontEndController::class, 'category'])->name('category');
Route::get('/contact',[App\Http\Controllers\FrontEndController::class, 'contact'])->name('contact');
//Route::get('/order',[App\Http\Controllers\FrontEndController::class, 'order'])->name('order');
Route::get('/single/{product}/product',[App\Http\Controllers\FrontEndController::class, 'single_product'])->name('single_product');

Route::get('/single/{colour}/colour/{product}/product',[App\Http\Controllers\FrontEndController::class, 'single_colour'])->name('single_colour');



Route::post('/single/{product}/hello',[App\Http\Controllers\CartController::class, 'addcart']);

Route::post('deals/add-cart',[App\Http\Controllers\CartController::class, 'deal_add_cart'])->name('deal_add_cart');

Route::get('clearcart',[App\Http\Controllers\CartController::class, 'clear_cart'])->name('clearcart');




Route::post('admin/selectuseradmin',[App\Http\Controllers\CartController::class, 'select_user_admin'])->name('selectuseradmin');




Route::post('admin/manualorder/',[App\Http\Controllers\CartController::class, 'addcart_admin'])->name('addcartadmin');

//category wise product
Route::post('admin/manualorderr/addtocartt/',[App\Http\Controllers\CartController::class, 'addcart_admin2'])->name('addtocart_manualorder');



Route::get('admin/admincart/{id}',[App\Http\Controllers\CartController::class, 'admin_cart_view'])->name('admincart');

// edit & delete admin cart for customers
Route::get('admin/editadmincart/{id}/{name}',[App\Http\Controllers\CartController::class, 'edit_admin_cart'])->name('editadmincart');

Route::get('admin/deleteadmincart/{id}/{name}',[App\Http\Controllers\CartController::class, 'delete_admin_cart'])->name('deleteadmincart');

Route::get('admin/checkoutadmincart/{id}',[App\Http\Controllers\CartController::class, 'checkout_admin_cart'])->name('checkoutadmincart');


Route::get('admin/reseller-cart/',[App\Http\Controllers\CartController::class, 'resellercart_table'])->name('resellercart');

Route::get('admin/user-cart/',[App\Http\Controllers\CartController::class, 'usercart_table'])->name('usercart');



Route::post('checkoutadmin_manualorder/{userid}',[App\Http\Controllers\CheckoutController::class, 'checkoutadmin_post'])->name('checkoutadminpost');


Route::get('customer/dashboard',[App\Http\Controllers\FrontEndController::class, 'customer_dashboard'])->name('dasboardcustomer');


Route::get('customer/order_history',[App\Http\Controllers\FrontEndController::class, 'customer_orderhistory'])->name('dashboard_order');














// Reseller Catalogue

Route::get('view_catalogue',[App\Http\Controllers\ResellerController::class, 'catalogue']);
Route::get('view_catalogue/{catalogue}',[App\Http\Controllers\ResellerController::class, 'catalogue_products']);

Route::get('exportimage/{catalogue}/',[App\Http\Controllers\ResellerController::class, 'exportimage'])->name('exportimage');


Route::get('/admin/clear', function () {
    Artisan::call('optimize');
    Artisan::call('view:clear');
    return 'done';
});





// For Home Pge(front-end)
Route::get('blog',[App\Http\Controllers\BlogController::class, 'blog']);

Route::get('forgotpassword',[App\Http\Controllers\Auth\ForgotPasswordController::class, 'forgot_password']);

Route::get('checkoutshipping/{id}',[App\Http\Controllers\CheckoutController::class, 'checkout_shipping']);

Route::get('cart/checkoutshipping/{id}',[App\Http\Controllers\CheckoutController::class, 'checkout_shipping']);

Route::get('checkoutreview',[App\Http\Controllers\CheckoutController::class, 'checkout_review']);

Route::post('shippingcheckout/{id}',[App\Http\Controllers\CheckoutController::class, 'shippingcheckout'])->name('shippingcheckout');

// reseller access dispatch on customer address
Route::post('reseller/shippingcheckout/',[App\Http\Controllers\ResellerCartController::class, 'shippingcheckout'])->name('shippingcheckout.reseller');

Route::post('checkoutshipping/shipcheck/{id}',[App\Http\Controllers\CheckoutController::class, 'shipcheck']);


Route::post('cart/checkoutshipping/shippingcheckout/{id}',[App\Http\Controllers\CheckoutController::class, 'shippingcheckout']);
  

  // order proceed or decline

Route::get('accept/{id}',[App\Http\Controllers\CheckoutController::class,'accept'])->name('accept');

Route::get('accept2/{id}',[App\Http\Controllers\ResellerCartController::class,'accept'])->name('accept2');

Route::get('decline/{id}',[App\Http\Controllers\CheckoutController::class,'decline'])->name('decline');

Route::get('decline2/{id}',[App\Http\Controllers\ResellerCartController::class,'decline'])->name('decline2');





// for reseller checkout

Route::get('mydispatch/{id}',[App\Http\Controllers\CheckoutController::class,'customer_dispatch'])->name('customerdispatch');

Route::get('customer-dispatch/{id}',[App\Http\Controllers\CheckoutController::class,'my_dispatch'])->name('mydispatch');

//reseller access checkout

Route::get('reseller/mydispatch/',[App\Http\Controllers\ResellerCartController::class,'reseller_customer_dispatch'])->name('reseller_customer_dispatch');

Route::get('reseller/customer-dispatch/',[App\Http\Controllers\ResellerCartController::class,'reseller_my_dispatch'])->name('reseller_my_dispatch');



// on admin panel resller checkout
Route::get('customer/dispatch/{id}',[App\Http\Controllers\CheckoutController::class,'admin_customer_dispatch'])->name('customerdispatch2');

Route::get('customer-dispatch2/{id}',[App\Http\Controllers\CheckoutController::class,'admin_reseller_dispatch'])->name('mydispatch2');


//filteration

//main page k liye
Route::get('category/all/pricerange',[App\Http\Controllers\CategoryController::class, 'category_all_products_price'])->name('pricefilter_all');


Route::get('category/pricerange/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_sub_price'])->name('pricefilter');




 // main page size filter

Route::post('category/size/all',[App\Http\Controllers\CategoryController::class, 'category_all_products_size'])->name('sizefilter_all');

Route::post('category/size/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_sub_size'])->name('sizefilter');



Route::post('category/color/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_sub_color'])->name('colorfilter');











Route::get('category',[App\Http\Controllers\CategoryController::class, 'category_products']);
//shop by category 
Route::get('category/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_all']);
 //by menu category
Route::get('cat/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_specific1']);
Route::get('cat2/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_specific2']); //ye sub category ka route he
Route::get('cat/cat3/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_specific2']); // ye first category ka route he 


Route::get('cat3/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_specific3']);

Route::get('cat/cat3/cat3/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_specific3']); // ye jab 1 category se hote howe aega to uska route he

Route::get('category/cat3/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_specific3']);
Route::get('cat2/cat3/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_specific3']);

//category 2 attempt 

Route::get('categorysub/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_sub'])->name('cat.sub');

 //CART 
Route::get('viewcart',[App\Http\Controllers\CartController::class, 'cart_view']); 

//promodiscount code cart view
Route::post('productdiscount',[App\Http\Controllers\CartController::class, 'cart_view_discount'])->name('promo');

Route::post('updateitems/{id}',[App\Http\Controllers\CartController::class, 'update_cart_item']);
// Route::post('/single/{product}/updateitems/{id}',[App\Http\Controllers\CartController::class, 'update_cart_item']);


Route::get('deletecartitem/{id}',[App\Http\Controllers\CartController::class, 'delete_cart_item']);

Route::get('deletecartitem_cart/{id}',[App\Http\Controllers\CartController::class, 'delete_cart_item_cart']);
// Route::get('single/{product}/deletecartitem/{id}',[App\Http\Controllers\CartController::class, 'delete_cart_item']);

Route::get('cat/{id}',[App\Http\Controllers\CategoryController::class,'category_products_specific1'])->name('cat1');

Route::get('cat2/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_specific2'])->name('cat2');

Route::get('cat3/{id}',[App\Http\Controllers\CategoryController::class, 'category_products_specific3'])->name('cat3');




// Route::post('generate-pdf',[App\Http\Controllers\PDFController::class, 'generatePDF'])->name('pdf');

// Route::get('pdff',[App\Http\Controllers\PDFController::class, 'view']);


// filter table for products tables
Route::post('admin\products\details',[App\Http\Controllers\CategoryController::class, 'selectfield'])->name('selectfield');

// filter table for salecenters tables
Route::post('admin\salecenters\details',[App\Http\Controllers\SaleCenterController::class, 'selectfield'])->name('selectfield_salecenter');

// filter table for riders tables
Route::post('admin\rider\details',[App\Http\Controllers\RiderController::class, 'selectfield'])->name('selectfield_rider');

// filtertable for order tables

Route::post('admin\order\details',[App\Http\Controllers\OrderController::class, 'selectfield'])->name('selectfield_order');

// filter table for supplier tables
Route::post('admin\supplier\details',[App\Http\Controllers\SupplierController::class, 'selectfield'])->name('selectfield_supplier');

// filter table for supplier tables
Route::post('admin\reseller\details',[App\Http\Controllers\ResellerController::class, 'selectfield'])->name('selectfield_reseller');

Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);

Route::get('/admin/order/advance-payment',[App\Http\Controllers\OrderController::class, 'advancepayment_confirmation'])->name('advancepayment_confirmation');

Route::post('admin/order/advance-payment/post',[App\Http\Controllers\OrderController::class, 'advancepayment_post'])->name('advancepayment_post');

Route::get('/admin/order/advance-payment/index',[App\Http\Controllers\OrderController::class, 'advancepayment_index'])->name('advancepayment_index');


Route::get('/admin/order/advance-payment/edit/{id}',[App\Http\Controllers\OrderController::class, 'advancepayment_edit'])->name('advancepayment_edit');


Route::get('/admin/order/advance-payment/delete/{id}',[App\Http\Controllers\OrderController::class, 'advancepayment_delete'])->name('advancepayment_delete');


Route::post('admin/order/advance-payment/update/{id}',[App\Http\Controllers\OrderController::class, 'advancepayment_update'])->name('advancepayment_update');


Route::post('/admin/select-reseller/',[App\Http\Controllers\ResellerController::class, 'selectreseller'])->name('selectreseller');

Route::get('/admin/reseller-wallet-update/{id}',[App\Http\Controllers\ResellerController::class, 'resellerwalletupdate'])->name('resellerwalletupdate');

Route::post('/admin/reseller-wallet-update/{id}',[App\Http\Controllers\ResellerController::class, 'resellerwalletedit_post'])->name('resellerwalletedit_post');



// all products search

Route::get('/all-products-result',[App\Http\Controllers\CategoryController::class, 'all_products_search'])->name('all_products_search');

Route::get('permission',[App\Http\Controllers\OrderController::class, 'permission']);

Route::get('confirm/packing/{id}',[App\Http\Controllers\OrderController::class, 'confirm_packing'])->name('confirmpacking');

Route::get('confirmm/order/{id}/{name}/{name2}',[App\Http\Controllers\OrderController::class, 'courier_rider'])->name('courier_rider');


Route::get('deal/discount',[App\Http\Controllers\DealController::class, 'deals_discount'])->name('deals-discount');


Route::get('deal/discount/details/{id}',[App\Http\Controllers\DealController::class, 'single_product_deals'])->name('single_product_deals');



//reportsssssssssss

// 1-salereturn 
Route::get('admin/reports/salereturn',[App\Http\Controllers\ReportController::class, 'salereturn_report'])->name('salereturnreport');

Route::get('admin/reports/salereturn/lastmonth',[App\Http\Controllers\ReportController::class, 'salereturn_Report_lastmoth'])->name('lastmonthsalereturn');

Route::get('admin/reports/salereturn/lastyear',[App\Http\Controllers\ReportController::class, 'salereturn_Report_lastyear'])->name('lastyearsalereturn');

Route::post('admin/reports/salereturn/dates',[App\Http\Controllers\ReportController::class, 'salereturn_Report_twodates'])->name('tofrom_salereturn');

// after order salereturn

Route::get('admin/salereturn-of-order/{pro_id}',[App\Http\Controllers\salereturnController::class, 'create'])->name('salereturn_after_order');
// 2-purchase return 


Route::get('admin/reports/purchasereturn/all',[App\Http\Controllers\ReportController::class, 'purchasereturn_Report'])->name('purchasereturn_Report');

Route::get('admin/reports/purchasereturn/lastmonth',[App\Http\Controllers\ReportController::class, 'purchasereturn_Report_lastmoth'])->name('lastmonthpurchasereturn');

Route::get('admin/reports/purchasereturn/lastyear',[App\Http\Controllers\ReportController::class, 'purchasereturn_Report_lastyear'])->name('lastyearpurchasereturn');


Route::post('admin/reports/purchasereturn/dates',[App\Http\Controllers\ReportController::class, 'purchasereturn_Report_twodates'])->name('tofrom_purchasereturn');



// 2-Upload report
Route::get('admin/reports/upload/all',[App\Http\Controllers\ReportController::class, 'upload_report'])->name('uploadreport');

Route::get('admin/reports/uploads/lastmonth',[App\Http\Controllers\ReportController::class, 'upload_Report_lastmoth'])->name('lastmonthupload');

Route::get('admin/reports/uploads/lastyear',[App\Http\Controllers\ReportController::class, 'upload_Report_lastyear'])->name('lastyearupload');

Route::post('admin/reports/upload_reports/dates',[App\Http\Controllers\ReportController::class, 'upload_Report_twodates'])->name('tofrom_uploadreport');
//3 order report 

Route::get('admin/reports-/all',[App\Http\Controllers\ReportController::class, 'order_report'])->name('orderreport');


Route::get('admin/reports/orders/lastmonth',[App\Http\Controllers\ReportController::class, 'order_Report_lastmoth'])->name('lastmonthorder');

Route::get('admin/reports/orders/lastyear',[App\Http\Controllers\ReportController::class, 'order_Report_lastyear'])->name('lastyearorder');

Route::post('admin/reports/order_reports/dates',[App\Http\Controllers\ReportController::class, 'order_Report_twodates'])->name('tofrom_orderreport');


//purchase report 

Route::get('admin/purchaseorder_report/all',[App\Http\Controllers\ReportController::class, 'purchaseorder_report'])->name('purchaseorder_report');
//inventory_report

Route::get('admin/inventory_report/all',[App\Http\Controllers\ReportController::class, 'inventory_report'])->name('inventory_report');

Route::post('admin/reports/inventory_reports/dates',[App\Http\Controllers\ReportController::class, 'inventory_Report_twodates'])->name('tofrom_inventoryreport');
