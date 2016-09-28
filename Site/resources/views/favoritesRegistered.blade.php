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
                            <div class="col-md-12">
                                <h1>Любими</h1>

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
