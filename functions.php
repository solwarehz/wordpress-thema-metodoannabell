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

/* ── Customizer — Página Principal ── */
function annabell_customize_register(WP_Customize_Manager $wpc): void {

    $wpc->add_panel('annabell_panel', [
        'title'    => 'Página Principal',
        'priority' => 30,
    ]);

    $add = function(string $id, string $sec, string $label, $default = '', string $type = 'text', string $san = '') use ($wpc): void {
        if (!$san) $san = ($type === 'checkbox') ? 'wp_validate_boolean' : (($type === 'textarea') ? 'sanitize_textarea_field' : 'sanitize_text_field');
        $wpc->add_setting($id, ['default' => $default, 'transport' => 'refresh', 'sanitize_callback' => $san]);
        $wpc->add_control($id, ['label' => $label, 'section' => $sec, 'type' => $type]);
    };

    $add_url = function(string $id, string $sec, string $label, string $default = '', string $desc = '') use ($wpc): void {
        $wpc->add_setting($id, ['default' => $default, 'transport' => 'refresh', 'sanitize_callback' => 'esc_url_raw']);
        $wpc->add_control($id, ['label' => $label, 'section' => $sec, 'type' => 'text', 'description' => $desc]);
    };

    $add_img = function(string $id, string $sec, string $label) use ($wpc): void {
        $wpc->add_setting($id, ['default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'esc_url_raw']);
        $wpc->add_control(new WP_Customize_Image_Control($wpc, $id, ['label' => $label, 'section' => $sec]));
    };

    // ① HERO
    $wpc->add_section('annabell_hero', ['title' => '① Hero', 'panel' => 'annabell_panel', 'priority' => 10]);
    $s = 'annabell_hero';
    $add('show_hero',      $s, '👁 Mostrar sección', true, 'checkbox');
    $add_img('hero_bg_image', $s, 'Imagen de fondo del hero');
    $add('hero_label',     $s, 'Etiqueta', 'Mentoría · Lanzamiento 2026');
    $add('hero_title',     $s, 'Título (se permiten <br> y <em>)', "¿Tu negocio crece<br>pero tú <em>sigues atrapada</em><br>en la operación?", 'textarea', 'wp_kses_post');
    $add('hero_subtitle',  $s, 'Subtítulo', 'El Método A.N.N.A.B.E.L.L. te acompaña a escalar con orden, estrategia y liderazgo — en sesiones 1:1 de acción real, no de teoría.', 'textarea');
    $add('hero_btn1_text', $s, 'Botón 1 — Texto', 'Quiero mi primera sesión →');
    $add_url('hero_btn1_url', $s, 'Botón 1 — Enlace', '#contacto');
    $add('hero_btn2_text', $s, 'Botón 2 — Texto', 'Conoce el método');
    $add_url('hero_btn2_url', $s, 'Botón 2 — Enlace', '#metodo');
    foreach ([1 => ['5×','Ingresos incrementados'], 2 => ['5','Años de resultados reales'], 3 => ['1:1','Sesiones personalizadas'], 4 => ['8','Cupos de lanzamiento']] as $n => [$num, $lbl]) {
        $add("hero_stat{$n}_num",   $s, "Estadística {$n} — Número",   $num);
        $add("hero_stat{$n}_label", $s, "Estadística {$n} — Etiqueta", $lbl);
    }

    // ② PROBLEMA
    $wpc->add_section('annabell_problema', ['title' => '② Problema', 'panel' => 'annabell_panel', 'priority' => 20]);
    $s = 'annabell_problema';
    $add('show_problema',  $s, '👁 Mostrar sección', true, 'checkbox');
    $add('problema_label', $s, 'Etiqueta', '¿Te identificas?');
    $add('problema_title', $s, 'Título',   'Síntomas de un negocio sin estructura');
    foreach ([
        1 => 'Trabajas más horas que nunca, pero los ingresos no escalan igual.',
        2 => 'No sabes exactamente cuánto vendes, cuánto gastas ni qué tan rentable eres.',
        3 => 'Contratas por urgencia y después tienes que resolver los errores del equipo tú misma.',
        4 => 'Delegas tareas, pero igual terminas haciéndolas porque "nadie lo hace bien".',
        5 => 'Tienes ideas de crecimiento, pero no sabes por dónde empezar sin crear más caos.',
    ] as $n => $item) {
        $add("problema_item_{$n}", $s, "Ítem {$n}", $item, 'textarea');
    }
    $add('problema_good_news', $s, '"La buena noticia:" Titular', 'La buena noticia:');
    $add('problema_right_p1',  $s, 'Párrafo derecho 1 (se permite <strong>)',
        'Estos no son problemas de capacidad. Son problemas de <strong>estructura y método</strong>. Annabell lo vivió — y los resolvió. Hoy te muestra exactamente cómo.',
        'textarea', 'wp_kses_post');
    $add('problema_right_p2',  $s, 'Párrafo derecho 2 (se permite <strong>)',
        'En su propia clínica Goldent, aplicó un sistema que le permitió <strong>quintuplicar sus ingresos en 5 años</strong> sin perder el control de la operación. Ese sistema es el Método A.N.N.A.B.E.L.L.',
        'textarea', 'wp_kses_post');

    // ③ BIO
    $wpc->add_section('annabell_bio_sec', ['title' => '③ Bio Annabell', 'panel' => 'annabell_panel', 'priority' => 30]);
    $s = 'annabell_bio_sec';
    $add('show_bio',  $s, '👁 Mostrar sección', true, 'checkbox');
    $add_img('bio_photo', $s, 'Foto de Annabell');
    $add('bio_label', $s, 'Etiqueta', 'Tu mentora');
    $add('bio_name',  $s, 'Nombre',   'Annabell');
    foreach ([
        1 => 'Odontóloga & Empresaria',
        2 => 'Directora de Clínica Goldent',
        3 => 'Mentora invitada — Cámara de Comercio de Huaraz',
        4 => '5× crecimiento de ingresos en 5 años',
    ] as $n => $cred) {
        $add("bio_cred_{$n}", $s, "Credencial {$n}", $cred);
    }
    $add('bio_quote',    $s, 'Cita', '"Una conversación de una sola sesión puede cambiarlo todo — si viene con acción comprometida."', 'textarea');
    $add('bio_p1',       $s, 'Párrafo 1', 'Annabell no es una consultora que te da teoría desde una pantalla. Es una empresaria que construyó su propia clínica, enfrentó los mismos problemas que tú enfrenta hoy, y desarrolló un método probado para salir del caos operacional y liderar con criterio.', 'textarea');
    $add('bio_p2',       $s, 'Párrafo 2', 'Después de ser mentora invitada por la Cámara de Comercio de Huaraz y acompañar a sus primeros 5 mentees con resultados concretos, lanza formalmente su programa de mentoría en esta primera etapa de validación — con cupos muy limitados.', 'textarea');
    $add('bio_btn_text', $s, 'Texto del botón', 'Solicitar mi sesión →');

    // ④ MÉTODO
    $wpc->add_section('annabell_metodo_sec', ['title' => '④ Método ANNABELL', 'panel' => 'annabell_panel', 'priority' => 40]);
    $s = 'annabell_metodo_sec';
    $add('show_metodo',  $s, '👁 Mostrar sección', true, 'checkbox');
    $add('metodo_label', $s, 'Etiqueta', 'La metodología');
    $add('metodo_title', $s, 'Título',   '¿Qué significa A·N·N·A·B·E·L·L?');
    $add('metodo_desc',  $s, 'Descripción', 'Cada letra es un pilar de transformación empresarial. Un sistema completo para escalar con intención, no por intuición.', 'textarea');
    foreach ([
        1 => ['A','Analiza',      'Comprende la realidad actual de tu negocio antes de intentar escalar.'],
        2 => ['N','Numera',       'Mide absolutamente todo. Lo que no se mide no se puede mejorar.'],
        3 => ['N','Navega',       'Aprende a dirigir tu negocio con visión estratégica y criterio de gestión.'],
        4 => ['A','Anticípate',   'Ordena antes del caos. Prepárate para crecer antes de necesitarlo.'],
        5 => ['B','Busca Talento','Construye equipo con criterio. Contrata por estándar, no por urgencia.'],
        6 => ['E','Enseña',       'Delegar exige transferir conocimiento, formar y acompañar.'],
        7 => ['L','Lidera',       'Deja de operar como autoempleada y empieza a liderar la estructura.'],
        8 => ['L','Lecciona',     'Abraza los errores, optimiza procesos y construye mejora continua.'],
    ] as $n => [$letter, $word, $desc]) {
        $add("metodo_card_{$n}_letter", $s, "Tarjeta {$n} — Letra",       $letter);
        $add("metodo_card_{$n}_word",   $s, "Tarjeta {$n} — Palabra",     $word);
        $add("metodo_card_{$n}_desc",   $s, "Tarjeta {$n} — Descripción", $desc, 'textarea');
    }

    // ⑤ FASES
    $wpc->add_section('annabell_fases_sec', ['title' => '⑤ Fases', 'panel' => 'annabell_panel', 'priority' => 50]);
    $s = 'annabell_fases_sec';
    $add('show_fases',  $s, '👁 Mostrar sección', true, 'checkbox');
    $add('fases_label', $s, 'Etiqueta', 'Estructura del programa');
    $add('fases_title', $s, 'Título',   'Las 5 Fases de Escalamiento Empresarial');
    $add('fases_desc',  $s, 'Descripción', 'El programa avanza contigo a tu ritmo. No hay siguiente fase sin acción demostrada — solo resultados reales habilitan el paso.', 'textarea');
    foreach ([
        1 => ['Aprende a Medir Todo y Deja de Gestionar a Ciegas',           'Entender la realidad actual del negocio mediante indicadores clave y métricas de gestión. Defines tu punto de partida real.'],
        2 => ['Anticípate a los Escenarios y Ordena Antes del Caos',          'Desarrollar estructura organizacional y visión estratégica antes de que el crecimiento desborde la operación.'],
        3 => ['Cambia Tu Forma de Contratar y Construye un Mejor Equipo',     'Aprender a incorporar talento con criterio estratégico, evitando contrataciones por urgencia que cuestan caro.'],
        4 => ['Aprende a Delegar de Verdad y Deja de Ser el Cuello de Botella','Construir autonomía operativa mediante sistemas efectivos de delegación y liderazgo real.'],
        5 => ['Abraza los Errores y Convierte Tu Negocio en un Sistema que Mejora Solo','Implementar cultura de mejora continua, optimización de procesos y madurez operativa sostenible.'],
    ] as $n => [$title, $desc]) {
        $add("fase_{$n}_title", $s, "Fase {$n} — Título",      $title);
        $add("fase_{$n}_desc",  $s, "Fase {$n} — Descripción", $desc, 'textarea');
    }

    // ⑥ PROCESO
    $wpc->add_section('annabell_proceso_sec', ['title' => '⑥ Proceso', 'panel' => 'annabell_panel', 'priority' => 60]);
    $s = 'annabell_proceso_sec';
    $add('show_proceso',  $s, '👁 Mostrar sección', true, 'checkbox');
    $add('proceso_label', $s, 'Etiqueta', 'El proceso');
    $add('proceso_title', $s, 'Título',   'Así funciona la mentoría');
    $add('proceso_desc',  $s, 'Descripción', 'Un sistema diseñado para generar acción real — no solo buenas intenciones.', 'textarea');
    foreach ([
        1 => ['📋','Agenda tu sesión',    'Completa el formulario. Annabell revisa tu perfil y confirma disponibilidad.'],
        2 => ['🎯','Sesión 1:1 (60 min)', 'Diagnóstico de tu negocio y acuerdos de acción concretos. Virtual, directo al punto.'],
        3 => ['⚡','Tomas acción',         'Implementas los acuerdos en tu negocio. Tu ritmo, tu realidad.'],
        4 => ['📸','Envías evidencias',    'Sin evidencias de acción, no hay segunda sesión. El compromiso es el requisito.'],
        5 => ['🚀','Sigues escalando',     'Con cada sesión aprobada, avanzas en las fases del método hacia el siguiente nivel.'],
    ] as $n => [$icon, $title, $desc]) {
        $add("proceso_step_{$n}_icon",  $s, "Paso {$n} — Icono (emoji)", $icon);
        $add("proceso_step_{$n}_title", $s, "Paso {$n} — Título",        $title);
        $add("proceso_step_{$n}_desc",  $s, "Paso {$n} — Descripción",   $desc, 'textarea');
    }
    $add('proceso_quote',     $s, 'Cita', '"No hay segunda sesión sin acción."');
    $add('proceso_quote_sub', $s, 'Sub-cita', 'Esto no es un curso de videos. Es acompañamiento real con rendición de cuentas real.', 'textarea');

    // ⑦ PARA QUIÉN
    $wpc->add_section('annabell_pq_sec', ['title' => '⑦ Para Quién', 'panel' => 'annabell_panel', 'priority' => 70]);
    $s = 'annabell_pq_sec';
    $add('show_para_quien', $s, '👁 Mostrar sección', true, 'checkbox');
    $add('pq_label',      $s, 'Etiqueta',     'Calificación');
    $add('pq_title',      $s, 'Título',       '¿Es para ti?');
    $add('pq_yes_header', $s, 'Cabecera SÍ',  'Esta mentoría SÍ es para ti si…');
    foreach ([
        1 => 'Tienes un negocio que ya genera ingresos y quieres escalarlo.',
        2 => 'Estás dispuesta a actuar, no solo a escuchar.',
        3 => 'Eres emprendedora o empresaria con visión de crecimiento real.',
        4 => 'Puedes comprometerte con los acuerdos de cada sesión.',
        5 => 'Quieres duplicar tus resultados con estrategia, no con suerte.',
        6 => 'Trabajas en el sector salud y quieres escalar tu consulta o clínica.',
    ] as $n => $item) {
        $add("pq_yes_{$n}", $s, "SÍ — Ítem {$n}", $item, 'textarea');
    }
    $add('pq_no_header', $s, 'Cabecera NO', 'Esta mentoría NO es para ti si…');
    foreach ([
        1 => 'Solo buscas ideas sin ningún compromiso de acción.',
        2 => 'Esperas resultados sin implementar nada.',
        3 => 'No tienes negocio activo (aún en etapa de idea solamente).',
        4 => 'No puedes comprometer tiempo para ejecutar entre sesiones.',
        5 => 'Buscas una fórmula mágica sin esfuerzo propio.',
    ] as $n => $item) {
        $add("pq_no_{$n}", $s, "NO — Ítem {$n}", $item, 'textarea');
    }

    // ⑧ PRECIOS
    $wpc->add_section('annabell_precios_sec', ['title' => '⑧ Precios', 'panel' => 'annabell_panel', 'priority' => 80]);
    $s = 'annabell_precios_sec';
    $add('show_precios',   $s, '👁 Mostrar sección', true, 'checkbox');
    $add('precios_label',  $s, 'Etiqueta',    'Inversión · Lanzamiento 2026');
    $add('precios_title',  $s, 'Título',      'Elige tu nivel de escalamiento');
    $add('precios_desc',   $s, 'Descripción', 'Paquetes diseñados según la etapa real de tu negocio. Cupos estrictamente limitados para garantizar acompañamiento de calidad.', 'textarea');
    $add('precios_note',   $s, 'Nota de urgencia', '⏳ Tarifas de lanzamiento válidas solo para esta primera etapa — sujetas a cambio al completar cupos');
    $add('precios_cat1',   $s, 'Categoría 1 — Título', 'Para Emprendedores');
    foreach ([
        1 => ['Hobby a Emprendedor', 'Estás convirtiendo tu pasión en negocio y necesitas las bases correctas.',   'Menores a S/ 2,000',    '🔥 Solo 2 cupos disponibles', 'S/ 100',  'S/ 250',  false, ''],
        2 => ['Emprendedor 1',       'Ya tienes ingresos estables pero necesitas estructura para crecer.',         'S/ 2,000 — S/ 5,000',   '🔥 Solo 2 cupos disponibles', 'S/ 200',  'S/ 400',  false, ''],
        3 => ['Emprendedor 2',       'Tienes equipo y operación, pero el crecimiento te desborda.',               'S/ 5,000 — S/ 10,000',  '🔥 Solo 2 cupos disponibles', 'S/ 300',  'S/ 700',  true,  'Más solicitado'],
        4 => ['Emprendedor 3',       'Negocio consolidado que necesita escalar con liderazgo y sistemas.',        'S/ 10,000 — S/ 50,000', '🔥 Solo 2 cupos disponibles', 'USD 100', 'USD 200', false, ''],
    ] as $n => [$title, $perfil, $rango, $cupos, $launch, $normal, $featured, $badge]) {
        $add("precio_emp_{$n}_title",    $s, "Emp {$n} — Título",              $title);
        $add("precio_emp_{$n}_perfil",   $s, "Emp {$n} — Perfil",              $perfil,   'textarea');
        $add("precio_emp_{$n}_rango",    $s, "Emp {$n} — Rango de ingresos",   $rango);
        $add("precio_emp_{$n}_cupos",    $s, "Emp {$n} — Cupos",               $cupos);
        $add("precio_emp_{$n}_launch",   $s, "Emp {$n} — Precio lanzamiento",  $launch);
        $add("precio_emp_{$n}_normal",   $s, "Emp {$n} — Precio normal",       $normal);
        $add("precio_emp_{$n}_featured", $s, "Emp {$n} — Destacado",           $featured, 'checkbox');
        $add("precio_emp_{$n}_badge",    $s, "Emp {$n} — Badge (si destacado)", $badge);
    }
    $add('precios_cat2',      $s, 'Categoría 2 — Título', 'Línea Premium — Sector Salud');
    $add('precios_cat2_desc', $s, 'Categoría 2 — Descripción', 'Mentoría especializada para profesionales de la salud que quieren escalar su consulta o clínica. Annabell habla tu idioma — es odontóloga empresaria.', 'textarea');
    foreach ([
        1 => ['Salud 1', 'Profesionales independientes y consultorios pequeños.',         '⚡ Solo 1 cupo disponible', 'S/ 400',  'S/ 800',   false, ''],
        2 => ['Salud 2', 'Clínicas y centros médicos en proceso de crecimiento.',         '⚡ Solo 1 cupo disponible', 'S/ 600',  'S/ 1,200', true,  'Línea Premium'],
        3 => ['Salud 3', 'Operaciones multi consultorio y clínicas de alta complejidad.', '⚡ Solo 1 cupo disponible', 'USD 200', 'USD 400',  false, ''],
    ] as $n => [$title, $perfil, $cupos, $launch, $normal, $featured, $badge]) {
        $add("precio_salud_{$n}_title",    $s, "Salud {$n} — Título",             $title);
        $add("precio_salud_{$n}_perfil",   $s, "Salud {$n} — Perfil",             $perfil,   'textarea');
        $add("precio_salud_{$n}_cupos",    $s, "Salud {$n} — Cupos",              $cupos);
        $add("precio_salud_{$n}_launch",   $s, "Salud {$n} — Precio lanzamiento", $launch);
        $add("precio_salud_{$n}_normal",   $s, "Salud {$n} — Precio normal",      $normal);
        $add("precio_salud_{$n}_featured", $s, "Salud {$n} — Destacado",          $featured, 'checkbox');
        $add("precio_salud_{$n}_badge",    $s, "Salud {$n} — Badge (si destacado)", $badge);
    }
    $add('precios_nota_final', $s, 'Nota final', 'Las tarifas de lanzamiento corresponden únicamente a esta etapa inicial de validación. Serán ajustadas una vez completados los cupos disponibles de cada nivel.', 'textarea');

    // ⑨ COMPROMISO
    $wpc->add_section('annabell_compromiso_sec', ['title' => '⑨ Compromiso', 'panel' => 'annabell_panel', 'priority' => 90]);
    $s = 'annabell_compromiso_sec';
    $add('show_compromiso',  $s, '👁 Mostrar sección', true, 'checkbox');
    $add('compromiso_label', $s, 'Etiqueta', 'El compromiso es mutuo');
    $add('compromiso_title', $s, 'Título',   'Annabell se compromete contigo al 100%');
    $add('compromiso_desc',  $s, 'Descripción', 'Cada sesión es preparada con el diagnóstico real de tu negocio. No hay respuestas genéricas. No hay scripts. Cada acuerdo es pensado para tu contexto específico.', 'textarea');
    foreach ([
        1 => ['Preparación previa',        'Annabell estudia tu negocio antes de cada sesión.'],
        2 => ['Acuerdos accionables',       'Saldrás de cada sesión con pasos concretos, no ideas vagas.'],
        3 => ['Seguimiento por evidencias', 'Tu progreso se mide con resultados reales, no con palabras.'],
        4 => ['Metodología estructurada',   'El Método A.N.N.A.B.E.L.L. — validado en su propio negocio y con 5 mentees.'],
    ] as $n => [$title, $desc]) {
        $add("compromiso_item_{$n}_title", $s, "Ítem {$n} — Título",      $title);
        $add("compromiso_item_{$n}_desc",  $s, "Ítem {$n} — Descripción", $desc, 'textarea');
    }

    // ⑩ CONTACTO
    $wpc->add_section('annabell_contacto_sec', ['title' => '⑩ Contacto', 'panel' => 'annabell_panel', 'priority' => 100]);
    $s = 'annabell_contacto_sec';
    $add('show_contacto',  $s, '👁 Mostrar sección', true, 'checkbox');
    $add('contacto_label', $s, 'Etiqueta', 'Da el primer paso');
    $add('contacto_title', $s, 'Título',   'Solicita tu primera sesión');
    $add('contacto_desc',  $s, 'Descripción', 'Completa el formulario. Annabell revisará tu perfil y se pondrá en contacto para confirmar disponibilidad.', 'textarea');
    $add_url('contact_form_url', $s, 'URL destino del formulario', '', 'Pega aquí el endpoint de Formspree, Make, Zapier u otro. Vacío = sistema interno de WordPress.');

    // ⑪ CTA FINAL
    $wpc->add_section('annabell_cta_sec', ['title' => '⑪ CTA Final', 'panel' => 'annabell_panel', 'priority' => 110]);
    $s = 'annabell_cta_sec';
    $add('show_cta',      $s, '👁 Mostrar sección', true, 'checkbox');
    $add('cta_title',     $s, 'Título',      'Tu negocio puede ser diferente. La acción empieza hoy.');
    $add('cta_desc',      $s, 'Descripción', 'No esperes a tener todo perfecto. La primera sesión es el diagnóstico que cambia la dirección. Y recuerda: los cupos son limitados.', 'textarea');
    $add('cta_btn1_text', $s, 'Botón 1 — Texto',  'Solicitar mi sesión →');
    $add_url('cta_btn1_url', $s, 'Botón 1 — Enlace', '#contacto');
    $add('cta_whatsapp',  $s, 'Número WhatsApp (sin + ni espacios)', '51XXXXXXXXX');
}
add_action('customize_register', 'annabell_customize_register');

/* ── Helper: extraer ID de YouTube ── */
function annabell_youtube_id(string $url): string {
    if (!$url) return '';
    preg_match('/(?:youtube(?:-nocookie)?\.com\/(?:watch\?(?:.*&)?v=|embed\/)|youtu\.be\/)([A-Za-z0-9_-]{11})/', $url, $m);
    return $m[1] ?? '';
}

/* ── Helper: sanitize orden de secciones ── */
function annabell_sanitize_order(string $value): string {
    $decoded = json_decode($value, true);
    if (!is_array($decoded)) return '';
    $allowed  = ['hero','problema','bio','video','metodo','fases','proceso','para_quien','testimonios','precios','compromiso','contacto','cta'];
    $filtered = array_values(array_filter($decoded, function($k) use ($allowed) { return in_array($k, $allowed, true); }));
    return wp_json_encode($filtered);
}

/* ── Control personalizado: lista sortable de secciones ── */
if (class_exists('WP_Customize_Control')):
class Annabell_Order_Control extends WP_Customize_Control {

    public function enqueue(): void {
        wp_enqueue_script('jquery-ui-sortable');
        wp_add_inline_style('customize-controls', '
            .ab-sort-list { padding:0; margin:0; list-style:none; }
            .ab-sort-item {
                display:flex; align-items:center; gap:10px;
                padding:9px 12px; margin-bottom:4px;
                background:#1e1e1e; border:1px solid #333;
                border-radius:6px; cursor:grab;
                font-size:12px; color:#e0e0e0; user-select:none;
                transition: background .15s, border-color .15s;
            }
            .ab-sort-item:hover { background:#2a2a2a; border-color:#c9a84c55; }
            .ab-sort-item.ui-sortable-helper { cursor:grabbing; background:#2e2a1e; border-color:#c9a84c; box-shadow:0 4px 16px rgba(0,0,0,.5); }
            .ab-sort-item.ui-sortable-placeholder { visibility:visible !important; background:rgba(201,168,76,.08); border:1px dashed #c9a84c55; border-radius:6px; }
            .ab-sort-handle { color:#555; font-size:16px; line-height:1; flex-shrink:0; }
        ');
    }

    public function render_content(): void {
        $map = [
            'hero'        => '① Hero principal',
            'problema'    => '② El Problema',
            'bio'         => '③ Bio Annabell',
            'video'       => '🎬 Video',
            'metodo'      => '④ Método ANNABELL',
            'fases'       => '⑤ Las Fases',
            'proceso'     => '⑥ Proceso',
            'para_quien'  => '⑦ Para Quién',
            'testimonios' => '⭐ Testimonios',
            'precios'     => '⑧ Precios',
            'compromiso'  => '⑨ Compromiso',
            'contacto'    => '⑩ Contacto / Formulario',
            'cta'         => '⑪ CTA Final',
        ];

        $val   = $this->value();
        $order = ($val && is_array($d = json_decode($val, true))) ? $d : array_keys($map);
        foreach (array_keys($map) as $k) {
            if (!in_array($k, $order, true)) $order[] = $k;
        }

        $uid = 'ab-order-' . esc_attr($this->id);
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <p style="color:#999;font-size:11px;margin:0 0 10px">Arrastra para cambiar el orden en la página.</p>
        <ul id="<?php echo $uid; ?>" class="ab-sort-list">
            <?php foreach ($order as $key): if (!isset($map[$key])) continue; ?>
            <li data-key="<?php echo esc_attr($key); ?>" class="ab-sort-item">
                <span class="ab-sort-handle" title="Arrastrar">&#9776;</span>
                <?php echo esc_html($map[$key]); ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr($val); ?>" id="<?php echo $uid; ?>-input">
        <script>
        (function($){
            function initAbSort() {
                var $list  = $('#<?php echo $uid; ?>');
                var $input = $('#<?php echo $uid; ?>-input');
                var settingId = '<?php echo esc_js($this->settings['default']->id); ?>';
                if (!$list.length) return;
                $list.sortable({
                    handle: '.ab-sort-handle',
                    cursor: 'grabbing',
                    placeholder: 'ab-sort-item ui-sortable-placeholder',
                    forcePlaceholderSize: true,
                    update: function() {
                        var order = $list.find('li').map(function(){
                            return $(this).data('key');
                        }).get();
                        var json = JSON.stringify(order);
                        $input.val(json);
                        if (window.wp && wp.customize) {
                            wp.customize(settingId, function(setting){ setting.set(json); });
                        } else {
                            $input.trigger('change');
                        }
                    }
                });
            }
            if (window.jQuery && $.fn.sortable) {
                $(initAbSort);
            } else {
                $(window).on('load', initAbSort);
            }
        })(jQuery);
        </script>
        <?php
    }
}
endif; // class_exists WP_Customize_Control

/* ── Customizer extra: video, testimonios, form fields, estilo & marca, orden ── */
function annabell_customize_register_extra(WP_Customize_Manager $wpc): void {

    $add = function(string $id, string $sec, string $label, $default = '', string $type = 'text', string $san = '') use ($wpc): void {
        if (!$san) $san = ($type === 'checkbox') ? 'wp_validate_boolean' : (($type === 'textarea') ? 'sanitize_textarea_field' : 'sanitize_text_field');
        $wpc->add_setting($id, ['default' => $default, 'transport' => 'refresh', 'sanitize_callback' => $san]);
        $wpc->add_control($id, ['label' => $label, 'section' => $sec, 'type' => $type]);
    };

    $add_img = function(string $id, string $sec, string $label) use ($wpc): void {
        $wpc->add_setting($id, ['default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'esc_url_raw']);
        $wpc->add_control(new WP_Customize_Image_Control($wpc, $id, ['label' => $label, 'section' => $sec]));
    };

    // ── ORDEN ──────────────────────────────────
    $wpc->add_section('annabell_order_sec', [
        'title'    => '⚙ Orden de Secciones',
        'panel'    => 'annabell_panel',
        'priority' => 5,
    ]);
    $default_order = wp_json_encode(['hero','problema','bio','video','metodo','fases','proceso','para_quien','testimonios','precios','compromiso','contacto','cta']);
    $wpc->add_setting('sections_order', ['default' => $default_order, 'transport' => 'refresh', 'sanitize_callback' => 'annabell_sanitize_order']);
    $wpc->add_control(new Annabell_Order_Control($wpc, 'sections_order', [
        'label'   => 'Orden de secciones',
        'section' => 'annabell_order_sec',
        'settings' => ['default' => 'sections_order'],
    ]));

    // ── ESTILO & MARCA ────────────────────────
    $wpc->add_section('annabell_estilo_sec', ['title' => '🎨 Estilo & Marca', 'panel' => 'annabell_panel', 'priority' => 8]);
    $s = 'annabell_estilo_sec';
    foreach ([
        ['color_gold',       'Color dorado principal',  '#c9a84c'],
        ['color_gold_light', 'Color dorado claro',      '#e0c06a'],
        ['color_bg_dark',    'Fondo oscuro principal',  '#0a0a0a'],
        ['color_bg_soft',    'Fondo suave (secciones)', '#111111'],
        ['color_text_light', 'Texto claro',             '#f5f0e8'],
        ['color_text_gray',  'Texto gris',              '#888888'],
    ] as [$id, $label, $default]) {
        $wpc->add_setting($id, ['default' => $default, 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_hex_color']);
        $wpc->add_control(new WP_Customize_Color_Control($wpc, $id, ['label' => $label, 'section' => $s]));
    }
    $wpc->add_setting('font_heading', ['default' => 'Cormorant Garamond', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field']);
    $wpc->add_control('font_heading', ['label' => 'Tipografía — Títulos', 'section' => $s, 'type' => 'select', 'choices' => [
        'Cormorant Garamond' => 'Cormorant Garamond (predeterminado)',
        'Playfair Display'   => 'Playfair Display',
        'Cinzel'             => 'Cinzel',
        'Libre Baskerville'  => 'Libre Baskerville',
        'Lora'               => 'Lora',
        'Raleway'            => 'Raleway',
    ]]);
    $wpc->add_setting('font_body', ['default' => 'Inter', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field']);
    $wpc->add_control('font_body', ['label' => 'Tipografía — Texto', 'section' => $s, 'type' => 'select', 'choices' => [
        'Inter'       => 'Inter (predeterminado)',
        'Roboto'      => 'Roboto',
        'Open Sans'   => 'Open Sans',
        'Montserrat'  => 'Montserrat',
        'Nunito Sans' => 'Nunito Sans',
        'DM Sans'     => 'DM Sans',
    ]]);

    // ── VIDEO ─────────────────────────────────
    $wpc->add_section('annabell_video_sec', ['title' => '🎬 Video Presentación', 'panel' => 'annabell_panel', 'priority' => 35]);
    $s = 'annabell_video_sec';
    $add('show_video',  $s, '👁 Mostrar sección', true, 'checkbox');
    $add('video_label', $s, 'Etiqueta', 'Conóceme mejor');
    $add('video_title', $s, 'Título', 'Un mensaje de Annabell para ti');
    $add('video_desc',  $s, 'Descripción', 'Antes de dar el paso, mira este breve mensaje. En menos de 3 minutos sabrás si esto es para ti.', 'textarea');
    $add('video_url',   $s, 'URL de YouTube (pega aquí el link)', '');

    // ── TESTIMONIOS ───────────────────────────
    $wpc->add_section('annabell_testimonios_sec', ['title' => '⭐ Testimonios', 'panel' => 'annabell_panel', 'priority' => 75]);
    $s = 'annabell_testimonios_sec';
    $add('show_testimonios',  $s, '👁 Mostrar sección', true, 'checkbox');
    $add('testimonios_label', $s, 'Etiqueta', 'Lo que dicen');
    $add('testimonios_title', $s, 'Título', 'Resultados reales de mentees reales');
    $wpc->add_setting('testimonios_cols', ['default' => '3', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field']);
    $wpc->add_control('testimonios_cols', ['label' => 'Columnas', 'section' => $s, 'type' => 'select', 'choices' => ['2' => '2 columnas', '3' => '3 columnas']]);
    $testi_defaults = [
        1 => ['Desde que apliqué el Método ANNABELL, mis ingresos crecieron un 40% en 3 meses. La claridad de esa primera sesión no tiene precio.', 'María García', 'Directora de Clínica Dental'],
        2 => ['Annabell me ayudó a ver que mi mayor problema no era el mercado, sino cómo yo gestionaba mi negocio. Hoy tengo un equipo que funciona sin mí.', 'Carlos Torres', 'Empresario — Sector Retail'],
        3 => ['En 2 sesiones reorganicé toda mi operación. Por primera vez en 5 años, trabajo menos horas y gano más.', 'Laura Mendoza', 'Consultoría de Marketing'],
        4 => ['', '', ''],
        5 => ['', '', ''],
        6 => ['', '', ''],
    ];
    foreach ($testi_defaults as $n => [$text, $name, $role]) {
        $add("show_testimonio_{$n}",    $s, "Testimonio {$n} — Mostrar",      ($n <= 3), 'checkbox');
        $add("testimonio_{$n}_text",    $s, "Testimonio {$n} — Texto",        $text, 'textarea');
        $add("testimonio_{$n}_name",    $s, "Testimonio {$n} — Nombre",       $name);
        $add("testimonio_{$n}_role",    $s, "Testimonio {$n} — Cargo / Empresa", $role);
        $add_img("testimonio_{$n}_image", $s, "Testimonio {$n} — Foto (cuadrada)");
    }

    // ── FORMULARIO — CAMPOS ───────────────────
    $s = 'annabell_contacto_sec';
    $add('form_label_name',          $s, 'Label "Nombre"',             'Tu nombre *');
    $add('form_placeholder_name',    $s, 'Placeholder "Nombre"',       'Nombre completo');
    $add('form_label_email',         $s, 'Label "Email"',              'Email *');
    $add('form_placeholder_email',   $s, 'Placeholder "Email"',        'tu@email.com');
    $add('form_label_phone',         $s, 'Label "Teléfono"',           'WhatsApp / Teléfono');
    $add('form_placeholder_phone',   $s, 'Placeholder "Teléfono"',     '+51 999 999 999');
    $add('form_label_nivel',         $s, 'Label "Nivel"',              'Tu nivel actual *');
    $add('form_label_message',       $s, 'Label "Mensaje"',            'Cuéntame brevemente tu negocio y tu principal reto');
    $add('form_placeholder_message', $s, 'Placeholder "Mensaje"',      'Ej: Tengo una clínica dental con 2 empleados, mis ingresos son X y mi mayor problema es...', 'textarea');
    $add('form_btn_text',            $s, 'Texto del botón enviar',     'Quiero mi primera sesión →');
    $add('form_privacy_note',        $s, 'Nota de privacidad',         'Cupos limitados. Tu información es 100% confidencial.');
}
add_action('customize_register', 'annabell_customize_register_extra');

/* ── Customizer: módulo WhatsApp ── */
function annabell_customize_register_whatsapp(WP_Customize_Manager $wpc): void {
    $wpc->add_section('annabell_whatsapp_sec', [
        'title'    => '💬 WhatsApp',
        'panel'    => 'annabell_panel',
        'priority' => 115,
    ]);
    $s   = 'annabell_whatsapp_sec';
    $add = function(string $id, string $label, $default = '', string $type = 'text', string $san = '') use ($wpc, $s): void {
        if (!$san) $san = ($type === 'checkbox') ? 'wp_validate_boolean' : (($type === 'textarea') ? 'sanitize_textarea_field' : 'sanitize_text_field');
        $wpc->add_setting($id, ['default' => $default, 'transport' => 'refresh', 'sanitize_callback' => $san]);
        $wpc->add_control($id, ['label' => $label, 'section' => $s, 'type' => $type]);
    };

    $add('show_wa_float', '👁 Mostrar botón flotante',          true,  'checkbox');
    $add('wa_number',     'Número WhatsApp (sin + ni espacios)', '51XXXXXXXXX');
    $add('wa_message',    'Mensaje pre-escrito',                 'Hola Annabell, vi tu mentoría y quiero saber más 👋', 'textarea');
    $add('wa_tooltip',    'Texto del tooltip',                   '¿Tienes dudas? Escríbeme');
}
add_action('customize_register', 'annabell_customize_register_whatsapp');

/* ── CSS variables dinámicas desde Customizer ── */
function annabell_dynamic_styles(): void {
    $gold       = sanitize_hex_color(get_theme_mod('color_gold',       '#c9a84c')) ?: '#c9a84c';
    $gold_light = sanitize_hex_color(get_theme_mod('color_gold_light', '#e0c06a')) ?: '#e0c06a';
    $bg_dark    = sanitize_hex_color(get_theme_mod('color_bg_dark',    '#0a0a0a')) ?: '#0a0a0a';
    $bg_soft    = sanitize_hex_color(get_theme_mod('color_bg_soft',    '#111111')) ?: '#111111';
    $txt_light  = sanitize_hex_color(get_theme_mod('color_text_light', '#f5f0e8')) ?: '#f5f0e8';
    $txt_gray   = sanitize_hex_color(get_theme_mod('color_text_gray',  '#888888')) ?: '#888888';
    $font_head  = preg_replace('/[^a-zA-Z0-9 \-]/', '', get_theme_mod('font_heading', 'Cormorant Garamond'));
    $font_body  = preg_replace('/[^a-zA-Z0-9 \-]/', '', get_theme_mod('font_body',    'Inter'));
    echo "<style id=\"annabell-vars\">:root{";
    echo "--gold:{$gold};--gold-light:{$gold_light};";
    echo "--black:{$bg_dark};--black-soft:{$bg_soft};";
    echo "--white:{$txt_light};--gray:{$txt_gray};";
    if ($font_head) echo "--font-head:'{$font_head}',serif;";
    if ($font_body) echo "--font-body:'{$font_body}',sans-serif;";
    echo "}</style>\n";
}
add_action('wp_head', 'annabell_dynamic_styles');

/* ── Google Fonts dinámicas ── */
function annabell_enqueue_dynamic_fonts(): void {
    $head     = get_theme_mod('font_heading', 'Cormorant Garamond');
    $body     = get_theme_mod('font_body',    'Inter');
    $families = array_filter(array_unique([$head, $body]));
    if (!$families) return;
    $params = implode('&', array_map(function($f) {
        return 'family=' . str_replace(' ', '+', $f) . ':ital,wght@0,300;0,400;0,500;0,600;0,700;1,400';
    }, $families));
    wp_enqueue_style('annabell-gfonts-custom', "https://fonts.googleapis.com/css2?{$params}&display=swap", [], null);
}
add_action('wp_enqueue_scripts', 'annabell_enqueue_dynamic_fonts');
