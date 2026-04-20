<?php if (!get_theme_mod('show_proceso', true)) return; ?>
<section class="proceso-section section-py">
  <div class="container">
    <div class="text-center" style="max-width:580px;margin:0 auto 3rem">
      <span class="section-label"><?php echo esc_html(get_theme_mod('proceso_label','El proceso')); ?></span>
      <h2 class="section-title"><?php echo esc_html(get_theme_mod('proceso_title','Así funciona la mentoría')); ?></h2>
      <p class="section-desc" style="margin:0 auto">
        <?php echo esc_html(get_theme_mod('proceso_desc','Un sistema diseñado para generar acción real — no solo buenas intenciones.')); ?>
      </p>
    </div>
    <div class="proceso-grid">
      <?php foreach ([
        1=>['📋','Agenda tu sesión','Completa el formulario. Annabell revisa tu perfil y confirma disponibilidad.'],
        2=>['🎯','Sesión 1:1 (60 min)','Diagnóstico de tu negocio y acuerdos de acción concretos. Virtual, directo al punto.'],
        3=>['⚡','Tomas acción','Implementas los acuerdos en tu negocio. Tu ritmo, tu realidad.'],
        4=>['📸','Envías evidencias','Sin evidencias de acción, no hay segunda sesión. El compromiso es el requisito.'],
        5=>['🚀','Sigues escalando','Con cada sesión aprobada, avanzas en las fases del método hacia el siguiente nivel.'],
      ] as $n => $d): ?>
      <div class="proceso-step fade-up">
        <div class="proceso-icon"><?php echo esc_html(get_theme_mod("proceso_step_{$n}_icon", $d[0])); ?></div>
        <div class="proceso-title"><?php echo esc_html(get_theme_mod("proceso_step_{$n}_title",$d[1])); ?></div>
        <p class="proceso-desc"><?php   echo esc_html(get_theme_mod("proceso_step_{$n}_desc", $d[2])); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center" style="margin-top:3rem">
      <div style="display:inline-block;background:rgba(201,168,76,.07);border:1px solid rgba(201,168,76,.2);border-radius:8px;padding:1.5rem 2.5rem;max-width:560px">
        <p style="color:var(--gold-light);font-family:var(--font-head);font-size:1rem;margin-bottom:.5rem">
          <?php echo esc_html(get_theme_mod('proceso_quote','"No hay segunda sesión sin acción."')); ?>
        </p>
        <p style="color:var(--gray);font-size:.85rem">
          <?php echo esc_html(get_theme_mod('proceso_quote_sub','Esto no es un curso de videos. Es acompañamiento real con rendición de cuentas real.')); ?>
        </p>
      </div>
    </div>
  </div>
</section>
<div class="gold-divider"></div>
