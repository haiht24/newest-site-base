<a href="{{ route('store-detail', ['alias' => $s->alias] ) }}" title="{{ $s->name }} stores, click to get coupons, deals">
    <div class="cat-item">
        <div class="cat-item-wrap">
            <div class="cat-item-img">
                <img src="{{ proxyImage($s->logo) }}" alt="{{ $s->name }} stores coupon "/>
            </div>
            <div class="cat-item-brand">
                {{ $s->name }}
            </div>
            <div class="cat-item-go">
                Go to Store <i class="glyphicon glyphicon-circle-arrow-right"></i>
            </div>
        </div>
    </div>
</a>