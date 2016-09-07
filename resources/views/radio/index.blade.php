@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Radio</div>

    <div class="">
        <iframe class="panel-body col-md-12" style="padding: 0px; height: 750px;" src="https://192.168.124.12/Showbuilder"></iframe>
       {{-- <audio controls>
            <source src="http://127.0.0.1:8000/kaotisk" type="audio/ogg">
            Your browser does not support the audio element.
        </audio>--}}
    </div>
</div>
@endsection