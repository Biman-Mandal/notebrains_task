<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserValidation;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('user.login')->with('title', 'example-app');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('user.create')->with('title', 'User Sign-Up');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(StoreUserValidation $request)
    {
        if (! $request->isMethod('post')) {
            return redirect('user/create');
        }else{
            $obj = new User($request->input());
            if ($obj->save()){
                return redirect('/user')->with('success','Success, Data Inserted');
            }else{
                return redirect('/user/create')->with('failure','Failure!! Please try after sometime');
            }
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'min:6|required',
        ]);
        $user = User::where('email',$request->input('email'))->get();
        if($user->isEmpty()){
            return redirect('/user')->withErrors('Failure!! Not have an account || Create One');
        }else{
            if (Hash::check($request->input('password'), $user[0]['password'])) {
            $request->session()->put('profile', $user[0]);
            $request->session()->put('login','Is_login');
            return redirect('/products');
            }else{
                return redirect('/user')->withErrors('Failure!! Incorrect password');
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
