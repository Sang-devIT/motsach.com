<?php

namespace App\Http\Controllers\source;
use Illuminate\Support\Facades\DB;
use App\Models\TableProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllController extends Controller
{
    public function menu()
    {
        $category= DB::table('table_categories')->get();
        dd($category);
        return view('layouts.pages.menu',compact('category'));
    }
}
