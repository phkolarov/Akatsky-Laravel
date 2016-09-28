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

                            <div id="latestPostsWrapper" class="col-md-8">

                                @if(count($videos) > 0)
                                    <ul>
                                        @foreach($videos as $video)
                                            <li >
                                                <a href="video/{{$video['id']}}/{{$video['title']}}">
                                                    <h2>{{$video['title']}}</h2>

                                                    <div class="presentationWrapper">
                                                        @if(isset($video['content_video_uri']))

                                                            <iframe style="width: 100%;height: 100%;  min-height: 280px"
                                                                    frameborder="0" allowfullscreen
                                                                    src="https://www.youtube.com/embed/{{$video['content_video_uri']}}}">

                                                            </iframe>

                                                        @else
                                                            <p>{{$video['content_image_uri']}}</p>

                                                        @endif
                                                    </div>

                                                    {{--{{$video['title']}}--}}
                                                    <p class="postDescription">{{$video['description']}}</p>
                                                    <p class="postInfo">By {{$video['posted_by']}} | {{$video['date_added']}}</p>

                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                @include('pagination.custom', ['paginator'=>$videos])
                                  {{--<div class="test">--}}

                                      {{--{!! $videos->links() !!}--}}
                                  {{--</div>--}}
                                @endif


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
@endsection
