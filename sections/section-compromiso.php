<?php if (!get_theme_mod('show_compromiso', true)) return; ?>
<section class="compromiso-section section-py">
  <div class="container">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:3rem;align-items:center">
      <div class="fade-up">
        <span class="section-label"><?php echo esc_html(get_theme_mod('compromiso_label','El compromiso es mutuo')); ?></span>
        <h2 class="section-title"><?php echo esc_html(get_theme_mod('compromiso_title','Annabell se compromete contigo al 100%')); ?></h2>
        <p style="color:var(--gray-light);line-height:1.9;margin-top:1rem">
          <?php echo esc_html(get_theme_mod('compromiso_desc','Cada sesión es preparada con el diagnóstico real de tu negocio. No hay respuestas genéricas. No hay scripts. Cada acuerdo es pensado para tu contexto específico.')); ?>
        </p>
      </div>
      <div class="fade-up">
        <ul class="problem-list">
          <?php foreach ([
            1=>['Preparación previa','Annabell estudia tu negocio antes de cada sesión.'],
            2=>['Acuerdos accionables','Saldrás de cada sesión con pasos concretos, no ideas vagas.'],
            3=>['Seguimiento por evidencias','Tu progreso se mide con resultados reales, no con palabras.'],
            4=>['Metodología estructurada','El Método A.N.N.A.B.E.L.L. — validado en su propio negocio y con 5 mentees.'],
          ] as $n => $d): ?>
          <li>
            <span class="icon">◆</span>
            <div>
              <strong style="color:var(--white)"><?php echo esc_html(get_theme_mod("compromiso_item_{$n}_title",$d[0])); ?></strong>
              <p style="margin:0;font-size:.85rem"><?php echo esc_html(get_theme_mod("compromiso_item_{$n}_desc",$d[1])); ?></p>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
<div class="gold-divider"></div>
