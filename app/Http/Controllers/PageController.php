<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
   
    public function home(Request $request)
    {
        $query = Product::query();
    
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
    
        if ($request->filled('order')) {
            if ($request->order == 'asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->order == 'desc') {
                $query->orderBy('price', 'desc');
            }
        }
        
        $products = $query->get();

        return view('home', compact('products'));
    }

    public function details($id, Request $request)
    {    
        $product = Product::findOrFail($id);
    
        $category = $request->query('category');
        $order    = $request->query('order');
        
        return view('details', compact('product', 'category', 'order'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function offers()
    {
        return view('offers');
    }
}
