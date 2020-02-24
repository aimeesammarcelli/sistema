document.getElementById('sidebar-menu-close').addEventListener('mouseover', animateMenuButton)

function animateMenuButton (event) {
      if (event.target.classList.contains('animate')) {
      } else {
        event.target.classList.add('animate')
        setTimeout(function () {
          removeClass(event.target)
        }, 1000)
      }
}
function removeClass (target) {
  target.classList.remove('animate')
}