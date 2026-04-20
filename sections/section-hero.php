<?php if (!get_theme_mod('show_hero', true)) return; ?>
<?php $hero_bg = esc_url(get_theme_mod('hero_bg_image', '')); ?>
<section class="hero" id="inicio">
  <div class="hero-bg"<?php if ($hero_bg): ?> style="background-image:url(<?php echo $hero_bg; ?>);background-size:cover;background-position:center;"<?php endif; ?>></div>
  <div class="hero-particles"></div>
  <div class="container">
    <div class="hero-content">

      <span class="hero-label"><?php echo esc_html(get_theme_mod('hero_label', 'Mentoría · Lanzamiento 2026')); ?></span>

      <h1 class="hero-title">
        <?php echo wp_kses(get_theme_mod('hero_title', "¿Tu negocio crece<br>pero tú <em>sigues atrapada</em><br>en la operación?"), ['br' => [], 'em' => []]); ?>
      </h1>

      <p class="hero-sub">
        <?php echo esc_html(get_theme_mod('hero_subtitle', 'El Método A.N.N.A.B.E.L.L. te acompaña a escalar con orden, estrategia y liderazgo — en sesiones 1:1 de acción real, no de teoría.')); ?>
      </p>

      <div class="hero-cta-group">
        <a href="<?php echo esc_url(get_theme_mod('hero_btn1_url', '#contacto')); ?>" class="btn btn-gold btn-lg">
          <?php echo esc_html(get_theme_mod('hero_btn1_text', 'Quiero mi primera sesión →')); ?>
        </a>
        <a href="<?php echo esc_url(get_theme_mod('hero_btn2_url', '#metodo')); ?>" class="btn btn-outline">
          <?php echo esc_html(get_theme_mod('hero_btn2_text', 'Conoce el método')); ?>
        </a>
      </div>

      <div class="hero-stats">
        <?php foreach ([
          1 => ['5×','Ingresos incrementados'],
          2 => ['5','Años de resultados reales'],
          3 => ['1:1','Sesiones personalizadas'],
          4 => ['8','Cupos de lanzamiento'],
        ] as $n => $d): ?>
        <div class="hero-stat">
          <span class="stat-number"><?php echo esc_html(get_theme_mod("hero_stat{$n}_num",   $d[0])); ?></span>
          <span class="stat-label"><?php  echo esc_html(get_theme_mod("hero_stat{$n}_label", $d[1])); ?></span>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>
<div class="gold-divider"></div>
