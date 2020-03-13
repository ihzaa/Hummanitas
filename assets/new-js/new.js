/* LoadMore */

// $('.post .card').slice(0, 3).show();

// $('#more').on('click', function () {
//     $('.post .card:hidden').slice(0, 3).slideDown();

//     if ($('.post .card:hidden').length === 0) {
//         $('#more').fadeOut();
//     }
// });

// Load Member
$('.member .card').slice(0, 20).show();

$('#moreMember').on('click', function () {
    $('.member .card:hidden').slice(0, 20).slideDown();

    if ($('.member .card:hidden').length === 0) {
        $('#moreMember').fadeOut();
    }
});

// Load Community
// $('.community .card').slice(0, 4).show();

// $('#moreCom').on('click', function () {
//     $('.community .card:hidden').slice(0, 4).slideDown();

//     if ($('.community .card:hidden').length === 0) {
//         $('#moreCom').fadeOut();
//     }
// });

// Load album
$('.gallery-album li').slice(0, 3).show();

$('#moreCom').on('click', function () {
    $('.community .card:hidden').slice(0, 3).slideDown();

    if ($('.community .card:hidden').length === 0) {
        $('#moreCom').fadeOut();
    }
});

// Load member manage
$('.memberManage .card').slice(0, 20).show();

$('#memberManage').on('click', function () {
    $('.memberManage .card:hidden').slice(0, 20).slideDown();

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





