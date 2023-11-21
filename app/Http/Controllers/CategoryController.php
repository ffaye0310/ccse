<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    private $category ; 
    // public function __construct() {
    //     $this->category = new Category();
    // }
    public function index()
    {
        //
        return response(["data" => Category::all()]);
    }
    public function createCategory($name)  {

        $this->category = new Category([
            "cname" => $name,
            "parent_cat" => 1
        ]);

        if ($this->category->save()) {
            echo "Category successfully created";
        } else {
            echo "Error...";
        };
    }

    public function deleteCategory($name){

        $cats =  Category::all();
        $cat = $cats->where("cname","=",$name);
        if($cat[0]->delete()){
            echo "Category successfully deleted";
        }else{
            echo "Error...";
        };

    }
}
