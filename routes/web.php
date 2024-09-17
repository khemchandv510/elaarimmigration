<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\FaqController;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\HomeCardController;


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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/unsubscribe', [App\Http\Controllers\HomeController::class, 'unsubscribe'])->name('unsubscribe');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::resource('posts', PostController::class);

    Route::resource('emails', TaskController::class);

    Route::get('imports', [\App\Http\Controllers\ImportController::class, 'index']);
    Route::post('imports', [\App\Http\Controllers\ImportController::class, 'import'])->name('importdata');


    Route::get('email-groups', [\App\Http\Controllers\EmailController::class, 'index'])->name('email.group');
    Route::post('email-groups', [\App\Http\Controllers\EmailController::class, 'store'])->name('email.group-submit');

    Route::get('smtp-config', [\App\Http\Controllers\SmtpController::class, 'index'])->name('smtp-config');

    Route::post('send-mail-submit',[\App\Http\Controllers\SendMailController::class, 'store'])->name('send.php.mailer.submit');


    Route::get("send-email", [\App\Http\Controllers\PHPMailerController::class, "email"])->name("send.email");

    Route::post("send-email", [\App\Http\Controllers\PHPMailerController::class, "composeEmail"])->name("send-test-email");
    
    
    
    Route::get("send-emails", [\App\Http\Controllers\PHPMailerController::class, "showEmailFrom"])->name("send.showEmail");
    
    Route::post("send-emails", [\App\Http\Controllers\PHPMailerController::class, "sendLiveEmail"])->name("send-live-email");
    
    


    Route::any('category', [CategoryController::class, 'createCategory'])->name('Category.show');
    Route::get('category/{id}', [CategoryController::class, 'viewCategory'])->name('category.detail');

    Route::post('category/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');

    Route::get('sub-category', [CategoryController::class, 'subCategory'])->name('Category.showSubCategory');
    Route::post('sub-category', [CategoryController::class, 'createSubCategory'])->name('Category.showSubCategory');
    Route::get('sub-sub-category', [CategoryController::class, 'subSubCategory'])->name('Category.showSubSubCategory');
    Route::post('sub-sub-category', [CategoryController::class, 'createsubsubCategory'])->name('Category.subSubCategory');

    Route::get('products', [ProductController::class, 'index'])->name('product.index');
    Route::get('products/add', [ProductController::class, 'addProduct'])->name('product.add');

    Route::post('products/add', [ProductController::class, 'saveProduct'])->name('product.save');

    Route::get('products/{id}', [ProductController::class, 'Details'])->name('product.detail');
    Route::get('products-delete/{id}', [ProductController::class, 'Delete_product'])->name('product.delete');


    Route::post('products/{id}', [ProductController::class, 'productUpdate'])->name('product.update');

    Route::get('sub-categories/{id}', [CategoryController::class, 'getSubCategory'])->name('category.get-subcategory');

    Route::post('save-faq', [FaqController::class, 'saveFaq'])->name('faq.save');
    Route::post('update-faq', [FaqController::class, 'updateFaqData'])->name('faq.update');

    
    Route::post('keywords-update', [FaqController::class, 'KeywordsUpdate'])->name('keywords.update');
    Route::get('get-keyword-details/{id}', [FaqController::class, 'KeywordsDetails'])->name('keywords.details');

    
    Route::get('get-custom-adds-details/{id}', [FaqController::class, 'customAddsDetails']);
    Route::post('custom-adds-update', [FaqController::class, 'customAddsUpdate'])->name('customadd.update');

    
    Route::get('custom-adds-delete/{id}', [FaqController::class, 'customAddsDetete'])->name('customadds.delete');

    
    
    Route::post('save-page-content', [FaqController::class, 'savePageContent'])->name('pagecontent.save');
    
    Route::post('edit-page-content', [FaqController::class, 'editPageContent'])->name('pagecontent.edit');


    Route::post('save-keywords', [FaqController::class, 'savekeywords'])->name('keywords.save');
    Route::post('custom-adds', [FaqController::class, 'saveCustomAdds'])->name('customadd.save');
    
    Route::get('category-delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
    
    Route::get('sub-category-delete/{id}', [CategoryController::class, 'deleteSubCategory'])->name('sub-category.delete');
    
    
    Route::get('sub-sub-category-delete/{id}', [CategoryController::class, 'deleteSubSubCategory'])->name('sub-sub-category.delete');
    
    
    Route::get('faq-delete/{id}', [FaqController::class, 'faqDelete'])->name('faq.delete');
    
    Route::get('page-delete/{id}', [FaqController::class, 'pageDelete'])->name('page.delete');
    
    Route::get('keyword-delete/{id}', [FaqController::class, 'keywordDelete'])->name('keyword.delete');
    
    Route::get('custom-add-delete/{id}', [FaqController::class, 'customAddDelete'])->name('custom-add-delete');
    
    
    Route::get('get-faq/{id}', [FaqController::class, 'pageContentDetails'])->name('faq.details');

    Route::get('get-faq-details/{id}', [FaqController::class, 'FaqDetails'])->name('faqs.details');

    
    
    Route::get('blogs/', [BlogController::class, 'index'])->name('blog.index');
    
    Route::get('blogs/add', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blogs/add', [BlogController::class, 'storeBlog'])->name('blog.store');
    
    Route::get('blogs/{id}', [BlogController::class, 'editBlog'])->name('blog.edit');
    Route::post('blogs/{id}', [BlogController::class, 'updateBlog'])->name('blog.update');
    
    
    Route::get('blogs/delete/{id}', [BlogController::class, 'deleteBlog'])->name('blog.delete');



    Route::get('news/', [BlogController::class, 'indexNews'])->name('news.index');
    Route::get('news/add', [BlogController::class, 'createNews'])->name('news.create');
     Route::post('news/add', [BlogController::class, 'storeNews'])->name('news.store');
    
    Route::get('news/{id}', [BlogController::class, 'editNews'])->name('news.edit');
    Route::post('news/{id}', [BlogController::class, 'updateNews'])->name('news.update');
    
    
    Route::get('news/delete/{id}', [BlogController::class, 'deleteNews'])->name('news.delete');
    
    
    
    // clients routes
    
    Route::get('clients/', [BlogController::class, 'clientsData'])->name('clients.index');
    Route::get('clients/add', [BlogController::class, 'createCleint'])->name('clients.create');
     Route::post('clients/add', [BlogController::class, 'storeCleint'])->name('clients.store');
    
    Route::get('clients/{id}', [BlogController::class, 'editClient'])->name('clients.edit');
    Route::post('clients/{id}', [BlogController::class, 'updateClient'])->name('clients.update');
    
    
    Route::get('clients/delete/{id}', [BlogController::class, 'deleteClient'])->name('clients.delete');


        // card routes
    Route::group(['prefix'=>'home-page-card' ], function(){
        Route::get('/', [HomeCardController::class , 'index' ])->name('card.index');
        Route::get('add', [HomeCardController::class , 'add' ])->name('card.add');
         Route::get('edit/{id}', [HomeCardController::class , 'edit' ])->name('card.edit');
         
         Route::post('add', [HomeCardController::class , 'store' ])->name('card.store');
         Route::post('edit/{id}', [HomeCardController::class , 'update' ])->name('card.update');
         
         Route::get('delete/{id}', [HomeCardController::class , 'delete' ])->name('card.delete');
    });

    Route::get('/home-page', [HomeCardController::class , 'homePage' ])->name('card.homepage');
    Route::post('/home-page', [HomeCardController::class , 'updateHomePage' ])->name('home.update');

    Route::get('/pages', [HomeCardController::class , 'pages' ])->name('home.pages');

    Route::get('/pages/create', [HomeCardController::class , 'CreatePage' ])->name('home.create');
    Route::post('/pages/create', [HomeCardController::class , 'CreatePageDynamic' ]);
    Route::get('/pages/{id}', [HomeCardController::class , 'PageEdit' ])->name('home.edit');



    
});
