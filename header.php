<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="site-nav" role="navigation" aria-label="Menú principal">
  <div class="container nav-inner">

    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo" aria-label="Inicio">
      <span>A·N·N·A·B·E·L·L</span>
    </a>

    <?php if (!is_page_template('page-landing.php')): ?>
    <?php wp_nav_menu([
      'theme_location' => 'primary',
      'container'      => false,
      'menu_class'     => 'nav-links',
      'items_wrap'     => '<ul id="%1$s" class="%2$s" role="list">%3$s</ul>',
      'fallback_cb'    => false,
    ]); ?>

    <div class="nav-cta">
      <a href="#contacto" class="btn btn-gold">Quiero mi sesión</a>
    </div>

    <button class="nav-toggle" aria-label="Abrir menú" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
    <?php endif; ?>

  </div>
</nav>
