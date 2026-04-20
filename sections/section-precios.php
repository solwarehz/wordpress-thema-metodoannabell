<?php if (!get_theme_mod('show_precios', true)) return; ?>
<section class="precios-section section-py" id="precios">
  <div class="container">
    <div class="text-center" style="max-width:620px;margin:0 auto 1.5rem">
      <span class="section-label"><?php echo esc_html(get_theme_mod('precios_label','Inversión · Lanzamiento 2026')); ?></span>
      <h2 class="section-title"><?php echo esc_html(get_theme_mod('precios_title','Elige tu nivel de escalamiento')); ?></h2>
      <p class="section-desc" style="margin:0 auto">
        <?php echo esc_html(get_theme_mod('precios_desc','Paquetes diseñados según la etapa real de tu negocio. Cupos estrictamente limitados para garantizar acompañamiento de calidad.')); ?>
      </p>
    </div>
    <div class="text-center">
      <div class="precios-note"><?php echo esc_html(get_theme_mod('precios_note','⏳ Tarifas de lanzamiento válidas solo para esta primera etapa — sujetas a cambio al completar cupos')); ?></div>
    </div>
    <div class="precios-category">◆ <?php echo esc_html(get_theme_mod('precios_cat1','Para Emprendedores')); ?></div>
    <div class="precios-grid">
      <?php foreach ([
        1=>['Hobby a Emprendedor','Estás convirtiendo tu pasión en negocio y necesitas las bases correctas.','Menores a S/ 2,000','🔥 Solo 2 cupos disponibles','S/ 100','S/ 250',false,''],
        2=>['Emprendedor 1','Ya tienes ingresos estables pero necesitas estructura para crecer.','S/ 2,000 — S/ 5,000','🔥 Solo 2 cupos disponibles','S/ 200','S/ 400',false,''],
        3=>['Emprendedor 2','Tienes equipo y operación, pero el crecimiento te desborda.','S/ 5,000 — S/ 10,000','🔥 Solo 2 cupos disponibles','S/ 300','S/ 700',true,'Más solicitado'],
        4=>['Emprendedor 3','Negocio consolidado que necesita escalar con liderazgo y sistemas.','S/ 10,000 — S/ 50,000','🔥 Solo 2 cupos disponibles','USD 100','USD 200',false,''],
      ] as $n => $d):
        $feat  = get_theme_mod("precio_emp_{$n}_featured", $d[6]);
        $badge = get_theme_mod("precio_emp_{$n}_badge",    $d[7]);
      ?>
      <div class="precio-card<?php echo $feat ? ' featured' : ''; ?> fade-up">
        <?php if ($feat && $badge): ?><div class="precio-badge"><?php echo esc_html($badge); ?></div><?php endif; ?>
        <div class="precio-title"><?php echo esc_html(get_theme_mod("precio_emp_{$n}_title", $d[0])); ?></div>
        <p class="precio-perfil"><?php   echo esc_html(get_theme_mod("precio_emp_{$n}_perfil",$d[1])); ?></p>
        <div class="precio-ingresos">Ingresos mensuales</div>
        <div class="precio-rango"><?php  echo esc_html(get_theme_mod("precio_emp_{$n}_rango", $d[2])); ?></div>
        <div class="precio-cupos"><?php  echo esc_html(get_theme_mod("precio_emp_{$n}_cupos", $d[3])); ?></div>
        <div class="precio-amount">
          <div class="precio-launch">Tarifa de lanzamiento</div>
          <div class="precio-value"><?php echo esc_html(get_theme_mod("precio_emp_{$n}_launch",$d[4])); ?> <span>/ sesión</span></div>
          <div class="precio-normal">Precio normal: <?php echo esc_html(get_theme_mod("precio_emp_{$n}_normal",$d[5])); ?> / sesión</div>
        </div>
        <a href="#contacto" class="btn <?php echo $feat ? 'btn-gold' : 'btn-outline'; ?> btn-full" style="margin-top:1.5rem">Aplicar a este nivel</a>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="precios-category" style="margin-top:4rem">◆ <?php echo esc_html(get_theme_mod('precios_cat2','Línea Premium — Sector Salud')); ?></div>
    <p style="color:var(--gray);font-size:.9rem;margin-bottom:2rem">
      <?php echo esc_html(get_theme_mod('precios_cat2_desc','Mentoría especializada para profesionales de la salud que quieren escalar su consulta o clínica. Annabell habla tu idioma — es odontóloga empresaria.')); ?>
    </p>
    <div class="precios-grid" style="grid-template-columns:repeat(auto-fit,minmax(240px,1fr))">
      <?php foreach ([
        1=>['Salud 1','Profesionales independientes y consultorios pequeños.','⚡ Solo 1 cupo disponible','S/ 400','S/ 800',false,''],
        2=>['Salud 2','Clínicas y centros médicos en proceso de crecimiento.','⚡ Solo 1 cupo disponible','S/ 600','S/ 1,200',true,'Línea Premium'],
        3=>['Salud 3','Operaciones multi consultorio y clínicas de alta complejidad.','⚡ Solo 1 cupo disponible','USD 200','USD 400',false,''],
      ] as $n => $d):
        $feat  = get_theme_mod("precio_salud_{$n}_featured", $d[5]);
        $badge = get_theme_mod("precio_salud_{$n}_badge",    $d[6]);
      ?>
      <div class="precio-card<?php echo $feat ? ' featured' : ''; ?> fade-up">
        <?php if ($feat && $badge): ?><div class="precio-badge"><?php echo esc_html($badge); ?></div><?php endif; ?>
        <div class="precio-title"><?php echo esc_html(get_theme_mod("precio_salud_{$n}_title", $d[0])); ?></div>
        <p class="precio-perfil"><?php   echo esc_html(get_theme_mod("precio_salud_{$n}_perfil",$d[1])); ?></p>
        <div class="precio-cupos" style="margin-top:0.5rem"><?php echo esc_html(get_theme_mod("precio_salud_{$n}_cupos",$d[2])); ?></div>
        <div class="precio-amount">
          <div class="precio-launch">Tarifa de lanzamiento</div>
          <div class="precio-value"><?php echo esc_html(get_theme_mod("precio_salud_{$n}_launch",$d[3])); ?> <span>/ sesión</span></div>
          <div class="precio-normal">Precio normal: <?php echo esc_html(get_theme_mod("precio_salud_{$n}_normal",$d[4])); ?> / sesión</div>
        </div>
        <a href="#contacto" class="btn <?php echo $feat ? 'btn-gold' : 'btn-outline'; ?> btn-full" style="margin-top:1.5rem">Aplicar a este nivel</a>
      </div>
      <?php endforeach; ?>
    </div>
    <div style="margin-top:2.5rem;text-align:center">
      <p style="font-size:.82rem;color:var(--gray);max-width:560px;margin:0 auto;line-height:1.7">
        <strong style="color:var(--gold-light)">Nota importante:</strong>
        <?php echo esc_html(get_theme_mod('precios_nota_final','Las tarifas de lanzamiento corresponden únicamente a esta etapa inicial de validación. Serán ajustadas una vez completados los cupos disponibles de cada nivel.')); ?>
      </p>
    </div>
  </div>
</section>
<div class="gold-divider"></div>
