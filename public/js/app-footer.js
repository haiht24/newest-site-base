function copyExec(is) {
    is.select();
    document.execCommand("Copy");
}

$(document).ready(function(){
    $('.wrap-copy').click(function(){
       copyExec($('#select-copy'));
       $('.input-copied').show();
        $('.input-copied').fadeOut(3000)
    });
});