@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('/css/category/mix.css')) }}" media="all,handheld"/>
@stop

@extends('app')

@section('content')
<?php
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
?>
    <div class="category-all">
        <div class="cat-all-title">
            <h3>All category</h3>
        </div>
        <div class="cat-all-show">
            <div class="wrap-cat-i">
            @foreach($cat as $c)
            <div class="cat-show-i">
                <a href="">
                    <i class="{{ $c }}">
                        {{ $c }}
                    </i>
                </a>
            </div>
            @endforeach
            </div>
        </div>
    </div>

    <div class="cat-content">
        <div class="cat-get-title">
            <div><span class="c-title"><i class="cat-icon automotive"></i>AutoMotive</span></div>
        </div>
        <div class="cat-box-item">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Catgory Name</li>
            </ul>

            <div class="cat-list-item">
            @foreach(range(1,30) as $v)
                <a href="">
                <div class="cat-item">
                    <div class="cat-item-wrap">
                        <div class="cat-item-img">
                            <img src="https://www.hotdeals.com/public/images/20150731/party_city_coupon.gif" />
                        </div>
                        <div class="cat-item-brand">
                            Brand Name
                        </div>
                        <div class="cat-item-go">
                            Go to Store <i class="glyphicon glyphicon-circle-arrow-right"></i>
                        </div>
                    </div>
                </div>
                </a>
            @endforeach
            </div>
        </div>
    </div>

@stop

@section('scriptMix')
    @parent
    <script src="{{ asset(mix('/js/all/mix-footer.js')) }}"></script>
@stop