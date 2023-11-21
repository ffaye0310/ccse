<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('category:create {name}', function ($name) {
    $cat = new CategoryController();
    $cat->createCategory($name);
})->purpose('Create new category entry');
 
Artisan::command('category:delete {name}', function ($name) { 
    $cat = new CategoryController();
    $cat->deleteCategory($name);
})->purpose('Delete  a category');