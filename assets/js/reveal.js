/* Reveal al hacer scroll — home + VSL. Sin dependencias.
   Añade [data-reveal] a bloques clave y los muestra al entrar al viewport,
   con un leve escalonado (stagger) entre hermanos. */
(function () {
  if (!('IntersectionObserver' in window)) return;
  if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  var sel = [
    '.section .eyebrow', '.section h1', '.section h2', '.section .lead', '.section .divisor',
    '.home-hero .cta', '.hero-cta',
    '.elegante', '.bigquote', '.cover', '.card', '.fase', '.acard', '.rcard', '.vcard',
    '.testi', '.obj', '.event', '.stats .s', '.social a', '.chips .badge', '.price-anchor',
    '.offer', '.pq-col'
  ].join(',');

  var els = Array.prototype.slice.call(document.querySelectorAll(sel));
  if (!els.length) return;
  els.forEach(function (el) { el.setAttribute('data-reveal', ''); });

  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (!e.isIntersecting) return;
      var el = e.target;
      var sibs = Array.prototype.filter.call(el.parentNode.children, function (c) {
        return c.nodeType === 1 && c.hasAttribute('data-reveal');
      });
      var i = sibs.indexOf(el);
      el.style.transitionDelay = (Math.min(i, 6) * 70) + 'ms';
      el.classList.add('is-visible');
      io.unobserve(el);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });

  els.forEach(function (el) { io.observe(el); });

  /* Seguridad: si algo quedara oculto tras unos segundos, mostrarlo igual */
  setTimeout(function () {
    els.forEach(function (el) {
      var r = el.getBoundingClientRect();
      if (r.top < window.innerHeight && !el.classList.contains('is-visible')) el.classList.add('is-visible');
    });
  }, 2500);
})();
