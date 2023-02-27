const Magnetic = (() => {
    const Magnet = function () {
        this.element = null

        this.powerDistance = 50

        this.updateOnScroll = false

        this.constuctor = (config) => {
            Object.keys(config).forEach((key) => {
                this[key] = config[key]
            })

            if (!(this.element instanceof HTMLElement)) {
                throw 'MagneticJS: Magnet element is invalid. It must have "HTMLElement" type'
            }

            this.__preflight()
            this.__setScrollHandler()

            return this
        }

        this.__preflight = () => {
            if (window.getComputedStyle(this.element).display === 'inline') {
                console.warn('MagneticJS: The element "display" css property should be different from "inline"');
            }

            this.element.style.transition = 'transform 0.6s cubic-bezier(0.075, 0.82, 0.165, 1)'
            this.element.style.willChange = 'transform'

            const boundingClientRect = this.element.getBoundingClientRect()

            this.width = boundingClientRect.width
            this.height = boundingClientRect.height
            this.center = {
                x: boundingClientRect.x + this.width/2,
                y: boundingClientRect.y + this.height/2
            }
            this.zone = {
                radius: {
                    x: this.width/2 + this.powerDistance,
                    y: this.height/2 + this.powerDistance,
                }
            }
        }

        this.__setScrollHandler = () => {
            if (!this.updateOnScroll) return

            document.addEventListener('scroll', () => {
                const boundingClientRect = this.element.getBoundingClientRect()

                this.center = {
                    x: boundingClientRect.x + this.width/2,
                    y: boundingClientRect.y + this.height/2
                }
            })
        }

        this.constuctor(...arguments)
    }

    return function () {
        this.magnets = []

        this.constuctor = () => {
            document.addEventListener('mousemove', (e) => {
                this.magnets.forEach((magnet) => this.__render(e, magnet))
            })

            return this
        }

        this.add = (config) => {
            const magnet = new Magnet(config)
            this.magnets.push(magnet)
            return magnet
        }

        this.__render = (event, magnet) => {
            const mouse = {
                x: event.clientX,
                y: event.clientY,
            }
            mouse.distance = {
                x: (mouse.x - magnet.center.x),
                y: (mouse.y - magnet.center.y),
            }
            mouse.distance.xAbs = Math.abs(mouse.distance.x)
            mouse.distance.yAbs = Math.abs(mouse.distance.y)

            if (
                mouse.distance.xAbs < magnet.zone.radius.x &&
                mouse.distance.yAbs < magnet.zone.radius.y
            ) {
                const percent = {
                    x: 1 - mouse.distance.xAbs/magnet.zone.radius.x,
                    y: 1 - mouse.distance.yAbs/magnet.zone.radius.y,
                }

                const translate = {
                    x: mouse.distance.x * percent.x*percent.y,
                    y: mouse.distance.y * percent.x*percent.y,
                }

                magnet.element.style.transform = `translate3d(${translate.x}px, ${translate.y}px, 0)`
                return
            }

            magnet.element.style.transform = ''
        }

        this.constuctor(...arguments)
    }
})()
export default Magnetic;
