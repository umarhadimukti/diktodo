import './bootstrap';
import Alpine from 'alpinejs';

// Alpine's instance to be available everywhere
window.Alpine = Alpine

Alpine.store('sidebar', {
  full: false,
  active: 'home',
  navOpen: false,
  sideOpen: false,
})

Alpine.start()