const LightMode = () => {
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
}

export default LightMode;
