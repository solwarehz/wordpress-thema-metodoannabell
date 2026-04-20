<?php if (!get_theme_mod('show_bio', true)) return; ?>
<section class="bio-section section-py">
  <div class="container">
    <div class="bio-grid">
      <div class="bio-img-wrap fade-up">
        <div class="bio-img-placeholder">
          <?php
          $bio_photo = get_theme_mod('bio_photo', '');
          if ($bio_photo):
            echo '<img src="' . esc_url($bio_photo) . '" alt="' . esc_attr(get_theme_mod('bio_name','Annabell')) . ' — Mentora Empresarial" style="width:100%;height:100%;object-fit:cover;display:block">';
          elseif (has_post_thumbnail()):
            the_post_thumbnail('large', ['alt' => esc_attr(get_theme_mod('bio_name','Annabell')) . ' — Mentora Empresarial']);
          else:
            echo '<span style="padding:2rem;display:block">Foto de<br>' . esc_html(get_theme_mod('bio_name','Annabell')) . '<br><small style="opacity:.5">(seleccionar en Personalizar)</small></span>';
          endif; ?>
        </div>
      </div>
      <div class="fade-up">
        <span class="section-label"><?php echo esc_html(get_theme_mod('bio_label','Tu mentora')); ?></span>
        <h2 class="section-title"><?php echo esc_html(get_theme_mod('bio_name','Annabell')); ?></h2>
        <div class="bio-credentials">
          <?php foreach ([
            1=>'Odontóloga & Empresaria', 2=>'Directora de Clínica Goldent',
            3=>'Mentora invitada — Cámara de Comercio de Huaraz', 4=>'5× crecimiento de ingresos en 5 años',
          ] as $n => $def): ?>
          <span class="bio-credential">◆ <?php echo esc_html(get_theme_mod("bio_cred_{$n}",$def)); ?></span>
          <?php endforeach; ?>
        </div>
        <blockquote class="bio-quote">
          <?php echo esc_html(get_theme_mod('bio_quote','"Una conversación de una sola sesión puede cambiarlo todo — si viene con acción comprometida."')); ?>
        </blockquote>
        <p class="bio-text"><?php echo esc_html(get_theme_mod('bio_p1','Annabell no es una consultora que te da teoría desde una pantalla. Es una empresaria que construyó su propia clínica, enfrentó los mismos problemas que tú enfrenta hoy, y desarrolló un método probado para salir del caos operacional y liderar con criterio.')); ?></p>
        <p class="bio-text" style="margin-top:1rem"><?php echo esc_html(get_theme_mod('bio_p2','Después de ser mentora invitada por la Cámara de Comercio de Huaraz y acompañar a sus primeros 5 mentees con resultados concretos, lanza formalmente su programa de mentoría en esta primera etapa de validación — con cupos muy limitados.')); ?></p>
        <a href="#contacto" class="btn btn-gold" style="margin-top:2rem">
          <?php echo esc_html(get_theme_mod('bio_btn_text','Solicitar mi sesión →')); ?>
        </a>
      </div>
    </div>
  </div>
</section>
<div class="gold-divider"></div>
