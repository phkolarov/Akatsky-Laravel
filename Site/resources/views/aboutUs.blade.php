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

                             <div class="row">
                                 <div class="col-md-6" id="contanctFormWrapper">
                                     <h2>Контактна форма</h2>
                                     {!! Form::open(array('url' => '/sendMessage','id'=>'contactForm')) !!}
                                     <div class="form-group">
                                         {!! Form::label('name',null) !!}
                                         {!! Form::text('name',null,['class'=>'form-control']) !!}

                                     </div>
                                     <div class="form-group">
                                         {!! Form::label('email') !!}
                                         {!! Form::text('email', null,['class'=>'form-control']) !!}
                                     </div>
                                     <div class="form-group">
                                         {!! Form::label('contentMessage','Content Message') !!}
                                         {!! Form::textarea('contentMessage' ,null,['class'=>'form-control']) !!}

                                     </div>
                                     <div class="form-group">

                                         {!! Form::submit('Изпрати',['class'=>'btn btn-medium btn-danger']) !!}

                                     </div>
                                     {!! Form::close() !!}
                                 </div>
                                <div class="col-md-5">
                                    <div class="fb-page" data-href="https://www.facebook.com/Akatsky.Racing.Team" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Akatsky.Racing.Team" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Akatsky.Racing.Team">Akatsky Racing</a></blockquote></div>
                                </div>
                             </div>
                                <div class="row">
                                   <div class="col-md-12">
                                       <div id="sharingContainer">
                                           @include('partials.sharingForm',['sharingFormMessage'=>$sharingFormMessage])
                                       </div>
                                   </div>
                                </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('javascript')
    <script src="{{ asset('js/fb-app.js') }}"></script>
@stop
@endsection
