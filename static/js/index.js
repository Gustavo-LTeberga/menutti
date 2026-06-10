 function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    const icon = document.getElementById('menu-icon');
    menu.classList.toggle('open');
    icon.className = menu.classList.contains('open') ? 'bi bi-x-lg' : 'bi bi-list';
  }

  document.querySelectorAll('.cat-link').forEach(link => {
    link.addEventListener('click', function(e) {
      document.querySelectorAll('.cat-link').forEach(l => l.classList.remove('active'));
      document.querySelectorAll('.cat-link').forEach(l => {
        if (l.textContent === this.textContent) l.classList.add('active');
      });
    });
  });