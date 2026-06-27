/* Carrusel de la home — sin dependencias.
   Modo normal: paginado (1/2/3 visibles, flechas, dots, swipe, autoplay con rebobinado).
   Modo data-loop="seamless": bucle infinito continuo (clona ítems → sin rebobinado).
   Pausa al pasar el mouse. Solo auto-rota si hay más ítems que los visibles. */
(function () {
  var GAP = 16;
  var carousels = Array.prototype.slice.call(document.querySelectorAll('.carousel'));
  if (!carousels.length) return;

  carousels.forEach(function (car) {
    var viewport = car.querySelector('.car-viewport');
    var track = car.querySelector('.car-track');
    if (!viewport || !track) return;
    var seamless = car.getAttribute('data-loop') === 'seamless';
    var real = Array.prototype.slice.call(track.children);
    var N = real.length;
    if (!N) return;
    var prev = car.querySelector('.car-prev');
    var next = car.querySelector('.car-next');
    var dotsWrap = car.querySelector('.car-dots');
    var autoplay = parseInt(car.getAttribute('data-autoplay'), 10) || 0;
    var visible = 3, idx = 0, maxIdx = 0, itemW = 0, timer = null, clones = [];

    function vis() {
      var w = window.innerWidth;
      if (w < 640) return 1;
      if (w < 980) return 2;
      return 3;
    }
    function loopable() { return N > visible; }
    function setX(animate) {
      track.style.transition = animate === false ? 'none' : '';
      track.style.transform = 'translateX(' + (-(idx * (itemW + GAP))) + 'px)';
    }
    function activeDot() { return seamless ? (((idx % N) + N) % N) : idx; }
    function updateDots() {
      if (!dotsWrap) return;
      var a = activeDot();
      Array.prototype.forEach.call(dotsWrap.children, function (d, k) { d.classList.toggle('active', k === a); });
    }

    function clearClones() {
      clones.forEach(function (c) { if (c.parentNode) c.parentNode.removeChild(c); });
      clones = [];
    }
    function buildClones() {
      clearClones();
      if (!(seamless && loopable())) return;
      for (var i = 0; i < visible; i++) {
        var c = real[i % N].cloneNode(true);
        c.setAttribute('aria-hidden', 'true');
        track.appendChild(c);
        clones.push(c);
      }
    }

    function go(i, animate) {
      if (seamless && loopable()) {
        idx = i;
      } else {
        idx = i < 0 ? maxIdx : (i > maxIdx ? 0 : i);
      }
      setX(animate);
      updateDots();
    }

    // Bucle infinito: al pasar del último real (clones), salta sin animación.
    track.addEventListener('transitionend', function (e) {
      if (e.target !== track || !(seamless && loopable())) return;
      if (idx >= N) { idx -= N; setX(false); }
      else if (idx < 0) { idx += N; setX(false); }
    });

    function stop() { if (timer) { clearInterval(timer); timer = null; } }
    function start() { stop(); if (autoplay && loopable()) timer = setInterval(function () { go(idx + 1, true); }, autoplay); }

    function buildDots() {
      if (!dotsWrap) return;
      dotsWrap.innerHTML = '';
      var count = seamless ? N : (maxIdx + 1);
      for (var i = 0; i < count; i++) {
        var d = document.createElement('button');
        d.className = 'car-dot';
        d.setAttribute('aria-label', 'Ir a ' + (i + 1));
        (function (n) { d.addEventListener('click', function () { go(n, true); start(); }); })(i);
        dotsWrap.appendChild(d);
      }
      updateDots();
    }

    function layout() {
      visible = Math.min(vis(), N);
      buildClones();
      itemW = (viewport.clientWidth - GAP * (visible - 1)) / visible;
      Array.prototype.slice.call(track.children).forEach(function (it) { it.style.width = itemW + 'px'; });
      maxIdx = Math.max(0, N - visible);
      if (seamless) idx = ((idx % N) + N) % N;
      else if (idx > maxIdx) idx = 0;
      buildDots();
      go(idx, false);
      var enable = loopable();
      [prev, next].forEach(function (b) { if (b) b.style.visibility = enable ? '' : 'hidden'; });
      if (dotsWrap) dotsWrap.style.display = enable ? '' : 'none';
      start();
    }

    function nav(dir) {
      // En seamless, antes de ir hacia atrás desde 0, salta a una copia equivalente.
      if (seamless && loopable()) {
        if (dir < 0 && idx <= 0) { idx = N; setX(false); }
        else if (dir > 0 && idx >= N) { idx = 0; setX(false); }
      }
      go(idx + dir, true);
    }
    if (prev) prev.addEventListener('click', function () { nav(-1); start(); });
    if (next) next.addEventListener('click', function () { nav(1); start(); });
    car.addEventListener('mouseenter', stop);
    car.addEventListener('mouseleave', start);

    var x0 = null;
    viewport.addEventListener('touchstart', function (e) { x0 = e.touches[0].clientX; stop(); }, { passive: true });
    viewport.addEventListener('touchend', function (e) {
      if (x0 === null) return;
      var dx = e.changedTouches[0].clientX - x0;
      if (Math.abs(dx) > 40) nav(dx < 0 ? 1 : -1);
      x0 = null; start();
    }, { passive: true });

    var rt;
    window.addEventListener('resize', function () { clearTimeout(rt); rt = setTimeout(layout, 180); });
    layout();
  });
})();
