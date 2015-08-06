$(function(){
    $("li.contact").on('click', function () {
        $(".overlay").fadeIn(function(){

            $(".contact-modal").removeClass('hide').addClass('animated rollIn');
        });
    });

    $("li.legal").on('click', function () {
        $(".overlay").fadeIn(function(){
            $(".legal-modal").removeClass('hide').addClass('animated rollIn');
        });
    });

    $("li.about").on('click', function () {
        $(".overlay").fadeIn(function(){
            $(".about-modal").removeClass('hide').addClass('animated rollIn');
        });
    });
    $("a.modal-close").on('click', function(){
        var that = $(this);
        that.closest('.modal').removeClass('rollIn').addClass('rollOut');
        $(".overlay").fadeOut();
        setTimeout(function(){
            that.closest('.modal').removeClass('animateed rollOut').addClass('hide');
        },3000);
    });
});