<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\About_us;
use App\Models\AboutUs;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Videos;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $videos = Videos::orderBy('date_added', 'desc')->paginate(5);
        $articles = Articles::orderBy('date_added', 'desc')->get()->take(10);
        $categories = Categories::all();
        return view('homepage',compact('videos','articles','categories'));
    }

    public function aboutUs(){

        $info = About::all();
        $sharingFormMessage = 'Сподели този сайт с твоята платформа...';

        return view('aboutUs',compact('sharingFormMessage'));
    }

    function sendMessage(Request $request){

        $method = $request->input('name');
        $method = $request->method();


        return $method;
    }
}
