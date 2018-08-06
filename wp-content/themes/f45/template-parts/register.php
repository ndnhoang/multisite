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
if (isset($_POST)) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm'];
	if ($confirm_password == $password) {
		if (username_exists($username)) {
			echo '<div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Username exists</div>';
		} else {
			$password_hash = md5($password);
			$user_id = register_new_user($username, $email);
			wp_set_password($password_hash, $user_id);
			$user = array(
				'user_login' => $username,
				'user_password' => $password_hash,
				'remember' => false
			);
			wp_signon($user, false);
		}
	} else {
		echo '<div class="alert alert-danger alert-dismissible"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Password not equal</div>';
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
			<label>Email:</label>
			<input type="email" name="email" required class="form-control">
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
			<button type="submit" class="btn btn-primary">Sign up</button>
		</div>
	</form>
</div>

<?php get_footer();