<?php if (!get_theme_mod('show_fases', true)) return; ?>
<section class="fases-section section-py" id="fases">
  <div class="container">
    <div class="text-center" style="max-width:620px;margin:0 auto">
      <span class="section-label"><?php echo esc_html(get_theme_mod('fases_label','Estructura del programa')); ?></span>
      <h2 class="section-title"><?php echo esc_html(get_theme_mod('fases_title','Las 5 Fases de Escalamiento Empresarial')); ?></h2>
      <p class="section-desc" style="margin:0 auto">
        <?php echo esc_html(get_theme_mod('fases_desc','El programa avanza contigo a tu ritmo. No hay siguiente fase sin acción demostrada — solo resultados reales habilitan el paso.')); ?>
      </p>
    </div>
    <div class="fases-list">
      <?php foreach ([
        1=>['Aprende a Medir Todo y Deja de Gestionar a Ciegas','Entender la realidad actual del negocio mediante indicadores clave y métricas de gestión. Defines tu punto de partida real.'],
        2=>['Anticípate a los Escenarios y Ordena Antes del Caos','Desarrollar estructura organizacional y visión estratégica antes de que el crecimiento desborde la operación.'],
        3=>['Cambia Tu Forma de Contratar y Construye un Mejor Equipo','Aprender a incorporar talento con criterio estratégico, evitando contrataciones por urgencia que cuestan caro.'],
        4=>['Aprende a Delegar de Verdad y Deja de Ser el Cuello de Botella','Construir autonomía operativa mediante sistemas efectivos de delegación y liderazgo real.'],
        5=>['Abraza los Errores y Convierte Tu Negocio en un Sistema que Mejora Solo','Implementar cultura de mejora continua, optimización de procesos y madurez operativa sostenible.'],
      ] as $n => $d): ?>
      <div class="fase-item fade-up">
        <div class="fase-number"><?php echo $n; ?></div>
        <div>
          <div class="fase-title"><?php echo esc_html(get_theme_mod("fase_{$n}_title",$d[0])); ?></div>
          <p class="fase-desc"><?php   echo esc_html(get_theme_mod("fase_{$n}_desc", $d[1])); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<div class="gold-divider"></div>
