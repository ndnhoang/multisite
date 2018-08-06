<?php
/**
 * Template Name: Login
 * @link http://www.nlstech.net/
 * @author NLS Team
 * @package F45
 */
if (is_user_logged_in()) {
	wp_redirect(home_url());
	exit;
}
if (isset($_POST)) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (isset($username) && isset($password)) {
		if (!username_exists($username)) {
				echo '<div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Username not exists</div>';
		} else {
			$password_hash = md5($password);
			$user = array(
				'user_login' => $username,
				'user_password' => $password_hash,
				'remember' => false
			);
			$user = wp_signon($user, false);
			if (is_wp_error($user)) {
				echo '<div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$user->get_error_message().'</div>';
			} else {
				global $wp;
	    		
	    		echo '<div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>OK</div>';
			}
		}
	}
}
get_header(); ?>

<div class="container">
	<h2 class="text-center">Sign In</h2>
	<form action="" method="post">
		<div class="form-group">
			<label>Username:</label>
			<input type="text" name="username" required class="form-control">
		</div>
		<div class="form-group">
			<label>Password:</label>
			<input type="password" name="password" required class="form-control">
		</div>
		<div>
			<button type="submit" class="btn btn-primary">Log in</button>
		</div>
	</form>
</div>

<?php get_footer();