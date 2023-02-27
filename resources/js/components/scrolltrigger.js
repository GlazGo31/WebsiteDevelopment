import gsap from 'gsap'
import {ScrollTrigger} from "gsap/ScrollTrigger";
import {isMobile} from "../dependences/functions";

gsap.registerPlugin(ScrollTrigger)

locoScroll.on("scroll", ScrollTrigger.update);

ScrollTrigger.scrollerProxy("[data-scroll-container]", {
    scrollTop(value) {
        return arguments.length ? locoScroll.scrollTo(value, 0, 0) : locoScroll.scroll.instance.scroll.y;
    },
    getBoundingClientRect() {
        return {top: 0, left: 0, width: window.innerWidth, height: window.innerHeight};
    },
    pinType: document.querySelector('[data-scroll-container]').style.transform ? "transform" : "fixed"
})

ScrollTrigger.addEventListener("refresh", () => locoScroll.update());
ScrollTrigger.defaults({ scroller: "[data-scroll-container]" });

if(!isMobile()) {
    let element = document.querySelector('.people .desc')
    if (element) {
        gsap.to(element, 3, {
            scrollTrigger: {
                trigger: '.andrew',
                start: 'center',
                end: 'bottom',
                scrub: true,
            },
            opacity: 0
        })
    }
}
