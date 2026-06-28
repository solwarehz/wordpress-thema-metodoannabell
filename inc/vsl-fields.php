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

/* Póster (primer fotograma) de un video de Vimeo vía oEmbed. Cacheado 1 día.
   Vimeo no expone el thumbnail por URL directa (como YouTube), hay que pedirlo a su API. */
function vsl_vimeo_poster(string $vid): string {
    if (!$vid) return '';
    $key = 'vsl_vimeo_poster_' . $vid;
    $cached = get_transient($key);
    if ($cached !== false) return (string) $cached;
    $poster = '';
    $resp = wp_remote_get('https://vimeo.com/api/oembed.json?url=' . rawurlencode('https://vimeo.com/' . $vid) . '&width=1280', ['timeout' => 6]);
    if (!is_wp_error($resp) && wp_remote_retrieve_response_code($resp) === 200) {
        $data = json_decode(wp_remote_retrieve_body($resp), true);
        if (!empty($data['thumbnail_url'])) $poster = $data['thumbnail_url'];
    }
    set_transient($key, $poster, DAY_IN_SECONDS);
    return $poster;
}

/* Helper: video con el mismo trato que YouTube → póster + play que abre popup
   a pantalla completa (sirve para Vimeo y YouTube). */
function vsl_video_embed(string $url): string {
    $play = '<span class="play"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20"/></svg></span>';
    $vid  = vsl_vimeo_id($url);

    // Vimeo (cuenta gratuita NO permite embeber) → póster (vía API) + abrir el video en
    // Vimeo en una pestaña nueva con la URL de compartir.
    if ($vid) {
        $poster = vsl_vimeo_poster($vid);
        $style  = $poster ? ' style="background-image:url(' . esc_url($poster) . ')"' : '';
        return '<a href="' . esc_url($url) . '" target="_blank" rel="noopener" class="video-play' . ($poster ? ' has-poster' : '') . '"' . $style . ' aria-label="Ver video">' . $play . '</a>';
    }

    // YouTube → póster + popup embebido a pantalla completa (vsl-video.js).
    if (preg_match('~(?:youtube(?:-nocookie)?\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/)|youtu\.be/)([A-Za-z0-9_-]{11})~', $url, $m)) {
        $embed  = "https://www.youtube-nocookie.com/embed/{$m[1]}?autoplay=1&rel=0&modestbranding=1";
        $poster = "https://img.youtube.com/vi/{$m[1]}/maxresdefault.jpg";
        return '<button type="button" class="video-play has-poster" data-embed="' . esc_attr($embed) . '" style="background-image:url(' . esc_url($poster) . ')" aria-label="Reproducir video">' . $play . '</button>';
    }

    return '<div class="video-ph"><div class="play"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20"/></svg></div></div>';
}

/* Textos por defecto del VSL (fuente única). Se usan para PRE-CARGAR los campos ACF
   vacíos (filtro acf/load_value) y como fallback de vsl_f(). */
function vsl_defaults(): array {
    static $d = null;
    if ($d !== null) return $d;
    return $d = [
        'hero_eyebrow_badge' => 'Apertura de cupos 2026',
        'topbar_btn_text'    => 'Postular',
        'topbar_btn_url'     => '#postular',
        'hero_title'    => 'Tu negocio crece,<br>pero <span class="gold">todo sigue dependiendo de ti.</span>',
        'hero_subtitle' => 'Trabajas más, te esfuerzas más, facturas más… y aun así, si te detienes, <span class="hl">todo se detiene.</span> El Método Annabell te da la estructura para que tu empresa funcione sin ti.',
        'video_url'     => 'https://vimeo.com/1204182154?share=copy&fl=sv&fe=ci',
        'problema_eyebrow' => '¿Te suena familiar?',
        'problema_title'   => 'No tienes un problema de esfuerzo.<br>Tienes un problema de <span class="gold">estructura.</span>',
        'problema_p1' => 'Llevas años sosteniendo tu negocio con tus propias manos. Si tú no estás, no se vende, no se decide, no avanza. Contrataste gente y terminaste haciendo lo mismo. Creciste en facturación, pero <span class="hl">perdiste tu tiempo, tu calma y tu vida personal</span> en el camino.',
        'problema_p2' => 'No te falta trabajo. Te falta un sistema que trabaje sin ti.',
        'problema_p3' => 'Y cada mes que pasa igual es un mes más atado a la operación, no construyendo la empresa que sí puede funcionar sin ti.',
        'giro_title' => 'Tener un negocio <span style="color:var(--gris-tenue)">no es lo mismo</span> que construir una <span class="gold">empresa.</span>',
        'giro_text'  => 'Un negocio depende de su dueño. Una empresa funciona con estructura, procesos y un equipo que ejecuta sin que tú estés encima. El Método Annabell es la ruta para hacer ese salto.',
        'giro_quote' => '"No se trata de trabajar más.<br>Se trata de construir mejor."',
        'fases_eyebrow' => 'El método · paso a paso',
        'fases_title'   => 'Las 5 fases para convertir tu<br>emprendimiento en una empresa',
        'fases_intro'   => 'Esto es exactamente lo que trabajamos —y lo que logras— en cada fase. Avanzas solo cuando ejecutas.',
        'fase_1_title' => 'Ordena tu visión', 'fase_1_i1' => 'Defines propósito y modelo de negocio', 'fase_1_i2' => 'Metas claras, medibles y alcanzables', 'fase_1_i3' => 'Sabes con exactitud hacia dónde vas', 'fase_1_res' => 'claridad total de dirección.',
        'fase_2_title' => 'Construye procesos', 'fase_2_i1' => 'Procesos simples que ahorran tiempo', 'fase_2_i2' => 'Reduces errores y retrabajo del equipo', 'fase_2_i3' => 'La operación deja de vivir en tu cabeza', 'fase_2_res' => 'el negocio corre con sistema.',
        'fase_3_title' => 'Aprende a delegar', 'fase_3_i1' => 'Formas a tu equipo con criterio', 'fase_3_i2' => 'Sistema de delegación que sí funciona', 'fase_3_i3' => 'Dejas de ser el cuello de botella', 'fase_3_res' => 'recuperas tu tiempo.',
        'fase_4_title' => 'Lidera personas', 'fase_4_i1' => 'Liderazgo para alinear al equipo', 'fase_4_i2' => 'Inspiras, motivas y das dirección', 'fase_4_i3' => 'Tu visión la ejecutan otros', 'fase_4_res' => 'lideras, ya no operas.',
        'fase_5_title' => 'Un sistema que mejora solo', 'fase_5_i1' => 'Indicadores y mejora continua', 'fase_5_i2' => 'Optimización constante de la operación', 'fase_5_i3' => 'Crece incluso cuando tú no estás', 'fase_5_res' => 'una empresa, no un autoempleo.',
        'fases_card_title' => '¿En qué fase está tu negocio hoy?', 'fases_card_text' => 'Lo descubrimos juntos en el diagnóstico.', 'fases_card_btn' => 'Quiero postular →',
        'proceso_eyebrow' => 'El proceso',
        'proceso_title'   => 'Cómo trabajamos juntos',
        'proceso_intro'   => 'Un camino claro, sin sorpresas. Sabes exactamente qué pasa en cada paso.',
        'paso_1_title' => 'Postulas',     'paso_1_text' => 'Dejas tus datos en 2 minutos. Sin compromiso, solo para conocer tu caso.',
        'paso_2_title' => 'Diagnóstico',  'paso_2_text' => 'Te contactamos por WhatsApp para entender tu negocio y ver si hay encaje real.',
        'paso_3_title' => 'Mentoría 1:1', 'paso_3_text' => 'Avanzas por las fases en sesiones personalizadas, al ritmo de tu ejecución.',
        'paso_4_title' => 'Escalas',      'paso_4_text' => 'Implementas, mides y construyes la empresa que funciona aunque tú no estés.',
        'aut_eyebrow' => 'Conoce a tu mentora',
        'aut_title'   => 'Yo también fui mi propio<br><span class="gold">cuello de botella.</span>',
        'aut_p1'      => 'Soy <b style="color:var(--blanco)">Annabell Aguedo.</b> Construí mi clínica desde cero. Durante años trabajé sin parar: cada decisión, cada problema, cada urgencia pasaba por mí. Crecía en facturación, pero no tenía vida.',
        'aut_p2'      => 'Hasta que entendí algo: no necesitaba esforzarme más, necesitaba <span class="hl">estructura</span>. Ordené, creé procesos, delegué de verdad… y escalé mi clínica <span class="gold">6× en 3 años</span> — recuperando mi tiempo.',
        'aut_quote'   => 'No necesitas trabajar más horas.<br>Necesitas una estructura que trabaje por ti.',
        'aut_p3'      => 'No soy coach de teoría. Soy mentora de ejecución: te acompaño a hacer el mismo salto, paso a paso.',
        'testi_eyebrow' => 'Lo que dicen',
        'testi_title'   => 'Empresarios reales, resultados reales',
        'testi_1_q' => 'En dos meses dejé de estar en cada decisión. Mi equipo resuelve sin mí y por fin tomé vacaciones sin que el negocio se cayera.', 'testi_1_name' => 'María G.', 'testi_1_role' => 'Clínica dental · Lima',
        'testi_2_q' => 'Pasé de apagar incendios todo el día a tener procesos. Facturo 40% más trabajando menos horas. El cambio fue de estructura, no de esfuerzo.', 'testi_2_name' => 'Carlos T.', 'testi_2_role' => 'Retail · 8 empleados',
        'testi_3_q' => 'Annabell no te da teoría: te hace ejecutar. Cada sesión salí con acciones claras. Hoy mi negocio funciona como empresa.', 'testi_3_name' => 'Laura M.', 'testi_3_role' => 'Servicios · Arequipa',
        'testi_1_stars' => '5', 'testi_2_stars' => '5', 'testi_3_stars' => '5',
        'pq_title' => '¿Es esto para ti?',
        'pq_intro' => 'Sé honesto contigo: esta mentoría funciona para quien ejecuta, no para quien solo se informa.',
        'pq_si_title' => '✓ Sí es para ti si…',
        'pq_no_title' => '✕ No es para ti si…',
        'pq_si_1' => 'Ya vendes y facturas, pero el negocio depende de ti.',
        'pq_si_2' => 'Trabajas muchas horas y aun así no avanzas como quieres.',
        'pq_si_3' => 'Quieres delegar, ordenar y escalar sin perder tu vida.',
        'pq_si_4' => 'Estás listo para ejecutar, no solo para "informarte".',
        'pq_no_1' => 'Recién tienes una idea y aún no vendes nada.',
        'pq_no_2' => 'Buscas una fórmula mágica sin trabajo.',
        'pq_no_3' => 'No estás dispuesto a invertir tiempo ni recursos.',
        'pq_no_4' => 'Quieres resultados sin rendir cuentas de tu ejecución.',
        'obj_eyebrow' => 'Sé lo que estás pensando',
        'obj_title'   => 'Resolvamos tus dudas ahora',
        'obj_1_d' => '"Ya probé cursos y coaches y no funcionó."', 'obj_1_a' => 'Esto <b>no es un curso.</b> Es mentoría 1:1 de ejecución: no acumulas videos, ejecutas con acompañamiento real y rendición de cuentas.',
        'obj_2_d' => '"No tengo tiempo para una mentoría."', 'obj_2_a' => 'Precisamente por eso. El método <b>te devuelve el tiempo</b>: construimos el sistema que hace que el negocio no dependa de cada hora tuya.',
        'obj_3_d' => '"¿Y si no es para mi tipo de negocio?"', 'obj_3_a' => 'Por eso hay un <b>diagnóstico previo.</b> Si no hay encaje, te lo decimos. Y existe una línea especializada para sector salud.',
        'obj_4_d' => '"¿Cuánto cuesta? Suena caro."', 'obj_4_a' => 'Hay niveles según tu etapa, con <b>precio de lanzamiento.</b> No es un gasto: es estructura que se paga sola al dejar de perder tiempo y dinero.',
        'oferta_eyebrow'  => 'Apertura oficial de cupos',
        'oferta_title'    => 'Acompañamiento 1:1 según el<br>nivel de tu negocio',
        'oferta_text'     => 'Desde quien recién ordena su negocio hasta organizaciones que escalan con liderazgo. Esta es una etapa de lanzamiento: <span class="hl">precios preferentes y cupos muy limitados.</span>',
        'price_anchor'    => 'La inversión parte <b>desde S/ 100</b> por sesión',
        'price_anchor_sub'=> 'Precio de lanzamiento · tu nivel exacto se define tras la evaluación de tu negocio',
        'chip_1' => 'Solo 2 cupos · línea general', 'chip_2' => 'Solo 1 cupo · línea salud', 'chip_3' => 'Precio de lanzamiento',
        'oferta_note'     => 'El nivel y la inversión se definen contigo según tu negocio, después de postular.',
        'form_title'    => 'Postula a tu cupo',
        'form_subtitle' => 'Déjanos tus datos. Te contactamos por WhatsApp para conocer tu negocio y ver si el Método Annabell es para ti.',
        'tally_url'     => 'https://tally.so/embed/WOQ1VP?alignLeft=1&hideTitle=1&transparentBackground=1&dynamicHeight=1',
        'form_micro'    => 'Cupos limitados. Responderemos por WhatsApp para completar tu perfil.',
        'faq_title' => 'Preguntas frecuentes',
        'faq_1_q' => '¿Cuánto cuesta?', 'faq_1_a' => 'Hay distintos niveles según el tamaño de tu negocio, con precio de lanzamiento. Definimos el tuyo al conocer tu caso, después de postular.',
        'faq_2_q' => '¿Cuánto dura?', 'faq_2_a' => 'Es mentoría 1:1 por sesiones; el ritmo depende de tu ejecución. Sin avanzar las tareas, no abrimos la siguiente sesión.',
        'faq_3_q' => '¿Es para mi rubro?', 'faq_3_a' => 'Trabajamos negocios de todo tipo y tenemos una línea especializada en sector salud.',
        'faq_4_q' => '¿Es un curso grabado?', 'faq_4_a' => 'No. Es mentoría personalizada 1:1 con Annabell. Por eso los cupos son limitados.',
        'faq_5_q' => '¿Qué pasa después de postular?', 'faq_5_a' => 'Te escribimos por WhatsApp con unas preguntas para conocer tu negocio y, si hay encaje, agendamos.',
        'footer_tagline' => 'De autoempleado a empresario.',
    ];
}

/* Pre-carga los campos ACF vacíos del VSL con su texto por defecto (para verlos y editarlos fácil). */
add_filter('acf/load_value', function ($value, $post_id, $field) {
    if ($value !== null && $value !== '' && $value !== false) return $value;
    $name = (is_array($field) && !empty($field['name'])) ? $field['name'] : '';
    $d = vsl_defaults();
    return ($name && isset($d[$name])) ? $d[$name] : $value;
}, 10, 3);

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
    $f('hero_eyebrow_badge', 'Barra superior — Mensaje (badge)');
    $f('topbar_btn_text',    'Barra superior — Texto del botón');
    $f('topbar_btn_url',     'URL de los botones (la usan TODOS los botones del VSL)', 'text', 'Una sola URL para todos los botones de la página. Por defecto #postular (el formulario). También admite una URL https:// (ej. WhatsApp).');
    $f('hero_eyebrow',  'Etiqueta superior');
    $f('hero_title',    'Título (permite <span class="gold">…</span>)', 'textarea');
    $f('hero_subtitle', 'Subtítulo', 'textarea');
    $f('video_url',     'URL del video (Vimeo o YouTube)', 'url', 'Pega el link. Recomendado: YouTube oculto. Vacío = placeholder con botón play.');
    $f('video_cap',     'Texto bajo el video');
    $f('hero_video_btn_text', 'Botón bajo el video — Texto (label)', 'text', 'Vacío = el botón no se muestra.');
    $f('live_badge_text',     'Aviso flotante (diferenciador)', 'text', 'Ej: Mentoría 1:1 · ¡EN VIVO! — Vacío = no se muestra.');

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
    $f('fases_card_title', 'Card final — Título');
    $f('fases_card_text',  'Card final — Texto');
    $f('fases_card_btn',   'Card final — Texto del botón');

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
    for ($n = 1; $n <= 3; $n++) { $f("testi_{$n}_q", "Testimonio $n — Texto", 'textarea'); $f("testi_{$n}_name", "Testimonio $n — Nombre"); $f("testi_{$n}_role", "Testimonio $n — Cargo"); $f("testi_{$n}_photo", "Testimonio $n — Foto", 'image'); $f("testi_{$n}_stars", "Testimonio $n — Estrellas (0 a 5)", 'number'); }

    // PARA QUIÉN
    $tab('⑩ Para quién');
    $f('pq_title', 'Título');
    $f('pq_intro', 'Intro', 'textarea');
    $f('pq_si_title', 'Card SÍ — Título');
    for ($n = 1; $n <= 4; $n++) $f("pq_si_$n", "SÍ — Ítem $n");
    $f('pq_no_title', 'Card NO — Título');
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
