<?php // </main> zostanie zamknięte w plikach szablonów ?>

<footer class="bg-dark text-white text-center py-3 mt-auto"> <?php // mt-auto dla "sticky footer" jeśli body ma display:flex ?>
    <div class="container"> <?php // Dodano kontener dla spójności ?>
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Wszelkie prawa zastrzeżone.', 'portal-dla-graczy' ); ?></p>
      <?php
        // (Opcjonalnie) Możesz dodać tu drugie menu (np. 'footer') jeśli je zarejestrowałeś
        // wp_nav_menu( array( 'theme_location' => 'footer', ... ) );
      ?>
    </div>
</footer>

<?php wp_footer(); // Kluczowe dla WordPressa - dodaje skrypty JS ?>
</body>
</html>