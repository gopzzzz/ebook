<!DOCTYPE html>
<html lang="en">
     @include('layouts.gamingpartials.head')

<body class="gaming-page">
 <div class="g-cursor" id="gCursor"></div>

 @include('layouts.gamingpartials.header')

  
 @yield('content') 

   @include('layouts.gamingpartials.footer')

    @include('layouts.webpartials.footerscript')

    <!-- Custom Gaming Cursor Script -->
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const cursor = document.getElementById('gCursor');
        if(!cursor) return;
        
        let mouseX = 0;
        let mouseY = 0;
        let cursorX = 0;
        let cursorY = 0;
        
        document.addEventListener('mousemove', (e) => {
          mouseX = e.clientX;
          mouseY = e.clientY;
        });
        
        // Smooth follow animation
        const animate = () => {
          cursorX += (mouseX - cursorX) * 0.2;
          cursorY += (mouseY - cursorY) * 0.2;
          cursor.style.transform = `translate(${cursorX}px, ${cursorY}px) translate(-50%, -50%)`;
          requestAnimationFrame(animate);
        };
        requestAnimationFrame(animate);
        
        // Add hover effect to interactive elements
        const interactives = document.querySelectorAll('a, button, input, select, .g-cat-tab, .g-product-card');
        interactives.forEach(el => {
          el.addEventListener('mouseenter', () => cursor.classList.add('hover'));
          el.addEventListener('mouseleave', () => cursor.classList.remove('hover'));
        });
      });
    </script>
</body>
</html>



