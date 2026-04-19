<?php get_header(); ?>

<!-- ══════════════════════════════════════════════
     HERO
══════════════════════════════════════════════ -->
<section class="hero" id="inicio">
  <div class="hero-bg"></div>
  <div class="hero-particles"></div>
  <div class="container">
    <div class="hero-content">

      <span class="hero-label">Mentoría · Lanzamiento 2026</span>

      <h1 class="hero-title">
        ¿Tu negocio crece<br>
        pero tú <em>sigues atrapada</em><br>
        en la operación?
      </h1>

      <p class="hero-sub">
        El Método A.N.N.A.B.E.L.L. te acompaña a escalar con orden, estrategia
        y liderazgo — en sesiones 1:1 de acción real, no de teoría.
      </p>

      <div class="hero-cta-group">
        <a href="#contacto" class="btn btn-gold btn-lg">Quiero mi primera sesión →</a>
        <a href="#metodo"   class="btn btn-outline">Conoce el método</a>
      </div>

      <div class="hero-stats">
        <div class="hero-stat">
          <span class="stat-number">5×</span>
          <span class="stat-label">Ingresos incrementados</span>
        </div>
        <div class="hero-stat">
          <span class="stat-number">5</span>
          <span class="stat-label">Años de resultados reales</span>
        </div>
        <div class="hero-stat">
          <span class="stat-number">1:1</span>
          <span class="stat-label">Sesiones personalizadas</span>
        </div>
        <div class="hero-stat">
          <span class="stat-number">8</span>
          <span class="stat-label">Cupos de lanzamiento</span>
        </div>
      </div>

    </div>
  </div>
</section>

<div class="gold-divider"></div>

<!-- ══════════════════════════════════════════════
     PROBLEMA
══════════════════════════════════════════════ -->
<section class="problem-section section-py">
  <div class="container">
    <div class="problem-grid">

      <div>
        <span class="section-label">¿Te identificas?</span>
        <h2 class="section-title">Síntomas de un negocio<br>sin estructura</h2>

        <ul class="problem-list" style="margin-top:2rem">
          <li>
            <span class="icon">◆</span>
            Trabajas más horas que nunca, pero los ingresos no escalan igual.
          </li>
          <li>
            <span class="icon">◆</span>
            No sabes exactamente cuánto vendes, cuánto gastas ni qué tan rentable eres.
          </li>
          <li>
            <span class="icon">◆</span>
            Contratas por urgencia y después tienes que resolver los errores del equipo tú misma.
          </li>
          <li>
            <span class="icon">◆</span>
            Delegas tareas, pero igual terminas haciéndolas porque "nadie lo hace bien".
          </li>
          <li>
            <span class="icon">◆</span>
            Tienes ideas de crecimiento, pero no sabes por dónde empezar sin crear más caos.
          </li>
        </ul>
      </div>

      <div class="problem-right fade-up">
        <p style="color:var(--gold);font-family:var(--font-head);font-size:1.2rem;margin-bottom:1rem">
          La buena noticia:
        </p>
        <p style="color:var(--gray-light);line-height:1.9;margin-bottom:1.5rem">
          Estos no son problemas de capacidad. Son problemas de <strong style="color:var(--white)">estructura y método</strong>.
          Annabell lo vivió — y los resolvió. Hoy te muestra exactamente cómo.
        </p>
        <p style="color:var(--gray);font-size:.9rem;line-height:1.7">
          En su propia clínica Goldent, aplicó un sistema que le permitió
          <strong style="color:var(--gold-light)">quintuplicar sus ingresos en 5 años</strong>
          sin perder el control de la operación. Ese sistema es el Método A.N.N.A.B.E.L.L.
        </p>
      </div>

    </div>
  </div>
</section>

<div class="gold-divider"></div>

<!-- ══════════════════════════════════════════════
     ANNABELL BIO
══════════════════════════════════════════════ -->
<section class="bio-section section-py">
  <div class="container">
    <div class="bio-grid">

      <div class="bio-img-wrap fade-up">
        <div class="bio-img-placeholder">
          <?php
          if (has_post_thumbnail()) {
            the_post_thumbnail('large', ['alt' => 'Annabell — Mentora Empresarial']);
          } else {
            echo '<span style="padding:2rem;display:block">Foto de<br>Annabell<br><small style="opacity:.5">(subir desde el panel)</small></span>';
          }
          ?>
        </div>
      </div>

      <div class="fade-up">
        <span class="section-label">Tu mentora</span>
        <h2 class="section-title">Annabell</h2>

        <div class="bio-credentials">
          <span class="bio-credential">◆ Odontóloga &amp; Empresaria</span>
          <span class="bio-credential">◆ Directora de Clínica Goldent</span>
          <span class="bio-credential">◆ Mentora invitada — Cámara de Comercio de Huaraz</span>
          <span class="bio-credential">◆ 5× crecimiento de ingresos en 5 años</span>
        </div>

        <blockquote class="bio-quote">
          "Una conversación de una sola sesión puede cambiarlo todo — si viene con acción comprometida."
        </blockquote>

        <p class="bio-text">
          Annabell no es una consultora que te da teoría desde una pantalla. Es una empresaria
          que construyó su propia clínica, enfrentó los mismos problemas que tú enfrenta hoy,
          y desarrolló un método probado para salir del caos operacional y liderar con criterio.
        </p>

        <p class="bio-text" style="margin-top:1rem">
          Después de ser mentora invitada por la Cámara de Comercio de Huaraz y acompañar
          a sus primeros 5 mentees con resultados concretos, lanza formalmente su programa de
          mentoría en esta primera etapa de validación — con cupos muy limitados.
        </p>

        <a href="#contacto" class="btn btn-gold" style="margin-top:2rem">
          Solicitar mi sesión →
        </a>
      </div>

    </div>
  </div>
</section>

<div class="gold-divider"></div>

<!-- ══════════════════════════════════════════════
     MÉTODO ACRONIMO
══════════════════════════════════════════════ -->
<section class="metodo-section section-py" id="metodo">
  <div class="container">
    <div class="text-center" style="max-width:620px;margin:0 auto">
      <span class="section-label">La metodología</span>
      <h2 class="section-title">¿Qué significa<br><span class="text-gold">A·N·N·A·B·E·L·L</span>?</h2>
      <p class="section-desc" style="margin:0 auto">
        Cada letra es un pilar de transformación empresarial. Un sistema completo
        para escalar con intención, no por intuición.
      </p>
    </div>

    <div class="acronym-grid" style="margin-top:3rem">

      <?php
      $acronym = [
        ['A','Analiza',    'Comprende la realidad actual de tu negocio antes de intentar escalar.'],
        ['N','Numera',     'Mide absolutamente todo. Lo que no se mide no se puede mejorar.'],
        ['N','Navega',     'Aprende a dirigir tu negocio con visión estratégica y criterio de gestión.'],
        ['A','Anticípate', 'Ordena antes del caos. Prepárate para crecer antes de necesitarlo.'],
        ['B','Busca Talento','Construye equipo con criterio. Contrata por estándar, no por urgencia.'],
        ['E','Enseña',     'Delegar exige transferir conocimiento, formar y acompañar.'],
        ['L','Lidera',     'Deja de operar como autoempleada y empieza a liderar la estructura.'],
        ['L','Lecciona',   'Abraza los errores, optimiza procesos y construye mejora continua.'],
      ];
      foreach ($acronym as $item): ?>
      <div class="acronym-card fade-up">
        <div class="acronym-letter"><?php echo $item[0]; ?></div>
        <div class="acronym-word">— <?php echo $item[1]; ?></div>
        <p class="acronym-desc"><?php echo $item[2]; ?></p>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<div class="gold-divider"></div>

<!-- ══════════════════════════════════════════════
     5 FASES
══════════════════════════════════════════════ -->
<section class="fases-section section-py" id="fases">
  <div class="container">
    <div class="text-center" style="max-width:620px;margin:0 auto">
      <span class="section-label">Estructura del programa</span>
      <h2 class="section-title">Las 5 Fases de<br>Escalamiento Empresarial</h2>
      <p class="section-desc" style="margin:0 auto">
        El programa avanza contigo a tu ritmo. No hay siguiente fase sin acción
        demostrada — solo resultados reales habilitan el paso.
      </p>
    </div>

    <div class="fases-list">

      <?php
      $fases = [
        ['Aprende a Medir Todo y Deja de Gestionar a Ciegas',
         'Entender la realidad actual del negocio mediante indicadores clave y métricas de gestión. Defines tu punto de partida real.'],
        ['Anticípate a los Escenarios y Ordena Antes del Caos',
         'Desarrollar estructura organizacional y visión estratégica antes de que el crecimiento desborde la operación.'],
        ['Cambia Tu Forma de Contratar y Construye un Mejor Equipo',
         'Aprender a incorporar talento con criterio estratégico, evitando contrataciones por urgencia que cuestan caro.'],
        ['Aprende a Delegar de Verdad y Deja de Ser el Cuello de Botella',
         'Construir autonomía operativa mediante sistemas efectivos de delegación y liderazgo real.'],
        ['Abraza los Errores y Convierte Tu Negocio en un Sistema que Mejora Solo',
         'Implementar cultura de mejora continua, optimización de procesos y madurez operativa sostenible.'],
      ];
      foreach ($fases as $i => $f): ?>
      <div class="fase-item fade-up">
        <div class="fase-number"><?php echo $i + 1; ?></div>
        <div>
          <div class="fase-title"><?php echo $f[0]; ?></div>
          <p class="fase-desc"><?php echo $f[1]; ?></p>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<div class="gold-divider"></div>

<!-- ══════════════════════════════════════════════
     CÓMO FUNCIONA
══════════════════════════════════════════════ -->
<section class="proceso-section section-py">
  <div class="container">
    <div class="text-center" style="max-width:580px;margin:0 auto 3rem">
      <span class="section-label">El proceso</span>
      <h2 class="section-title">Así funciona la mentoría</h2>
      <p class="section-desc" style="margin:0 auto">
        Un sistema diseñado para generar acción real — no solo buenas intenciones.
      </p>
    </div>

    <div class="proceso-grid">
      <div class="proceso-step fade-up">
        <div class="proceso-icon">📋</div>
        <div class="proceso-title">Agenda tu sesión</div>
        <p class="proceso-desc">Completa el formulario. Annabell revisa tu perfil y confirma disponibilidad.</p>
      </div>
      <div class="proceso-step fade-up">
        <div class="proceso-icon">🎯</div>
        <div class="proceso-title">Sesión 1:1 (60 min)</div>
        <p class="proceso-desc">Diagnóstico de tu negocio y acuerdos de acción concretos. Virtual, directo al punto.</p>
      </div>
      <div class="proceso-step fade-up">
        <div class="proceso-icon">⚡</div>
        <div class="proceso-title">Tomas acción</div>
        <p class="proceso-desc">Implementas los acuerdos en tu negocio. Tu ritmo, tu realidad.</p>
      </div>
      <div class="proceso-step fade-up">
        <div class="proceso-icon">📸</div>
        <div class="proceso-title">Envías evidencias</div>
        <p class="proceso-desc">Sin evidencias de acción, no hay segunda sesión. El compromiso es el requisito.</p>
      </div>
      <div class="proceso-step fade-up">
        <div class="proceso-icon">🚀</div>
        <div class="proceso-title">Sigues escalando</div>
        <p class="proceso-desc">Con cada sesión aprobada, avanzas en las fases del método hacia el siguiente nivel.</p>
      </div>
    </div>

    <div class="text-center" style="margin-top:3rem">
      <div style="display:inline-block;background:rgba(201,168,76,.07);border:1px solid rgba(201,168,76,.2);border-radius:8px;padding:1.5rem 2.5rem;max-width:560px">
        <p style="color:var(--gold-light);font-family:var(--font-head);font-size:1rem;margin-bottom:.5rem">
          "No hay segunda sesión sin acción."
        </p>
        <p style="color:var(--gray);font-size:.85rem">
          Esto no es un curso de videos. Es acompañamiento real con rendición de cuentas real.
        </p>
      </div>
    </div>
  </div>
</section>

<div class="gold-divider"></div>

<!-- ══════════════════════════════════════════════
     PARA QUIÉN SÍ / NO
══════════════════════════════════════════════ -->
<section class="para-quien-section section-py">
  <div class="container">
    <div class="text-center" style="margin-bottom:3rem">
      <span class="section-label">Calificación</span>
      <h2 class="section-title">¿Es para ti?</h2>
    </div>

    <div class="para-quien-grid">
      <div class="pq-box yes fade-up">
        <div class="pq-header yes">
          <span>✦</span> Esta mentoría SÍ es para ti si…
        </div>
        <ul class="pq-list">
          <li><span class="check">◆</span> Tienes un negocio que ya genera ingresos y quieres escalarlo.</li>
          <li><span class="check">◆</span> Estás dispuesta a actuar, no solo a escuchar.</li>
          <li><span class="check">◆</span> Eres emprendedora o empresaria con visión de crecimiento real.</li>
          <li><span class="check">◆</span> Puedes comprometerte con los acuerdos de cada sesión.</li>
          <li><span class="check">◆</span> Quieres duplicar tus resultados con estrategia, no con suerte.</li>
          <li><span class="check">◆</span> Trabajas en el sector salud y quieres escalar tu consulta o clínica.</li>
        </ul>
      </div>

      <div class="pq-box no fade-up">
        <div class="pq-header no">
          <span>✕</span> Esta mentoría NO es para ti si…
        </div>
        <ul class="pq-list">
          <li><span class="x">✕</span> Solo buscas ideas sin ningún compromiso de acción.</li>
          <li><span class="x">✕</span> Esperas resultados sin implementar nada.</li>
          <li><span class="x">✕</span> No tienes negocio activo (aún en etapa de idea solamente).</li>
          <li><span class="x">✕</span> No puedes comprometer tiempo para ejecutar entre sesiones.</li>
          <li><span class="x">✕</span> Buscas una fórmula mágica sin esfuerzo propio.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="gold-divider"></div>

<!-- ══════════════════════════════════════════════
     PRECIOS
══════════════════════════════════════════════ -->
<section class="precios-section section-py" id="precios">
  <div class="container">
    <div class="text-center" style="max-width:620px;margin:0 auto 1.5rem">
      <span class="section-label">Inversión · Lanzamiento 2026</span>
      <h2 class="section-title">Elige tu nivel<br>de escalamiento</h2>
      <p class="section-desc" style="margin:0 auto">
        Paquetes diseñados según la etapa real de tu negocio. Cupos estrictamente limitados
        para garantizar acompañamiento de calidad.
      </p>
    </div>

    <div class="text-center">
      <div class="precios-note">
        ⏳ Tarifas de lanzamiento válidas solo para esta primera etapa — sujetas a cambio al completar cupos
      </div>
    </div>

    <!-- EMPRENDEDORES -->
    <div class="precios-category">◆ Para Emprendedores</div>

    <div class="precios-grid">

      <!-- Hobby -->
      <div class="precio-card fade-up">
        <div class="precio-title">Hobby a Emprendedor</div>
        <p class="precio-perfil">Estás convirtiendo tu pasión en negocio y necesitas las bases correctas.</p>
        <div class="precio-ingresos">Ingresos mensuales</div>
        <div class="precio-rango">Menores a S/ 2,000</div>
        <div class="precio-cupos">🔥 Solo 2 cupos disponibles</div>
        <div class="precio-amount">
          <div class="precio-launch">Tarifa de lanzamiento</div>
          <div class="precio-value">S/ 100 <span>/ sesión</span></div>
          <div class="precio-normal">Precio normal: S/ 250 / sesión</div>
        </div>
        <a href="#contacto" class="btn btn-outline btn-full" style="margin-top:1.5rem">
          Aplicar a este nivel
        </a>
      </div>

      <!-- Emprendedor 1 -->
      <div class="precio-card fade-up">
        <div class="precio-title">Emprendedor 1</div>
        <p class="precio-perfil">Ya tienes ingresos estables pero necesitas estructura para crecer.</p>
        <div class="precio-ingresos">Ingresos mensuales</div>
        <div class="precio-rango">S/ 2,000 — S/ 5,000</div>
        <div class="precio-cupos">🔥 Solo 2 cupos disponibles</div>
        <div class="precio-amount">
          <div class="precio-launch">Tarifa de lanzamiento</div>
          <div class="precio-value">S/ 200 <span>/ sesión</span></div>
          <div class="precio-normal">Precio normal: S/ 400 / sesión</div>
        </div>
        <a href="#contacto" class="btn btn-outline btn-full" style="margin-top:1.5rem">
          Aplicar a este nivel
        </a>
      </div>

      <!-- Emprendedor 2 -->
      <div class="precio-card featured fade-up">
        <div class="precio-badge">Más solicitado</div>
        <div class="precio-title">Emprendedor 2</div>
        <p class="precio-perfil">Tienes equipo y operación, pero el crecimiento te desborda.</p>
        <div class="precio-ingresos">Ingresos mensuales</div>
        <div class="precio-rango">S/ 5,000 — S/ 10,000</div>
        <div class="precio-cupos">🔥 Solo 2 cupos disponibles</div>
        <div class="precio-amount">
          <div class="precio-launch">Tarifa de lanzamiento</div>
          <div class="precio-value">S/ 300 <span>/ sesión</span></div>
          <div class="precio-normal">Precio normal: S/ 700 / sesión</div>
        </div>
        <a href="#contacto" class="btn btn-gold btn-full" style="margin-top:1.5rem">
          Aplicar a este nivel
        </a>
      </div>

      <!-- Emprendedor 3 -->
      <div class="precio-card fade-up">
        <div class="precio-title">Emprendedor 3</div>
        <p class="precio-perfil">Negocio consolidado que necesita escalar con liderazgo y sistemas.</p>
        <div class="precio-ingresos">Ingresos mensuales</div>
        <div class="precio-rango">S/ 10,000 — S/ 50,000</div>
        <div class="precio-cupos">🔥 Solo 2 cupos disponibles</div>
        <div class="precio-amount">
          <div class="precio-launch">Tarifa de lanzamiento</div>
          <div class="precio-value">USD 100 <span>/ sesión</span></div>
          <div class="precio-normal">Precio normal: USD 200 / sesión</div>
        </div>
        <a href="#contacto" class="btn btn-outline btn-full" style="margin-top:1.5rem">
          Aplicar a este nivel
        </a>
      </div>

    </div>

    <!-- SECTOR SALUD -->
    <div class="precios-category" style="margin-top:4rem">◆ Línea Premium — Sector Salud</div>
    <p style="color:var(--gray);font-size:.9rem;margin-bottom:2rem">
      Mentoría especializada para profesionales de la salud que quieren escalar su consulta o clínica.
      Annabell habla tu idioma — es odontóloga empresaria.
    </p>

    <div class="precios-grid" style="grid-template-columns:repeat(auto-fit,minmax(240px,1fr))">

      <!-- Salud 1 -->
      <div class="precio-card fade-up">
        <div class="precio-title">Salud 1</div>
        <p class="precio-perfil">Profesionales independientes y consultorios pequeños.</p>
        <div class="precio-cupos" style="margin-top:0.5rem">⚡ Solo 1 cupo disponible</div>
        <div class="precio-amount">
          <div class="precio-launch">Tarifa de lanzamiento</div>
          <div class="precio-value">S/ 400 <span>/ sesión</span></div>
          <div class="precio-normal">Precio normal: S/ 800 / sesión</div>
        </div>
        <a href="#contacto" class="btn btn-outline btn-full" style="margin-top:1.5rem">
          Aplicar a este nivel
        </a>
      </div>

      <!-- Salud 2 -->
      <div class="precio-card featured fade-up">
        <div class="precio-badge">Línea Premium</div>
        <div class="precio-title">Salud 2</div>
        <p class="precio-perfil">Clínicas y centros médicos en proceso de crecimiento.</p>
        <div class="precio-cupos" style="margin-top:0.5rem">⚡ Solo 1 cupo disponible</div>
        <div class="precio-amount">
          <div class="precio-launch">Tarifa de lanzamiento</div>
          <div class="precio-value">S/ 600 <span>/ sesión</span></div>
          <div class="precio-normal">Precio normal: S/ 1,200 / sesión</div>
        </div>
        <a href="#contacto" class="btn btn-gold btn-full" style="margin-top:1.5rem">
          Aplicar a este nivel
        </a>
      </div>

      <!-- Salud 3 -->
      <div class="precio-card fade-up">
        <div class="precio-title">Salud 3</div>
        <p class="precio-perfil">Operaciones multi consultorio y clínicas de alta complejidad.</p>
        <div class="precio-cupos" style="margin-top:0.5rem">⚡ Solo 1 cupo disponible</div>
        <div class="precio-amount">
          <div class="precio-launch">Tarifa de lanzamiento</div>
          <div class="precio-value">USD 200 <span>/ sesión</span></div>
          <div class="precio-normal">Precio normal: USD 400 / sesión</div>
        </div>
        <a href="#contacto" class="btn btn-outline btn-full" style="margin-top:1.5rem">
          Aplicar a este nivel
        </a>
      </div>

    </div>

    <div style="margin-top:2.5rem;text-align:center">
      <p style="font-size:.82rem;color:var(--gray);max-width:560px;margin:0 auto;line-height:1.7">
        <strong style="color:var(--gold-light)">Nota importante:</strong>
        Las tarifas de lanzamiento corresponden únicamente a esta etapa inicial de validación.
        Serán ajustadas una vez completados los cupos disponibles de cada nivel.
      </p>
    </div>
  </div>
</section>

<div class="gold-divider"></div>

<!-- ══════════════════════════════════════════════
     COMPROMISO
══════════════════════════════════════════════ -->
<section class="compromiso-section section-py">
  <div class="container">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:3rem;align-items:center">

      <div class="fade-up">
        <span class="section-label">El compromiso es mutuo</span>
        <h2 class="section-title">Annabell se compromete<br>contigo al 100%</h2>
        <p style="color:var(--gray-light);line-height:1.9;margin-top:1rem">
          Cada sesión es preparada con el diagnóstico real de tu negocio. No hay respuestas genéricas.
          No hay scripts. Cada acuerdo es pensado para tu contexto específico.
        </p>
      </div>

      <div class="fade-up">
        <ul class="problem-list">
          <li>
            <span class="icon">◆</span>
            <div>
              <strong style="color:var(--white)">Preparación previa</strong>
              <p style="margin:0;font-size:.85rem">Annabell estudia tu negocio antes de cada sesión.</p>
            </div>
          </li>
          <li>
            <span class="icon">◆</span>
            <div>
              <strong style="color:var(--white)">Acuerdos accionables</strong>
              <p style="margin:0;font-size:.85rem">Saldrás de cada sesión con pasos concretos, no ideas vagas.</p>
            </div>
          </li>
          <li>
            <span class="icon">◆</span>
            <div>
              <strong style="color:var(--white)">Seguimiento por evidencias</strong>
              <p style="margin:0;font-size:.85rem">Tu progreso se mide con resultados reales, no con palabras.</p>
            </div>
          </li>
          <li>
            <span class="icon">◆</span>
            <div>
              <strong style="color:var(--white)">Metodología estructurada</strong>
              <p style="margin:0;font-size:.85rem">El Método A.N.N.A.B.E.L.L. — validado en su propio negocio y con 5 mentees.</p>
            </div>
          </li>
        </ul>
      </div>

    </div>
  </div>
</section>

<div class="gold-divider"></div>

<!-- ══════════════════════════════════════════════
     FORMULARIO CONTACTO
══════════════════════════════════════════════ -->
<section class="section-py" id="contacto" style="background:var(--black-soft)">
  <div class="container">
    <div class="text-center" style="max-width:560px;margin:0 auto 3rem">
      <span class="section-label">Da el primer paso</span>
      <h2 class="section-title">Solicita tu<br><span class="text-gold">primera sesión</span></h2>
      <p class="section-desc" style="margin:0 auto">
        Completa el formulario. Annabell revisará tu perfil y se pondrá en contacto para confirmar disponibilidad.
      </p>
    </div>

    <form class="contact-form fade-up" id="contact-form"
          action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" method="POST">

      <?php wp_nonce_field('annabell_contact', 'nonce'); ?>
      <input type="hidden" name="action" value="annabell_contact">

      <div class="form-row">
        <div class="form-group">
          <label class="form-label" for="cf-name">Tu nombre *</label>
          <input class="form-control" type="text" id="cf-name" name="name"
                 placeholder="Nombre completo" required>
        </div>
        <div class="form-group">
          <label class="form-label" for="cf-email">Email *</label>
          <input class="form-control" type="email" id="cf-email" name="email"
                 placeholder="tu@email.com" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label class="form-label" for="cf-phone">WhatsApp / Teléfono</label>
          <input class="form-control" type="tel" id="cf-phone" name="phone"
                 placeholder="+51 999 999 999">
        </div>
        <div class="form-group">
          <label class="form-label" for="cf-nivel">Tu nivel actual *</label>
          <select class="form-control" id="cf-nivel" name="nivel" required>
            <option value="" disabled selected>Selecciona tu nivel</option>
            <optgroup label="Emprendedores">
              <option value="hobby">Hobby a Emprendedor (menos de S/ 2,000/mes)</option>
              <option value="emp1">Emprendedor 1 (S/ 2,000 – S/ 5,000/mes)</option>
              <option value="emp2">Emprendedor 2 (S/ 5,000 – S/ 10,000/mes)</option>
              <option value="emp3">Emprendedor 3 (S/ 10,000 – S/ 50,000/mes)</option>
            </optgroup>
            <optgroup label="Sector Salud — Premium">
              <option value="salud1">Salud 1 — Consultorios pequeños</option>
              <option value="salud2">Salud 2 — Clínicas en crecimiento</option>
              <option value="salud3">Salud 3 — Multi consultorio / alta complejidad</option>
            </optgroup>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label" for="cf-message">Cuéntame brevemente tu negocio y tu principal reto</label>
        <textarea class="form-control" id="cf-message" name="message" rows="4"
                  placeholder="Ej: Tengo una clínica dental con 2 empleados, mis ingresos son X y mi mayor problema es..."></textarea>
      </div>

      <button type="submit" class="btn btn-gold btn-lg btn-full">
        Quiero mi primera sesión →
      </button>

      <p style="text-align:center;font-size:.78rem;color:var(--gray);margin-top:.8rem">
        Cupos limitados. Tu información es 100% confidencial.
      </p>

    </form>
  </div>
</section>

<!-- ══════════════════════════════════════════════
     CTA FINAL
══════════════════════════════════════════════ -->
<section class="cta-section section-py">
  <div class="container">
    <div class="cta-box fade-up">
      <h2 class="cta-title">
        Tu negocio puede ser <span class="text-gold">diferente</span>.<br>
        La acción empieza hoy.
      </h2>
      <p class="cta-desc">
        No esperes a tener todo perfecto. La primera sesión es el diagnóstico que
        cambia la dirección. Y recuerda: los cupos son limitados.
      </p>
      <div class="cta-group">
        <a href="#contacto" class="btn btn-gold btn-lg">Solicitar mi sesión →</a>
        <a href="https://wa.me/51XXXXXXXXX?text=Hola%20Annabell%2C%20vi%20tu%20mentor%C3%ADa%20y%20quiero%20saber%20m%C3%A1s"
           class="btn btn-outline btn-lg" target="_blank" rel="noopener">
          Escribir por WhatsApp
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
