const elem = document.querySelector('.footer');
const header = document.querySelector('.header')

setInterval(() => {
    const posTop = elem.getBoundingClientRect().top;

    if(posTop <= 1) header.classList.add('white')
    else header.classList.remove('white')
}, 300)
