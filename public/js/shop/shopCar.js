$(document).ready(function(){
    $(function () { $("[data-toggle='tooltip']").tooltip(); });
    $(function () {
        $("[data-toggle='popover']").popover();
    });

    $('#simple-menu').sidr();
    $('#sidrclose').sidr('close','simple-menu');
});