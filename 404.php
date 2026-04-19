<?php get_header(); ?>

<section style="min-height:100vh;display:flex;align-items:center;padding:6rem 0;text-align:center">
  <div class="container">
    <p style="font-family:var(--font-head);font-size:7rem;font-weight:700;color:var(--gold);opacity:.3;line-height:1;margin-bottom:0">404</p>
    <h1 style="font-family:var(--font-head);font-size:2rem;color:var(--white);margin-bottom:1rem">Página no encontrada</h1>
    <p style="color:var(--gray);margin-bottom:2rem">La página que buscas no existe o fue movida.</p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-gold">Volver al inicio</a>
  </div>
</section>

<?php get_footer(); ?>
