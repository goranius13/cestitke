<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //

    public function getCategoryImages($categoryId)
    {
        return DB::table('images')->where('category_id', $categoryId)->pluck('image_id');
    }
}
