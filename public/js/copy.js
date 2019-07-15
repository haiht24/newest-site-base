//for copy
var copySp = document.queryCommandSupported('copy');
if(!copySp) {
    document.write('<'+'script src="js/src/zerocopy/ZeroClipboard.min.js"><'+'/script>');
    // Run the demo
    function detectCopy() {
        var clip = new ZeroClipboard($("#btn-copy"));

        clip.on("ready", function () {

            this.on("aftercopy", function (event) {
                $('.input-copied').finish().show();
                $('.input-copied').fadeOut(2000);
            });
        });

        clip.on("error", function (event) {
            console.info('error[name="' + event.name + '"]: ' + event.message);
            ZeroClipboard.destroy();
        });
    };
}else {

    function copyExec(is) {
        is.select();
        document.execCommand("Copy");
    }

    function detectCopy() {
        $('.wrap-copy').click(function () {
            copyExec($('#select-copy'));
            $('.input-copied').finish().show();
            $('.input-copied').fadeOut(2000);
        });
    };
}