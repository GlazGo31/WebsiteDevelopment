$('.cookie .close').click(() => {
    $('.cookie').hide()
    localStorage.setItem('cookie', 'accept')
})

let isCookieAccepted = localStorage.getItem('cookie')

if(isCookieAccepted) {
    $('.cookie').hide()
}
