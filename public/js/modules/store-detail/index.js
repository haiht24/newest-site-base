$(document).ready(function(){
    var offset = 0;
    function catGetMore() {
        offset += 20;
        var url = $('#show-more').attr('data-url') + '/' + offset;
        $('#show-more button').html('...Loading...');

        $.get(url, function (data) {
            if(data.length==0) $('#show-more').remove();
            $('#coupons-list').append(data);
            $('#show-more button').html('SHOW MORE...');
        });
    }

    $('#show-more').click(function(){
        catGetMore();
    });
});

function getFilter(checked=1,remove=0, cpType='', thishtml, is) {
    var url = $('.filter-box').attr('data-url');

    $(is).html(filterLoading);
    $.get(url + '&checked='+checked+'&remove='+remove+'&coupon_type='+cpType, function(data){
        $('#coupons-list').html(data);
        $(is).html(thishtml);
    });

}

var filterLoading = '<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>';
$('.btn-type.btn-all').click(function(){
    var thishtml = $(this).html();
    $('.btn-type').removeClass('btn-active');
    getFilter(0,1, '', thishtml, this);

});
$(document).on('click', '.btn-type.btn-active', function(){
    var thishtml = $(this).html();
    $(this).removeClass('btn-active');
    $(this).addClass('btn-none');
    var checked = 0, remove = 0, cpType = $(this).attr('data-type');
    getFilter(checked, remove, cpType, thishtml, this);

});
$(document).on('click', '.btn-type.btn-none', function(){
    var thishtml = $(this).html();
    $(this).addClass('btn-active');
    $(this).removeClass('btn-none');
    var checked = 1, remove = 0, cpType = $(this).attr('data-type');
    getFilter(checked, remove, cpType, thishtml, this);

});