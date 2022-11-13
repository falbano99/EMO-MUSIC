$(document).ready(function() {
    var navbar = $('.navbar');
    var navbarTextInner = $(navbar).find('.navcontainer');
    var headerSection = $('section.headerintro');
    var welcome = $(headerSection).find('.welcome');
    var scndpart = $(headerSection).find('.scndpart');

    var headerTimeLine = new TimelineMax({paused: true});
    var animateSpeed = 0.75;
    var easeIn = Circ.easeIn;
    var easeOut = Circ.easeOut;

    headerTimeLine.fromTo(headerSection, animateSpeed, /* ANIMAZIONE HEADER LOGIN*/
        {
            y: '1500', 
            opacity: 0,
            ease: easeIn
        },
        {
            y: '0', 
            opacity: 1,
            ease: easeOut,
            onComplete: function() {}
        }
    ).fromTo(navbarTextInner, animateSpeed, /* ANIMAZIONE NAVBAR LOGIN*/
        {
            y: '100%',
            opacity: 0,
            ease: easeIn
        },
        {
            y: '0%',
            opacity: 1,
            ease: easeOut
        }
    ).fromTo(welcome, animateSpeed, 
        {
            opacity: 1,
            ease: easeIn
        },
        {
            opacity: 0,
            ease: easeOut
        }
    ).fromTo(scndpart, animateSpeed, 
        {
            opacity: 0,
            ease: easeIn
        },
        {
            opacity: 1,
            ease: easeOut
        }
    );

    headerTimeLine.play();
});