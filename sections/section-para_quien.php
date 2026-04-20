<?php if (!get_theme_mod('show_para_quien', true)) return; ?>
<section class="para-quien-section section-py">
  <div class="container">
    <div class="text-center" style="margin-bottom:3rem">
      <span class="section-label"><?php echo esc_html(get_theme_mod('pq_label','Calificación')); ?></span>
      <h2 class="section-title"><?php echo esc_html(get_theme_mod('pq_title','¿Es para ti?')); ?></h2>
    </div>
    <div class="para-quien-grid">
      <div class="pq-box yes fade-up">
        <div class="pq-header yes">
          <span>✦</span> <?php echo esc_html(get_theme_mod('pq_yes_header','Esta mentoría SÍ es para ti si…')); ?>
        </div>
        <ul class="pq-list">
          <?php foreach ([
            1=>'Tienes un negocio que ya genera ingresos y quieres escalarlo.',
            2=>'Estás dispuesta a actuar, no solo a escuchar.',
            3=>'Eres emprendedora o empresaria con visión de crecimiento real.',
            4=>'Puedes comprometerte con los acuerdos de cada sesión.',
            5=>'Quieres duplicar tus resultados con estrategia, no con suerte.',
            6=>'Trabajas en el sector salud y quieres escalar tu consulta o clínica.',
          ] as $n => $def): ?>
          <li><span class="check">◆</span> <?php echo esc_html(get_theme_mod("pq_yes_{$n}",$def)); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="pq-box no fade-up">
        <div class="pq-header no">
          <span>✕</span> <?php echo esc_html(get_theme_mod('pq_no_header','Esta mentoría NO es para ti si…')); ?>
        </div>
        <ul class="pq-list">
          <?php foreach ([
            1=>'Solo buscas ideas sin ningún compromiso de acción.',
            2=>'Esperas resultados sin implementar nada.',
            3=>'No tienes negocio activo (aún en etapa de idea solamente).',
            4=>'No puedes comprometer tiempo para ejecutar entre sesiones.',
            5=>'Buscas una fórmula mágica sin esfuerzo propio.',
          ] as $n => $def): ?>
          <li><span class="x">✕</span> <?php echo esc_html(get_theme_mod("pq_no_{$n}",$def)); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
<div class="gold-divider"></div>
