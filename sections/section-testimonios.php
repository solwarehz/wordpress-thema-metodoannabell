<?php if (!get_theme_mod('show_testimonios', true)) return;
$cols = get_theme_mod('testimonios_cols', '3');
$active = array_filter(range(1,6), function($n){ return get_theme_mod("show_testimonio_{$n}", $n <= 3); });
if (!$active) return;
?>
<section class="testimonios-section section-py">
  <div class="container">
    <div class="text-center" style="max-width:620px;margin:0 auto 3rem">
      <span class="section-label"><?php echo esc_html(get_theme_mod('testimonios_label','Lo que dicen')); ?></span>
      <h2 class="section-title"><?php echo esc_html(get_theme_mod('testimonios_title','Resultados reales de mentees reales')); ?></h2>
    </div>
    <div class="testimonios-carousel" data-cols="<?php echo esc_attr($cols); ?>">
      <div class="testimonios-track">
        <?php foreach ($active as $n):
          $text  = get_theme_mod("testimonio_{$n}_text", '');
          $name  = get_theme_mod("testimonio_{$n}_name", '');
          $role  = get_theme_mod("testimonio_{$n}_role", '');
          $img   = get_theme_mod("testimonio_{$n}_image", '');
          if (!$text && !$name) continue;
        ?>
        <div class="testimonio-card">
          <div class="testimonio-stars">★★★★★</div>
          <p class="testimonio-text">"<?php echo esc_html($text); ?>"</p>
          <div class="testimonio-author">
            <div class="testimonio-avatar">
              <?php if ($img): ?>
              <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>" loading="lazy">
              <?php else: ?>
              <span class="testimonio-avatar-initials"><?php echo esc_html(mb_strtoupper(mb_substr($name, 0, 1))); ?></span>
              <?php endif; ?>
            </div>
            <div class="testimonio-info">
              <strong><?php echo esc_html($name); ?></strong>
              <?php if ($role): ?><span><?php echo esc_html($role); ?></span><?php endif; ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="testimonios-controls">
        <button class="t-btn t-prev" aria-label="Anterior">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
        <div class="t-dots"></div>
        <button class="t-btn t-next" aria-label="Siguiente">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 6 15 12 9 18"/></svg>
        </button>
      </div>
    </div>
  </div>
</section>
<div class="gold-divider"></div>
