@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('/css/category/mix.css')) }}" media="all,handheld"/>
@stop

@extends('app')

@section('content')
<?php
/*
$cat = [
    'automotive',
    'baby',
    'books',
    'clothing',
    'computers',
    'department',
    'electronics',
    'entertainment',
    'finance',
    'grocery',
    'games',
    'flowers',
    'health',
    'internet',
    'home',
    //'it_service',
    'jewelry',
    'office',
    'pet',
    'photography',
    'education',
    'services',
    'sports',
    'telecommunications',
    'travel'
];
*/
?>
    <div class="category-all">
        <div class="cat-all-title">
            <h1>All category get coupons, deals</h1>
        </div>
        <div class="cat-all-show">
            <div class="wrap-cat-i">
                @foreach($cats as $c)
                    <div class="cat-show-i">
                        <a href="{{ url('/category/'.$c->alias) }}" title="{{ $c->name }} category detail show all stores deals, coupons">
                            <i class="c-i {{ $c->icon }}">
                                {{-- $c --}}
                            </i>
                        </a>
                    </div>
                @endforeach
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="cat-content">
        <div class="cat-box-item">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}" title="Home {{ $_SERVER['HTTP_HOST'] }}">Home</a></li>
                <li><a href="{{ url('/category') }}">All Categories</a></li>
                <li class="active">{{ $cat->name }}</li>
            </ul>

            <div class="cat-item-title">
                <div>
                    <strong title="{{ $cat->name }} categories">
                    <h3 class="c-title"><i class="{{ $cat->icon }}"></i> {{ $cat->name }}</h3>
                    </strong>
                </div>
            </div>
            <div class="cat-list-item" id="cat-list">
                @foreach($stores as $s)
                    @include('elements.cat-store-item')
                @endforeach
            </div>
            <div class="clear"></div>
            <div class="cat-show-more btn btn-default" id="show-more" data-url="{{ url('/category/'.$cat->alias) }}">
                <strong>SHOW MORE...</strong>
            </div>
        </div>
    </div>

@stop

@section('scriptMix')
    @parent
    <script src="{{ asset(mix('/js/category/mix-footer.js')) }}"></script>
@stop