const Menu = () => {
  //main navigation
  const toggleBtn = document.getElementById('mobile-menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  
  const iconHamburger = document.getElementById('main-nav-hamburger');
  const iconClose = document.getElementById('main-nav-close');
  
  if (toggleBtn && mobileMenu) {
    toggleBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
      iconHamburger.classList.toggle('hidden');
      iconClose.classList.toggle('hidden');
    });
  }
}

export default Menu;
