<?php $active = 'terms'; ?>
@extends('statics_page')

@section('content')
    <div class="aboutwrap"> <h2 class="aboutwrap_title">{{$title}}</h2>{!!html_entity_decode($docValue)!!}</div>
@endsection