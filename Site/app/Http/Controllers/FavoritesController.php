<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 9/22/2016
 * Time: 4:36 PM
 */

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;

class FavoritesController extends  Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    function index(){


        return view('favoritesPublic');
    }

    function authenticated(){



        return view('authenticatedFavorites');
    }

    function getPublicFavoriteVideos(Request $request)
    {


        $videoIds = $request->input('videos');
        $videoObjects = array();

        foreach ($videoIds as $videoId) {


            $videoObject = Videos::first()->where('id', $videoId)->get()->toArray();

            array_push($videoObjects, (object)$videoObject[0]);

        }

        return response()->json($videoObjects);
    }

    function getPublicFavoriteArticles(Request $request){


        $articleIds= $request->input('articles');
        $articleObjects = array();

        foreach($articleIds as $articleId){


            $articleObject = Articles::first()->where('id',$articleId)->get()->toArray();

            array_push($articleObjects,(object)$articleObject[0]);

        }

        return response()->json($articleObjects);

    }
}