<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gaming Zone — Pouch Gallery®</title>
  <meta name="description" content="Ultimate gaming peripherals – keyboards, mice, headsets, chairs, monitors and more. Shop Pouch Gallery's Gaming Zone for the best gear at the best prices." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Rajdhani:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <link rel="icon" type="image/png" href="{{asset('public/assets/logo.png')}}" />
  <link rel="apple-touch-icon" href="{{asset('public/assets/logo.png')}}" />

  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('public/gaming.css')}}" />
  <style>
    /* ── Page Entrance Wipe ── */
    #gEntranceWipe {
      position: fixed;
      inset: 0;
      z-index: 99999;
      pointer-events: none;
      overflow: hidden;
    }
    /* The neon sweep bar */
    #gEntranceWipe::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 100%;
      background: linear-gradient(
        180deg,
        #02020a 0%,
        #02020a calc(var(--wipe-y, 0%) - 3px),
        #00f5ff calc(var(--wipe-y, 0%) - 1px),
        rgba(0,245,255,.5) var(--wipe-y, 0%),
        transparent calc(var(--wipe-y, 0%) + 2px)
      );
      filter: drop-shadow(0 0 8px #00f5ff);
      transition: none;
    }
  </style>

  <style>
    /* Layout */
    .g-container { max-width: 1400px; margin: 0 auto; padding: 0 2rem; }
    .g-shop-layout { display: grid; grid-template-columns: 240px 1fr; gap: 2rem; padding: 2rem 0 5rem; }
    @media (max-width: 900px) { .g-shop-layout { grid-template-columns: 1fr; } }
    .g-sidebar { position: sticky; top: 100px; align-self: start; }
    @media (max-width: 900px) { .g-sidebar { display: none; } }

    /* Pagination */
    .g-pagination { display: flex; justify-content: center; gap: 0.5rem; margin-top: 3rem; }
    .g-page-btn {
      width: 38px; height: 38px;
      background: var(--g-dark-3);
      border: 1px solid var(--g-border);
      color: #556677;
      font-family: var(--g-font);
      font-size: 0.72rem;
      font-weight: 700;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer;
      clip-path: polygon(4px 0%, 100% 0%, calc(100% - 4px) 100%, 0% 100%);
      transition: all 0.2s;
    }
    .g-page-btn.active, .g-page-btn:hover {
      background: rgba(0,245,255,0.1);
      border-color: var(--g-cyan);
      color: var(--g-cyan);
      box-shadow: var(--g-glow-cyan);
    }

    /* Active filter tags */
    .g-active-filters { display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem; }
    .g-active-tag {
      display: flex; align-items: center; gap: 0.4rem;
      font-family: var(--g-font); font-size: 0.62rem; letter-spacing: 0.08em;
      color: var(--g-cyan);
      border: 1px solid var(--g-border-hot);
      padding: 0.25rem 0.7rem;
      clip-path: polygon(4px 0%, 100% 0%, calc(100% - 4px) 100%, 0% 100%);
      background: rgba(0,245,255,0.05);
    }
    .g-active-tag button { color: #556677; font-size: 1rem; line-height: 1; cursor: pointer; background: none; border: none; transition: color 0.2s; }
    .g-active-tag button:hover { color: var(--g-red); }

    /* Toolbar row */
    .g-toolbar { display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap; margin-bottom: 1.25rem; }
    .g-toolbar-right { display: flex; align-items: center; gap: 0.75rem; }
  </style>
</head>