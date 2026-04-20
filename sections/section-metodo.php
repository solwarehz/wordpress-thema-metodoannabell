<?php if (!get_theme_mod('show_metodo', true)) return; ?>
<section class="metodo-section section-py" id="metodo">
  <div class="container">
    <div class="text-center" style="max-width:620px;margin:0 auto">
      <span class="section-label"><?php echo esc_html(get_theme_mod('metodo_label','La metodología')); ?></span>
      <h2 class="section-title"><?php echo esc_html(get_theme_mod('metodo_title','¿Qué significa A·N·N·A·B·E·L·L?')); ?></h2>
      <p class="section-desc" style="margin:0 auto">
        <?php echo esc_html(get_theme_mod('metodo_desc','Cada letra es un pilar de transformación empresarial. Un sistema completo para escalar con intención, no por intuición.')); ?>
      </p>
    </div>
    <div class="acronym-grid" style="margin-top:3rem">
      <?php foreach ([
        1=>['A','Analiza','Comprende la realidad actual de tu negocio antes de intentar escalar.'],
        2=>['N','Numera','Mide absolutamente todo. Lo que no se mide no se puede mejorar.'],
        3=>['N','Navega','Aprende a dirigir tu negocio con visión estratégica y criterio de gestión.'],
        4=>['A','Anticípate','Ordena antes del caos. Prepárate para crecer antes de necesitarlo.'],
        5=>['B','Busca Talento','Construye equipo con criterio. Contrata por estándar, no por urgencia.'],
        6=>['E','Enseña','Delegar exige transferir conocimiento, formar y acompañar.'],
        7=>['L','Lidera','Deja de operar como autoempleada y empieza a liderar la estructura.'],
        8=>['L','Lecciona','Abraza los errores, optimiza procesos y construye mejora continua.'],
      ] as $n => $d): ?>
      <div class="acronym-card fade-up">
        <div class="acronym-letter"><?php echo esc_html(get_theme_mod("metodo_card_{$n}_letter",$d[0])); ?></div>
        <div class="acronym-word">— <?php echo esc_html(get_theme_mod("metodo_card_{$n}_word",$d[1])); ?></div>
        <p class="acronym-desc"><?php echo esc_html(get_theme_mod("metodo_card_{$n}_desc",$d[2])); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<div class="gold-divider"></div>
