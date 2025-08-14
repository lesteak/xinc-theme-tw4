(function () {
  //theme mode switcher
  const root = document.documentElement;
  const key = 'wp-theme';
  const toggle = document.getElementById('theme-toggle');

  const current = localStorage.getItem(key) || root.getAttribute('data-theme') || 'light';
  root.setAttribute('data-theme', current);
  if (toggle) toggle.checked = current !== 'light';

  toggle?.addEventListener('change', () => {
    const next = toggle.checked ? 'abyss' : 'light';
    root.setAttribute('data-theme', next);
    localStorage.setItem(key, next);
  });

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
      console.log(iconClose)
    });
  }
})();
