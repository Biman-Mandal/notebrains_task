<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductController extends Controller
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
                ->where('products.uid', Session::get('profile.id'))
                ->get();
        return view('product.index')->with('title', 'Products')->with('data', $joinData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('product.create')->with('title','Insert Product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        if (! $request->isMethod('post')) {
            return redirect('/products/create');
        }else {
            $data  = $request->all();
            if ($request->file('product_image')->isValid()) {
                $file = $request->file('product_image');
                $name = time() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $data['product_image'] = $name;
                if ($file->move('stored_images'.'/', $name)){
                    $obj = new Product($data);
                    if ($obj->save()){
                        return redirect('/products')->with('success','Success !! Product Inserted');
                    }else{
                        return redirect('/products/create')->with('failure','Error in data save, Please try again after sometime');
                    }
                }else{
                    return redirect('/products/create')->with('failure','Error in data save..');
                }
            }else{
                return redirect('/products/create')->with('failure', 'Image Error !! Please choose different image');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('product.show')->with('title', 'View Product')->with('data', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('product.edit')->with('title', 'edit')->with('data', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if ($request->isMethod('PUT')) {
            $product = Product::where('id', $id)->first();
            $product->product_name = $request->input('product_name');
            $product->product_type = $request->input('product_type');
            $product->product_price = $request->input('product_price');
            $product->product_bio = $request->input('product_bio');
            if ($product->save()) {
                return redirect('/products')->with('success', 'Success !! Data Updated');
            } else {
                return redirect()->back()->with('failure', 'Error !!!');
            }
        }else {
            return redirect()->back()->with('failure', 'Error !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return redirect('/products')->with('success', 'Deleted Successfully');
    }
    public function logout(Request $request)
    {
        $request->session()->forget(['login', 'Is_login']);
        $request->session()->flush();
        return redirect('/user')->with('success', 'Logout Successfully');
    }
}
