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
                            <h4>Видео</h4>
                            <ul>
                                @foreach($videos as $video)

                                  <li class="element">
                                      <a href="video/{{$video['id']}}/{{$video['title']}}">
                                          <div class="elementTitleContainer">
                                              <p>{{$video['title']}}</p>
                                          </div>
                                          <div class="imageWrapper">
                                              <img src="images/videos/thumbnails/{{$video['thumbnail_video_uri']}}">
                                          </div>
                                          <div class="elementDateContainer">
                                              <p>{{$video['date_posted']}}</p>
                                          </div>
                                      </a>
                                  </li>
                                @endforeach
                            </ul>

                            @include('pagination.custom', ['paginator'=>$videos])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection