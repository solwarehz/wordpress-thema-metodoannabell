/* VSL — video con trato tipo YouTube: clic en el póster abre el video en
   popup a pantalla completa (autoplay). Sirve para Vimeo y YouTube. */
(function () {
  var triggers = document.querySelectorAll('.video-play[data-embed]');
  if (!triggers.length) return;

  var ov = document.createElement('div');
  ov.className = 'vid-pop';
  ov.setAttribute('role', 'dialog');
  ov.setAttribute('aria-label', 'Video');
  ov.innerHTML = '<button class="vid-pop-close" aria-label="Cerrar">&times;</button><div class="vid-pop-frame"></div>';
  document.body.appendChild(ov);
  var frame = ov.querySelector('.vid-pop-frame');

  function open(src) {
    frame.innerHTML = '<iframe src="' + src + '" allow="autoplay; fullscreen; picture-in-picture; encrypted-media" allowfullscreen></iframe>';
    ov.classList.add('open');
    document.body.classList.add('vidpop-open');
  }
  function close() {
    frame.innerHTML = ''; // quita el iframe → detiene el video
    ov.classList.remove('open');
    document.body.classList.remove('vidpop-open');
  }

  triggers.forEach(function (t) { t.addEventListener('click', function () { open(t.getAttribute('data-embed')); }); });
  ov.querySelector('.vid-pop-close').addEventListener('click', close);
  ov.addEventListener('click', function (e) { if (e.target === ov) close(); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && ov.classList.contains('open')) close(); });
})();
