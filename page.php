<?php get_header(); ?>

<main style="padding:8rem 0 4rem">
  <div class="container" style="max-width:780px">
    <?php while (have_posts()): the_post(); ?>
      <h1 style="font-family:var(--font-head);font-size:2.2rem;margin-bottom:2rem;color:var(--white)">
        <?php the_title(); ?>
      </h1>
      <div class="page-content" style="color:var(--gray-light);line-height:1.9">
        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
