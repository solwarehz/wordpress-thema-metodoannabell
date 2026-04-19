<?php
/*
 * Template Name: Página de Gracias
 */
get_header();
?>

<section style="min-height:100vh;display:flex;align-items:center;padding:6rem 0;background:radial-gradient(ellipse 60% 60% at 50% 50%,rgba(201,168,76,.07) 0%,transparent 70%)">
  <div class="container">
    <div style="max-width:580px;margin:0 auto;text-align:center">

      <div style="width:80px;height:80px;background:rgba(201,168,76,.1);border:2px solid var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 2rem;font-size:2rem">
        ✓
      </div>

      <span class="section-label">¡Solicitud recibida!</span>

      <h1 style="font-family:var(--font-head);font-size:2.4rem;font-weight:700;margin-bottom:1rem;color:var(--white)">
        Gracias por dar<br>el primer paso.
      </h1>

      <p style="color:var(--gray-light);font-size:1.05rem;line-height:1.9;margin-bottom:2rem">
        Annabell revisará tu solicitud personalmente y se pondrá en contacto contigo en las próximas
        <strong style="color:var(--gold)">24 a 48 horas</strong>
        para confirmar disponibilidad y agendar tu primera sesión.
      </p>

      <div style="background:var(--black-card);border:1px solid rgba(201,168,76,.2);border-radius:8px;padding:1.5rem;margin-bottom:2.5rem">
        <p style="font-family:var(--font-head);font-style:italic;color:var(--gold-light);font-size:1.1rem;margin-bottom:.5rem">
          "La acción ya empezó."
        </p>
        <p style="color:var(--gray);font-size:.88rem">
          Completar este formulario fue el primer paso. Prepárate para la sesión más honesta y
          accionable que tendrás sobre tu negocio.
        </p>
      </div>

      <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-outline">← Volver al inicio</a>
        <a href="https://wa.me/51XXXXXXXXX" class="btn btn-gold" target="_blank" rel="noopener">
          Escribir por WhatsApp
        </a>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
