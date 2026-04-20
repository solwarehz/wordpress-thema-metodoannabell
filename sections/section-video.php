<?php
if (!get_theme_mod('show_video', true)) return;
$video_id = annabell_youtube_id(get_theme_mod('video_url', ''));
if (!$video_id) return;
?>
<section class="video-section section-py">
  <div class="container">
    <div class="text-center" style="max-width:640px;margin:0 auto 2.5rem">
      <span class="section-label"><?php echo esc_html(get_theme_mod('video_label','Conóceme mejor')); ?></span>
      <h2 class="section-title"><?php echo esc_html(get_theme_mod('video_title','Un mensaje de Annabell para ti')); ?></h2>
      <p class="section-desc" style="margin:0 auto">
        <?php echo esc_html(get_theme_mod('video_desc','Antes de dar el paso, mira este breve mensaje. En menos de 3 minutos sabrás si esto es para ti.')); ?>
      </p>
    </div>
    <div class="video-wrapper fade-up">
      <div class="video-frame">
        <iframe
          src="https://www.youtube-nocookie.com/embed/<?php echo esc_attr($video_id); ?>?rel=0&modestbranding=1&color=white"
          title="<?php echo esc_attr(get_theme_mod('video_title','Video de Annabell')); ?>"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
          loading="lazy">
        </iframe>
      </div>
    </div>
  </div>
</section>
<div class="gold-divider"></div>
