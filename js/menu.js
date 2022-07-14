const showSubmenu = (e) => {
  let submenu1 = e.target;
  document.querySelector('.multi-level-dropdown .dropdown-submenu .dropdown-menu').classList.remove('show');  
  submenu1.nextElementSibling.classList.add('show')
  e.stopPropagation();
}

const hideSubmenu = (e) => {
  let submenu1 = e.target;
  document.querySelector('.multi-level-dropdown .dropdown-submenu .dropdown-menu').classList.remove('show');  
  submenu1.nextElementSibling.classList.remove('show')
  e.stopPropagation();
}

let submenu = document.querySelector(".multi-level-dropdown .dropdown-submenu > a")

submenu.addEventListener("click", e => {
  showSubmenu(e)
})

submenu.addEventListener("mouseenter", e => {
  showSubmenu(e)
})

submenu.addEventListener("mouseleave", e => {
  hideSubmenu(e)
})