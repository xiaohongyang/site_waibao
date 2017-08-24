getImageUrl = function( img ) {
    return window.Laravel.imgHost + '/' + img;
}

$(function(){
    $('body').on('click', '.first_level_nav', function(){
        $('.first_level_nav').removeClass('active')
        $(this).addClass('active');
    })
})