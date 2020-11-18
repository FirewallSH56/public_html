var nc = 1;
$(document).ready(function() {
    $("#login-popup-button").click(function () {
        showAccountForm(1);
    });
    $("#register-popup-button").click(function () {
        showAccountForm(2);
    });
    $("#guest-login").click(function () {
        showAccountForm(1);
    });
    $("#close-notification").click(function () {
        $(".notifications-container").hide();
    });
    $("#load-more-button").click(function () {
        loadMoreNews();
    });
});

function showAccountForm(type) {
    var a = null;
    switch(type) {
        default:
        case 1:
        $('#login-dialog').attr('class', "login-popup zoom-anim-dialog animated fadeIn");
        $a = 1;
        $('#login-dialog').show();
        break;

        case 2:
        $('#register-dialog').attr('class', "login-popup zoom-anim-dialog animated fadeIn");
        $('#register-dialog').show();
        $a = 2;
        break;
    }

	$("#header").css("overflow", "visible");
    $("#account-buttons").hide();
    
	$(document).mouseup(function(e) {
		if (!$("#guest-dialog").is(e.target) && $("#guest-dialog").has(e.target).length === 0) {
            if ($a == 1) {
                $('#login-dialog').attr('class', "animated fadeOut");
                $("#account-buttons").attr('class', "animated fadeOut");
                $('#login-dialog').hide();
            } else if ($a == 2) {
                $('#register-dialog').attr('class', "animated fadeOut");
                $("#account-buttons").attr('class', "animated fadeOut");
                $('#register-dialog').hide();
            }

            $("#account-buttons").show().attr('class', "animated fadeIn");
            $("#header").css("overflow", "hidden");
        }
    });
}

function closeLogin() {
    $('#login-dialog').attr('class', "login-popup zoom-anim-dialog mfp-hide");
}
function closeRegister() {
    $('#register-dialog').attr('class', "login-popup zoom-anim-dialog mfp-hide");
}

function loadMoreNews() {
    nc++;
    $.ajax({
        type: 'GET',
        url: '/news/load/' + nc,
        dataType: 'json',
        success: function (data) {
            data.forEach(function(entry) {
                if (!$('#article-' + entry['id']).length) {
                    $("#articles-container").append('<div id="article-' + entry['id'] + '" class="article-container"><a href="/news/' + entry['id'] + '" class="article-content pixelated" style="background-image: url(' + entry['image'] + ');"><div class="article-header"><div class="article-category">' + entry['category'] + '</div><div class="article-separation" style="background-color: #' + entry['category_color'] + ';"></div><div class="article-title">' + entry['title'] + '</div></div></a></div>');
                }
            })
            $('html, body').animate({ scrollTop: $("#load-more-button").offset().top }, 2000);         
        }
    })
}