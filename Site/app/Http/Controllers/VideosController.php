<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 8/30/2016
 * Time: 10:43 PM
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class VideosController extends  Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $categories = Categories::all()->toArray();
        $videos = Videos::orderBy('date_added', 'desc')->paginate(9);

        return view('videos',compact('videos','categories'));
    }

    public function currentVideo($id, $title){

        $sharingFormMessage = 'Сподели тази история с твоята платформа...';
        $video = Videos::first()->where('id',$id)->get()->toArray();

        $articles = Articles::orderBy('date_added', 'desc')->get()->take(10);
        $categories = Categories::all();
        $relatedPosts = Videos::orderBy('date_added', 'desc')->paginate(6);

        $currentVideoData = $video[0];
        return view('currentVideo',compact('currentVideoData','articles','categories','relatedPosts','sharingFormMessage'));
    }

    public function filtered($filter){

        $currentCategory = Categories::find(1)->where('nameEn',$filter)->first();
        $categories = Categories::all()->toArray();

        $videos = $currentCategory->videos()->orderBy('date_posted', 'desc')->paginate(9);

        return view('videos',compact('videos','categories'));
    }















}