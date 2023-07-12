<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryProductsController extends Controller
{
    public function index(Category $category){
        return $category->products()->cursorPaginate(1);
    }
}
