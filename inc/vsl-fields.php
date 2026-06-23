<?php
defined('ABSPATH') || exit;

/* ============================================================
   VSL Landing — Helpers + registro de campos ACF (gratis)
   Plantilla: page-vsl.php
   Nota: se usan campos PLANOS (no Repeater) para ser compatibles
   con ACF free. Los defaults viven en la plantilla vía vsl_f().
   ============================================================ */

/* Helper: devuelve el campo ACF o el default si está vacío / ACF inactivo */
function vsl_f(string $name, string $default = ''): string {
    if (function_exists('get_field')) {
        $v = get_field($name);
        if ($v !== null && $v !== '' && $v !== false) return (string) $v;
    }
    return $default;
}

/* Helper: imagen ACF (devuelve URL) o '' */
function vsl_img(string $name): string {
    if (function_exists('get_field')) {
        $v = get_field($name);
        if (is_array($v) && !empty($v['url'])) return $v['url'];
        if (is_string($v) && $v) return $v;
    }
    return '';
}

/* Helper: ID de Vimeo desde una URL */
function vsl_vimeo_id(string $url): string {
    if (!$url) return '';
    if (preg_match('~vimeo\.com/(?:video/)?(\d+)~', $url, $m)) return $m[1];
    if (ctype_digit($url)) return $url;
    return '';
}

/* Helper: embed del video (Vimeo) o placeholder con botón play */
function vsl_video_embed(string $url): string {
    $id = vsl_vimeo_id($url);
    if ($id) {
        $src = "https://player.vimeo.com/video/{$id}?title=0&byline=0&portrait=0";
        return '<iframe src="' . esc_url($src) . '" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="Video VSL"></iframe>';
    }
    return '<div class="video-ph"><div class="play"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20"/></svg></div></div>';
}

/* ── Registro de campos ACF ── */
add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) return;

    $fields = [];
    $i = 0;
    $key = function (string $n) use (&$i): string { $i++; return 'field_vsl_' . $n . '_' . $i; };

    $tab  = function (string $label) use (&$fields, $key) {
        $fields[] = ['key' => $key('tab'), 'label' => $label, 'type' => 'tab', 'placement' => 'left'];
    };
    $f = function (string $name, string $label, string $type = 'text', string $instr = '') use (&$fields, $key) {
        $fields[] = ['key' => $key($name), 'label' => $label, 'name' => $name, 'type' => $type, 'instructions' => $instr];
    };

    // HERO
    $tab('① Hero');
    $f('hero_eyebrow',  'Etiqueta superior');
    $f('hero_title',    'Título (permite <span class="gold">…</span>)', 'textarea');
    $f('hero_subtitle', 'Subtítulo', 'textarea');
    $f('video_url',     'URL del video (Vimeo)', 'url', 'Pega el link de Vimeo. Vacío = placeholder con botón play.');
    $f('video_cap',     'Texto bajo el video');

    // CAJA DE OFERTA (hero)
    $tab('② Caja de oferta');
    $f('offer_title', 'Título de la caja');
    $f('offer_intro', 'Intro', 'textarea');
    for ($n = 1; $n <= 4; $n++) $f("offer_item_$n", "Ítem $n (con ✓)");
    $f('offer_price_note', 'Nota de precio (caja)');
    $f('offer_btn',        'Texto del botón');
    $f('offer_micro',      'Microcopy bajo el botón');

    // PRUEBA SOCIAL
    $tab('③ Prueba social');
    $f('proof_text',  'Texto izquierda (permite <b>)');
    $f('proof_text2', 'Texto derecha');

    // PROBLEMA
    $tab('④ Problema');
    $f('problema_eyebrow', 'Etiqueta');
    $f('problema_title',   'Título (permite <span class="gold">)', 'textarea');
    $f('problema_p1', 'Párrafo 1 (permite <span class="hl">)', 'textarea');
    $f('problema_p2', 'Párrafo 2 (destacado)', 'textarea');
    $f('problema_p3', 'Párrafo 3 (tenue)', 'textarea');

    // EL GIRO
    $tab('⑤ El giro');
    $f('giro_title', 'Título (permite <span class="gold">)', 'textarea');
    $f('giro_text',  'Texto', 'textarea');
    $f('giro_quote', 'Cita destacada (Cinzel)', 'textarea');

    // FASES
    $tab('⑥ Las 5 fases');
    $f('fases_eyebrow', 'Etiqueta');
    $f('fases_title',   'Título', 'textarea');
    $f('fases_intro',   'Intro', 'textarea');
    for ($n = 1; $n <= 5; $n++) {
        $f("fase_{$n}_title", "Fase $n — Título");
        $f("fase_{$n}_i1",    "Fase $n — Ítem 1");
        $f("fase_{$n}_i2",    "Fase $n — Ítem 2");
        $f("fase_{$n}_i3",    "Fase $n — Ítem 3");
        $f("fase_{$n}_res",   "Fase $n — Resultado");
    }

    // PROCESO
    $tab('⑦ Cómo funciona');
    $f('proceso_eyebrow', 'Etiqueta');
    $f('proceso_title',   'Título');
    $f('proceso_intro',   'Intro', 'textarea');
    for ($n = 1; $n <= 4; $n++) { $f("paso_{$n}_title", "Paso $n — Título"); $f("paso_{$n}_text", "Paso $n — Texto", 'textarea'); }

    // AUTORIDAD
    $tab('⑧ Autoridad');
    $f('aut_eyebrow', 'Etiqueta');
    $f('aut_title',   'Título (permite <span class="gold">)', 'textarea');
    $f('aut_photo',   'Foto de Annabell', 'image');
    $f('aut_p1',      'Párrafo 1', 'textarea');
    $f('aut_p2',      'Párrafo 2 (permite <span class="hl"> y <span class="gold">)', 'textarea');
    $f('aut_quote',   'Cita grande', 'textarea');
    $f('aut_p3',      'Cierre (tenue)', 'textarea');

    // TESTIMONIOS
    $tab('⑨ Testimonios');
    $f('testi_eyebrow', 'Etiqueta');
    $f('testi_title',   'Título');
    for ($n = 1; $n <= 3; $n++) { $f("testi_{$n}_q", "Testimonio $n — Texto", 'textarea'); $f("testi_{$n}_name", "Testimonio $n — Nombre"); $f("testi_{$n}_role", "Testimonio $n — Cargo"); }

    // PARA QUIÉN
    $tab('⑩ Para quién');
    $f('pq_title', 'Título');
    $f('pq_intro', 'Intro', 'textarea');
    for ($n = 1; $n <= 4; $n++) $f("pq_si_$n", "SÍ — Ítem $n");
    for ($n = 1; $n <= 4; $n++) $f("pq_no_$n", "NO — Ítem $n");

    // OBJECIONES
    $tab('⑪ Objeciones');
    $f('obj_eyebrow', 'Etiqueta');
    $f('obj_title',   'Título', 'textarea');
    for ($n = 1; $n <= 4; $n++) { $f("obj_{$n}_d", "Objeción $n — Duda"); $f("obj_{$n}_a", "Objeción $n — Respuesta (permite <b>)", 'textarea'); }

    // OFERTA
    $tab('⑫ Oferta');
    $f('oferta_eyebrow',  'Etiqueta');
    $f('oferta_title',    'Título', 'textarea');
    $f('oferta_text',     'Texto (permite <span class="hl">)', 'textarea');
    $f('price_anchor',    'Ancla de precio (ej: Desde S/ 100)', 'text', 'Lo dorado va con <b>…</b>. Ej: La inversión parte <b>desde S/ 100</b> por sesión');
    $f('price_anchor_sub','Sub-ancla (línea pequeña)');
    for ($n = 1; $n <= 3; $n++) $f("chip_$n", "Chip $n");
    $f('oferta_note', 'Nota final', 'textarea');

    // FORMULARIO
    $tab('⑬ Formulario');
    $f('form_title',    'Título');
    $f('form_subtitle', 'Subtítulo', 'textarea');
    $f('tally_url',     'URL del embed de Tally', 'url', 'Pega el src del iframe de Tally (https://tally.so/embed/XXXX?...).');
    $f('form_micro',    'Microcopy bajo el formulario');

    // FAQ
    $tab('⑭ FAQ');
    $f('faq_title', 'Título');
    for ($n = 1; $n <= 5; $n++) { $f("faq_{$n}_q", "FAQ $n — Pregunta"); $f("faq_{$n}_a", "FAQ $n — Respuesta", 'textarea'); }

    // FOOTER
    $tab('⑮ Footer');
    $f('footer_tagline', 'Tagline del footer');

    acf_add_local_field_group([
        'key'      => 'group_vsl_landing',
        'title'    => 'VSL — Landing de venta',
        'fields'   => $fields,
        'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'page-vsl.php']]],
        'menu_order' => 0,
        'position'   => 'normal',
        'style'      => 'default',
        'label_placement' => 'top',
    ]);
});
