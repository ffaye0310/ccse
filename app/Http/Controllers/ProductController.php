<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $product ;
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createProduct($name,$price,$img,$desc)
    {
        //
        $this->product = new Product([
            'name' => 'product test',
            'price' => 5000,
            'img' =>  "",
            'desc' => "Desc",
            "cat_id" => 5
        ]);
        if ($this->product->save()) {

            echo "Product successfully saved" ;

        } else {
            echo "Error" ;    
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->product = new Product([
            'name' => 'product test',
            'price' => 5000,
            'img' =>  file(url()->to('assets/img/img.png')),
            'desc' => "Desc"
        ]);
        $this->product->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // return response(["data"=>Product::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteProduct(string $name)
    {
        //
        $cats =  Product::all();
        $cat = $cats->where("name","=",$name);
        if($cat[0]->delete()){
            echo "Product successfully deleted";
        }else{
            echo "Error...";
        };

    }
}
