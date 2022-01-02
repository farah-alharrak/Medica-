const filterInput = document.querySelector('#filter')
const champs = document.querySelectorAll('.info')

filterInput.addEventListener('keyup', e => {
  champs.forEach(ch => {
    if (
      ch.textContent.toLocaleLowerCase().trim().indexOf(e.target.value) === -1
    ) {
      ch.style.display = 'none'
    } else {
      ch.style.display = ''
    }
  })
})
