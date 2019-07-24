

<footer>
    <div class="footer">
        <div class="footer-top">
            <div class="scroll-top">
                <button class="btn btn-scroll" onclick="$('html, body').animate({ scrollTop: 0 }, 'slow');">
                    <i class="glyphicon glyphicon-arrow-up"></i>
                </button>
            </div>
            <div class="blogs-site-name">
                <p>{{ $_SERVER['HTTP_HOST'] }} Blogs</p>
            </div>
        </div>
        <div class="footer-bottom">
            Powered by {{ $_SERVER['HTTP_HOST'] }}
        </div>
    </div>
</footer>

@yield('script')
@if(config('config.devmod'))
    @yield('scriptDevMod')
@else
    @yield('scriptMix')
@endif
@yield('addfooter')

{!! '</body></html>' !!}