<?php get_header(); ?>

<main style="padding:8rem 0 4rem">
  <div class="container">

    <?php if (have_posts()): ?>
      <?php while (have_posts()): the_post(); ?>
        <article style="max-width:720px;margin:0 auto 3rem;padding-bottom:3rem;border-bottom:1px solid rgba(255,255,255,.07)">
          <h2 style="font-family:var(--font-head);font-size:1.6rem;margin-bottom:.5rem">
            <a href="<?php the_permalink(); ?>" style="color:var(--white)"><?php the_title(); ?></a>
          </h2>
          <p style="font-size:.8rem;color:var(--gray);margin-bottom:1rem"><?php the_date(); ?></p>
          <div style="color:var(--gray-light);line-height:1.8"><?php the_excerpt(); ?></div>
          <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="margin-top:1rem">Leer más →</a>
        </article>
      <?php endwhile; ?>

    <?php else: ?>
      <div style="text-align:center;padding:4rem 0">
        <p style="color:var(--gray)">No hay contenido aún.</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-gold" style="margin-top:1rem">Volver al inicio</a>
      </div>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>
