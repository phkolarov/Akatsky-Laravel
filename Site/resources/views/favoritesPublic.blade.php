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
                        <div id="favoritesPublicWrapper">
                            <div class="col-md-12">
                                <h3>Любими</h3>

                                <div id="publicFavoriteVideosWrapper">
                                    <div id="pubFavVideoHeading" class="col-md-12 pubFavHeading">

                                        <h4>Моите любими видеа - <span id="videoCount">нямате добавени видеа</span></h4>
                                    </div>
                                    <ul id="publicFavVideoWrapper" class="publicFavElementsWrapper">



                                    </ul>
                                </div>
                                <div id="publicFavoriteArticlesWrapper">
                                    <div id="pubFavArticleHeading" class="col-md-12 pubFavHeading">

                                        <h4>Моите любими статии - <span id="articleCount">нямате добавени статии</span></h4>
                                    </div>
                                    <ul id="publicFavArticleWrapper" class="publicFavElementsWrapper">

                                    </ul>
                                </div>
                            </div>

                            {{--<div id="sideBar" class="col-md-3">--}}
                                {{--@include('partials.categories', ['categories' => $categories])--}}
                                {{--@include('partials.latestArticles', ['articles' => $articles])--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/favorites-public.js') }}"></script>

    <script>
        loadFavoriteVideos();
        loadFavoriteArticles();
        showHideFavoritePublicCategories();
    </script>
@stop