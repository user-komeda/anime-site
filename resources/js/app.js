require('./bootstrap')

const week = document.getElementById('week')
console.log(document.querySelectorAll('#js-close'))
week.addEventListener('click', event => {
    const clickedElement = event.target
    const clickedNextElement = clickedElement.nextElementSibling
    clickedNextElement.classList.toggle('d-none')
})

const weekTabs = document.querySelectorAll('#week>ul')
console.log(weekTabs)
