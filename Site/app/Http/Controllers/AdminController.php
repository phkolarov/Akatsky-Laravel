<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 22.7.2016 г.
 * Time: 15:34 ч.
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;



class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
}