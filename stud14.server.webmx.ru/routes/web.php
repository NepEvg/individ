<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get ('/', [MainController::class, "acMain"]);

Route::get ('/main', [MainController::class, "acMain"]);

Route::get ('/blog', [MainController::class, "acBlog"]);

Route::get ('/assidents', [MainController::class, "acAssidents"]);

Route::get ('/world', [MainController::class, "acWorld"]);

Route::get ('/world/economy', [MainController::class, "acWorldEconomy"]);

Route::get ('/world/politics', [MainController::class, "acWorldPolitics"]);

Route::get ('/culture', [MainController::class, "acCulture"]);

Route::get ('/culture/science', [MainController::class, "acCultureScience"]);

Route::get ('/culture/sport', [MainController::class, "acCultureSport"]);

Route::get ('/culture/tourism', [MainController::class, "acCultureTourism"]);

Route::get ('/culture/religion', [MainController::class, "acCultureReligion"]);


Route::get ('/console', [AdminController::class, "acConsole"]);

Route::get ('/console/update/{id}', [AdminController::class, "acConsoleFormUpdate"]);

Route::post ('/console/add', [AdminController::class, "acConsoleFormAdd"]);

Route::post ('/console/addpage', [AdminController::class, "acAddPage"]);

Route::post ('/console/addchapter', [AdminController::class, "acAddChapter"]);

Route::post ('/admin/modification',  [AdminController::class, "acDataModification"]);

Route::post ('/admin/modificationpage',  [AdminController::class, "acModification"]);

Route::get ('/admin/delete/{id}',  [AdminController::class, "acDataDelete"]);


Route::get ('/{newpage}/{newchapter}', [MainController::class, "acNewPageChapter"]);

Route::get ('/{newpage}', [MainController::class, "acNewPage"]);