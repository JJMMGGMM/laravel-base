$('#top').click(function (event) {
 $('html, body').animate({
    // 0 = top of the page
    scrollTop: 0 // $('#header').offset().top
 }, 500);
});
