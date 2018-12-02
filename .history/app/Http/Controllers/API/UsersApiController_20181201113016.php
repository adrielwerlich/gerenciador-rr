<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Documento;
use App\Models\Endereco;
use Auth;

class UsersApiController extends Controller
{


    public function __construct()
    {
        // $this->middleware(function ($request, $next) {

        //     $this->user = Auth::user();

        //     return $next($request);
        // });
            $this->middleware('auth:api');
            //$this->authorize('isAdmin');//only admin has access to the functions here

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $manchetes = Manchete::all();
        // $manchetes->load('TemaDaManchete');

        // $users = User::all();
        // $users->load('Endereco');
        // dd($users);
        $usersD = User::with('enderecos','documentos')->get();
        dd($usersD);
        // $users = User::all()->load('documentos');
        // $users = User::all()->load('Endereco');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the authenticated user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return auth('api')->user(); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();  

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|required|min:6'
        ]);

        $currentPhoto = $user->photo;

        if($request->photo != $currentPhoto){
            $slashIndex = strpos($request->photo, '/');
            $semicolonIndex = strpos($request->photo, ';');

            $extension = substr($request->photo, $slashIndex+1, ($semicolonIndex - $slashIndex)-1);
            // dd($extension);
            $name = time().'.'.$extension;
            // dd($name);

            $res = \Image::make($request->photo)->save(public_path('img/profile/').$name);
            // $request['photo'] = $name;
            $request->merge(['photo' => $name]);
            // dd('only request', $request, '[REQUEST PHOTO]', $request['photo']);

            $oldPhotoFullPath = public_path('img/profile/').$currentPhoto;
            if (file_exists($oldPhotoFullPath))
                @unlink($oldPhotoFullPath);
        }

        if (!empty($request['password'])){
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        $currentPassword = $user->password;

        // if ($currentPassword != $request->password){
        //     $user->password = Hash::make($request->password);
        // }

        $res = $user->update($request->all());

        return ['message', 'profile updated', $res];
    }

    public function currentUserProfile()
    {
        
        return  auth('api')->user();  
        // dd('some',$user);
        //  echo 'algo';
    }

}
