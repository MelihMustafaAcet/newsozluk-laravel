<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function insert(Request $request){
        $request->validate([
            'title' => 'required|min:15|max:90',
            'category' => 'required',
            'editordata' => 'required|min:50',
            'image' => 'required|file|max:3072|mimes:jpg,png,jpeg|',
        ]);

        $image=$request->file('image');
        $imageName = time(). '.'.$image->extension();


        $post = post::insert([
            'post_date' => now(),
            'uuid' => rand(100000000,999999999),
            'category_id' => $request->category,
            'creator_id' => Auth::id(),
            'post_title' => $request->title,
            'post_detail' => $request->editordata,
            'post_image' => $imageName,
            'seo_slug' => Str::slug($request->title),
        ]);
        if($post){
            $image->move(public_path('images'),$imageName);

            return redirect(route('frontend.home'))->with('success','Başarıyla gönderiyi oluşturdunuz');
        }else{
            return back()->with('error','Sorun oluştu. Lütfen tekrar deneyin');
        }
    }

    public function details($category, $slug,$uuid){
        $data = sidebardata();
        $detail = DB::table('posts')
            ->select('*')
            ->join('categories','posts.category_id','=','categories.id')
            ->join('users','posts.creator_id','=','users.id')
            ->where('uuid',$uuid)
            ->first();
        $data['posts'] = DB::table('posts')
            ->select('*')
            ->join('users','users.id','=','posts.creator_id')
            ->join('categories','posts.category_id','=','categories.id')
            ->where('posts.isActive','=',1)
            ->orderByDesc('posts.post_date')
            ->take(6)
            ->get();

        $today = Carbon::parse(now());
        $data['today'] = $today->format('d-m-Y');
        $data['comments'] = DB::table('comments')
            ->select('comments.id','comments.created_at','comments.comment_detail','users.username','users.user_image','users.city')
            ->join('posts','posts.uuid','=','comments.belongs')
            ->join('users','users.id','=','comments.comment_creator_id')
            ->orderByDesc('comments.created_at')
            ->where('comments.belongs','=',$uuid)
            ->paginate(10);

        return view('frontend.postdetail',compact('data'))->with('detail',$detail);

    }

    /**
     * @param $category
     */
    public function categories($category) {
        $data = sidebardata();
        $data['posts'] = DB::table('posts')
            ->select('*')
            ->join('users', 'users.id', '=', 'posts.creator_id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.isActive', '=', 1)
            ->where('categories.category_slug', '=',$category)
            ->orderByDesc('posts.post_date')
            ->get();
        $data['feature'] = DB::table('categories')
            ->select('*')
            ->where('isFeature', '=', '1')
            ->take(6)
            ->get();

        $today = Carbon::parse(now());
        $data['today'] = $today->format('d-m-Y');

        return view('frontend.index', compact('data'));

    }
}
