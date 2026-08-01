<!DOCTYPE html>
<html lang="en">
     @include('layouts.gamingpartials.head')

<body class="gaming-page">
 <style>
  /* ── Custom Gaming Cursor ── */
  .g-cursor {
    position: fixed;
    top: 0;
    left: 0;
    width: 20px;
    height: 20px;
    border: 2px solid #00f5ff;
    border-radius: 0;                         /* Square shape */
    pointer-events: none !important;          /* never blocks clicks */
    z-index: 2147483647;
    opacity: 0;
    /* NO transform transition — instant 1:1 with mouse */
    will-change: transform;
    transition: width 0.12s ease, height 0.12s ease,
                background-color 0.12s ease, border-color 0.12s ease,
                box-shadow 0.12s ease, opacity 0.25s ease;
    box-shadow: 0 0 10px rgba(0,245,255,0.5), 0 0 20px rgba(0,245,255,0.2);
  }

  /* Hover state — expands ring, changes to purple */
  .g-cursor.hover {
    width: 36px;
    height: 36px;
    background-color: rgba(0,245,255,0.08);
    border-color: #b026ff;
    box-shadow: 0 0 15px rgba(176,38,255,0.6), 0 0 40px rgba(176,38,255,0.2);
  }
  .g-cursor.visible { opacity: 1; }

  /* Touch / coarse-pointer devices: show system cursor, hide custom */
  @media (hover: none), (pointer: coarse) {
    .g-cursor { display: none !important; }
    .gaming-page, .gaming-page * { cursor: auto !important; }
  }
  /* Desktop fine-pointer: hide system cursor, show custom */
  @media (hover: hover) and (pointer: fine) {
    .gaming-page, .gaming-page * { cursor: none !important; }
  }
 </style>
 <div class="g-cursor" id="gCursor"></div>

 @include('layouts.gamingpartials.header')

  
 @yield('content') 

   @include('layouts.gamingpartials.footer')

    @include('layouts.webpartials.footerscript')

    <script>
      (function initGamingCursor() {
        /* Skip on touch / coarse-pointer devices */
        if (window.matchMedia('(hover: none), (pointer: coarse)').matches) return;

        var cursor = document.getElementById('gCursor');
        if (!cursor) return;

        /* ─────────────────────────────────────────────────────────────
           INSTANT 1:1 CURSOR POSITIONING
           We update the transform directly on mousemove — no easing lag.
           This means the visual cursor is ALWAYS exactly where the mouse
           is, so every click lands exactly where it looks like it will.
        ───────────────────────────────────────────────────────────── */
        document.addEventListener('mousemove', function(e) {
          /* translate(-50%,-50%) centres the cursor element on the hotspot */
          cursor.style.transform =
            'translate3d(' + e.clientX + 'px,' + e.clientY + 'px,0) translate(-50%,-50%)';
          if (!cursor.classList.contains('visible')) {
            cursor.classList.add('visible');
          }
        }, { passive: true });

        document.addEventListener('mouseleave', function() {
          cursor.classList.remove('visible');
        });

        document.addEventListener('mouseenter', function() {
          cursor.classList.add('visible');
        });

        /* ── Hover-state: enlarge cursor ring on interactive elements ── */
        function attachHover(root) {
          var els = (root || document).querySelectorAll(
            'a, button, input, select, label, textarea,
             .g-cat-tab, .g-product-card, .g-thumb-btn,
             [role="button"], [onclick]'
          );
          els.forEach(function(el) {
            if (el.dataset.cursorBound) return;
            el.dataset.cursorBound = '1';
            el.addEventListener('mouseenter', function() {
              cursor.classList.add('hover');
            }, { passive: true });
            el.addEventListener('mouseleave', function() {
              cursor.classList.remove('hover');
            }, { passive: true });
          });
        }

        if (document.readyState === 'loading') {
          document.addEventListener('DOMContentLoaded', function() { attachHover(); });
        } else {
          attachHover();
        }

        /* Watch for dynamically injected elements (e.g. quick-view modals) */
        var observer = new MutationObserver(function(mutations) {
          mutations.forEach(function(m) {
            m.addedNodes.forEach(function(node) {
              if (node.nodeType === 1) attachHover(node);
            });
          });
        });
        observer.observe(document.documentElement, { childList: true, subtree: true });

      })();
    </script>
</body>
</html>



