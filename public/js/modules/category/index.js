$(document).ready(function(){
var offset = 0;
function catGetMore() {
    offset += 40;
    var url = $('#show-more').attr('data-url') + '/' + offset;
    $('#show-more').html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');

    $.get(url, function (data) {
        if(data.length==0) $('#show-more').remove();
        $('#cat-list').append(data);
        $('#show-more').html('<strong>SHOW MORE...</strong>');
    });
}

    $('#show-more').click(function(){
        catGetMore();
    });
});