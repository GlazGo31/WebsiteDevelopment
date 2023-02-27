import customSelect from 'custom-select'

customSelect('select')

let selects = document.querySelectorAll('.custom-select-opener')

selects.forEach(select => {
    $(select).addClass('btn btn-click magnetic')

    let span = select.querySelector('span')

    $(select).attr('data-strength', 20)
    $(select).attr('data-strength-text', 10)

    let text = span.innerText

    span.innerText = ''

    span.classList.add('btn-text')

    let btnFill = document.createElement('div')

    btnFill.classList.add('btn-fill')

    span.append(btnFill)

    let btnTextInner = document.createElement('span')

    btnTextInner.innerText = text

    btnTextInner.classList.add('btn-text-inner')
    btnTextInner.classList.add('change')

    span.append(btnTextInner)
})

