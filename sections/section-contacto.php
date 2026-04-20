<?php if (!get_theme_mod('show_contacto', true)) return;
$form_action = get_theme_mod('contact_form_url', '');
$use_wp_ajax = empty($form_action);
$form_action = $use_wp_ajax ? admin_url('admin-ajax.php') : $form_action;
?>
<section class="section-py" id="contacto" style="background:var(--black-soft)">
  <div class="container">
    <div class="text-center" style="max-width:560px;margin:0 auto 3rem">
      <span class="section-label"><?php echo esc_html(get_theme_mod('contacto_label','Da el primer paso')); ?></span>
      <h2 class="section-title"><?php echo esc_html(get_theme_mod('contacto_title','Solicita tu primera sesión')); ?></h2>
      <p class="section-desc" style="margin:0 auto">
        <?php echo esc_html(get_theme_mod('contacto_desc','Completa el formulario. Annabell revisará tu perfil y se pondrá en contacto para confirmar disponibilidad.')); ?>
      </p>
    </div>
    <form class="contact-form fade-up" id="contact-form"
          action="<?php echo esc_url($form_action); ?>" method="POST"
          <?php echo $use_wp_ajax ? 'data-ajax="true"' : ''; ?>>
      <?php if ($use_wp_ajax):
        wp_nonce_field('annabell_contact', 'nonce');
        echo '<input type="hidden" name="action" value="annabell_contact">';
      endif; ?>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label" for="cf-name"><?php echo esc_html(get_theme_mod('form_label_name','Tu nombre *')); ?></label>
          <input class="form-control" type="text" id="cf-name" name="name"
                 placeholder="<?php echo esc_attr(get_theme_mod('form_placeholder_name','Nombre completo')); ?>" required>
        </div>
        <div class="form-group">
          <label class="form-label" for="cf-email"><?php echo esc_html(get_theme_mod('form_label_email','Email *')); ?></label>
          <input class="form-control" type="email" id="cf-email" name="email"
                 placeholder="<?php echo esc_attr(get_theme_mod('form_placeholder_email','tu@email.com')); ?>" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label" for="cf-phone"><?php echo esc_html(get_theme_mod('form_label_phone','WhatsApp / Teléfono')); ?></label>
          <input class="form-control" type="tel" id="cf-phone" name="phone"
                 placeholder="<?php echo esc_attr(get_theme_mod('form_placeholder_phone','+51 999 999 999')); ?>">
        </div>
        <div class="form-group">
          <label class="form-label" for="cf-nivel"><?php echo esc_html(get_theme_mod('form_label_nivel','Tu nivel actual *')); ?></label>
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
        <label class="form-label" for="cf-message"><?php echo esc_html(get_theme_mod('form_label_message','Cuéntame brevemente tu negocio y tu principal reto')); ?></label>
        <textarea class="form-control" id="cf-message" name="message" rows="4"
                  placeholder="<?php echo esc_attr(get_theme_mod('form_placeholder_message','Ej: Tengo una clínica dental con 2 empleados, mis ingresos son X y mi mayor problema es...')); ?>"></textarea>
      </div>
      <button type="submit" class="btn btn-gold btn-lg btn-full">
        <?php echo esc_html(get_theme_mod('form_btn_text','Quiero mi primera sesión →')); ?>
      </button>
      <p style="text-align:center;font-size:.78rem;color:var(--gray);margin-top:.8rem">
        <?php echo esc_html(get_theme_mod('form_privacy_note','Cupos limitados. Tu información es 100% confidencial.')); ?>
      </p>
    </form>
  </div>
</section>
<div class="gold-divider"></div>
