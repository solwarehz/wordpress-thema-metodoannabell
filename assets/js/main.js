/* Método ANNABELL — Main JS */

document.addEventListener('DOMContentLoaded', () => {

  /* ── Nav scroll effect ── */
  const nav = document.querySelector('.site-nav');
  if (nav) {
    const onScroll = () => {
      nav.classList.toggle('scrolled', window.scrollY > 60);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* ── Mobile nav toggle ── */
  const toggle = document.querySelector('.nav-toggle');
  const links  = document.querySelector('.nav-links');
  if (toggle && links) {
    toggle.addEventListener('click', () => {
      links.classList.toggle('open');
      const open = links.classList.contains('open');
      toggle.setAttribute('aria-expanded', open);
    });
    document.querySelectorAll('.nav-links a').forEach(a => {
      a.addEventListener('click', () => links.classList.remove('open'));
    });
  }

  /* ── Fade-up on scroll (IntersectionObserver) ── */
  const fadeEls = document.querySelectorAll('.fade-up');
  if (fadeEls.length) {
    const obs = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('visible');
          obs.unobserve(e.target);
        }
      });
    }, { threshold: 0.12 });
    fadeEls.forEach(el => obs.observe(el));
  }

  /* ── Hero particles ── */
  const particlesContainer = document.querySelector('.hero-particles');
  if (particlesContainer) {
    for (let i = 0; i < 18; i++) {
      const p = document.createElement('div');
      p.className = 'particle';
      p.style.cssText = `
        left: ${Math.random() * 100}%;
        top: ${Math.random() * 100}%;
        animation-delay: ${Math.random() * 4}s;
        animation-duration: ${3 + Math.random() * 4}s;
        opacity: ${0.1 + Math.random() * 0.3};
        width: ${1 + Math.random() * 2}px;
        height: ${1 + Math.random() * 2}px;
      `;
      particlesContainer.appendChild(p);
    }
  }

  /* ── Smooth anchor scroll ── */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = 80;
        const top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    });
  });

  /* ── Countdown: urgency timer (optional — 48h from page load) ── */
  const timerEl = document.getElementById('countdown-timer');
  if (timerEl) {
    const KEY = 'annabell_timer_end';
    let end = localStorage.getItem(KEY);
    if (!end) {
      end = Date.now() + 48 * 60 * 60 * 1000;
      localStorage.setItem(KEY, end);
    }
    const tick = () => {
      const diff = +end - Date.now();
      if (diff <= 0) {
        timerEl.innerHTML = '<span>Oferta expirada</span>';
        return;
      }
      const h = String(Math.floor(diff / 3600000)).padStart(2, '0');
      const m = String(Math.floor((diff % 3600000) / 60000)).padStart(2, '0');
      const s = String(Math.floor((diff % 60000) / 1000)).padStart(2, '0');
      timerEl.innerHTML = `
        <span class="timer-block"><strong>${h}</strong><em>hrs</em></span>
        <span class="timer-sep">:</span>
        <span class="timer-block"><strong>${m}</strong><em>min</em></span>
        <span class="timer-sep">:</span>
        <span class="timer-block"><strong>${s}</strong><em>seg</em></span>
      `;
    };
    tick();
    setInterval(tick, 1000);
  }

  /* ── Testimonios carousel ── */
  const carousel = document.querySelector('.testimonios-carousel');
  if (carousel) {
    const track    = carousel.querySelector('.testimonios-track');
    const cards    = Array.from(track.querySelectorAll('.testimonio-card'));
    const dotsWrap = carousel.querySelector('.t-dots');
    const prevBtn  = carousel.querySelector('.t-prev');
    const nextBtn  = carousel.querySelector('.t-next');
    const GAP      = 24; // 1.5rem in px

    let colsSetting = parseInt(carousel.dataset.cols) || 3;
    let cols, pages, current = 0, timer;

    const getCols = () => {
      if (window.innerWidth < 600)  return 1;
      if (window.innerWidth < 900)  return Math.min(2, colsSetting);
      return colsSetting;
    };

    const setWidths = () => {
      const w = track.clientWidth;
      const cardW = (w - GAP * (cols - 1)) / cols;
      cards.forEach(c => { c.style.width = cardW + 'px'; });
    };

    const buildDots = () => {
      dotsWrap.innerHTML = '';
      for (let i = 0; i < pages; i++) {
        const d = document.createElement('button');
        d.className = 't-dot' + (i === 0 ? ' active' : '');
        d.setAttribute('aria-label', `Ir a página ${i + 1}`);
        d.addEventListener('click', () => { goTo(i); resetTimer(); });
        dotsWrap.appendChild(d);
      }
    };

    const updateDots = () => {
      dotsWrap.querySelectorAll('.t-dot').forEach((d, i) => {
        d.classList.toggle('active', i === current);
      });
    };

    const goTo = (page) => {
      current = ((page % pages) + pages) % pages;
      const cardW = cards[0] ? parseInt(cards[0].style.width) : 0;
      const offset = current * cols * (cardW + GAP);
      track.style.transform = `translateX(-${offset}px)`;
      updateDots();
    };

    const init = () => {
      cols  = getCols();
      pages = Math.ceil(cards.length / cols);
      current = 0;
      setWidths();
      buildDots();
      track.style.transform = 'translateX(0)';
    };

    const startTimer = () => {
      timer = setInterval(() => goTo(current + 1), 4500);
    };
    const resetTimer = () => { clearInterval(timer); startTimer(); };

    init();
    startTimer();

    prevBtn.addEventListener('click', () => { goTo(current - 1); resetTimer(); });
    nextBtn.addEventListener('click', () => { goTo(current + 1); resetTimer(); });

    carousel.addEventListener('mouseenter', () => clearInterval(timer));
    carousel.addEventListener('mouseleave', () => startTimer());

    let resizeTO;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTO);
      resizeTO = setTimeout(() => { init(); startTimer(); }, 200);
    });

    /* touch swipe */
    let touchX = 0;
    carousel.addEventListener('touchstart', e => { touchX = e.touches[0].clientX; }, { passive: true });
    carousel.addEventListener('touchend', e => {
      const dx = e.changedTouches[0].clientX - touchX;
      if (Math.abs(dx) > 40) { goTo(current + (dx < 0 ? 1 : -1)); resetTimer(); }
    });
  }

  /* ── Contact form ── */
  const form = document.getElementById('contact-form');
  if (form) {
    const isWpAjax = form.dataset.ajax === 'true';

    if (isWpAjax) {
      form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const btn = form.querySelector('[type=submit]');
        const data = new FormData(form);

        btn.disabled = true;
        btn.textContent = 'Enviando...';

        try {
          const res = await fetch(form.action, {
            method: 'POST',
            body: data,
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
          });
          const json = await res.json();
          if (json.success) {
            form.innerHTML = `
              <div style="text-align:center;padding:2rem">
                <div style="font-size:2.5rem;margin-bottom:1rem">✓</div>
                <h3 style="font-family:var(--font-head);color:var(--gold);margin-bottom:.5rem">¡Solicitud recibida!</h3>
                <p style="color:var(--gray)">Annabell se pondrá en contacto contigo muy pronto.</p>
              </div>
            `;
          } else {
            throw new Error(json.data || 'Error');
          }
        } catch {
          btn.disabled = false;
          btn.textContent = 'Quiero mi sesión →';
          alert('Hubo un problema. Por favor intenta de nuevo o escríbenos por WhatsApp.');
        }
      });
    }
    // Si no tiene data-ajax="true", el formulario hace POST normal al URL externo
  }

});
