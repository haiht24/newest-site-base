$( document ).ready(function(){
    /* for search box select 2 */
    var home = $('#home').val();
    $(".search-form-header").select2({
        placeholder: "Inter store name...",
        minimumInputLength: 2,
        multiple: true,
        ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
            url: home + "/search/",
            dataType: 'json',
            quietMillis: 250,
            data: function (term, page) { // page is the one-based page number tracked by Select2
                return {
                    keyword: term, //search term
                    page: page // page number
                };
            },
            results: function (data, page) {
                var more = (page * 30) < data.total_count; // whether or not there are more results available

                // notice we return the value of more so Select2 knows if more results can be loaded
                return { results: data.items, more: more };
            },
            cache: true
        },
        formatResult: searchFormatResult, // omitted for brevity, see the source of this page
        formatSelection: searchFormatSelection,  // omitted for brevity, see the source of this page
        dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
        escapeMarkup: function (m) { return m; } // we do not want to escape markup since we are displaying html in results
    }).on("select2-selecting", function(e) {
        if (e.object.type == 'store') {
            var alias = e.object.note === 'ngach' ? e.object.alias : e.object.alias;
            window.location = home+"/stores/"+alias+"/coupons";
        } else if (e.object.type == 'coupon') {
            window.open(home+"/stores/" + e.object.store_alias + '/coupons?c=' + e.object.coupon_key, '_blank');
            window.open(home+"/go/" + '/' + e.object.coupon_key, '_self');
        } else {
            window.open('?d=' + e.object.coupon_key, '_blank');
            window.open(home+"/go/" + '/' + e.object.coupon_key, '_self');
        }
    });
    function searchFormatResult(repo) {
        var markup = '';
        if (repo.type == 'store' || repo.type == 'deal') {
            markup = '<div class="row">' +
                //            '<div class="col-sm-4"><img class="img-responsive" src="' + repo.image + '" /></div>' +
                '<div class="col-sm-12">' +
                '<div class="">' +
                '<div><b>' + repo.title + '</b> <b class="sl-domain">' + repo.domain + '</b></div>' +
                //            '<div>' + repo.description + '</div>' +
                '</div></div></div>';
        } else {
            markup = '<div class="row">' +
                '<div class="col-sm-4">';
            if (repo.coupon_type == 'COUPON CODE') {
                markup += '<figcaption class="search-coupon"><samp class="btn-coupon-small">';
                if (repo.exclusive == 1)
                    markup += '<span class="exclu-stamp">Exclusive</span>';
                markup += '<strong>' + repo.discount
                    + '<sup>'+repo.currency+'</sup>'
                    + '</strong><span>Discount</span></samp></figcaption>'
            } else if (repo.coupon_type == 'FREE SHIPPING') {
                markup += '<figcaption class="search-free"><samp class="btn-coupon-small">';
                if (repo.exclusive == 1)
                    markup += '<span class="exclu-stamp">Exclusive</span>';
                markup += '<strong>Free</strong><span></span></samp></figcaption>'
            } else {
                markup += '<figcaption class="search-deal"><samp class="btn-coupon-small">';
                if (repo.exclusive == 1)
                    markup += '<span class="exclu-stamp">Exclusive</span>';
                markup += '<strong>Great</strong><span>Offer</span></samp></figcaption>'
            }
            markup += '</div>' +
                '<div class="col-sm-8">' +
                '<div class="">' +
                '<div><b>' + repo.title + '</b></div>' +
                '<div>' + repo.description + '</div>' +
                '</div></div></div>';
        }
        return markup;
    }

    function searchFormatSelection(repo) {
        return repo.title;
    }


    $('.link-to-top').click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });
});
/* for coupons go */
function openGo(aff, c) {
    location.href = aff;
    window.open('?c=' + c, '_blank');
}
function openRev(aff, c) {
    location.href = '?c=' + c;
    window.open(aff, '_blank');

}
function openGoEv(is) {
    var aff = $(is).attr('data-aff'),
        c = $(is).attr('data-goid');
    openGo(aff, c);
}
function openGo_Rev(is) {
    var aff = $(is).attr('data-aff'),
        c = $(is).attr('data-goid');
    openRev(aff, c);
}
$(document).on('click', '.go-btn .get-code', function(){
    openGoEv(this);
});
$(document).on('click', '.go-btn .get-deal', function(){
    openGo_Rev(this);
});


