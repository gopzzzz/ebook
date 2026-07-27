

  <!-- Custom Box Pointer Cursor -->
  <div class="g-cursor" id="gCursor"></div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      if(window.innerWidth < 768) return; // Disable on mobile
      const cursor = document.getElementById('gCursor');
      document.addEventListener('mousemove', e => {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
      });
      // Add hover effect dynamically including for future elements
      document.body.addEventListener('mouseover', e => {
        if(e.target.closest('a, button, input, select, .g-product-card, .g-cat-card')) {
          cursor.classList.add('hover');
        } else {
          cursor.classList.remove('hover');
        }
      });
    });
  </script>
  <script>
    // ─── GAMING MOBILE MENU TOGGLE ───
    document.addEventListener('DOMContentLoaded', () => {
      const gMenuBtn = document.getElementById('gMenuBtn');
      const gNav = document.getElementById('gNav');
      if (gMenuBtn && gNav) {
        gMenuBtn.addEventListener('click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          gMenuBtn.classList.toggle('active');
          gNav.classList.toggle('open');
        });

        gNav.querySelectorAll('.g-nav-link').forEach(link => {
          link.addEventListener('click', function() {
            gMenuBtn.classList.remove('active');
            gNav.classList.remove('open');
          });
        });

        document.addEventListener('click', function(e) {
          if (gNav.classList.contains('open') && !gNav.contains(e.target) && !gMenuBtn.contains(e.target)) {
            gMenuBtn.classList.remove('active');
            gNav.classList.remove('open');
          }
        });
      }
    });
  </script>