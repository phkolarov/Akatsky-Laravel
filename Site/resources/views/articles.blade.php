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
        <div class="col-md-11 col-xs-12 col-xs-offset-0 page-container">
            <div class="panel panel-default black-panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="middleElementsPosition">
                            <div class="row">
                                <div class="col-md-8">
                                    @include('partials.searchbar')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="filters" class="col-md-2">
                            <h4>Категории</h4>
                            @include('partials.filters',['filters'=> $categories])

                            <h5>ПОСЛЕДНИ ТЕМИ ВЪВ ФОРУМА</h5>
                        </div>
                        <div id="allElementsWrapper" class="col-md-9">
                            <h4>Статии</h4>
                            <ul>
                                @foreach($articles as $article)

                                    <li class="element">
                                        <a href="article/{{$article['id']}}/{{$article['title']}}">
                                            <div class="elementTitleContainer">
                                                <p>{{$article['title']}}</p>
                                            </div>
                                            <div class="imageWrapper">
                                                <img src="images/articles/thumbnails/{{$article['thumbnail_article_uri']}}">
                                            </div>
                                            <div class="elementDateContainer">
                                                <p>{{$article['date_posted']}}</p>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            @include('pagination.custom', ['paginator'=>$articles])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection