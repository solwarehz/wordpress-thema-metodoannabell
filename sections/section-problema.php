<?php if (!get_theme_mod('show_problema', true)) return; ?>
<section class="problem-section section-py">
  <div class="container">
    <div class="problem-grid">
      <div>
        <span class="section-label"><?php echo esc_html(get_theme_mod('problema_label', '¿Te identificas?')); ?></span>
        <h2 class="section-title"><?php echo esc_html(get_theme_mod('problema_title', 'Síntomas de un negocio sin estructura')); ?></h2>
        <ul class="problem-list" style="margin-top:2rem">
          <?php foreach ([
            1 => 'Trabajas más horas que nunca, pero los ingresos no escalan igual.',
            2 => 'No sabes exactamente cuánto vendes, cuánto gastas ni qué tan rentable eres.',
            3 => 'Contratas por urgencia y después tienes que resolver los errores del equipo tú misma.',
            4 => 'Delegas tareas, pero igual terminas haciéndolas porque "nadie lo hace bien".',
            5 => 'Tienes ideas de crecimiento, pero no sabes por dónde empezar sin crear más caos.',
          ] as $n => $def): ?>
          <li><span class="icon">◆</span><?php echo esc_html(get_theme_mod("problema_item_{$n}", $def)); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="problem-right fade-up">
        <p style="color:var(--gold);font-family:var(--font-head);font-size:1.2rem;margin-bottom:1rem">
          <?php echo esc_html(get_theme_mod('problema_good_news', 'La buena noticia:')); ?>
        </p>
        <p style="color:var(--gray-light);line-height:1.9;margin-bottom:1.5rem">
          <?php echo wp_kses(get_theme_mod('problema_right_p1', 'Estos no son problemas de capacidad. Son problemas de <strong>estructura y método</strong>. Annabell lo vivió — y los resolvió. Hoy te muestra exactamente cómo.'), ['strong' => []]); ?>
        </p>
        <p style="color:var(--gray);font-size:.9rem;line-height:1.7">
          <?php echo wp_kses(get_theme_mod('problema_right_p2', 'En su propia clínica Goldent, aplicó un sistema que le permitió <strong>quintuplicar sus ingresos en 5 años</strong> sin perder el control de la operación. Ese sistema es el Método A.N.N.A.B.E.L.L.'), ['strong' => []]); ?>
        </p>
      </div>
    </div>
  </div>
</section>
<div class="gold-divider"></div>
