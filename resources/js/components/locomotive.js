import LocomotiveScroll from 'locomotive-scroll';
import gsap from 'gsap'

import { isMobile, isTablet, isDesktop, getPercentOfIntermediate } from '../dependences/functions'

if (!isMobile()) {
    window.locoScroll = new LocomotiveScroll({
        el: document.querySelector('[data-scroll-container]'),
        smooth: true,
        smartphone: {
            smooth: false,
        },
        tablet: {
            smooth: true,
            breakpoint: 0

        }
    })
    console.log(123)
}

let abstraction = $('.abstraction')
let project = $('.projects')
let welcomeOffset = null
let welcomeHeight = null

if(abstraction.length) {
    welcomeOffset = abstraction.offset().top
    welcomeHeight = abstraction.height()
}


locoScroll.on('scroll', (args) => {
    window.scrollY = args.scroll.y
// Abstraction
    if(abstraction.length) {
        let abstraction = args.currentElements['abstraction']

        if(isDesktop()) {
            if (abstraction) {
                let offset = abstraction.el.height / 4

                let goal = abstraction.bottom - offset
                let start = abstraction.top - offset
                let middle = scrollY
                let scale = 1.5

                let percent = getPercentOfIntermediate(start, goal, middle)

                percent /= 100

                if (percent) {

                    if(percent > 0 && percent <= 0.5) {
                        scale = 1.5 - percent
                    }
                    else if(percent > 0.5) scale = 1
                }

                abstraction.el.style.scale = scale

                let title = $('h1')

                if (title.length) {
                    let start = 0
                    let goal = abstraction.top / 2
                    let percent = getPercentOfIntermediate(start, goal, scrollY)

                    percent /= 100

                    let opacity = 1 - percent

                    title.css('opacity', opacity)
                }

                if (title.length) {
                    let start = 0
                    let goal = abstraction.top / 2
                    let percent = getPercentOfIntermediate(start, goal, scrollY)

                    percent /= 100

                    let opacity = 1 - percent

                    title.css('opacity', opacity)
                }

                let welcome = $('.welcome')

                if (welcome.length) {
                    let offset = abstraction.el.height / 4

                    let goal = abstraction.bottom - offset
                    let start = abstraction.top - offset
                    let middle = scrollY
                    let opacity = 0

                    let percent = getPercentOfIntermediate(start, goal, middle)

                    percent /= 100

                    if (percent) {
                        let middle = 0.5

                        opacity = percent / middle

                        if (percent > 0.6) opacity = 2 - opacity
                        if (opacity > 0.8) opacity = 1
                    }

                    welcome.css('opacity', opacity)
                }
            }
        }

        if(window.screen.height < 900) {
            if (abstraction) {
                let offset = abstraction.el.height / 4

                let goal = abstraction.bottom - offset
                let start = abstraction.top - offset
                let middle = scrollY
                let scale = 1.2

                let percent = getPercentOfIntermediate(start, goal, middle)

                percent /= 100
                console.log(percent)
                if (percent) {

                    if(percent > 0 && percent <= 0.6) {
                        scale = scale - percent
                    }
                    else if(percent > 0.6) scale = percent

                    if (percent > 1) scale = 1
                }

                abstraction.el.style.scale = scale

                let title = $('h1')

                if (title.length) {
                    let start = 0
                    let goal = abstraction.top / 2
                    let percent = getPercentOfIntermediate(start, goal, scrollY)

                    percent /= 100

                    let opacity = 1 - percent

                    title.css('opacity', opacity)
                }

                if (title.length) {
                    let start = 0
                    let goal = abstraction.top / 2
                    let percent = getPercentOfIntermediate(start, goal, scrollY)

                    percent /= 100

                    let opacity = 1 - percent

                    title.css('opacity', opacity)
                }

                let welcome = $('.welcome')

                if (welcome.length) {
                    let offset = abstraction.el.height / 4

                    let goal = abstraction.bottom - offset
                    let start = abstraction.top - offset
                    let middle = scrollY
                    let opacity = 0

                    let percent = getPercentOfIntermediate(start, goal, middle)

                    percent /= 100

                    if (percent) {
                        let middle = 0.5

                        opacity = percent / middle

                        if (percent > 0.6) opacity = 2 - opacity
                        if (opacity > 0.8) opacity = 1
                    }

                    welcome.css('opacity', opacity)
                }
            }
        }

    }
// Project

    if(project.length) {
        let project = args.currentElements['project']

        if (project) {

            let title = $('.know-us')

            if (title.length) {
                let start = 0
                let goal = project.top
                let percent = getPercentOfIntermediate(start, goal, scrollY)

                percent /= 100

                let opacity = 1 - percent*1.5

                title.css('opacity', opacity)
            }

            let knowUs = $('h1')

            if (knowUs.length) {
                let start = 0
                let goal = project.top
                let percent = getPercentOfIntermediate(start, goal, scrollY)

                percent /= 100

                let opacity = 1 - percent*1.5

                knowUs.css('opacity', opacity)
            }
        }
    }

//Services
     if(!isMobile()) {
         let services = args.currentElements['services']

         if(services) {

             let classes = {
                 development: {
                     bgStart: 40,
                     bgGoal: 80,

                     cpStart: 0,
                     cpGoal: 100,


                 },
                 design: {
                     bgStart: 40,
                     bgGoal: 80,

                     cpStart: 0,
                     cpGoal: 100,


                 },
                 seo: {
                     bgStart: 40,
                     bgGoal: 80,

                     cpStart: 0,
                     cpGoal: 100,


                 },
                 support: {
                     bgStart: 40,
                     bgGoal: 80,

                     cpStart: 0,
                     cpGoal: 0,

                 }
             }

             Object.keys(classes).forEach(name => {
                 let scroll = args.currentElements[name]

                 let object = classes[name]

                 if(scroll) {

                     let progress = scroll.progress;

                     progress *= 100
                     // console.log(progress)
                     let bg = null;
                     let cp = null;

                     //Development, design, seo
                     if ((name === 'development' || name === 'design' || name === 'seo' || name === 'support') && progress < object.bgStart) {

                         bg = object.bgStart
                         cp = object.cpStart

                     } else if ((name === 'development' || name === 'design' || name === 'seo') && progress >= object.bgStart) {

                         bg = progress
                         cp = getPercentOfIntermediate(object.bgStart, object.bgGoal, progress)

                     }

                     let element = $(`.images .image.${name}`)

                     gsap.to(element, {
                         clipPath: `inset(0px 0px ${cp}%)`,
                         backgroundPosition: `0px ${bg}%`,
                     })
                 }
             })
         }
     }


    // console.log(args)

// AboutUs
    let aboutUs = args.currentElements['our-photo']

    if(aboutUs) animateAboutUs(aboutUs)
})

function animateAboutUs(aboutUs) {
    if(aboutUs) {
        let offset = (window.innerHeight / 3)
        // let offset = 0

        let start = aboutUs.top - offset
        let goal = aboutUs.bottom - offset

        let currentPercent = getPercentOfIntermediate(start, goal, scrollY)

        let newHeight = 60

        let minHeight = 60
        let maxHeight = 100

        let onePercent = (maxHeight - minHeight) / 100

        if (currentPercent <= 50) {
            let percentOfHalf = getPercentOfIntermediate(0, 50, currentPercent)

            if(percentOfHalf >= 0 && percentOfHalf <= 100) {
                newHeight = minHeight + (onePercent * percentOfHalf)
            }
        }
        else {
            let percentOfHalf = getPercentOfIntermediate(50, 100, currentPercent)

            if(percentOfHalf >= 0 && percentOfHalf <= 100) {
                newHeight = maxHeight - (onePercent * percentOfHalf)
            }
        }

        console.log(currentPercent, newHeight)

        // console.log('percent', currentPercent.toFixed(2), newHeight.toFixed(2))

        // if (newHeight < minHeight) newHeight = minHeight
        // if (newHeight > maxHeight) newHeight = maxHeight

        gsap.to(aboutUs.el, {
            height: `${newHeight}vh`,
        })


    }
}

//minHeight 60 = 0%
//366.5 = 50%
//maxHeight 100 = 100%

//percent 25% = 333 + (0.67 * 25)

//400 - 333 = 67
//67 / 100 = 0.67 = 1%

