$(document).ready(function () {
    let navbar_button = $('#toggle_navbar');
    let navbar_button_collapse = $('#toggle_navbar_collapse');
    let mobile_navbar = $('#mobile_navbar');
    let navbar_bool = false;
    let news_text = $('.news-text');

    news_text.each(function () {
        if($(window).width() < 1399) {
            truncated_news = jQuery.trim($(this).text()).substring(0, 56)
            .split(" ").slice(0, -1).join(" ") + "...";
            $(this).text(truncated_news)
        }
    });

    navbar_button.click(function () {
        if(navbar_bool == false) {
            mobile_navbar.addClass('active');
            navbar_button_collapse.addClass('d-block');
            navbar_bool = true;
        }
    });

    navbar_button_collapse.click(function () {
        if(navbar_bool == true) {
            mobile_navbar.removeClass('active');
            navbar_button_collapse.removeClass('d-block')
            navbar_bool = false;
        }
    });

    $('#guilds').fadeOut()

    let players_bool = false;

    $('#players_btn').click(function () {
        if(players_bool == true) {
            $('#players_btn').addClass('active')
            $('#guilds_btn').removeClass('active')
            $('#guilds').fadeOut(function () {
                $('#players').fadeIn();
                players_bool = false;
            });
        }
    });

    $('#guilds_btn').click(function () {
        if(players_bool == false) {
            $('#guilds_btn').addClass('active')
            $('#players_btn').removeClass('active')
            $('#players').fadeOut(function () {
                $('#guilds').fadeIn();
                players_bool = true;
            });
        }
    });
});