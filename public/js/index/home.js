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

    $("#doSomethingBlockBodyStory").hide();
    $("#second").hide();
    $("#third").hide();
    $("#turnText").click(function(){
        $("#doSomethingBlockBody").hide();
        $("#doSomethingBlockBodyStory").show();
    });
    $("#openSecond").click(function(){
        $("#first").hide();
        $("#second").show();
    });
    $("#openThird").click(function(){
        $("#first").hide();
        $("#third").show();
    });
    $("#turnBack").click(function(){
        $("#doSomethingBlockBody").show();
        $("#doSomethingBlockBodyStory").hide();
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
