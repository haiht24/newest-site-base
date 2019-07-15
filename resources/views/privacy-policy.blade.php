<?php $active = 'privacy_policy'; ?>
@extends('statics_page')

@section('content')
    <div class="aboutwrap"> <h2 class="aboutwrap_title">{{$title}}</h2> <h5>Privacy Statement</h5>{!!html_entity_decode($docValue)!!}</div>
@endsection