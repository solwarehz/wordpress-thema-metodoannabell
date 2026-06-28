<?php
/*
 * Template Name: VSL Mentoría
 * Landing de venta (page builder propio · editable con ACF).
 */
defined('ABSPATH') || exit;

$check = '<svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>';
$xmark = '<svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>';
$wmark = '<span class="mark"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 17 10 11 14 15 20 7"/><polyline points="15 7 20 7 20 12"/></svg></span>';

// Defaults de las fases (contenido aprobado v2)
$fases_def = [
    1 => ['Ordena tu visión', 'Defines propósito y modelo de negocio', 'Metas claras, medibles y alcanzables', 'Sabes con exactitud hacia dónde vas', 'claridad total de dirección.'],
    2 => ['Construye procesos', 'Procesos simples que ahorran tiempo', 'Reduces errores y retrabajo del equipo', 'La operación deja de vivir en tu cabeza', 'el negocio corre con sistema.'],
    3 => ['Aprende a delegar', 'Formas a tu equipo con criterio', 'Sistema de delegación que sí funciona', 'Dejas de ser el cuello de botella', 'recuperas tu tiempo.'],
    4 => ['Lidera personas', 'Liderazgo para alinear al equipo', 'Inspiras, motivas y das dirección', 'Tu visión la ejecutan otros', 'lideras, ya no operas.'],
    5 => ['Un sistema que mejora solo', 'Indicadores y mejora continua', 'Optimización constante de la operación', 'Crece incluso cuando tú no estás', 'una empresa, no un autoempleo.'],
];
$pasos_def = [
    1 => ['Postulas', 'Dejas tus datos en 2 minutos. Sin compromiso, solo para conocer tu caso.'],
    2 => ['Diagnóstico', 'Te contactamos por WhatsApp para entender tu negocio y ver si hay encaje real.'],
    3 => ['Mentoría 1:1', 'Avanzas por las fases en sesiones personalizadas, al ritmo de tu ejecución.'],
    4 => ['Escalas', 'Implementas, mides y construyes la empresa que funciona aunque tú no estés.'],
];
$testi_def = [
    1 => ['En dos meses dejé de estar en cada decisión. Mi equipo resuelve sin mí y por fin tomé vacaciones sin que el negocio se cayera.', 'María G.', 'Clínica dental · Lima'],
    2 => ['Pasé de apagar incendios todo el día a tener procesos. Facturo 40% más trabajando menos horas. El cambio fue de estructura, no de esfuerzo.', 'Carlos T.', 'Retail · 8 empleados'],
    3 => ['Annabell no te da teoría: te hace ejecutar. Cada sesión salí con acciones claras. Hoy mi negocio funciona como empresa.', 'Laura M.', 'Servicios · Arequipa'],
];
$pq_si_def = ['Ya vendes y facturas, pero el negocio depende de ti.','Trabajas muchas horas y aun así no avanzas como quieres.','Quieres delegar, ordenar y escalar sin perder tu vida.','Estás listo para ejecutar, no solo para "informarte".'];
$pq_no_def = ['Recién tienes una idea y aún no vendes nada.','Buscas una fórmula mágica sin trabajo.','No estás dispuesto a invertir tiempo ni recursos.','Quieres resultados sin rendir cuentas de tu ejecución.'];
$obj_def = [
    1 => ['"Ya probé cursos y coaches y no funcionó."', 'Esto <b>no es un curso.</b> Es mentoría 1:1 de ejecución: no acumulas videos, ejecutas con acompañamiento real y rendición de cuentas.'],
    2 => ['"No tengo tiempo para una mentoría."', 'Precisamente por eso. El método <b>te devuelve el tiempo</b>: construimos el sistema que hace que el negocio no dependa de cada hora tuya.'],
    3 => ['"¿Y si no es para mi tipo de negocio?"', 'Por eso hay un <b>diagnóstico previo.</b> Si no hay encaje, te lo decimos. Y existe una línea especializada para sector salud.'],
    4 => ['"¿Cuánto cuesta? Suena caro."', 'Hay niveles según tu etapa, con <b>precio de lanzamiento.</b> No es un gasto: es estructura que se paga sola al dejar de perder tiempo y dinero.'],
];
$faq_def = [
    1 => ['¿Cuánto cuesta?', 'Hay distintos niveles según el tamaño de tu negocio, con precio de lanzamiento. Definimos el tuyo al conocer tu caso, después de postular.'],
    2 => ['¿Cuánto dura?', 'Es mentoría 1:1 por sesiones; el ritmo depende de tu ejecución. Sin avanzar las tareas, no abrimos la siguiente sesión.'],
    3 => ['¿Es para mi rubro?', 'Trabajamos negocios de todo tipo y tenemos una línea especializada en sector salud.'],
    4 => ['¿Es un curso grabado?', 'No. Es mentoría personalizada 1:1 con Annabell. Por eso los cupos son limitados.'],
    5 => ['¿Qué pasa después de postular?', 'Te escribimos por WhatsApp con unas preguntas para conocer tu negocio y, si hay encaje, agendamos.'],
];
$tally_default = 'https://tally.so/embed/WOQ1VP?alignLeft=1&hideTitle=1&transparentBackground=1&dynamicHeight=1';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class('vsl'); ?>>
<?php wp_body_open(); ?>
<div class="vsl">

<!-- TOP BAR -->
<header class="vsl-topbar">
  <div class="wrap">
    <?php echo annabell_logo_html(false, 'vsl-logo'); ?>
    <span class="promo"><span class="badge dot"><?php echo esc_html(vsl_f('hero_eyebrow_badge', 'Apertura de cupos 2026')); ?></span></span>
    <a href="#postular" class="btn btn-oro btn-sm">Postular</a>
  </div>
</header>

<?php if ($live = vsl_f('live_badge_text', 'Mentoría 1:1 · ¡EN VIVO!')): ?>
<a href="#postular" class="vsl-live" aria-label="<?php echo esc_attr($live); ?>"><span class="live-dot"></span><?php echo esc_html($live); ?></a>
<?php endif; ?>

<!-- HERO -->
<section class="vsl-hero">
  <div class="wrap">
    <div class="hero-head">
      <h1><?php echo wp_kses_post(vsl_f('hero_title', 'Tu negocio crece,<br>pero <span class="gold">todo sigue dependiendo de ti.</span>')); ?></h1>
      <p class="lead mxa"><?php echo wp_kses_post(vsl_f('hero_subtitle', 'Trabajas más, te esfuerzas más, facturas más… y aun así, si te detienes, <span class="hl">todo se detiene.</span> El Método Annabell te da la estructura para que tu empresa funcione sin ti.')); ?></p>
    </div>

    <div class="hero-split">
      <div>
        <div class="video"><?php echo vsl_video_embed(vsl_f('video_url', 'https://vimeo.com/1204182154?share=copy&fl=sv&fe=ci')); ?></div>
      </div>

      <div class="hero-cta">
        <a href="#postular" class="btn btn-oro btn-lg"><?php echo esc_html(vsl_f('offer_btn', 'Quiero postular a un cupo →')); ?></a>
      </div>
    </div>
  </div>
</section>

<!-- PRUEBA SOCIAL -->
<div class="vsl-proof">
  <div class="wrap">
    <div class="avatars"><span>M</span><span>C</span><span>L</span><span>J</span><span>+</span></div>
    <div class="txt"><?php echo wp_kses_post(vsl_f('proof_text', '<b>Emprendedores y profesionales</b> ya están escalando con el método')); ?></div>
    <div class="txt"><span class="stars">★★★★★</span> &nbsp;<?php echo esc_html(vsl_f('proof_text2', 'Resultados reales, empresas reales')); ?></div>
  </div>
</div>

<!-- PROBLEMA -->
<section class="section">
  <div class="wrap narrow center mxa">
    <span class="eyebrow"><?php echo esc_html(vsl_f('problema_eyebrow', '¿Te suena familiar?')); ?></span>
    <h2><?php echo wp_kses_post(vsl_f('problema_title', 'No tienes un problema de esfuerzo.<br>Tienes un problema de <span class="gold">estructura.</span>')); ?></h2>
    <div class="divisor"></div>
    <p class="mxa" style="margin-bottom:24px"><?php echo wp_kses_post(vsl_f('problema_p1', 'Llevas años sosteniendo tu negocio con tus propias manos. Si tú no estás, no se vende, no se decide, no avanza. Contrataste gente y terminaste haciendo lo mismo. Creciste en facturación, pero <span class="hl">perdiste tu tiempo, tu calma y tu vida personal</span> en el camino.')); ?></p>
    <p class="lead mxa" style="color:var(--blanco)"><b><?php echo esc_html(vsl_f('problema_p2', 'No te falta trabajo. Te falta un sistema que trabaje sin ti.')); ?></b></p>
    <p class="mxa" style="margin-top:24px;font-size:15px;color:var(--gris-tenue)"><?php echo esc_html(vsl_f('problema_p3', 'Y cada mes que pasa igual es un mes más atado a la operación, no construyendo la empresa que sí puede funcionar sin ti.')); ?></p>
  </div>
</section>

<!-- EL GIRO -->
<section class="section carbon">
  <div class="wrap narrow center mxa">
    <h2><?php echo wp_kses_post(vsl_f('giro_title', 'Tener un negocio <span style="color:var(--gris-tenue)">no es lo mismo</span> que construir una <span class="gold">empresa.</span>')); ?></h2>
    <p class="lead mxa" style="margin:24px auto 48px"><?php echo esc_html(vsl_f('giro_text', 'Un negocio depende de su dueño. Una empresa funciona con estructura, procesos y un equipo que ejecuta sin que tú estés encima. El Método Annabell es la ruta para hacer ese salto.')); ?></p>
    <p class="elegante grad-text mxa"><?php echo wp_kses_post(vsl_f('giro_quote', '"No se trata de trabajar más.<br>Se trata de construir mejor."')); ?></p>
  </div>
</section>

<!-- FASES -->
<section class="section">
  <div class="wrap center">
    <span class="eyebrow"><?php echo esc_html(vsl_f('fases_eyebrow', 'El método · paso a paso')); ?></span>
    <h2><?php echo wp_kses_post(vsl_f('fases_title', 'Las 5 fases para convertir tu<br>emprendimiento en una empresa')); ?></h2>
    <p class="lead mxa" style="margin-top:24px"><?php echo esc_html(vsl_f('fases_intro', 'Esto es exactamente lo que trabajamos —y lo que logras— en cada fase. Avanzas solo cuando ejecutas.')); ?></p>
  </div>
  <div class="wrap">
    <div class="grid g3" style="margin-top:64px">
      <?php foreach ($fases_def as $n => $d): ?>
      <div class="fase">
        <div class="top"><div class="n"><?php echo $n; ?></div><div><span class="tag">Fase <?php echo $n; ?></span><h3><?php echo esc_html(vsl_f("fase_{$n}_title", $d[0])); ?></h3></div></div>
        <ul>
          <li><?php echo $check; ?> <?php echo esc_html(vsl_f("fase_{$n}_i1", $d[1])); ?></li>
          <li><?php echo $check; ?> <?php echo esc_html(vsl_f("fase_{$n}_i2", $d[2])); ?></li>
          <li><?php echo $check; ?> <?php echo esc_html(vsl_f("fase_{$n}_i3", $d[3])); ?></li>
        </ul>
        <div class="res"><b>Resultado:</b> <?php echo esc_html(vsl_f("fase_{$n}_res", $d[4])); ?></div>
      </div>
      <?php endforeach; ?>
      <div class="fase" style="justify-content:center;align-items:center;text-align:center;border-style:dashed">
        <p style="color:var(--blanco);font-weight:700;font-size:18px;margin-bottom:14px">¿En qué fase está tu negocio hoy?</p>
        <p style="font-size:15px;margin-bottom:18px">Lo descubrimos juntos en el diagnóstico.</p>
        <a href="#postular" class="btn btn-oro">Quiero postular →</a>
      </div>
    </div>
  </div>
</section>

<!-- CTA BAND -->
<section class="vsl-cta-band">
  <div class="wrap center">
    <h2><?php echo wp_kses_post(vsl_f('cta_band_title', 'Tu negocio ya factura.<br>Es hora de que <span class="gold">funcione sin ti.</span>')); ?></h2>
    <p class="lead mxa"><?php echo esc_html(vsl_f('cta_band_text', 'El primer paso es postular. Sin compromiso: solo conocemos tu caso.')); ?></p>
    <a href="#postular" class="btn btn-oro btn-lg">Quiero postular a un cupo</a>
  </div>
</section>

<!-- CÓMO FUNCIONA -->
<section class="section carbon">
  <div class="wrap center">
    <span class="eyebrow"><?php echo esc_html(vsl_f('proceso_eyebrow', 'El proceso')); ?></span>
    <h2><?php echo esc_html(vsl_f('proceso_title', 'Cómo trabajamos juntos')); ?></h2>
    <p class="lead mxa" style="margin-top:24px"><?php echo esc_html(vsl_f('proceso_intro', 'Un camino claro, sin sorpresas. Sabes exactamente qué pasa en cada paso.')); ?></p>
  </div>
  <div class="wrap">
    <div class="grid g4 steps" style="margin-top:64px">
      <?php foreach ($pasos_def as $n => $d): ?>
      <div class="card"><div class="num"></div><h3><?php echo esc_html(vsl_f("paso_{$n}_title", $d[0])); ?></h3><p style="font-size:15.5px"><?php echo esc_html(vsl_f("paso_{$n}_text", $d[1])); ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- AUTORIDAD -->
<section class="section">
  <div class="wrap">
    <div class="autoridad">
      <div class="foto">
        <?php $foto = vsl_img('aut_photo'); if ($foto): ?>
          <img src="<?php echo esc_url($foto); ?>" alt="Annabell Aguedo">
        <?php else: ?><span>Foto · Annabell Aguedo</span><?php endif; ?>
      </div>
      <div>
        <span class="eyebrow"><?php echo esc_html(vsl_f('aut_eyebrow', 'Conoce a tu mentora')); ?></span>
        <h2><?php echo wp_kses_post(vsl_f('aut_title', 'Yo también fui mi propio<br><span class="gold">cuello de botella.</span>')); ?></h2>
        <p style="margin-top:24px"><?php echo wp_kses_post(vsl_f('aut_p1', 'Soy <b style="color:var(--blanco)">Annabell Aguedo.</b> Construí mi clínica desde cero. Durante años trabajé sin parar: cada decisión, cada problema, cada urgencia pasaba por mí. Crecía en facturación, pero no tenía vida.')); ?></p>
        <p style="margin-top:16px"><?php echo wp_kses_post(vsl_f('aut_p2', 'Hasta que entendí algo: no necesitaba esforzarme más, necesitaba <span class="hl">estructura</span>. Ordené, creé procesos, delegué de verdad… y escalé mi clínica <span class="gold">6× en 3 años</span> — recuperando mi tiempo.')); ?></p>
        <blockquote class="bigquote"><?php echo wp_kses_post(vsl_f('aut_quote', 'No necesitas trabajar más horas.<br>Necesitas una estructura que trabaje por ti.')); ?></blockquote>
        <p style="font-size:15px;color:var(--gris-tenue)"><?php echo esc_html(vsl_f('aut_p3', 'No soy coach de teoría. Soy mentora de ejecución: te acompaño a hacer el mismo salto, paso a paso.')); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIOS -->
<section class="section carbon">
  <div class="wrap center">
    <span class="eyebrow"><?php echo esc_html(vsl_f('testi_eyebrow', 'Lo que dicen')); ?></span>
    <h2><?php echo esc_html(vsl_f('testi_title', 'Empresarios reales, resultados reales')); ?></h2>
  </div>
  <div class="wrap">
    <div class="grid g3" style="margin-top:64px">
      <?php foreach ($testi_def as $n => $d):
        $q = vsl_f("testi_{$n}_q", $d[0]); $name = vsl_f("testi_{$n}_name", $d[1]); if (!$q && !$name) continue;
        $ini = mb_strtoupper(mb_substr($name, 0, 1)); ?>
      <div class="testi"><div class="stars">★★★★★</div><p class="q"><?php echo esc_html($q); ?></p><div class="who"><div class="av"><?php echo esc_html($ini); ?></div><div><b><?php echo esc_html($name); ?></b><span><?php echo esc_html(vsl_f("testi_{$n}_role", $d[2])); ?></span></div></div></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- PARA QUIÉN -->
<section class="section">
  <div class="wrap center"><h2><?php echo esc_html(vsl_f('pq_title', '¿Es esto para ti?')); ?></h2><div class="divisor"></div>
    <p class="lead mxa"><?php echo esc_html(vsl_f('pq_intro', 'Sé honesto contigo: esta mentoría funciona para quien ejecuta, no para quien solo se informa.')); ?></p>
  </div>
  <div class="wrap" style="margin-top:64px">
    <div class="pq">
      <div class="pq-col si">
        <h3>✓ Sí es para ti si…</h3>
        <ul>
          <?php for ($n = 1; $n <= 4; $n++): $it = vsl_f("pq_si_$n", $pq_si_def[$n-1]); if (!$it) continue; ?>
          <li><?php echo $check; ?> <?php echo esc_html($it); ?></li>
          <?php endfor; ?>
        </ul>
      </div>
      <div class="pq-col no">
        <h3>✕ No es para ti si…</h3>
        <ul>
          <?php for ($n = 1; $n <= 4; $n++): $it = vsl_f("pq_no_$n", $pq_no_def[$n-1]); if (!$it) continue; ?>
          <li><?php echo $xmark; ?> <?php echo esc_html($it); ?></li>
          <?php endfor; ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- OBJECIONES -->
<section class="section carbon">
  <div class="wrap center">
    <span class="eyebrow"><?php echo esc_html(vsl_f('obj_eyebrow', 'Sé lo que estás pensando')); ?></span>
    <h2><?php echo esc_html(vsl_f('obj_title', 'Resolvamos tus dudas ahora')); ?></h2>
  </div>
  <div class="wrap" style="margin-top:64px">
    <div class="grid g2">
      <?php foreach ($obj_def as $n => $d): ?>
      <div class="obj"><p class="d"><?php echo esc_html(vsl_f("obj_{$n}_d", $d[0])); ?></p><p class="a"><?php echo wp_kses_post(vsl_f("obj_{$n}_a", $d[1])); ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- OFERTA -->
<section class="section carbon">
  <div class="wrap narrow center mxa">
    <span class="eyebrow"><?php echo esc_html(vsl_f('oferta_eyebrow', 'Apertura oficial de cupos')); ?></span>
    <h2><?php echo wp_kses_post(vsl_f('oferta_title', 'Acompañamiento 1:1 según el<br>nivel de tu negocio')); ?></h2>
    <p class="lead mxa" style="margin:24px auto 0"><?php echo wp_kses_post(vsl_f('oferta_text', 'Desde quien recién ordena su negocio hasta organizaciones que escalan con liderazgo. Esta es una etapa de lanzamiento: <span class="hl">precios preferentes y cupos muy limitados.</span>')); ?></p>
    <p class="price-anchor"><?php echo wp_kses_post(vsl_f('price_anchor', 'La inversión parte <b>desde S/ 100</b> por sesión')); ?>
      <small><?php echo esc_html(vsl_f('price_anchor_sub', 'Precio de lanzamiento · tu nivel exacto se define tras la evaluación de tu negocio')); ?></small>
    </p>
    <div class="chips">
      <?php
      $chip_def = ['Solo 2 cupos · línea general', 'Solo 1 cupo · línea salud', 'Precio de lanzamiento'];
      for ($n = 1; $n <= 3; $n++): $c = vsl_f("chip_$n", $chip_def[$n-1]); if (!$c) continue; ?>
      <span class="badge<?php echo $n < 3 ? ' dot' : ''; ?>"><?php echo esc_html($c); ?></span>
      <?php endfor; ?>
    </div>
    <p style="font-size:14px;color:var(--gris-tenue);margin-top:32px;font-style:italic"><?php echo esc_html(vsl_f('oferta_note', 'El nivel y la inversión se definen contigo según tu negocio, después de postular.')); ?></p>
  </div>
</section>

<!-- CTA FINAL + FORM -->
<section class="section" id="postular">
  <div class="wrap center">
    <h2><?php echo esc_html(vsl_f('form_title', 'Postula a tu cupo')); ?></h2>
    <p class="lead mxa"><?php echo esc_html(vsl_f('form_subtitle', 'Déjanos tus datos. Te contactamos por WhatsApp para conocer tu negocio y ver si el Método Annabell es para ti.')); ?></p>
    <div class="form">
      <iframe data-tally-src="<?php echo esc_url(vsl_f('tally_url', $tally_default)); ?>" loading="lazy" width="100%" height="280" frameborder="0" marginheight="0" marginwidth="0" title="Postular"></iframe>
      <p style="text-align:center;font-size:13px;color:var(--gris-tenue);margin-top:12px"><?php echo esc_html(vsl_f('form_micro', 'Cupos limitados. Responderemos por WhatsApp para completar tu perfil.')); ?></p>
    </div>
    <script>var d=document,w="https://tally.so/widgets/embed.js",v=function(){"undefined"!=typeof Tally?Tally.loadEmbeds():d.querySelectorAll("iframe[data-tally-src]:not([src])").forEach((function(e){e.src=e.dataset.tallySrc}))};if("undefined"!=typeof Tally)v();else if(d.querySelector('script[src="'+w+'"]')==null){var s=d.createElement("script");s.src=w,s.onload=v,s.onerror=v,d.body.appendChild(s);}</script>
  </div>
</section>

<!-- FAQ -->
<section class="section carbon">
  <div class="wrap center"><h2><?php echo esc_html(vsl_f('faq_title', 'Preguntas frecuentes')); ?></h2><div class="divisor"></div></div>
  <div class="wrap">
    <div class="faq">
      <?php foreach ($faq_def as $n => $d):
        $q = vsl_f("faq_{$n}_q", $d[0]); if (!$q) continue; ?>
      <details<?php echo $n === 1 ? ' open' : ''; ?>><summary><?php echo esc_html($q); ?> <span class="plus">+</span></summary><p><?php echo esc_html(vsl_f("faq_{$n}_a", $d[1])); ?></p></details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="vsl-footer">
  <div class="wrap">
    <?php echo annabell_logo_html(false, 'vsl-logo'); ?>
    <p class="mxa" style="color:var(--gris);font-size:14px;margin-top:14px"><?php echo esc_html(vsl_f('footer_tagline', 'De autoempleado a empresario.')); ?></p>
    <small>&copy; <?php echo date('Y'); ?> Método Annabell. Mentoría de ejecución empresarial.</small>
  </div>
</footer>

</div><!-- .vsl -->
<?php wp_footer(); ?>
</body>
</html>
