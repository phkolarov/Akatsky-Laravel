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

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    {{--<script src="{{ asset('js/related-posts.js') }}"></script>--}}

@stop