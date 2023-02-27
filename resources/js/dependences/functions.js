export function getPercentOfIntermediate(start, finish, middle, offset = 0) {
    // start += offset
    // finish += offset
    // middle += offset

    let diff1 = middle - start
    let diff2 = finish - start

    return diff1 / diff2 * 100
}

const maxSizeForTablet = 1024;

export function isTablet() {
    return window.screen.width < maxSizeForTablet
}

export function isDesktop() {
    return window.screen.width >= maxSizeForTablet
}

const maxSizeForMobile = 600;

export function isMobile() {
    return window.screen.width < maxSizeForMobile
}
