<?php
$aff_url = !empty($c->product_link) ? $c->product_link : ( !empty($store->affiliate_url) ? $store->affiliate_url : $store->store_url );

?>
                <div class="box-item">
                    <div class="box-item-wrap">
                        <div class="box-item-img">
                            <div class="box-img-wrap">
                                @if($c->discount != '' && $c->discount == 100 && $c->currency == '%')
                                    <p class="box-text-top">Free</p>
                                @elseif($c->discount != '' && $c->discount > 0)
                                    <p class="box-text-top">{{ $c->discount }}<span>{{ $c->currency }}</span></p>
                                    <p class="box-text-type">Discount</p>
                                @else
                                    @if (strtolower($c->type) === 'free shipping')
                                        <p class="box-text-top">Free</p>
                                        <p class="box-text-type">Shipping</p>
                                    @else
                                        <p class="box-text-top">Great</strong>
                                        <p class="box-text-type">Offer</p>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="box-item-body">
                            <div class="box-item-body-content">
                                <div class="box-item-title">
                                    <h2>{{ $c->title }}</h2>
                                </div>
                                <div class="box-item-desc">
                                    {{ $c->description }}
                                </div>
                                @if(!empty($c->expire_date))
                                <div class="box-item-expire">
                                        {{ $c->expire_date }}
                                </div>
                                @else
                                @endif
                            </div>
                            <div class="box-item-btn">
                                <div class="go-btn box-item-btn-wrap">
                                    @if(strtolower($c->type) !== 'coupon code')
                                    <button class="get-deal btn btn-info" data-goid="{{ $c->go }}" data-aff="{{ $aff_url }}">
                                        Click to save
                                    </button>
                                    @else
                                    <button class="get-code btn btn-danger" data-goid="{{ $c->go }}" data-aff="{{ $aff_url }}">
                                        <div class="wrap-btn-show">
                                            <div class="text-code">
                                                {{ substr($c->code, -3, 3) }}
                                            </div>
                                            <div class="text-btn">
                                                Coupons code
                                            </div>
                                            <span class="code-cover"></span>
                                            <div class="code-text-image"></div>
                                        </div>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>