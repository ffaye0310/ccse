<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $product ;
    
    public function index()
    {
        //
        $products =DB::table('product')
        ->join('category', 'product.cat_id', '=', 'category.cid')->get();
        return response(["data"=>$products]);
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
            'name' => $request->name,
            'price' => floatval($request->price),
            'img' =>  $request->file('img'),
            'description' => $request->desc,
            "cat_id" => intval($request->cat)
        ]);

        if ($this->product->save()){
            $message = "success";
        } else {
            $message = "error" ;
        }
        
        return response(["message" => $message]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product =DB::table('product')
        ->join('category', 'product.cat_id', '=', 'category.cid')
        ->where('product.id','=',$id)->get();
        return response(["data"=>$product[0]]); 
       
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
        // dd($request->input('name'));
        $this->product = Product::find($id);
        $this->product->name = $request->name ;
        $this->product->price = floatval($request->price);
        $this->product->img = $request->file('img');
        $this->product->cat_id = intval($request->cat);
        $this->product->description = $request->desc;


        // $this->product->update();
        if ($this->product->update()){
            $message = "success";
        } else {
            $message = "error" ;
        }
        
        return response(["message" => $message]);

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
    public function destroy(string $id)
    {
        //
        $this->product =  Product::find($id);
        if($this->product->delete()){
            $message = "success";
        }else{
            $message = "error" ;
        };
        return response(["message" => $message]);

    }
}
