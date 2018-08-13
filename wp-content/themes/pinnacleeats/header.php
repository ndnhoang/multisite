<?php
/**
 * @link http://www.hoangblogger.com/
 * @package blog
 * @author hoangblogger
 */

if (is_user_logged_in()) {
  $current_user = wp_get_current_user();
  $user = new WP_User($current_user->ID,'',get_current_blog_id());
  if (!$user->caps) {
    wp_clear_auth_cookie();
    global $wp;
    wp_redirect(home_url( $wp->request ));
  }
}
global $woocommerce;
$cart_url = wc_get_cart_url();
$item_in_cart = $woocommerce->cart->cart_contents_count;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php get_favicon();?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="wrapper">
      <header>
        <div class="container text-right">
          <h1 class="float-left"><?php echo bloginfo('name'); ?></h1>
          <ul class="user-menu">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="<?php echo $cart_url; ?>"><span class="item-cart"><?php echo $item_in_cart; ?></span> Item(s)</a></li>
            <?php if (!is_user_logged_in()) : ?>
              <li><a href="<?php echo home_url('login'); ?>">Sign In</a></li>
              <li><a href="<?php echo home_url('register'); ?>">Sign Up</a></li>
            <?php else : ?>
              <li>Wellcome, <a href="<?php echo home_url('my-account'); ?>"><?php echo wp_get_current_user()->user_login; ?></a></li>
            <?php endif; ?>
          </ul>
        </div>
      </header>
      <main>