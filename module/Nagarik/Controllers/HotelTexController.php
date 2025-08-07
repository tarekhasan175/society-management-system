<?php

namespace Module\Nagarik\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;



class HotelTexController extends Controller
{
//hotel-tex

    public function __construct()
    {

    }


    public function index()
    {
        return view('Hotel-Tex.index');

    }


    public  function dashboard()
    {
        return view('Hotel-Tex.hotel-dashboard');
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }






    public function show($id)
    {

    }


    public function edit(Request $request)
    {
        //
    }


    public function update(Request $request)
    {
        //
    }


    public function destroy($id)
    {

    }



    public function getFactoryData(Request $request)
    {

    }


}
