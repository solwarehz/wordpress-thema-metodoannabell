<footer class="site-footer" role="contentinfo">
  <div class="container">
    <div class="footer-inner">

      <div class="footer-brand">
        <?php echo annabell_logo_html(true, 'nav-logo-img'); ?>
        <p class="footer-tagline">
          Programa de Acompañamiento y Escalamiento Empresarial.<br>
          Escala tu negocio con orden, estrategia y liderazgo.
        </p>
      </div>

      <div class="footer-col">
        <h4>Navegación</h4>
        <ul>
          <li><a href="#metodo">El Método</a></li>
          <li><a href="#fases">Las 5 Fases</a></li>
          <li><a href="#precios">Paquetes</a></li>
          <li><a href="#contacto">Contacto</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Contacto</h4>
        <ul>
          <?php $wa_num = preg_replace('/[^0-9]/', '', get_theme_mod('wa_number', '51XXXXXXXXX')); ?>
          <li><a href="https://wa.me/<?php echo esc_attr($wa_num); ?>" target="_blank" rel="noopener">WhatsApp</a></li>
          <li><a href="mailto:hola@metodoannabell.com">hola@metodoannabell.com</a></li>
          <li><a href="https://instagram.com/metodoannabell" target="_blank" rel="noopener">Instagram</a></li>
        </ul>
      </div>

    </div>

    <div class="footer-bottom">
      <span>&copy; <?php echo date('Y'); ?> Método A.N.N.A.B.E.L.L. — Todos los derechos reservados.</span>
      <span>Diseñado para escalar negocios con criterio.</span>
    </div>
  </div>
</footer>

<?php wp_footer(); // el botón flotante de WhatsApp se inyecta aquí vía annabell_whatsapp_float() ?>
</body>
</html>
