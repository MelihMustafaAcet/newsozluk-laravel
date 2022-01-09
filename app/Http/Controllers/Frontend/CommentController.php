<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\comments;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'editordata' => 'required|min:3'
        ]);

        $insert = comments::insert([
            'created_at' => now(),
            'comment_creator_id' => $request->id,
            'belongs' => $request->belongs,
            'comment_detail' => $request->editordata
        ]);

        if($insert){
            alert()->success('Başarılı','Yorumunuz başarıyla eklendi');
            return back();
        }else{
            alert()->error('Oops','Bir şeyler ters gitti');
            return back();
        }

    }
}
