
$(document).ready(function() {
    var navbar = $('.navbar');
    var navbarTextInner = $(navbar).find('.navcontainer');
    var headerSection = $('section.header');
    var scndpart = $(headerSection).find('.scndpart');
    var message = $(headerSection).find('.message');
    var container_manopole = $(headerSection).find('.container_manopole');

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
    ).fromTo(message, animateSpeed, /*ANIMAZIONE ENTRATA MESSAGGIO*/
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
    ).fromTo(message, animateSpeed, /* ANIMAZIONE USCITA MESSAGGIO*/
        {
            opacity: 1,
            ease: easeIn
        },
        {
            delay: 5,
            opacity: 0,
            ease: easeOut
        }
    ).fromTo(scndpart, animateSpeed, /*ANIMAZIONE PULSANTE + GRAFICO + MANOPOLE*/
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
    ).fromTo(container_manopole, animateSpeed, /*ANIMAZIONE PULSANTE + GRAFICO + MANOPOLE*/
        {
            opacity: 1,
        },
        {
            opacity: 1,
        }
    ).fromTo(container_manopole, animateSpeed, /*ANIMAZIONE PULSANTE + GRAFICO + MANOPOLE*/
        {
            opacity: 1,
        },
        {
            delay: 30.3,
            opacity: 0,
            ease: easeOut
        }
    ).fromTo(container_manopole, animateSpeed, /*ANIMAZIONE PULSANTE + GRAFICO + MANOPOLE*/
        {
            opacity: 0,
            ease: easeOut
        },
        {
            delay: 0.7,
            opacity: 1,
            ease: easeIn
        }
);

    headerTimeLine.play();
});