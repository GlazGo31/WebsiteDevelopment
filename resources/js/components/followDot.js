import gsap from 'gsap'
import {isDesktop} from "../dependences/functions";

if(isDesktop() && window.screen.height > 900) {

    let dot = document.querySelector('.dot')

    let aboutArea = $('.about-area')

    let cursorX = 0
    let cursorY = 0

    let lastTimeUpdate = Date.now()

    document.addEventListener('mousemove', e => {
        cursorX = e.clientX
        cursorY = e.clientY

        let now = Date.now()

        let diff = now - lastTimeUpdate;

        if(diff > 20) {
            setDotPosition(cursorX, cursorY)
            lastTimeUpdate = Date.now()
        }

    })

    function checkDotPosition() {
        if(aboutArea.length) {
            let positionAbout = aboutArea.position()
            let heightAbout = aboutArea.outerHeight()

            let isCursorInAboutArea = cursorY >= positionAbout.top && cursorY <= positionAbout.top + heightAbout

            isCursorInAboutArea
                ? dot.classList.add('about-us')
                : dot.classList.remove('about-us')
        }

        let isMenuOpen = $('.menu.show').length

        if(isMenuOpen) {
            $('.dot').addClass('white')
        }

        setTimeout(() => checkDotPosition(), 300)
    }

    checkDotPosition()

    function setDotPosition(x, y) {
        gsap.to(dot, {
            x: x,
            y: y,
            force3D: true,
            overwrite: true,
            ease: 'easeOut',
            duration: 0.2,
        });
    }

    let linksShowMenu = $('.menu .buttons .btn .btn-text a')


    Array.from(linksShowMenu).forEach((link) => {
        link.addEventListener('mouseover', () => {
            $('.dot').addClass('activeBtnMenuShow')

        })

        link.addEventListener('mouseleave', () => {
            $('.dot').removeClass('activeBtnMenuShow')
        })
    })

    let linksSocialNetworksShowMenu = $('.menu .social-networks a')


    Array.from(linksSocialNetworksShowMenu).forEach((link) => {
        link.addEventListener('mouseover', () => {
            $('.dot').addClass('activeSocialNetworksMenuShow')

        })

        link.addEventListener('mouseleave', () => {
            $('.dot').removeClass('activeSocialNetworksMenuShow')
        })
    })


} if (window.screen.height < 850) {
    let dot = document.querySelector('.dot')
    dot.style.display = 'none'

}
