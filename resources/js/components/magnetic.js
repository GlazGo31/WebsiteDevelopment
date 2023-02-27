import gsap from "gsap";

import {Elastic, Power2, Power3, Power4} from "gsap";

if(window.innerWidth > 540){
    let magnets = document.querySelectorAll('.magnetic');

    magnets.forEach( (magnet) => {
        magnet.addEventListener('mousemove', moveMagnet );
        magnet.addEventListener('mouseleave', function(event) {
            gsap.to( event.currentTarget, 1.5, {
                x: 0,
                y: 0,
                ease: Elastic.easeOut
            });
            gsap.to( $(this).find(".btn-text"), 1.5, {
                x: 0,
                y: 0,
                ease: Elastic.easeOut
            });
        });
    });

    function moveMagnet(event) {
        var magnetButton = event.currentTarget;
        var bounding = magnetButton.getBoundingClientRect();
        var magnetsStrength = magnetButton.getAttribute("data-strength");
        var magnetsStrengthText = magnetButton.getAttribute("data-strength-text");

        gsap.to( magnetButton, 1.5, {
            x: ((( event.clientX - bounding.left)/magnetButton.offsetWidth) - 0.5) * magnetsStrength,
            y: ((( event.clientY - bounding.top)/magnetButton.offsetHeight) - 0.5) * magnetsStrength,
            rotate: "0.001deg",
            ease: Power4.easeOut
        })

        gsap.to( $(this).find(".btn-text"), 1.5, {
            x: ((( event.clientX - bounding.left)/magnetButton.offsetWidth) - 0.5) * magnetsStrengthText,
            y: ((( event.clientY - bounding.top)/magnetButton.offsetHeight) - 0.5) * magnetsStrengthText,
            rotate: "0.001deg",
            ease: Power4.easeOut
        })
    }

    $('.btn-click.magnetic').on('mouseenter', function() {
        console.log('enter')

        if($(this).find(".btn-fill").length) {
            gsap.to($(this).find(".btn-fill"), .6, {
                startAt: {y: "76%"},
                y: "0%",
                ease: Power2.easeInOut
            })
        }

        let btnText = $(this).find(".btn-text-inner.change");
        if(btnText.length) {
            btnText.addClass('white')
            gsap.to(btnText, .3, {
                startAt: {color: "#000000"},
                color: "#ffffff",
                ease: Power3.easeIn,
            });
        }
    })

    $('.btn-click.magnetic').on('mouseleave', function() {
        console.log('leave')

        if($(this).find(".btn-fill").length) {
            // if()

            gsap.to($(this).find(".btn-fill"), .6, {
                y: "-76%",
                ease: Power2.easeInOut
            });
        }

        let btnText = $(this).find(".btn-text-inner.change");
        if(btnText.length) {
            btnText.removeClass('white')
            gsap.to(btnText, .3, {
                color: "#1C1D20",
                ease: Power3.easeOut,
                delay: .3
            });
        }
    });
}
