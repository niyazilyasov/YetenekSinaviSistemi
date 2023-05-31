<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditProfileRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use DataTables;
use GrahamCampbell\ResultType\Success;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,ConfirmsPasswords;
    public function index()
    {
        return view('admin.user.index');
    }
    public function editProfile()
    {
        $user=auth()->user();
        return view('admin.user.edit_profile',compact(['user']));
    }
    public function edit(User $user)
    {

        return view('admin.user.edit',compact(['user']));
    }
    public function updateProfile(UserEditProfileRequest $request)
    {


        $user=auth()->user();
        $values=$request->except(['id','image_url','password']);
        $user->update($values);
        if($request->password)
        {
            $user->password = Hash::make($request->password);
            $user->password_changed_at=Date::now();
        }
        $oldImage=$user->image_url;
        if(isset($values['file_name'])) {
            $name = $this->saveImage($request);
            $user->image_url = $name;
        }
        $user->save();
        if($user->image_url !=$oldImage)
            $this->removeImage($oldImage);
        return back()->with('success', 'Değişikleriniz başarıyla tamamlandı.');


    }
    public function update(UserEditRequest $request)
    {


        $user=User::findOrFail($request->id);
        $values=$request->except(['id','image_url','password']);
        $user->update($values);
        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }
        $oldImage=$user->image_url;
        if(isset($values['file_name'])) {
            $name = $this->saveImage($request);
            $user->image_url = $name;
        }
        $user->save();
        if($user->image_url !=$oldImage)
            $this->removeImage($oldImage);
        return back()->with('success', 'Değişikleriniz başarıyla tamamlandı.');


    }
    public function create(){
        return view('admin.user.create');

    }
    public function store(UserCreateRequest $request){
        $values=$request->except(['id','image_url','password']);
        $user=User::make($values);
        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }
        if(isset($values['file_name'])) {
            $name = $this->saveImage($request);
            $user->image_url = $name;
        }
        $user->save();
       return back()->with('success', 'Başarıyla eklendi.');


    }
    public function show(User $user){

        return view('admin.user.show',compact('user'));
    }
    public function delete(User $user){

        return response($user->delete());
    }
    public function get_data(){
        return Datatables::of(User::query()->select(['id','name','email','ad','soyad','telefon','tc_numarasi','is_super_admin','image_url']))->make();
    }

    /**
     * @param \Request $request
     * @return string
     */
    public function saveImage( $request)
    {
        $originalImage = $request->file('file_name');
        $thumbnailImage = Image::make($originalImage);
        list($thumbnailPath, $originalPath) = $this->getPaths();
        $thumbnailImage->resize(640, 480);
        $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
        $thumbnailImage->resize(128, 128);
        $thumbnailImage->save($thumbnailPath . time() . $originalImage->getClientOriginalName());
        return time().$originalImage->getClientOriginalName();
    }
    public function removeImage( $image_url)
    {
        list($thumbnailPath, $originalPath) = $this->getPaths();
        if (file_exists($thumbnailPath.$image_url)) {
            unlink($thumbnailPath.$image_url);
        }
        if (file_exists($originalPath.$image_url)) {
            unlink($originalPath.$image_url);
        }
    }

    /**
     * @return string[]
     */
    public function getPaths(): array
    {
        $thumbnailPath = \Storage::path('public\\thumbnail\\');
        $originalPath = \Storage::path('public\\images\\');
        if (!file_exists($originalPath)) {
            mkdir($originalPath, 0777, true);
        }
        if (!file_exists($thumbnailPath)) {
            mkdir($thumbnailPath, 0777, true);
        }
        return array($thumbnailPath, $originalPath);
    }

}
