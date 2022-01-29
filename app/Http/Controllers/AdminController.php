<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $joinData = DB::table('users')
            ->join('products','users.id','=','products.uid')
            ->get();
        return view('admin.index')->with('title', 'Admin Dashboard')->with('data', $joinData);
    }

    /**
     * Admin Login
     *
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'min:6|required',
        ]);
        $user = Admin::where('username',$request->input('username'))->get();
        if($user->isEmpty()){
            return redirect('/administration')->withErrors('Failure!! Not have an account || Create One');
        }else{
            if (Hash::check($request->input('password'), $user[0]['password'])) {
                $request->session()->put('adminUser', $request->input('username'));
                return redirect('/admin');
            }else{
                return redirect('/administration')->withErrors('Failure!! Incorrect password');
            }
        }
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(Request $request)
    {
        $request->session()->forget(['adminUser']);
        $request->session()->flush();
        return redirect('/administration')->with('success', 'Logout Successfully');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $joinData = DB::table('users')
            ->join('products','users.id','=','products.uid')
            ->where('products.uid', $id)->first();
        return view('admin.show')->with('title', 'View')->with('data', $joinData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Admin $admin
     * @return Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Admin $admin
     * @return Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Admin $admin
     * @return Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
