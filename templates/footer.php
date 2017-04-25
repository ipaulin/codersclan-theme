<footer class="content-info">
  <div class="container">

    <?php if(function_exists('get_field')) : ?>
      <div class="social_icons">
        <?php if(get_field('ts_twitter', 'options')) : ?>
          <a href="<?php echo esc_url(get_field('ts_twitter', 'options')) ?>" target="_blank" ><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <?php endif; ?>
        <?php if(get_field('ts_facebook', 'options')) : ?>
          <a href="<?php echo esc_url(get_field('ts_facebook', 'options')) ?>" target="_blank" ><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if(get_field('ts_copyright_text', 'options')) : ?>
      <span class="copyright">&copy; <?php echo date('Y') . ' ' . get_field('ts_copyright_text', 'options') ?></span>
    <?php endif; ?>
    <?php wp_nav_menu(['theme_location' => 'footer_navigation', 'container_class' => 'footer_nav', 'depth' => 1]); ?>
  </div>
</footer>
