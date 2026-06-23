/* Lightbox mobile-first para la home — sin dependencias.
   Fotos (.cover img): se amplían y se navegan por galería.
   Videos (.vcard[data-yt]): se abren en popup con autoplay, en primer plano.
   Cerrar: botón ×, fondo, Escape o swipe abajo. */
(function () {
  var photos = Array.prototype.slice.call(document.querySelectorAll('.home-page .cover img'));
  var videos = Array.prototype.slice.call(document.querySelectorAll('.home-page [data-yt]'));
  if (!photos.length && !videos.length) return;

  var lb = document.createElement('div');
  lb.className = 'lb';
  lb.setAttribute('role', 'dialog');
  lb.setAttribute('aria-label', 'Vista ampliada');
  lb.innerHTML =
    '<button class="lb-close" aria-label="Cerrar">&times;</button>' +
    '<button class="lb-nav lb-prev" aria-label="Anterior"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg></button>' +
    '<div class="lb-stage"></div>' +
    '<button class="lb-nav lb-next" aria-label="Siguiente"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 6 15 12 9 18"/></svg></button>';
  document.body.appendChild(lb);

  var stage = lb.querySelector('.lb-stage');
  var prev = lb.querySelector('.lb-prev');
  var next = lb.querySelector('.lb-next');
  var group = [], idx = 0, mode = 'img';

  function openLb() { lb.classList.add('open'); document.body.classList.add('lb-open'); }
  function close() {
    lb.classList.remove('open');
    document.body.classList.remove('lb-open');
    stage.innerHTML = ''; // quita el iframe → detiene el video
  }
  function nav(show) { prev.style.display = next.style.display = show ? '' : 'none'; }

  /* Fotos */
  function groupOf(img) {
    var g = img.closest ? img.closest('.gallery, .car-track') : null;
    return g ? Array.prototype.slice.call(g.querySelectorAll('.cover img')) : [img];
  }
  function showPhoto(i) {
    idx = (i + group.length) % group.length;
    stage.innerHTML = '<img alt="">';
    stage.firstChild.src = group[idx].currentSrc || group[idx].src;
    nav(group.length > 1);
  }
  function openPhoto(img) { mode = 'img'; group = groupOf(img); showPhoto(group.indexOf(img)); openLb(); }

  /* Videos */
  function openVideo(id) {
    mode = 'video'; nav(false);
    stage.innerHTML = '<div class="lb-video"><iframe src="https://www.youtube-nocookie.com/embed/' + id +
      '?autoplay=1&rel=0&modestbranding=1" title="Video" allow="autoplay; encrypted-media; picture-in-picture; fullscreen" allowfullscreen></iframe></div>';
    openLb();
  }

  photos.forEach(function (img) { img.addEventListener('click', function () { openPhoto(img); }); });
  videos.forEach(function (el) {
    var id = el.getAttribute('data-yt');
    el.addEventListener('click', function () { openVideo(id); });
    el.addEventListener('keydown', function (e) { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openVideo(id); } });
  });

  lb.querySelector('.lb-close').addEventListener('click', close);
  prev.addEventListener('click', function (e) { e.stopPropagation(); if (mode === 'img') showPhoto(idx - 1); });
  next.addEventListener('click', function (e) { e.stopPropagation(); if (mode === 'img') showPhoto(idx + 1); });
  lb.addEventListener('click', function (e) { if (e.target === lb) close(); });
  document.addEventListener('keydown', function (e) {
    if (!lb.classList.contains('open')) return;
    if (e.key === 'Escape') close();
    else if (mode === 'img' && e.key === 'ArrowLeft') showPhoto(idx - 1);
    else if (mode === 'img' && e.key === 'ArrowRight') showPhoto(idx + 1);
  });

  /* Swipe móvil: abajo = cerrar · lateral = navegar fotos */
  var x0 = null, y0 = null;
  lb.addEventListener('touchstart', function (e) { x0 = e.touches[0].clientX; y0 = e.touches[0].clientY; }, { passive: true });
  lb.addEventListener('touchend', function (e) {
    if (x0 === null) return;
    var dx = e.changedTouches[0].clientX - x0, dy = e.changedTouches[0].clientY - y0;
    if (Math.abs(dy) > 80 && Math.abs(dy) > Math.abs(dx)) close();
    else if (mode === 'img' && Math.abs(dx) > 50 && group.length > 1) showPhoto(idx + (dx < 0 ? 1 : -1));
    x0 = y0 = null;
  }, { passive: true });
})();
