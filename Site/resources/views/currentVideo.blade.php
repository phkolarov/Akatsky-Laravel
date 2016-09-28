@extends('layouts.app')
@section('mainmenu')
    @include('partials.mainmenu')
@endsection
@section('logoBaner')
    @include('partials.logoBaner',['test'=>'nest'])
@endsection
@section('slider')
    @include('partials.slider')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-11 col-xs-offset-0 page-container">
            <div class="panel panel-default black-panel">
                <div class="panel-body">
                    <div class="row">
                        <div id="currentVideoWrapper">
                            <div class="col-md-8">
                                <div id="videoContent" >
                                    <h1>{{$currentVideoData['title']}}</h1>
                                    <a id="addToFavorites" onclick="addRemoveFavorite({{$currentVideoData['id']}},'videos')"> <span>добави в любими </span><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <iframe style="width: 100%;height: 100%;  min-height: 450px"
                                            frameborder="0" allowfullscreen
                                            src="https://www.youtube.com/embed/{{$currentVideoData['content_video_uri']}}}">
                                    </iframe>
                                    <p id="videoTextContent">{{$currentVideoData['content']}}</p>

                                    <p class="postInfo">By <span> {{$currentVideoData['posted_by']}}</span> | <span>{{$currentVideoData['date_added']}}</span></p>
                                </div>
                                <div id="sharingContainer">
                                    @include('partials.sharingForm',['sharingFormMessage'=>$sharingFormMessage])
                                </div>
                                <div id="relatedPostsContainer">
                                    @include('partials.relatedPosts',['relatedPosts'=>$relatedPosts])
                                </div>
                            </div>

                            <div id="sideBar" class="col-md-3">
                                @include('partials.categories', ['categories' => $categories])
                                @include('partials.latestArticles', ['articles' => $articles])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/related-posts.js') }}"></script>
    <script src="{{ asset('js/favorites-public.js') }}"></script>
    <script>
        checkForFavorite({{$currentVideoData['id']}},'videos');
    </script>
@stop