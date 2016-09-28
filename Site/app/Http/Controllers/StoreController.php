<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 8/30/2016
 * Time: 10:44 PM
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        var_dump(1);
        return view('home');
    }
}