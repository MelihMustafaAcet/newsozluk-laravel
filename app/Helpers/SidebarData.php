<?php

use App\Models\categories;
use Illuminate\Support\Facades\DB;

function sidebardata(){
    $data['category'] = categories::all();
    $data['sidebar_post'] = DB::table('posts')
        ->select('*')
        ->join('categories', 'posts.category_id', '=', 'categories.id')
        ->where('posts.isActive', '=', 1)
        ->orderByDesc('posts.post_date')
        ->take(30)
        ->get();

    return $data;
}
