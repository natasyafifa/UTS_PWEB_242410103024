<div>
    <!-- “It is not the man who has too little, but the man who craves more, that is poor.” - Seneca -->
</div>

<footer class="footer-custom mt-5">
  <div class="container text-center small">
    &copy; {{ date('Y') }} <span class="brand">Zef<span class="highlight">Archive</span></span> — dibuat dengan penuh cinta oleh <strong>Natasya</strong>.
  </div>
</footer>

<style>
  .footer-custom {
    background: linear-gradient(180deg, #1b2430 0%, #0e1620 100%);
    color: #cfd3d8;
    padding: 18px 0;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    font-family: 'Poppins', sans-serif;
    letter-spacing: 0.3px;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
  }

  .footer-custom .brand {
    color: #8ab4f8;
    font-weight: 600;
    transition: color 0.4s ease;
  }

  .footer-custom:hover .brand {
    color: #a8c9ff;
  }

  .footer-custom::before {
    content: '';
    position: absolute;
    top: 0;
    left: -50%;
    width: 200%;
    height: 2px;
    background: linear-gradient(90deg, transparent, #8ab4f8, transparent);
    animation: shimmer 4s infinite linear;
  }

  @keyframes shimmer {
    0% { left: -50%; }
    100% { left: 100%; }
  }

  .footer-custom div {
    animation: fadeInUp 1.2s ease both;
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>
