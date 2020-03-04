/* LoadMore */

$('.post .card').slice(0, 3).show();

$('#more').on('click', function () {
    $('.post .card:hidden').slice(0, 3).slideDown();

    if ($('.post .card:hidden').length === 0) {
        $('#more').fadeOut();
    }
});

// Load Member
$('.member .card').slice(0, 3).show();

$('#moreMember').on('click', function () {
    $('.member .card:hidden').slice(0, 3).slideDown();

    if ($('.member .card:hidden').length === 0) {
        $('#moreMember').fadeOut();
    }
});

// Load Community
$('.community .card').slice(0, 3).show();

$('#moreCom').on('click', function () {
    $('.community .card:hidden').slice(0, 3).slideDown();

    if ($('.community .card:hidden').length === 0) {
        $('#moreCom').fadeOut();
    }
});

// Load album
$('.gallery-album li').slice(0, 3).show();

$('#moreCom').on('click', function () {
    $('.community .card:hidden').slice(0, 3).slideDown();

    if ($('.community .card:hidden').length === 0) {
        $('#moreCom').fadeOut();
    }
});

// Load member manage
$('.memberManage .card').slice(0, 3).show();

$('#memberManage').on('click', function () {
    $('.memberManage .card:hidden').slice(0, 3).slideDown();

    if ($('.memberManage .card:hidden').length === 0) {
        $('#memberManage').fadeOut();
    }
});


// Load gallery
$('.gallery-photo > a').slice(0, 9).show();
$('.gallery-photo .btn').slice(0, 9).fadeIn();

$('#morePhoto').on('click', function () {
    $('.gallery-photo > a:hidden').slice(0, 6).fadeIn();
    $('.gallery-photo .btn:hidden').slice(0, 6).fadeIn();

    if ($('.gallery-photo > a:hidden').length === 0) {
        $('#morePhoto').fadeOut();
    }
});

//upload photo
// document.getElementById("uploadBtn1").onchange = function () {
//     document.getElementById("uploadFile1").value = this.value;
// };
// document.getElementById("uploadBtn2").onchange = function () {
//     document.getElementById("uploadFile2").value = this.value;
// };



// new post box	
$(".new-postbox").click(function () {
    $(".postoverlay").fadeIn(500);
});
$(".postoverlay").not(".new-postbox").click(function () {
    $(".postoverlay").fadeOut(500);
});
$("[type = submit]").click(function () {
    var post = $("textarea").val();
    $("<p class='post'>" + post + "</p>").appendTo("section");
});

