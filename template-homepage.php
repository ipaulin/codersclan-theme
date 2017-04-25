<?php
/**
 * Template Name: Homepage Template
 */
?>
<?php
// check if ACF plugin in use
if(!function_exists('get_field')) {
  return;
}
?>
<?php while (have_posts()) : the_post(); ?>
  <?php if(get_field('hp_hero_image')) : ?>
    <?php $img = get_field('hp_hero_image'); ?>
    <!-- Hero image -->
    <div class="wide hero_image" <?php echo isset($img['url']) ? 'style="background-image: url(\'' . esc_url($img['url']). '\')"' : '' ?>>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1><?php echo esc_html(get_field('hp_hero_title')) ?></h1>
              <?php echo wp_kses(get_field('hp_hero_text'), ['p' => [], 'br' => []]) ?>
              <div class="clearfix"></div>
              <a href="<?php echo esc_url(get_field('hp_hero_button_link')) ?>" class="btn btn-primary"><?php the_field('hp_hero_button_text') ?></a>
            </div>
          </div>
        </div>
    </div>
    <!-- EOF Hero image -->
  <?php endif; ?>

  <?php if(have_rows('hp_clients_logo')) : ?>
  <!-- Clients -->
  <div class="wide clients">
    <div class="container">
      <?php while(have_rows('hp_clients_logo')) : the_row() ?>
        <?php $logo = get_sub_field('logo') ?>
        <img src="<?php echo esc_url($logo['url']) ?>" <?php echo $logo['alt'] ? 'alt="' . esc_attr($logo['alt']) . '"' : '' ?> />
      <?php endwhile; ?>
    </div>
  </div>
  <!-- EOF Clients -->
<?php endif; ?>

<?php if(have_rows('hp_solutions')) : ?>
  <!-- Solutions -->
  <div class="row solutions">
    <?php while(have_rows('hp_solutions')) : the_row(); ?>
      <?php $img = get_sub_field('image') ?>
      <div class="solution col-lg-9 col-md-9 col-xs-12 col-lg-offset-1 col-md-offset-1">
        <div class="image">
          <img class="img-responsive" src="<?php echo esc_url($img['url']) ?>" <?php echo $img['alt'] ? 'alt="' . esc_attr($img['alt']) . '"' : '' ?> />
        </div>
        <div class="text">
          <h2 class="title"><?php echo get_sub_field('title') ?></h2>
          <?php echo wp_kses(get_sub_field('text'), ['p' => [], 'br' => []]) ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <!-- EOF Solutions -->
<?php endif; ?>

<!-- Superhero -->
<?php $superhero = get_field('hp_superhero_image') ?>
<div class="wide superhero">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-offset-1">
        <img class="img-responsive" src="<?php echo esc_url($superhero['url']) ?>" <?php echo $superhero['alt'] ? 'alt="' . esc_attr($superhero['alt']) . '"' : '' ?> />
        <div class="superhero_text">
          <h2><?php echo esc_html(get_field('hp_superhero_title')) ?></h2>
          <?php echo wp_kses(get_field('hp_superhero_text'), ['br' => []]) ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- EOF Superhero -->

<?php if(have_rows('hp_partners_carousel')) : ?>
  <!-- Partners -->
  <div class=" row">
    <div class="col-md-9 col-md-offset-1 partners_carousel">
    <h2><?php echo esc_html(get_field('hp_pc_title')) ?></h2>
    <ul class="slides">
    <?php while(have_rows('hp_partners_carousel')) : the_row() ?>
      <?php $logo = get_sub_field('logo') ?>
      <?php $profile_img = get_sub_field('profile_image') ?>
      <li>
        <img class="img-responsive" src="<?php echo esc_url($logo['url']) ?>" />
        <div class="text">
          <?php echo wp_kses(get_sub_field('review'), ['p' => [], 'br' => []]) ?>
          <div class="partner_info">
            <img class="profile" src="<?php echo esc_url($profile_img['url']) ?>" />
            <span class="name"><?php echo esc_html(get_sub_field('name')) ?></span>
            <span class="title"><?php echo esc_html(get_sub_field('title')) ?></span>
          </div>
        </div>
      </li>
    <?php endwhile; ?>
  </ul>
</div>
</div>
<!-- EOF Partners -->
<?php endif; ?>

<!-- Contact -->
<div class="wide contact">
  <div class="container">
    <h2><?php echo esc_html(get_field('hp_contact_title')) ?></h2>
    <p class="subtitle"><?php echo esc_html(get_field('hp_contact_subtitle')) ?></p>
    <?php echo get_field('hp_contact_form') ? do_shortcode(get_field('hp_contact_form')) : '' ?>
  </div>
</div>
<!-- EOF Contact -->

<?php endwhile; ?>
