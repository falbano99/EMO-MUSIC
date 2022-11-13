$(document).ready(function() {
    var navbar = $('.navbar');
    var navbarTextInner = $(navbar).find('.navcontainer');
    var headerSection = $('section.header');
    var emodisplay = $(headerSection).find('.emodisplay');
    var tableplaylist = $(headerSection).find('.text-wrapper');
    var cardvideo = $(headerSection).find('.cardvideo');

    var headerTimeLine = new TimelineMax({paused: true});
    var animateSpeed = 0.75;
    var easeIn = Circ.easeIn;
    var easeOut = Circ.easeOut;

    

    headerTimeLine.fromTo(headerSection, animateSpeed, /* ANIMAZIONE HEADER (TUTTO)*/
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
    ).fromTo(navbarTextInner, animateSpeed, /* ANIMAZIONE NAVBAR*/
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
    ).fromTo(emodisplay, animateSpeed, /* ANIMAZIONE EMOZIONE*/
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
    ).fromTo(cardvideo, animateSpeed, /*ANIMAZIONE VIDEO*/
        {
            x: '-100%',
            opacity: 0,
            ease: easeIn
        },
        {
            x: '0%',
            opacity: 1,
            ease: easeOut
        }
    ).fromTo(tableplaylist, animateSpeed, /*ANIMAZIONE PLAYLIST*/
        {
            x: '-100%',
            opacity: 0,
            ease: easeIn
        },
        {
            x: '0%',
            opacity: 1,
            ease: easeOut
        }
    );

    headerTimeLine.play();
});