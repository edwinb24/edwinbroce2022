function toogleHamburgerIcon() {
    let hamburger_icon = document.getElementsByClassName("hamburger-icon")[0];
    hamburger_icon.classList.toggle("change");
}

/* JavaScript to add logo image to main navigation when scrolling pass the header */
function toogleMainMenuImage() {
  let window_width = window.innerWidth
  || document.documentElement.clientWidth
  || document.body.clientWidth

  if(window_width > 850) {
    let header_wrapper = document.getElementsByClassName("header-wrapper")[0]
    let header_wrapper_height = header_wrapper.getBoundingClientRect().height
    let main_nav = document.getElementsByClassName("main-menu-wrapper")[0]
    let main_nav_height = main_nav.getBoundingClientRect().height
    let sticky_nav = header_wrapper_height + main_nav_height
    window.onscroll = function() {toggleMainImage(sticky_nav, main_nav)}
    
    function toggleMainImage(sticky_nav, main_nav) {
      if (window.pageYOffset > sticky_nav) {
        main_nav.classList.add("sticky_nav")
      } else {
        main_nav.classList.remove("sticky_nav")
      }
    }
  }
}