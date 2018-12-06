<?php

namespace Danny\Http\Controllers;

use Illuminate\Http\Request;

class DannyController extends Controller
{
    function index(Request $request){
        return $request->get("name","No Name Created");
    }
}
