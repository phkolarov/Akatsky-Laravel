<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 9/27/2016
 * Time: 10:07 PM
 */

namespace App\Http\Controllers;


class SearchController extends Controller
{

    public function __construct()
    {
    }


    function searchPage(){

        return view('search');

    }
}