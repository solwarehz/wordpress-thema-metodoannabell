<?php get_header(); ?>

<?php
$default_order = ['hero','problema','bio','video','metodo','fases','proceso','para_quien','testimonios','precios','compromiso','contacto','cta'];
$order_raw     = get_theme_mod('sections_order', '');
$order         = ($order_raw && is_array($d = json_decode($order_raw, true))) ? $d : $default_order;

foreach ($order as $key) {
    $file = get_template_directory() . '/sections/section-' . sanitize_key($key) . '.php';
    if (file_exists($file)) include $file;
}
?>

<?php get_footer(); ?>
