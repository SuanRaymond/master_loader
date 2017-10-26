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
    $("#doSomethingBlockBodyResort").hide();
    $("#second").hide();
    $("#third").hide();
    $("#turnText").click(function(){
        $("#doSomethingBlockBody").hide();
        $("#doSomethingBlockBodyStory").show();
    });
    $("#turnResort").click(function(){
        $("#doSomethingBlockBody").hide();
        $("#doSomethingBlockBodyResort").show();
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
    $("#turnBack2").click(function(){
        $("#doSomethingBlockBody").show();
        $("#doSomethingBlockBodyResort").hide();
    });
    $("#second").click(function(){
        $("#first").show();
        $("#second").hide();
    });
    $("#third").click(function(){
        $("#first").show();
        $("#third").hide();
    });
    $("#commingSoon").click(function(){
        swal({
            imageUrl: "./images/soon.png",
            title: "尚未开放",
            text: "敬请期待．．．",
            type: "",
            timer: 3000,
            showConfirmButton: false
        });
    });
    $("#commingSoon2").click(function(){
        swal({
            imageUrl: "./images/soon.png",
            title: "尚未开放",
            text: "敬请期待．．．",
            type: "",
            timer: 3000,
            showConfirmButton: false
        });
    });
});
