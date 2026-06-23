/* Carrusel de la home — sin dependencias.
   Auto-rotación (data-autoplay ms), responsive (1/2/3 visibles), flechas, dots, swipe.
   Solo auto-rota si hay más ítems que los visibles. Pausa al pasar el mouse. */
(function () {
  var GAP = 16;
  var carousels = Array.prototype.slice.call(document.querySelectorAll('.carousel'));
  if (!carousels.length) return;

  carousels.forEach(function (car) {
    var viewport = car.querySelector('.car-viewport');
    var track = car.querySelector('.car-track');
    if (!viewport || !track) return;
    var items = Array.prototype.slice.call(track.children);
    if (!items.length) return;
    var prev = car.querySelector('.car-prev');
    var next = car.querySelector('.car-next');
    var dotsWrap = car.querySelector('.car-dots');
    var autoplay = parseInt(car.getAttribute('data-autoplay'), 10) || 0;
    var visible = 3, idx = 0, maxIdx = 0, itemW = 0, timer = null;

    function vis() {
      var w = window.innerWidth;
      if (w < 640) return 1;
      if (w < 980) return 2;
      return 3;
    }
    function go(i, animate) {
      idx = i < 0 ? maxIdx : (i > maxIdx ? 0 : i);
      track.style.transition = animate === false ? 'none' : '';
      track.style.transform = 'translateX(' + (-(idx * (itemW + GAP))) + 'px)';
      if (dotsWrap) Array.prototype.forEach.call(dotsWrap.children, function (d, k) { d.classList.toggle('active', k === idx); });
    }
    function stop() { if (timer) { clearInterval(timer); timer = null; } }
    function start() { stop(); if (autoplay && items.length > visible) timer = setInterval(function () { go(idx + 1, true); }, autoplay); }

    function buildDots() {
      if (!dotsWrap) return;
      dotsWrap.innerHTML = '';
      for (var i = 0; i <= maxIdx; i++) {
        var d = document.createElement('button');
        d.className = 'car-dot' + (i === idx ? ' active' : '');
        d.setAttribute('aria-label', 'Ir a ' + (i + 1));
        (function (n) { d.addEventListener('click', function () { go(n, true); start(); }); })(i);
        dotsWrap.appendChild(d);
      }
    }
    function layout() {
      visible = Math.min(vis(), items.length);
      itemW = (viewport.clientWidth - GAP * (visible - 1)) / visible;
      items.forEach(function (it) { it.style.width = itemW + 'px'; });
      maxIdx = Math.max(0, items.length - visible);
      if (idx > maxIdx) idx = 0;
      buildDots();
      go(idx, false);
      var enable = items.length > visible;
      [prev, next].forEach(function (b) { if (b) b.style.visibility = enable ? '' : 'hidden'; });
      if (dotsWrap) dotsWrap.style.display = enable ? '' : 'none';
      start();
    }

    if (prev) prev.addEventListener('click', function () { go(idx - 1, true); start(); });
    if (next) next.addEventListener('click', function () { go(idx + 1, true); start(); });
    car.addEventListener('mouseenter', stop);
    car.addEventListener('mouseleave', start);

    var x0 = null;
    viewport.addEventListener('touchstart', function (e) { x0 = e.touches[0].clientX; stop(); }, { passive: true });
    viewport.addEventListener('touchend', function (e) {
      if (x0 === null) return;
      var dx = e.changedTouches[0].clientX - x0;
      if (Math.abs(dx) > 40) go(idx + (dx < 0 ? 1 : -1), true);
      x0 = null; start();
    }, { passive: true });

    var rt;
    window.addEventListener('resize', function () { clearTimeout(rt); rt = setTimeout(layout, 180); });
    layout();
  });
})();
