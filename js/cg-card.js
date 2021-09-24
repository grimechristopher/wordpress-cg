const desktopMQ = window.matchMedia('(min-width: 62em)')
    //let isFlipping = false;
    let isFlipped = false;

    function mouseMove (e) {

        let swiperFront = document.getElementById("card-front");
        let swiperBack = document.getElementById("card-back");

        let centerX = (this.getBoundingClientRect().left + this.getBoundingClientRect().right) / 2;
        let centerY = (this.getBoundingClientRect().top + this.getBoundingClientRect().bottom) / 2;
        let x = e.pageX - centerX;
        let y = e.pageY - centerY;

        x = x / 36;
        y = -(y / 12);

        swiperFront.style.setProperty('--rX', y.toFixed(2));
        swiperFront.style.setProperty('--rY', x.toFixed(2));

        swiperBack.style.setProperty('--rX', y.toFixed(2));
        swiperBack.style.setProperty('--rY', x.toFixed(2));

    }

    function mouseEnter() {
        let cardFront = document.getElementById("card-front");
        let cardBack = document.getElementById("card-back");
        cardFront.style.transition = 'none';
        cardBack.style.transition = 'none';
    }

    function mouseLeave() {
        let cardFront = document.getElementById("card-front");
        let cardBack = document.getElementById("card-back");

        cardFront.style.transition = "transform .3s 1s, -webkit-transform .3s 0.5s";
        cardBack.style.transition = "transform .3s 1s, -webkit-transform .3s 0.5s";
        cardFront.style.setProperty('--rX', 0);
        cardFront.style.setProperty('--rY', 0);
        cardBack.style.setProperty('--rX', 0);
        cardBack.style.setProperty('--rY', 0);
    }

    function cardClicked() {
        let cardFront = document.getElementById("card-front");
        let cardBack = document.getElementById("card-back");

        let swiperFront = document.getElementById("swiper-front");
        let swiperBack = document.getElementById("swiper-back");

        cardFront.style.transition = "transform .3s 1s, -webkit-transform .3s 0.5s";
        cardBack.style.transition = "transform .3s 1s, -webkit-transform .3s 0.5s";

        if (!isFlipped) {
            cardBack.style.setProperty('transform', 'rotateX(calc(var(--rX) * 1deg)) rotateY(calc(var(--rY) * 1deg))');
            cardFront.style.setProperty('transform', 'rotateY(180deg)');
            swiperFront.style.setProperty('z-index', '99');            
        }
        else {
            cardFront.style.setProperty('transform', 'rotateX(calc(var(--rX) * 1deg)) rotateY(calc(var(--rY) * 1deg))');
            cardBack.style.setProperty('transform', 'rotateY(180deg)');
            swiperFront.style.setProperty('z-index', '101');

        }
        isFlipped = !isFlipped;
        
    }
    function scrollToMain() {
        window.scroll({
        behavior: 'smooth',
        left: 0,
        top: document.getElementById("main-content").getBoundingClientRect().top +  window.scrollY
        });
    }


    window.addEventListener("load", function(){

        document.getElementById("scroll-link").addEventListener('click', scrollToMain);

        if (desktopMQ.matches) {
            if (document.getElementById("card-front")) {
                //let swiperFront = document.getElementById("swiper-front");
                let cardFront = document.getElementById("card-front");
                let cardBack = document.getElementById("card-back");

                cardFront.addEventListener('mousemove', mouseMove);
                cardFront.addEventListener('mouseenter', mouseEnter);
                cardFront.addEventListener('mouseleave', mouseLeave);
                cardFront.addEventListener("click", cardClicked);

                cardBack.addEventListener('mousemove', mouseMove);
                cardBack.addEventListener('mouseenter', mouseEnter);
                cardBack.addEventListener('mouseleave', mouseLeave);
                cardBack.addEventListener("click", cardClicked);
            }
        }
        else { // Mobile or Tablet Screen
                const swiper = new Swiper('.swiper', {
            // Optional parameters
                direction: 'horizontal',
                loop: false,
            // pagination
                pagination: {
                    el: '.swiper-pagination',
                },
            });
        }

    });

    window.addEventListener('resize', function () { 
        "use strict";
        window.location.reload(); 
    });