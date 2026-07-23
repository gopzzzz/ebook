

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