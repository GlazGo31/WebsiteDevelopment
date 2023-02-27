import gsap from 'gsap'

$('.btn-menu').click(() => {
    $('.menu').addClass('show')

    gsap.to('.menu .background', {
        height: '240%',
        width: '130%',
        duration: 1,
    })
})

$('.menu .header .close').click(() => {
    $('.menu').removeClass('show')
    $('.dot').removeClass('white')

    gsap.to('.menu .background', {
        height: 0,
        width: 0,
        duration: 0.3,
    })
})

window.startHeaderAnimation = () => {

    let classes = ['logo', 'customSelect', 'lets-talk', 'btn-menu']

    classes.forEach((className, index) => {
        let element = document.querySelector(`.${className}`)

        let multiplayer = 0.25 + ((index + 1) / 4)

        let from = {
            y: '-100%',
        }

        let to = {
            y: '0',
            duration: multiplayer,
        }

        gsap.fromTo(element, from, to)
    })
}
