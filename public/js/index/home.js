$(document).ready(function(){
    $(".popular-search").slick({
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true
    });

    $('#Banner').cycle({
        fx: 'scrollRight',
        next: '#right',
        delay: -5000,
        easing: 'easeInOutBack'
    });

    $("#second").hide();
    $("#third").hide();
    $("#openSecond").click(function(){
        $("#first").hide();
        $("#second").show();
    });
    $("#openThird").click(function(){
        $("#first").hide();
        $("#third").show();
    });
    $("#second").click(function(){
        $("#first").show();
        $("#second").hide();
    });
    $("#third").click(function(){
        $("#first").show();
        $("#third").hide();
    });

});
