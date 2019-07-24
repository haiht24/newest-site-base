@section('cssDevMod')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/src/libs/bootstrap.3.3.7.min.css') }}" media="all,handheld"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/blogs.min.css') }}" media="all,handheld"/>
@stop
@section('cssMix')
    @parent
@stop
@extends('blogs.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="content-main">
                <img src="https://www.hotdeals.com/blog/wp-content/uploads/2019/07/Where-to-Buy-Top-Quality-Led-Lighting-in-the-US.jpg" alt="image blog"/>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}" title="Home {{ $_SERVER['HTTP_HOST'] }}">Home</a></li>
                    <li><a href="{{ url('/') }}">Blogs</a></li>
                    <li class="active">17/07/2019/ Brody Hill</li>
                </ul>
                <h1>Where to Buy Top Quality Led Lighting in the US?</h1>

                @include('blogs.elements.box-toggle-item')
                <div class="post-content">
                    @include('blogs.elements.box-content')
                    <div class="related-post">
                    <span id="related-post">
                        Related Posts:
                    </span>
                        <ul class="related-link">
                            <li><small>11/06/2019 </small> <a href="">Where to Get Affordable Security Gadgets for Your Home and Office</a></li>
                            <li><small>11/06/2019 </small> <a href="">Where to Get Affordable Security Gadgets for Your Home and Office</a></li>
                        </ul>
                    </div>

                    <div class="tags">
                    <span class="tag">
                    <i class="glyphicon glyphicon-tags"></i> <a href="" rel="tag" class="tags-link">Led Lighting</a>
                    </span>
                    </div>
                </div>
            </div>
            <div class="navpage">
                <a class="navpage-prev">
                    <i class="glyphicon glyphicon-triangle-left"></i> <span>Where to Buy Top Quality Eyeglasses Online ?</span>
                </a>
                <a class="navpage-next">
                    <span>Why You Should Patronize Kendra’s Boutique for Hair Extensions ?</span> <i class="glyphicon glyphicon-triangle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="sidebar-wrap">
            <div class="sidebar-item">
                <div class="sitebar-title">
                    Search Blog
                </div>
                <div class="sidebar-search">
                    <div class="input-group">
                        <input type="hidden" value="{{ url('/') }}" id="home">
                        <input type="text" name="q"  class="form-control search-form-header" />
                        <span class="input-group-btn">
                            <button class="btn btn-search" type="button">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
                            </button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="sidebar-item">
                <div class="sitebar-title">
                    Categories
                </div>
                <ul class="blogs-cat">
                    @foreach(range(0,10) as $v)
                    <li class="blogs-cat-i">
                        <a href="" title="">Activities</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="sidebar-item">
                <div class="sitebar-title">
                    Tags
                </div>
                <div class="show-tags">
                    @foreach(range(0,10) as $v)
                        <a href="" rel="tag" title="Tags of coupon" style="font-size: {{ rand(14, 35) }}px">tags{{ $v }}</a>
                    @endforeach
                </div>
            </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scriptDevMod')
    @parent
    <script src="{{ asset('/js/all/mix-libs.js') }}"></script>
@stop
@section('scriptMix')
    @parent
    <script src="{{ asset(mix('/js/home/mix-footer.js')) }}"></script>
@stop