<?php
$aff_url = !empty($c->product_link) ? $c->product_link : ( !empty($store->affiliate_url) ? $store->affiliate_url : $store->store_url );

?>
<!-- Modal -->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ $c->title }}</h4>
                </div>
                <div class="modal-body">
                    <div class="store-img">
                        <img src="{{ $store->logo }}" alt="store {{ $store->name }} logo" />
                    </div>
                    <div class="store-copy">
                        <div class="wrap-copy">
                            @if(!empty($c->code))
                            <div class="input-copied">Copied !!!</div>
                            <input type="text" id="select-copy" value="{{ $c->code }}" readonly="1">
                            <button class="btn btn-copy my_clip_button" id="btn-copy" title="Click me to copy to clipboard." data-clipboard-target="select-copy" data-clipboard-text="Failed copy">Copy Code</button>
                            @else
                            <div class="no-code">
                                <a href="{{ $aff_url }}" title="best price best deals">Click Get Deal now <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($relatedCp)
                        <div class="coupon-related">
                            <div class="maybe"><b>You may also like</b></div>
                            <div class="row">
                                @foreach($relatedCp as $c)
                                    <?php
                                        $aff_url = !empty($c->product_link) ? $c->product_link : ( !empty($store->affiliate_url) ? $store->affiliate_url : $store->store_url );

                                    ?>
                                <div class="col-xs-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
                                    <a  title="{{ $store->name }}" rel="nofollow" itemprop="name" class="title location" data-goid="{{ $c->foreign_key_right }}" data-aff="{{ $aff_url }}">
                                        <div>
                                            <img src="{{ $store->logo }}" alt="{{ $store->name }} logo"/>
                                        </div>
                                        <div class="c-title"><span class="c-line">{{ str_limit($c->title, 25) }}</span></div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>