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