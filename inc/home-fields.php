<?php
defined('ABSPATH') || exit;

/* ============================================================
   HOME (Autoridad) — Helpers + Customizer
   Página principal evergreen, modular (toggles), super editable.
   Cada media acepta IMAGEN o URL de VIDEO indistintamente.
   ============================================================ */

/* Defaults de los textos (fuente única; el Customizer los sobreescribe) */
function home_defaults(): array {
    static $d = null;
    if ($d !== null) return $d;
    return $d = [
        'home_nav_cta_text' => 'Conoce la mentoría',
        'home_hero_eyebrow' => 'Empresaria · Odontóloga · Mentora',
        'home_hero_title' => 'Annabell <span class="gold">Aguedo</span>',
        'home_hero_text' => 'No nació empresaria: se hizo. De la fotografía al frente de una clínica que dirige y escala — hoy acompaña a otros emprendedores a dar el mismo salto, con método.',
        'home_hero_btn1_text' => 'Conoce su historia', 'home_hero_btn1_url' => '#historia',
        'home_hero_btn2_text' => 'La mentoría', 'home_hero_btn2_url' => '/mentoria/',
        // Cards del hero (defaults = diseño del cliente; íconos SVG inline editables)
        'home_card1_title' => 'Empresaria',
        'home_card1_desc'  => 'He creado y gestionado empresas desde cero con visión y estrategia.',
        'home_card1_icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="20" x2="20" y2="20"/><polyline points="4 16 9 11 13 14 20 6"/><polyline points="15 6 20 6 20 11"/></svg>',
        'home_card2_title' => 'Líder de equipos',
        'home_card2_desc'  => 'Formo y lidero equipos enfocados en resultados, cultura y crecimiento.',
        'home_card2_icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3"/><path d="M3 20c0-3 3-5 6-5s6 2 6 5"/><circle cx="17" cy="9" r="2.2"/><path d="M16 14c3 0 5 2 5 5"/></svg>',
        'home_card3_title' => 'Mentora',
        'home_card3_desc'  => 'Acompaño a mujeres y emprendedores a construir negocios sostenibles.',
        'home_card3_icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6"/><path d="M10 22h4"/><path d="M12 2a7 7 0 0 0-4 12.7c.6.5 1 1.3 1 2.3h6c0-1 .4-1.8 1-2.3A7 7 0 0 0 12 2z"/></svg>',
        'home_card4_title' => 'Estratega',
        'home_card4_desc'  => 'Transformo ideas en sistemas escalables con indicadores y decisiones acertadas.',
        'home_card4_icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.4"/></svg>',
        'home_historia_eyebrow' => 'Su trayectoria',
        'home_historia_title' => 'De una pasión a un método',
        'home_historia_text' => 'Annabell no nació empresaria: se hizo. Siendo mamá descubrió la fotografía y la convirtió en su primer negocio rentable. Años después transformó su clínica dental aplicando método y estrategia. En el camino encontró algo aún más valioso: el equilibrio entre su vida y su trabajo.',
        'home_historia_quote' => 'Cada etapa me enseñó algo que hoy convierto en método.',
        'home_goldent_eyebrow' => 'Su consolidación · desde 2009',
        'home_goldent_title' => 'Directora de <span class="gold">Clínica Goldent</span>',
        'home_goldent_text' => 'Annabell fundó Goldent en 2009. Tras la pandemia decidió transformarla: llevó formación online en recursos humanos y administración, e inició una especialización en Brasil. Aplicó a la clínica los modelos y metodologías que aprendió, y logró un crecimiento de 6× en 3 años — recuperando su libertad para dedicarse a su desarrollo personal y profesional.',
        'home_goldent_fb_text' => 'Facebook de Goldent',
        'home_goldent_fb_url' => 'https://www.facebook.com/Dentistasgoldent/',
        'home_ponencias_eyebrow' => 'Ponente',
        'home_ponencias_title' => 'Referente en eventos de odontología',
        'home_ponencias_intro' => 'Invitada a compartir su visión empresarial del sector salud en seminarios y congresos.',
        'home_evento1_title' => 'Seminario de Odontología', 'home_evento1_meta' => 'Perú · 2024', 'home_evento1_desc' => 'Ponente sobre gestión y flujos de trabajo in-office en odontología.',
        'home_evento2_title' => 'Nombre del Congreso / Evento 2', 'home_evento2_meta' => 'Ciudad · 2024', 'home_evento2_desc' => 'Tema de la ponencia — resumen breve.',
        'home_podcast_eyebrow' => 'Su podcast · desde 2026',
        'home_podcast_title' => 'Raíz <span class="gold">Firme</span>',
        'home_podcast_intro' => 'Conversaciones sobre negocio, liderazgo y mentalidad. Capítulo nuevo cada miércoles. Escúchala pensar — la mejor forma de conocerla.',
        'home_podcast_channel' => 'https://www.youtube.com/@RAIZFIRME_1',
        'home_pod1_url' => 'https://youtu.be/-o_mwccEBy8',
        'home_pod2_url' => 'https://youtu.be/G3mxBoFw2YU',
        'home_pod3_url' => 'https://youtu.be/lLeNTjnZXz8',
        'home_foto_eyebrow' => 'Su primer emprendimiento',
        'home_foto_title' => 'De mamá a fotógrafa con <span class="gold">lista de espera</span>',
        'home_foto_text' => 'Tras ser mamá y ver el maravilloso trabajo fotográfico que hicieron con ella y su primogénita, Ana Paula, Annabell decidió aprender. En 2016 empezó llevando cursos, dominó los fundamentos de la fotografía y las bases del negocio, y convirtió su afición en una marca rentable con clientes en lista de espera. La ejerció hasta 2024, cuando decidió dejarla para seguir avanzando.',
        'home_foto_stat1_num' => '+5,000', 'home_foto_stat1_label' => 'Seguidores',
        'home_foto_stat2_num' => 'Lista de espera', 'home_foto_stat2_label' => 'de clientes',
        'home_foto_note' => 'Una etapa que le demostró que una pasión, con método, se vuelve un negocio.',
        'home_foto_url' => 'https://www.facebook.com/annabellphotography/',
        'home_cifra1_num' => '6×', 'home_cifra1_label' => 'Crecimiento de la clínica',
        'home_cifra2_num' => '+5,000', 'home_cifra2_label' => 'Seguidores en fotografía',
        'home_cifra3_num' => '2', 'home_cifra3_label' => 'Negocios rentables construidos',
        'home_cifra4_num' => '+15', 'home_cifra4_label' => 'Años emprendiendo',
        'home_metodo_eyebrow' => 'Su legado · la Annabell de hoy', 'home_metodo_title' => 'El Método A·N·N·A·B·E·L·L',
        'home_metodo_intro' => 'Pasiones convertidas en negocios rentables y el equilibrio entre vida y trabajo: ese camino de aprendizaje Annabell lo hizo método. Hoy lo comparte para que otros emprendedores no caminen a ciegas y acorten su camino al éxito.',
        'home_metodo_btn_text' => 'Conoce el Método Annabell', 'home_metodo_btn_url' => '/mentoria/',
        'home_recon_eyebrow' => 'Respaldo', 'home_recon_title' => 'Reconocida como mentora',
        'home_recon_feature_title' => 'Reconocida como mentora',
        'home_recon_feature_text' => 'El Ministerio de la Mujer y Poblaciones Vulnerables reconoció a Annabell por su destacada participación como mentora en el Programa de Mentorías «Oportunidades para Todas», con el apoyo de la Cooperación Alemana (GIZ).',
        'home_recon1_title' => 'Mentora reconocida', 'home_recon1_text' => 'Programa «Oportunidades para Todas» · Ministerio de la Mujer',
        'home_recon2_title' => 'Ponente', 'home_recon2_text' => 'Eventos de odontología',
        'home_recon3_title' => 'Podcaster', 'home_recon3_text' => 'Raíz Firme',
        'home_redes_title' => 'Sígueme',
        'home_red1_label' => 'Clínica Goldent', 'home_red1_url' => 'https://www.facebook.com/Dentistasgoldent/',
        'home_red2_label' => 'Raíz Firme', 'home_red2_url' => 'https://www.youtube.com/@RAIZFIRME_1',
        'home_red3_label' => 'Annabell Aguedo', 'home_red3_url' => 'https://www.facebook.com/annabell.aguedo',
        'home_red4_label' => 'Annabell Photography', 'home_red4_url' => 'https://www.facebook.com/annabellphotography/',
        'home_cta_eyebrow' => 'Su propósito',
        'home_cta_title' => 'Un camino de aprendizaje,<br><span class="gold">hecho método.</span>',
        'home_cta_text' => 'Annabell comparte su metodología para que otros emprendedores no caminen a ciegas y acorten su camino al éxito.',
        'home_cta_btn_text' => 'Conoce el Método Annabell',
        'home_footer_text' => 'Empresaria, odontóloga y mentora. De autoempleado a empresario.',
    ];
}

/* Valor de un ajuste del Customizer (o default centralizado) */
function home_f(string $name, string $default = ''): string {
    $fallback = $default !== '' ? $default : (home_defaults()[$name] ?? '');
    $v = get_theme_mod($name, null);
    return ($v === '' || $v === false || $v === null) ? $fallback : (string) $v;
}
function home_on(string $name, bool $default = true): bool {
    return (bool) get_theme_mod($name, $default);
}
function home_img(string $name): string {
    return esc_url(get_theme_mod($name, ''));
}
/* URL a una imagen incluida en el tema (assets/img/...) */
function home_asset(string $rel): string {
    return get_template_directory_uri() . '/assets/img/' . ltrim($rel, '/');
}

/* ID de un video de YouTube desde su URL (watch, youtu.be, shorts, embed) */
function home_youtube_id(string $url): string {
    if ($url && preg_match('~(?:youtube(?:-nocookie)?\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/)|youtu\.be/)([A-Za-z0-9_-]{11})~', $url, $m)) return $m[1];
    return '';
}

/* URL de video → iframe responsive (YouTube / Vimeo / Facebook) */
function home_embed(string $url): string {
    if (!$url) return '';
    // YouTube
    if (preg_match('~(?:youtube(?:-nocookie)?\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/)|youtu\.be/)([A-Za-z0-9_-]{11})~', $url, $m)) {
        return '<iframe src="https://www.youtube-nocookie.com/embed/' . esc_attr($m[1]) . '?rel=0&modestbranding=1" title="Video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>';
    }
    // Vimeo
    if (preg_match('~vimeo\.com/(?:video/)?(\d+)~', $url, $m)) {
        return '<iframe src="https://player.vimeo.com/video/' . esc_attr($m[1]) . '" title="Video" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen loading="lazy"></iframe>';
    }
    // Facebook
    if (preg_match('~facebook\.com/.+/videos/~', $url) || strpos($url, 'fb.watch') !== false) {
        return '<iframe src="https://www.facebook.com/plugins/video.php?href=' . rawurlencode($url) . '&show_text=false" title="Video" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture" allowfullscreen loading="lazy"></iframe>';
    }
    return '';
}

/* Bloque media: VIDEO si hay URL, si no IMAGEN, si no placeholder */
function home_media(string $base, string $aspect = 'ar-16-9', string $ph = 'Imagen o video', string $default_img = ''): string {
    $embed = home_embed(home_f($base . '_video', ''));
    $img   = home_img($base . '_image');
    $alt   = esc_attr(home_f($base . '_alt', ''));
    $out   = '<div class="cover ' . esc_attr($aspect) . '">';
    if ($embed)           $out .= $embed;
    elseif ($img)         $out .= '<img src="' . $img . '" alt="' . $alt . '" loading="lazy">';
    elseif ($default_img) $out .= '<img src="' . esc_url($default_img) . '" alt="' . $alt . '" loading="lazy">';
    else                  $out .= '<div class="ph">' . esc_html($ph) . '</div>';
    return $out . '</div>';
}

/* Foto simple (galerías): imagen o placeholder, centrada */
function home_photo(string $name, string $aspect = '', string $ph = 'Foto'): string {
    $img = home_img($name);
    $cls = 'cover' . ($aspect ? ' ' . $aspect : '');
    if ($img) return '<div class="' . esc_attr($cls) . '"><img src="' . $img . '" alt="" loading="lazy"></div>';
    return '<div class="' . esc_attr($cls) . '"><div class="ph">' . esc_html($ph) . '</div></div>';
}

/* Carrusel unificado: hasta 8 slots (imagen O url de video), vacíos no se muestran.
   Defaults locales (cada string: si es URL de YouTube → video, si no → imagen).
   Clic en un ítem → popup pantalla completa (lightbox). Auto-rotación vía carousel.js */
function home_carousel(string $prefix, array $defaults = [], string $aspect = 'ar-4-3'): string {
    $items = [];
    for ($n = 1; $n <= 8; $n++) {
        $vid = home_f("{$prefix}_item{$n}_vid", '');
        $img = home_img("{$prefix}_item{$n}_img");
        if ($vid)      { $id = home_youtube_id($vid); if ($id) $items[] = ['v', $id]; }
        elseif ($img)  { $items[] = ['i', $img]; }
    }
    if (!$items && $defaults) {
        foreach ($defaults as $d) { $id = home_youtube_id($d); $items[] = $id ? ['v', $id] : ['i', esc_url($d)]; }
    }
    if (!$items) return '';
    $play = '<div class="play"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20"/></svg></div>';
    $cells = '';
    foreach ($items as $it) {
        if ($it[0] === 'v') {
            $thumb = 'https://img.youtube.com/vi/' . $it[1] . '/hqdefault.jpg';
            $cells .= '<div class="car-item"><div class="vthumb ' . esc_attr($aspect) . '" data-yt="' . esc_attr($it[1]) . '" role="button" tabindex="0" aria-label="Reproducir video"><img src="' . esc_url($thumb) . '" alt="" loading="lazy">' . $play . '</div></div>';
        } else {
            $cells .= '<div class="car-item"><div class="cover ' . esc_attr($aspect) . '"><img src="' . esc_url($it[1]) . '" alt="" loading="lazy"></div></div>';
        }
    }
    $arrows =
        '<button class="car-nav car-prev" aria-label="Anterior"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg></button>' .
        '<button class="car-nav car-next" aria-label="Siguiente"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 6 15 12 9 18"/></svg></button>';
    return '<div class="carousel" data-autoplay="2000"><div class="car-viewport"><div class="car-track">' . $cells . '</div></div>' . $arrows . '<div class="car-dots"></div></div>';
}

/* Icono SVG (dorado vía currentColor) según la red detectada en la URL */
function home_social_icon(string $url): string {
    $u = strtolower($url); $p = '';
    if (strpos($u, 'facebook.') !== false || strpos($u, 'fb.') !== false)
        $p = '<path d="M22 12a10 10 0 1 0-11.5 9.9v-7H8v-2.9h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.2c-1.2 0-1.6.8-1.6 1.6v1.9h2.7l-.4 2.9h-2.3v7A10 10 0 0 0 22 12z"/>';
    elseif (strpos($u, 'instagram.') !== false)
        $p = '<path d="M12 2.2c3.2 0 3.6 0 4.9.1 3.3.1 4.8 1.7 4.9 4.9.1 1.3.1 1.6.1 4.8s0 3.6-.1 4.9c-.1 3.2-1.7 4.8-4.9 4.9-1.3.1-1.6.1-4.9.1s-3.6 0-4.9-.1c-3.3-.1-4.8-1.7-4.9-4.9C2.2 15.6 2.2 15.3 2.2 12s0-3.6.1-4.9C2.4 3.9 4 2.3 7.1 2.3 8.4 2.2 8.8 2.2 12 2.2zM12 6.9a5.1 5.1 0 1 0 0 10.2 5.1 5.1 0 0 0 0-10.2zm0 8.4a3.3 3.3 0 1 1 0-6.6 3.3 3.3 0 0 1 0 6.6zm5.3-9.4a1.2 1.2 0 1 0 0 2.4 1.2 1.2 0 0 0 0-2.4z"/>';
    elseif (strpos($u, 'youtube.') !== false || strpos($u, 'youtu.be') !== false)
        $p = '<path d="M23 7.5a3 3 0 0 0-2.1-2.1C19 5 12 5 12 5s-7 0-8.9.4A3 3 0 0 0 1 7.5 31 31 0 0 0 .6 12 31 31 0 0 0 1 16.5a3 3 0 0 0 2.1 2.1C5 19 12 19 12 19s7 0 8.9-.4a3 3 0 0 0 2.1-2.1A31 31 0 0 0 23.4 12 31 31 0 0 0 23 7.5zM9.8 15.3V8.7l5.7 3.3z"/>';
    elseif (strpos($u, 'tiktok.') !== false)
        $p = '<path d="M16.5 3c.3 2.1 1.5 3.4 3.5 3.5v2.4c-1.2.1-2.3-.3-3.5-1v5.6c0 4-3.3 6.5-6.6 5.4-2.6-.9-3.6-4-2.1-6.3 1-1.5 2.9-2.3 4.8-2v2.5c-.4-.1-.8-.1-1.2 0-1 .2-1.7 1.1-1.5 2.1.2 1.4 1.9 2 2.9 1 .5-.5.7-1.1.7-1.8V3h2.5z"/>';
    elseif (strpos($u, 'wa.me') !== false || strpos($u, 'whatsapp') !== false)
        $p = '<path d="M12 2a10 10 0 0 0-8.5 15.3L2 22l4.8-1.5A10 10 0 1 0 12 2zm0 18a8 8 0 0 1-4.1-1.1l-.3-.2-2.8.9.9-2.8-.2-.3A8 8 0 1 1 12 20zm4.4-5.6c-.2-.1-1.4-.7-1.6-.8-.2-.1-.4-.1-.5.1l-.7.9c-.1.2-.3.2-.5.1-.7-.3-1.4-.7-2-1.5-.2-.3.2-.3.5-.9.1-.1 0-.3 0-.4l-.7-1.7c-.2-.4-.4-.4-.5-.4h-.5c-.2 0-.4.1-.6.3-.8.8-.8 2 .1 3.2 1 1.4 2.3 2.4 3.9 2.9.5.2 1 .2 1.4 0 .5-.2 1.4-.6 1.5-1.2.1-.3.1-.6 0-.7z"/>';
    else
        $p = '<path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm6.9 6h-2.6a12 12 0 0 0-1-3 8 8 0 0 1 3.6 3zM12 4c.7 0 1.8 1.4 2.4 4H9.6C10.2 5.4 11.3 4 12 4zM4.3 14a8 8 0 0 1 0-4h3a18 18 0 0 0 0 4zm.8 2h2.6a12 12 0 0 0 1 3 8 8 0 0 1-3.6-3zM7.7 8H5.1a8 8 0 0 1 3.6-3 12 12 0 0 0-1 3zM12 20c-.7 0-1.8-1.4-2.4-4h4.8c-.6 2.6-1.7 4-2.4 4zm-2.7-6a16 16 0 0 1 0-4h5.4a16 16 0 0 1 0 4zm6 5a12 12 0 0 0 1-3h2.6a8 8 0 0 1-3.6 3zm1.3-5a18 18 0 0 0 0-4h3a8 8 0 0 1 0 4z"/>';
    return '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">' . $p . '</svg>';
}

/* Sanitiza un SVG pegado por el cliente: solo etiquetas/atributos de dibujo
   (sin <script>, sin on* handlers). Se usa al guardar y al imprimir. */
function home_kses_svg(string $svg): string {
    $svg = trim($svg);
    if ($svg === '') return '';
    $attr = ['fill'=>true,'stroke'=>true,'stroke-width'=>true,'stroke-linecap'=>true,'stroke-linejoin'=>true,'stroke-miterlimit'=>true,'stroke-dasharray'=>true,'transform'=>true,'opacity'=>true,'class'=>true,'style'=>true];
    $allowed = [
        'svg'      => array_merge($attr, ['xmlns'=>true,'viewbox'=>true,'width'=>true,'height'=>true,'aria-hidden'=>true,'role'=>true,'focusable'=>true]),
        'g'        => $attr,
        'path'     => array_merge($attr, ['d'=>true]),
        'circle'   => array_merge($attr, ['cx'=>true,'cy'=>true,'r'=>true]),
        'ellipse'  => array_merge($attr, ['cx'=>true,'cy'=>true,'rx'=>true,'ry'=>true]),
        'rect'     => array_merge($attr, ['x'=>true,'y'=>true,'width'=>true,'height'=>true,'rx'=>true,'ry'=>true]),
        'line'     => array_merge($attr, ['x1'=>true,'y1'=>true,'x2'=>true,'y2'=>true]),
        'polyline' => array_merge($attr, ['points'=>true]),
        'polygon'  => array_merge($attr, ['points'=>true]),
        'defs'     => [], 'title' => [], 'desc' => [],
    ];
    return wp_kses($svg, $allowed);
}

/* Cards del hero (hasta 6 · ícono SVG + título + descripción).
   Reusa el carrusel (carousel.js) → autoplay como las demás secciones. */
function home_hero_cards(): string {
    $items = '';
    for ($n = 1; $n <= 6; $n++) {
        $icon  = home_f("home_card{$n}_icon");
        $title = home_f("home_card{$n}_title");
        $desc  = home_f("home_card{$n}_desc");
        if ($icon === '' && $title === '' && $desc === '') continue;
        $items .= '<div class="car-item"><div class="hcard">'
                . ($icon  ? '<span class="ico">' . home_kses_svg($icon) . '</span>' : '')
                . ($title ? '<h3>' . wp_kses_post($title) . '</h3>' : '')
                . ($desc  ? '<p>'  . wp_kses_post($desc)  . '</p>'  : '')
                . '</div></div>';
    }
    if ($items === '') return '';
    return '<div class="hero-cards"><div class="carousel" data-autoplay="3500">'
         . '<div class="car-viewport"><div class="car-track">' . $items . '</div></div>'
         . '<div class="car-dots"></div></div></div>';
}

/* ── Registro en el Customizer ── */
add_action('customize_register', function (WP_Customize_Manager $wpc) {

    $wpc->add_panel('home_panel', ['title' => '🏠 Página Principal (Autoridad)', 'priority' => 22]);

    $sec = function (string $id, string $title, int $prio) use ($wpc) {
        $wpc->add_section($id, ['title' => $title, 'panel' => 'home_panel', 'priority' => $prio]);
    };
    $add = function (string $id, string $section, string $label, string $default = '', string $type = 'text') use ($wpc) {
        $D = home_defaults();           // fuente única: el default del editor = el del front-end
        if (isset($D[$id])) $default = $D[$id];
        // 'html' = control textarea que CONSERVA el HTML al guardar (para <span class="gold">…</span> y <br>).
        // Los demás tipos siguen limpiando el HTML (sanitize_text/textarea_field).
        $control = in_array($type, ['html','svg'], true) ? 'textarea' : ($type === 'url' ? 'url' : $type);
        $san = $type === 'checkbox' ? 'wp_validate_boolean'
             : ($type === 'html'     ? 'wp_kses_post'
             : ($type === 'svg'      ? 'home_kses_svg'
             : ($type === 'textarea' ? 'sanitize_textarea_field'
             : ($type === 'url'      ? 'esc_url_raw'
             : 'sanitize_text_field'))));
        $wpc->add_setting($id, ['default' => $default, 'transport' => 'refresh', 'sanitize_callback' => $san]);
        $wpc->add_control($id, ['label' => $label, 'section' => $section, 'type' => $control]);
    };
    $img = function (string $id, string $section, string $label) use ($wpc) {
        $wpc->add_setting($id, ['default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'esc_url_raw']);
        $wpc->add_control(new WP_Customize_Image_Control($wpc, $id, ['label' => $label, 'section' => $section]));
    };
    // Slot media (imagen + video) para el hero
    $media = function (string $base, string $section, string $label) use ($add, $img) {
        $img("{$base}_image", $section, "$label — Imagen");
        $add("{$base}_video", $section, "$label — o URL de video (YouTube/Vimeo/FB)", '', 'url');
    };
    // Carrusel: 8 slots, cada uno imagen O url de video (vacíos no se muestran)
    $carousel = function (string $section, string $prefix) use ($add, $img) {
        for ($n = 1; $n <= 8; $n++) {
            $img("{$prefix}_item{$n}_img", $section, "Carrusel {$n} — Imagen");
            $add("{$prefix}_item{$n}_vid", $section, "Carrusel {$n} — o URL de video", '', 'url');
        }
    };

    // NAV
    $sec('home_nav', '① Navegación', 10);
    $add('home_nav_cta_text', 'home_nav', 'Botón — Texto', 'Conoce la mentoría');
    $add('home_nav_cta_url',  'home_nav', 'Botón — Enlace (al VSL)', '/mentoria/', 'url');

    // HERO
    $sec('home_hero', '② Hero', 20);
    $add('show_home_hero',   'home_hero', '👁 Mostrar sección', '1', 'checkbox');
    $add('home_hero_eyebrow','home_hero', 'Etiqueta · línea: <span class="linea"></span>', '', 'html');
    $add('home_hero_title',  'home_hero', 'Título · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_hero_text',   'home_hero', 'Texto · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_hero_btn1_text','home_hero', 'Botón 1 — Texto', '');
    $add('home_hero_btn1_url', 'home_hero', 'Botón 1 — Enlace', '#historia', 'url');
    $add('home_hero_btn2_text','home_hero', 'Botón 2 — Texto', '');
    $add('home_hero_btn2_url', 'home_hero', 'Botón 2 — Enlace', '/mentoria/', 'url');
    $media('home_hero', 'home_hero', 'Retrato/Hero');
    // Cards del hero (hasta 6 · llena las que quieras, vacías no se muestran)
    for ($n = 1; $n <= 6; $n++) {
        $add("home_card{$n}_icon",  'home_hero', "Card {$n} — Ícono (pega tu código SVG · vacío = sin ícono)", '', 'svg');
        $add("home_card{$n}_title", 'home_hero', "Card {$n} — Título", '', 'html');
        $add("home_card{$n}_desc",  'home_hero', "Card {$n} — Descripción", '', 'html');
    }

    // HISTORIA (incluye las cifras)
    $sec('home_historia', '③ Su historia + cifras', 30);
    $add('show_home_historia','home_historia', '👁 Mostrar sección', '1', 'checkbox');
    $add('home_historia_eyebrow','home_historia', 'Etiqueta', '', 'html');
    $add('home_historia_title','home_historia', 'Título · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_historia_text','home_historia', 'Texto · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_historia_quote','home_historia', 'Frase destacada · dorado: <span class="gold">texto</span>', '', 'html');
    for ($n = 1; $n <= 4; $n++) {
        $add("home_cifra{$n}_num",   'home_historia', "Cifra {$n} — Número");
        $add("home_cifra{$n}_label", 'home_historia', "Cifra {$n} — Etiqueta");
    }

    // FOTOGRAFÍA
    $sec('home_fotografia', '④ Fotografía', 40);
    $add('show_home_fotografia','home_fotografia', '👁 Mostrar sección', '1', 'checkbox');
    $add('home_foto_eyebrow','home_fotografia', 'Etiqueta', '', 'html');
    $add('home_foto_title','home_fotografia', 'Título · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_foto_text','home_fotografia', 'Texto · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_foto_url','home_fotografia', 'Botón — Enlace (Facebook)', '', 'url');
    $carousel('home_fotografia', 'home_foto');

    // GOLDENT
    $sec('home_goldent', '⑤ Clínica Goldent', 50);
    $add('show_home_goldent','home_goldent', '👁 Mostrar sección', '1', 'checkbox');
    $add('home_goldent_eyebrow','home_goldent', 'Etiqueta', '', 'html');
    $add('home_goldent_title','home_goldent', 'Título · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_goldent_text','home_goldent', 'Texto · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_goldent_fb_text','home_goldent', 'Botón — Texto');
    $add('home_goldent_fb_url','home_goldent', 'Botón — URL (Facebook)', '', 'url');
    $carousel('home_goldent', 'home_goldent');

    // PONENCIAS
    $sec('home_ponencias', '⑥ Ponencias', 60);
    $add('show_home_ponencias','home_ponencias', '👁 Mostrar sección', '1', 'checkbox');
    $add('home_ponencias_eyebrow','home_ponencias', 'Etiqueta', '', 'html');
    $add('home_ponencias_title','home_ponencias', 'Título · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_ponencias_intro','home_ponencias', 'Intro · dorado: <span class="gold">texto</span>', '', 'html');
    $carousel('home_ponencias', 'home_ponencias');

    // PODCAST
    $sec('home_podcast', '⑦ Podcast Raíz Firme', 70);
    $add('show_home_podcast','home_podcast', '👁 Mostrar sección', '1', 'checkbox');
    $add('home_podcast_eyebrow','home_podcast', 'Etiqueta', '', 'html');
    $add('home_podcast_title','home_podcast', 'Título · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_podcast_intro','home_podcast', 'Intro · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_podcast_channel','home_podcast', 'Botón — Enlace al canal', '', 'url');
    $carousel('home_podcast', 'home_podcast');

    // RECONOCIMIENTOS
    $sec('home_recon', '⑧ Reconocimientos', 80);
    $add('show_home_recon','home_recon', '👁 Mostrar sección', '1', 'checkbox');
    $add('home_recon_eyebrow','home_recon', 'Etiqueta', '', 'html');
    $add('home_recon_title','home_recon', 'Título · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_recon_feature_text','home_recon', 'Texto · dorado: <span class="gold">texto</span>', '', 'html');
    $carousel('home_recon', 'home_recon');

    // CONECTA (redes — modular, detecta el logo por la URL)
    $sec('home_redes', '⑨ Conecta (redes)', 90);
    $add('show_home_redes','home_redes', '👁 Mostrar sección', '1', 'checkbox');
    $add('home_redes_title','home_redes', 'Título');
    for ($n = 1; $n <= 8; $n++) {
        $add("home_red{$n}_label",'home_redes', "Red {$n} — Texto");
        $add("home_red{$n}_url",  'home_redes', "Red {$n} — URL (el logo se detecta solo)", '', 'url');
    }

    // EL MÉTODO (cierre + CTA) — carrusel de las 8 letras
    $sec('home_metodo', '⑩ El Método (cierre)', 100);
    $add('show_home_metodo','home_metodo', '👁 Mostrar sección', '1', 'checkbox');
    $add('home_metodo_eyebrow','home_metodo', 'Etiqueta', '', 'html');
    $add('home_metodo_title','home_metodo', 'Título · dorado: <span class="gold">texto</span>', '', 'html');
    $add('home_metodo_intro','home_metodo', 'Texto · dorado: <span class="gold">texto</span>', '', 'html');
    for ($n = 1; $n <= 8; $n++) $img("home_metodo_letter{$n}_img", 'home_metodo', "Letra {$n} — Foto (opcional)");
    $add('home_metodo_btn_text','home_metodo', 'Botón — Texto');
    $add('home_metodo_btn_url','home_metodo', 'Botón — Enlace', '/mentoria/', 'url');

    // FOOTER
    $sec('home_footer', '⑪ Footer', 110);
    $add('home_footer_text','home_footer', 'Texto bajo el logo', '', 'textarea');
});
