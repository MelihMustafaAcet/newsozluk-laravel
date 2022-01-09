<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class DefaultController extends Controller
{

    public function index()
    {
        $data = sidebardata();
        $data['feature'] = DB::table('categories')
            ->select('*')
            ->where('isFeature', '=', '1')
            ->take(6)
            ->get();
        //$data['posts'] = post::all()->take(6)->sortByDesc('id');
        $data['posts'] = DB::table('posts')
            ->select('*')
            ->join('users', 'users.id', '=', 'posts.creator_id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.isActive', '=', 1)
            ->orderByDesc('posts.post_date')
            ->take(6)
            ->get();
        $today = Carbon::parse(now());
        $data['today'] = $today->format('d-m-Y');

        return view('frontend.index', compact('data'));
    }

    public function scotty(){
        $data = sidebardata();
        return view('frontend.scotty',compact('data'));

    }

    public function emptypage()
    {
        $data = sidebardata();
        return view('frontend.emptypage',compact('data'));
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function loginAttempt(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            if(!Auth::user()->name && !Auth::user()->city && !Auth::user()->bio){
                alert()->error('İlk defa giriş yapıyorsunuz gibi görünüyor.','Lütfen bilgilerinizi güncelleyin');
                return redirect()->intended(route('profile'));
            }
            return redirect()->intended(route('frontend.home'))->with('success', 'Giriş yaptınız.');
        } else {
            return redirect()->route('login')->with('error', 'Bilgilerinizi kontrol edin.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('frontend.home'))->with('success', 'Başarıyla çıkış yaptınız');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function registerInsert(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|Min:6',
            'repassword' => 'same:password|Min:6',
            'tos' => 'required',
        ]);
        $user = User::insert(
            [
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]
        );
        if ($user) {
            return redirect(route('login'))->with('success', 'Başarıyla kayıt oldunuz. Artık giriş yapmaya hazırsınız.');
        } else {
            return back()->with('error', 'Bir hata oluştu');
        }
    }

}
