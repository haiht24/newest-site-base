<?php $count = 0; ?>
@foreach($newestStores as $store)
<?php $count++; ?>
@if($count<12)
<div>
    <div class="gradient-border-bottom">
        <a href="{{ url('/' . $store->alias . config('config.suffix_coupon')) }}" title="{{ $store->name }}">
        <div class="gradient-border owl-box">
            <div class="owl-box-img">
                <img src="https://res.cloudinary.com/bbbd/image/fetch/w_100/v1542084333/{{ urlencode($store->logo) }}"/>
            </div>
            <div class="s-name"><b>{{ $store->name }}</b></div>
            <p class="owl-title">{{ str_limit($store->short_description) }}</p>
            <small>{{ date("Y-m-d") }}</small><br/>
            <b class="owl-link"><strong>Get Deals</strong> >></b>
        </div>
        </a>
    </div>
</div>
@endif
@endforeach