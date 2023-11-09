<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdutoController extends Controller
{
    public function index(){
        $response = Http::get('http://localhost:8989/api/products');
        dd($response->json());
        $products = $response->json();

        return view('product.index', compact('products'));
    }
}
