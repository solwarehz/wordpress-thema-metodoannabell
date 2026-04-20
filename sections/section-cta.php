<?php if (!get_theme_mod('show_cta', true)) return;
$wa = preg_replace('/[^0-9]/', '', get_theme_mod('cta_whatsapp', '51XXXXXXXXX'));
?>
<section class="cta-section section-py">
  <div class="container">
    <div class="cta-box fade-up">
      <h2 class="cta-title">
        <?php echo esc_html(get_theme_mod('cta_title','Tu negocio puede ser diferente. La acción empieza hoy.')); ?>
      </h2>
      <p class="cta-desc">
        <?php echo esc_html(get_theme_mod('cta_desc','No esperes a tener todo perfecto. La primera sesión es el diagnóstico que cambia la dirección. Y recuerda: los cupos son limitados.')); ?>
      </p>
      <div class="cta-group">
        <a href="<?php echo esc_url(get_theme_mod('cta_btn1_url','#contacto')); ?>" class="btn btn-gold btn-lg">
          <?php echo esc_html(get_theme_mod('cta_btn1_text','Solicitar mi sesión →')); ?>
        </a>
        <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=Hola%20Annabell%2C%20vi%20tu%20mentor%C3%ADa%20y%20quiero%20saber%20m%C3%A1s"
           class="btn btn-outline btn-lg" target="_blank" rel="noopener">
          Escribir por WhatsApp
        </a>
      </div>
    </div>
  </div>
</section>
