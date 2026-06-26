<?php
/* Home — Hub de autoridad de Annabell Aguedo.
   Estructura única por bloque: etiqueta + h2 + texto + carrusel + botón. */
defined('ABSPATH') || exit;

$A = 'home_asset';
$arrows =
    '<button class="car-nav car-prev" aria-label="Anterior"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg></button>' .
    '<button class="car-nav car-next" aria-label="Siguiente"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 6 15 12 9 18"/></svg></button>';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class('home-page'); ?>>
<?php wp_body_open(); ?>

<!-- NAV -->
<nav class="home-nav">
  <div class="wrap">
    <?php echo annabell_logo_html(true, 'nav-logo-img'); ?>
    <ul class="links">
      <?php if (home_on('show_home_historia')): ?><li><a href="#historia">Historia</a></li><?php endif; ?>
      <?php if (home_on('show_home_fotografia')): ?><li><a href="#fotografia">Fotografía</a></li><?php endif; ?>
      <?php if (home_on('show_home_goldent')): ?><li><a href="#goldent">Goldent</a></li><?php endif; ?>
      <?php if (home_on('show_home_podcast')): ?><li><a href="#podcast">Podcast</a></li><?php endif; ?>
      <?php if (home_on('show_home_metodo')): ?><li><a href="#metodo">El Método</a></li><?php endif; ?>
    </ul>
    <a href="<?php echo esc_url(home_f('home_nav_cta_url', '/mentoria/')); ?>" class="btn btn-oro btn-sm"><?php echo esc_html(home_f('home_nav_cta_text')); ?></a>
  </div>
</nav>

<?php if (home_on('show_home_hero')): ?>
<!-- HERO -->
<section class="section home-hero">
  <div class="wrap">
    <div class="grid">
      <div>
        <span class="eyebrow"><?php echo wp_kses_post(home_f('home_hero_eyebrow')); ?></span>
        <h1><?php echo wp_kses_post(home_f('home_hero_title')); ?></h1>
        <p class="lead"><?php echo wp_kses_post(home_f('home_hero_text')); ?></p>
        <div class="cta">
          <a href="<?php echo esc_url(home_f('home_hero_btn1_url', '#historia')); ?>" class="btn btn-oro btn-lg"><?php echo esc_html(home_f('home_hero_btn1_text')); ?><svg class="btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
          <a href="<?php echo esc_url(home_f('home_hero_btn2_url', '/mentoria/')); ?>" class="btn btn-ghost btn-lg"><?php echo esc_html(home_f('home_hero_btn2_text')); ?><svg class="btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        </div>
      </div>
      <div class="portrait"><?php echo home_media('home_hero', 'ar-4-5', 'Foto profesional de Annabell', $A('_annabell_photography/annabell_aguedo_annabell_photography.jpg')); ?></div>
    </div>
    <?php echo home_hero_cards(); ?>
  </div>
</section>
<?php endif; ?>

<?php if (home_on('show_home_historia')): ?>
<!-- HISTORIA + CIFRAS -->
<section class="section carbon" id="historia">
  <div class="wrap narrow center mxa">
    <span class="eyebrow"><?php echo wp_kses_post(home_f('home_historia_eyebrow')); ?></span>
    <h2><?php echo wp_kses_post(home_f('home_historia_title')); ?></h2>
    <div class="divisor"></div>
    <p class="mxa"><?php echo wp_kses_post(home_f('home_historia_text')); ?></p>
    <?php if ($q = home_f('home_historia_quote')): ?><p class="elegante grad-text mxa" style="margin-top:var(--s6)">"<?php echo wp_kses_post($q); ?>"</p><?php endif; ?>
  </div>
  <div class="wrap">
    <div class="stats" style="margin-top:var(--s8)">
      <?php for ($n = 1; $n <= 4; $n++): if (!home_f("home_cifra{$n}_num")) continue; ?>
      <div class="s"><b><?php echo esc_html(home_f("home_cifra{$n}_num")); ?></b><span><?php echo esc_html(home_f("home_cifra{$n}_label")); ?></span></div>
      <?php endfor; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (home_on('show_home_fotografia')): ?>
<!-- FOTOGRAFÍA -->
<section class="section" id="fotografia">
  <div class="wrap center" style="margin-bottom:var(--s8)">
    <span class="eyebrow"><?php echo wp_kses_post(home_f('home_foto_eyebrow')); ?></span>
    <h2><?php echo wp_kses_post(home_f('home_foto_title')); ?></h2>
    <p class="lead mxa" style="margin-top:var(--s3)"><?php echo wp_kses_post(home_f('home_foto_text')); ?></p>
  </div>
  <div class="wrap"><?php echo home_carousel('home_foto', [
    $A('_annabell_photography/whorkshop_fotografia_annabell_aguedo.jpg'),
    $A('_annabell_photography/Noah_annabell_photography.jpg'),
    $A('_annabell_photography/niño_annabell_photography.jpg'),
    $A('_annabell_photography/niña_annabell_aguedo.jpg'),
    $A('_annabell_photography/abuelita_nieta_annabell_photography.jpg'),
    $A('_annabell_photography/Annabell_annabell_photography.jpg'),
  ]); ?></div>
  <?php if ($u = home_f('home_foto_url')): ?><div class="wrap center" style="margin-top:var(--s6)"><a href="<?php echo esc_url($u); ?>" target="_blank" rel="noopener" class="btn btn-ghost">Ver su trabajo en Facebook</a></div><?php endif; ?>
</section>
<?php endif; ?>

<?php if (home_on('show_home_goldent')): ?>
<!-- GOLDENT -->
<section class="section carbon" id="goldent">
  <div class="wrap center" style="margin-bottom:var(--s8)">
    <span class="eyebrow"><?php echo wp_kses_post(home_f('home_goldent_eyebrow')); ?></span>
    <h2><?php echo wp_kses_post(home_f('home_goldent_title')); ?></h2>
    <p class="lead mxa" style="margin-top:var(--s3)"><?php echo wp_kses_post(home_f('home_goldent_text')); ?></p>
  </div>
  <div class="wrap"><?php echo home_carousel('home_goldent', [
    $A('clinica_goldent/local_clinica_goldent.jpg'),
    $A('clinica_goldent/equipo_clinica_goldent.jpg'),
    $A('clinica_goldent/reinauguracion_clinica_goldent.jpg'),
    $A('clinica_goldent/doctor_clinica_goldent.jpg'),
  ]); ?></div>
  <?php if ($u = home_f('home_goldent_fb_url')): ?><div class="wrap center" style="margin-top:var(--s6)"><a href="<?php echo esc_url($u); ?>" target="_blank" rel="noopener" class="btn btn-ghost"><?php echo esc_html(home_f('home_goldent_fb_text')); ?></a></div><?php endif; ?>
</section>
<?php endif; ?>

<?php if (home_on('show_home_ponencias')): ?>
<!-- PONENCIAS -->
<section class="section" id="ponencias">
  <div class="wrap center" style="margin-bottom:var(--s8)">
    <span class="eyebrow"><?php echo wp_kses_post(home_f('home_ponencias_eyebrow')); ?></span>
    <h2><?php echo wp_kses_post(home_f('home_ponencias_title')); ?></h2>
    <p class="lead mxa" style="margin-top:var(--s3)"><?php echo wp_kses_post(home_f('home_ponencias_intro')); ?></p>
  </div>
  <div class="wrap"><?php echo home_carousel('home_ponencias', [
    $A('annabell_aguedo/seminario_annabell_aguedo.jpg'),
    $A('annabell_aguedo/seminarios__annabell_aguedo.jpg'),
    $A('annabell_aguedo/sminarios_annabell_aguedo.jpg'),
    $A('annabell_aguedo/asistente_seminario_annabell_aguedo.jpg'),
    $A('annabell_aguedo/programa_mentoria_annabell_aguedo.jpg'),
  ]); ?></div>
</section>
<?php endif; ?>

<?php if (home_on('show_home_podcast')): ?>
<!-- PODCAST RAÍZ FIRME -->
<section class="section carbon" id="podcast">
  <div class="wrap center" style="margin-bottom:var(--s8)">
    <span class="eyebrow"><?php echo wp_kses_post(home_f('home_podcast_eyebrow')); ?></span>
    <h2><?php echo wp_kses_post(home_f('home_podcast_title')); ?></h2>
    <p class="lead mxa" style="margin-top:var(--s3)"><?php echo wp_kses_post(home_f('home_podcast_intro')); ?></p>
  </div>
  <div class="wrap"><?php echo home_carousel('home_podcast', [
    'https://youtu.be/-o_mwccEBy8',
    'https://youtu.be/G3mxBoFw2YU',
    'https://youtu.be/lLeNTjnZXz8',
    'https://youtu.be/VnWm6J_XQ2U',
    'https://youtu.be/N4zkatxA7cw',
    'https://youtu.be/-vaZ2A0u_5s',
  ], 'ar-16-9'); ?></div>
  <?php if ($u = home_f('home_podcast_channel')): ?><div class="wrap center" style="margin-top:var(--s6)"><a href="<?php echo esc_url($u); ?>" target="_blank" rel="noopener" class="btn btn-ghost">Ver el canal en YouTube →</a></div><?php endif; ?>
</section>
<?php endif; ?>

<?php if (home_on('show_home_recon')): ?>
<!-- RECONOCIMIENTOS -->
<section class="section" id="reconocimientos">
  <div class="wrap center" style="margin-bottom:var(--s8)">
    <span class="eyebrow"><?php echo wp_kses_post(home_f('home_recon_eyebrow')); ?></span>
    <h2><?php echo wp_kses_post(home_f('home_recon_title')); ?></h2>
    <p class="lead mxa" style="margin-top:var(--s3)"><?php echo wp_kses_post(home_f('home_recon_feature_text')); ?></p>
  </div>
  <div class="wrap"><?php echo home_carousel('home_recon', [
    $A('annabell_aguedo/reconocimiento__annabell_aguedo.jpg'),
    $A('annabell_aguedo/programa_mentoria_annabell_aguedo.jpg'),
    $A('annabell_aguedo/seminario_annabell_aguedo.jpg'),
    $A('annabell_aguedo/seminarios__annabell_aguedo.jpg'),
    $A('annabell_aguedo/asistente_seminario_annabell_aguedo.jpg'),
  ]); ?></div>
</section>
<?php endif; ?>

<?php if (home_on('show_home_redes')): ?>
<!-- CONECTA (redes) -->
<section class="section carbon" id="conecta">
  <div class="wrap center">
    <span class="eyebrow">Conecta</span>
    <h2><?php echo esc_html(home_f('home_redes_title')); ?></h2>
    <div class="social" style="margin-top:var(--s6)">
      <?php for ($n = 1; $n <= 8; $n++): $u = home_f("home_red{$n}_url"); $l = home_f("home_red{$n}_label"); if (!$u && !$l) continue; ?>
      <a href="<?php echo $u ? esc_url($u) : '#'; ?>"<?php echo $u ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo home_social_icon($u); ?> <span><?php echo esc_html($l); ?></span></a>
      <?php endfor; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (home_on('show_home_metodo')): ?>
<!-- EL MÉTODO (cierre — la Annabell de hoy) -->
<section class="section" id="metodo">
  <div class="wrap center" style="margin-bottom:var(--s8)">
    <span class="eyebrow"><?php echo wp_kses_post(home_f('home_metodo_eyebrow')); ?></span>
    <h2><?php echo wp_kses_post(home_f('home_metodo_title')); ?></h2>
    <p class="lead mxa" style="margin-top:var(--s3)"><?php echo wp_kses_post(home_f('home_metodo_intro')); ?></p>
  </div>
  <div class="wrap">
    <?php $metodo = [
      ['A','Analiza','Comprende tu realidad antes de escalar.'],
      ['N','Numera','Lo que no se mide, no mejora.'],
      ['N','Navega','Dirige con visión estratégica.'],
      ['A','Anticípate','Ordena antes del caos.'],
      ['B','Busca talento','Contrata por estándar, no por urgencia.'],
      ['E','Enseña','Delegar exige formar.'],
      ['L','Lidera','Lidera la estructura, no operes.'],
      ['L','Lecciona','Mejora continua.'],
    ]; ?>
    <div class="carousel" data-autoplay="2000">
      <div class="car-viewport"><div class="car-track">
        <?php foreach ($metodo as $i => $c): $li = home_img('home_metodo_letter' . ($i + 1) . '_img'); ?>
        <div class="car-item">
          <?php if ($li): ?>
          <div class="cover ar-1-1 ml"><img src="<?php echo esc_url($li); ?>" alt="<?php echo esc_attr($c[1]); ?>" loading="lazy"><span class="ml-letter"><?php echo esc_html($c[0]); ?></span><span class="ml-word"><?php echo esc_html($c[1]); ?></span></div>
          <?php else: ?>
          <div class="acard car-acard"><b><?php echo esc_html($c[0]); ?></b><div class="w"><?php echo esc_html($c[1]); ?></div><p><?php echo esc_html($c[2]); ?></p></div>
          <?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div></div>
      <?php echo $arrows; ?>
      <div class="car-dots"></div>
    </div>
  </div>
  <?php if ($u = home_f('home_metodo_btn_url', '/mentoria/')): ?><div class="wrap center" style="margin-top:var(--s8)"><a href="<?php echo esc_url($u); ?>" class="btn btn-oro btn-lg"><?php echo esc_html(home_f('home_metodo_btn_text')); ?></a></div><?php endif; ?>
</section>
<?php endif; ?>

<!-- FOOTER -->
<footer class="home-footer">
  <div class="wrap">
    <div class="grid">
      <div>
        <?php echo annabell_logo_html(true, 'nav-logo-img'); ?>
        <p style="font-size:14px;max-width:34ch;margin-top:var(--s2)"><?php echo esc_html(home_f('home_footer_text')); ?></p>
      </div>
      <div><h4>Explora</h4><ul><li><a href="#fotografia">Fotografía</a></li><li><a href="#goldent">Clínica Goldent</a></li><li><a href="#podcast">Podcast Raíz Firme</a></li><li><a href="#metodo">El Método</a></li></ul></div>
      <div><h4>Conecta</h4><ul>
        <?php for ($n = 1; $n <= 8; $n++): $u = home_f("home_red{$n}_url"); $l = home_f("home_red{$n}_label"); if (!$u && !$l) continue; ?>
        <li><a href="<?php echo $u ? esc_url($u) : '#'; ?>"<?php echo $u ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo esc_html($l); ?></a></li>
        <?php endfor; ?>
      </ul></div>
    </div>
    <div class="bottom">&copy; <?php echo date('Y'); ?> Método Annabell · Annabell Aguedo</div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
