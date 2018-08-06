<?php
/**
 * Template Name: Register
 * @link http://www.nlstech.net/
 * @author NLS Team
 * @package F45
 */
if (is_user_logged_in()) {
	wp_redirect(home_url());
	exit;
}
if (isset($_POST["register"])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirm'];
	$status = checkRegister($username, $password, $confirmPassword);
	if ($status == "") {
		global $wp;
		wp_redirect(home_url( $wp->request ));
		exit;
	} else {
		echo '<div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$status.'</div>';
	}
}
get_header(); ?>

<div class="container">
	<h2 class="text-center">Sign Up</h2>
	<form action="" method="post">
		<div class="form-group">
			<label>Username:</label>
			<input type="text" name="username" required class="form-control">
		</div>
		<div class="form-group">
			<label>Password:</label>
			<input type="password" name="password" required class="form-control">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" name="confirm" required class="form-control">
		</div>
		<div>
			<button type="submit" name="register" class="btn btn-primary">Sign up</button>
		</div>
	</form>
</div>

<?php get_footer();