var SETTINGS = {
    "ParticlesJS": { "particles": { "number": { "value": 80, "density": { "enable": true, "value_area": 700 } }, "color": { "value": "#FFFFFF" }, "shape": { "type": "circle", "stroke": { "width": 0, "color": "#000000" }, "polygon": { "nb_sides": 5 }, "image": { "src": "img/github.svg", "width": 100, "height": 100 } }, "opacity": { "value": 0.3, "random": false, "anim": { "enable": false, "speed": 1, "opacity_min": 0.1, "sync": false } }, "size": { "value": 1, "random": true, "anim": { "enable": false, "speed": 40, "size_min": 0.1, "sync": false } }, "line_linked": { "enable": true, "distance": 150, "color": "#FFFFFF", "opacity": 0.2, "width": 1 }, "move": { "enable": true, "speed": 2, "direction": "none", "random": false, "straight": false, "out_mode": "out", "bounce": false, "attract": { "enable": false, "rotateX": 600, "rotateY": 1200 } } }, "interactivity": { "detect_on": "window", "events": { "onhover": { "enable": true, "mode": "grab" }, "onclick": { "enable": false, "mode": "push" }, "resize": true }, "modes": { "grab": { "distance": 150, "line_linked": { "opacity": 1 } }, "bubble": { "distance": 400, "size": 40, "duration": 2, "opacity": 8, "speed": 3 }, "repulse": { "distance": 200, "duration": 0.4 }, "push": { "particles_nb": 4 }, "remove": { "particles_nb": 2 } } }, "retina_detect": true }
};

function SetupMobileMenuEvents() {
    // All events attached to the mobile menu & it's toggle button
    var MenuOpen = false;
    var MovementSpeed = 800;
    $('#menubutton').on("click", function() {
        if (MenuOpen) {
            MenuOpen = false;
            $("#menubutton li i").attr('class', 'fas fa-bars fa-2x');
            $("#content").animate({ left: "0" }, MovementSpeed);
        } else {
            MenuOpen = true;
            $("#menubutton li i").attr("class", "fas fa-angle-left fa-3x");
            $('#content').animate({left: '80vw'}, MovementSpeed);
        }
    });
}

function SetupHomePageLinkEvents() {
    if ($('#HomePage').length) {
        $('.links li').on('click', function(e) {
            e.preventDefault();
            var ScrollItem = $(this).find('a').attr('href').replace(' ', '').replace('/', '');
            if (ScrollItem == "") {
                $('html, body').animate({ scrollTop: $("#HomePage").offset().top }, 700);
            } else {
                $('html, body').animate({ scrollTop: $("#" + ScrollItem).offset().top }, 700);
            }
            ($('#menubutton').length && $('#content').css('left') != '0px' ? $('#menubutton').click() : false);
        });
    }
}

function SetupWindowEvents() {
    // All events attached to the browser window
    var ParticlesRunning = true
    $(window).on("scroll", function() {
        ($('#HomePage').length ? ($(window).scrollTop() >= $(window).outerHeight() - 100 ? $("nav").addClass("fixed") : $("nav").removeClass("fixed")) : false);
        $("#DownArrow").css("opacity", 1 - $(window).scrollTop() / ($(window).outerHeight() - 150));
        ($('header').length ? $("header").css("opacity", 1 - $(window).scrollTop() / ($(window).outerHeight() - 100)) : false);
        if ($('header').length) {
            if (($(window).scrollTop() >= $(window).outerHeight()) && ParticlesRunning) {
                cancelRequestAnimFrame(pJSDom[0].pJS.fn.checkAnimFrame);
                cancelRequestAnimFrame(pJSDom[0].pJS.fn.drawAnimFrame);
                pJSDom[0].pJS.fn.particlesEmpty();
                pJSDom[0].pJS.fn.canvasClear();
                ParticlesRunning = false;
            } else if (($(window).scrollTop() <= $(window).outerHeight()) && !ParticlesRunning) {
                pJSDom[0].pJS.fn.vendors.start();
                ParticlesRunning = true;
            }
        }
    });
}

function FP() {
    setTimeout(function () {

    }, 700);
}

function SetupDownArrowEvents() {
    // All events attached to the bouncing down arrow
    ($("#DownArrow").length ? $("#DownArrow").on("click", function () { $("html, body").animate({ scrollTop: $("#Wrapper").offset().top }, 700); }) : false);
}

function StartEvents() {
    SetupWindowEvents();
    SetupDownArrowEvents();
}

function init() {
    // Start Particles JS
    ($('#particles-js').length ? window.particlesJS("particles-js", SETTINGS['ParticlesJS']) : false);
    StartEvents();
    SetupMobileMenuEvents();
    SetupHomePageLinkEvents();
    $(window).scroll();
}

$(document).ready(function() {
    init();
});