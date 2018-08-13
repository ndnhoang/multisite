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
if (isset($_POST["login"])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (checkLogin($username, $password, 1)) {
		global $wp;
		wp_redirect(home_url( $wp->request ));
		exit;
	} else {
		echo '<div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Username or password incorrect!</div>';
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
			<button type="submit" name="login" class="btn btn-primary">Log in</button>
		</div>
	</form>
</div>

<?php get_footer();