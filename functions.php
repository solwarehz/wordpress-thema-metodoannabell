<?php
defined('ABSPATH') || exit;

/* ── Theme setup ── */
function annabell_setup(): void {
    load_theme_textdomain('metodoannabell', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 220,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    register_nav_menus([
        'primary' => __('Menú Principal', 'metodoannabell'),
        'footer'  => __('Menú Footer', 'metodoannabell'),
    ]);
}
add_action('after_setup_theme', 'annabell_setup');

/* ── Enqueue assets ── */
function annabell_assets(): void {
    $v = wp_get_theme()->get('Version');
    wp_enqueue_style('annabell-main', get_template_directory_uri() . '/assets/css/main.css', [], $v);
    wp_enqueue_script('annabell-main', get_template_directory_uri() . '/assets/js/main.js', [], $v, true);
    wp_localize_script('annabell-main', 'annabellData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('annabell_contact'),
    ]);
}
add_action('wp_enqueue_scripts', 'annabell_assets');

/* ── Contact form AJAX handler ── */
function annabell_handle_contact(): void {
    check_ajax_referer('annabell_contact', 'nonce');

    $name    = sanitize_text_field($_POST['name']    ?? '');
    $email   = sanitize_email($_POST['email']        ?? '');
    $phone   = sanitize_text_field($_POST['phone']   ?? '');
    $nivel   = sanitize_text_field($_POST['nivel']   ?? '');
    $mensaje = sanitize_textarea_field($_POST['message'] ?? '');

    if (!$name || !is_email($email)) {
        wp_send_json_error('Datos inválidos.');
    }

    $to      = get_option('admin_email');
    $subject = "Nueva solicitud de mentoría — $name";
    $body    = "Nombre: $name\nEmail: $email\nTeléfono: $phone\nNivel: $nivel\n\nMensaje:\n$mensaje";
    $headers = ['Content-Type: text/plain; charset=UTF-8', "Reply-To: $email"];

    wp_mail($to, $subject, $body, $headers);
    wp_send_json_success('ok');
}
add_action('wp_ajax_annabell_contact',        'annabell_handle_contact');
add_action('wp_ajax_nopriv_annabell_contact', 'annabell_handle_contact');

/* ── Widgets ── */
function annabell_widgets(): void {
    register_sidebar([
        'name'          => __('Footer Widget Area', 'metodoannabell'),
        'id'            => 'footer-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'annabell_widgets');

/* ── Page templates (no sidebar) ── */
function annabell_body_classes(array $classes): array {
    if (is_page_template('page-landing.php')) {
        $classes[] = 'is-landing';
    }
    return $classes;
}
add_filter('body_class', 'annabell_body_classes');
