<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 8/30/2016
 * Time: 10:44 PM
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
    }

    public  function  index(){

        $categories = Categories::all()->toArray();
        $articles = Articles::orderBy('date_added', 'desc')->paginate(9);

        return view('articles',compact('articles','categories'));
    }

    public function currentArticle($id, $title){

        $sharingFormMessage = 'Сподели тази история с твоята платформа...';

        $article = Articles::first()->where('id',$id)->get()->toArray();

        $articles = Articles::orderBy('date_added', 'desc')->get()->take(10);
        $categories = Categories::all();
        $relatedPosts = Articles::orderBy('date_added', 'desc')->paginate(6);

        $currentArticleData = $article[0];
        return view('currentArticle',compact('currentArticleData','articles','categories','relatedPosts','sharingFormMessage'));
    }

    public function filtered($filter){

        $currentCategory = Categories::find(1)->where('nameEn',$filter)->first();
        $categories = Categories::all()->toArray();

        $articles = $currentCategory->articles()->orderBy('date_posted', 'desc')->paginate(9);

        return view('videos',compact('articles','categories'));
    }

}