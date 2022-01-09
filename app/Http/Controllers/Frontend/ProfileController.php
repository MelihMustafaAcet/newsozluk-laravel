<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        $data = sidebardata();
        $user = User::find(Auth::id());
        return view('frontend.profile', compact('data'))->with('user', $user);
    }

    public function update(ProfileUpdateRequest $request)
    {
        if (Auth::id() == $request->id) {
            if($request->hasFile('avatar')){
                $image=$request->file('avatar');
                $imageName = time(). '.'.$image->extension();

                $user = User::find(Auth::id());
                $user->name = $request->name;
                $user->city = $request->sehir;
                $user->bio = $request->editor;
                $user->user_image = $imageName;


                if ($user->save()) {
                    $image->move('../images/users',$imageName);
                    $oldImage = '../images/users/' . $request->oldImage;
                    if(file_exists($oldImage)){
                        unlink($oldImage);
                    }

                    alert()->success('Başarılı', 'Profilinizi başarıyla güncellediniz.');
                    return back();
                } else {
                    alert()->error('Oops', 'Bir şeyler ters gitti');
                    return back();
                }
            } else {

                $user = User::find(Auth::id());
                $user->name = $request->name;
                $user->city = $request->sehir;
                $user->bio = $request->editor;
                if ($user->save()) {

                    alert()->success('Başarılı', 'Profilinizi başarıyla güncellediniz.');
                    return back();
                } else {
                    alert()->error('Oops', 'Bir şeyler ters gitti');
                    return back();
                }

            }

        } else {
            alert()->error('Oops', 'Bir şeyler ters gitti');
            return back();
        }
    }
}
