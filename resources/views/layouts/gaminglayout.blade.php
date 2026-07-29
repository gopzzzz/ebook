<!DOCTYPE html>
<html lang="en">
     @include('layouts.gamingpartials.head')

<body class="gaming-page">
 <style>
 .g-cursor { position: fixed; top: 0; left: 0; width: 20px; height: 20px; border: 2px solid #00f5ff; pointer-events: none; z-index: 999999; transform: translate(-50%, -50%); transition: width 0.2s, height 0.2s, background-color 0.2s, border-color 0.2s, box-shadow 0.2s; box-shadow: 0 0 10px rgba(0,245,255,0.4); }
 .g-cursor.hover { width: 34px; height: 34px; background-color: rgba(0, 245, 255, 0.1); border-color: #b026ff; box-shadow: 0 0 15px rgba(176,38,255,0.5); }
 /* Hide default cursor */
 .gaming-page, .gaming-page * { cursor: none !important; }
 </style>
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



