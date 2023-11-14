<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function page(Request $request)
    {
        if ($request->routeIs("home.page")) {
            $products = DB::table("products")->orderBy("id", "desc")->get();
            return view("products.home", ["products" => $products]);
        } else if ($request->routeIs("create.page")) {
            return view("products.create");
        } else if ($request->routeIs("update.page")) {
            $product = Product::where("id", $request->id)->first();
            return view("products.update", ["product" => $product]);
        }
    }

    public function create(Request $request)
    {
        $payload = $request->validate([
            "name" => ["required", "string"],
            "quantity" => ["required", "integer"],
            "price" => "required|numeric"
        ]);

        Product::create($payload);
        return redirect(route("home.page"))->with("success", "New product added.");

    }

    public function update(Request $request)
    {
        $payload = $request->validate([
            "name" => ["required", "string"],
            "quantity" => ["required", "integer"],
            "price" => "required|numeric"
        ]);

        Product::where('id', $request->id)->update($payload);
        return redirect(route("home.page"))->with("success", "Product updated successfully.");
    }

    public function delete(Request $request)
    {
        Product::where("id", $request->id)->delete();
        return redirect(route("home.page"))->with("success", "Product deleted successfully.");
    }
}
