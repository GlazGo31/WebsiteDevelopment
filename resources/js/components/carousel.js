import gsap from 'gsap'
let owl_carousel = require('owl.carousel')
window.fn = owl_carousel

let owl = $('.owl-carousel').owlCarousel({
    items: 2,
    slideBy: 2,
    autoWidth: window.screen.width <= 600,
    margin: 30,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,
        },
        1000:{
            items:2,
        }
    }
})

$('.arrows .btn.left').click(() => {
    owl.trigger('prev.owl.carousel');
})

$('.arrows .btn.right').click(() => {
    owl.trigger('next.owl.carousel');
})

owl.on('changed.owl.carousel', (event) => {
    $('.pages').text(`${event.item.index + event.page.size}/${event.item.count}`)


})

let pagesOwlCarousel = $('.main .content .our-works .list .owl-stage-outer .owl-stage .owl-item')

Array.from(pagesOwlCarousel).forEach((page) => {
    page.addEventListener('mouseover', () => {
        $('.dot').text('ТЯНИ')
        $('.dot').addClass('carouselDragBtn')
        gsap.to('.dot', {
            rotate: '-45deg'
        })

    })

    page.addEventListener('mouseleave', () => {
        $('.dot').removeClass('carouselDragBtn')
        $('.dot').text('')
    })
})
