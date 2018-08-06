<?php
/**
 * Template Name: Profile
 * @link http://www.nlstech.net/
 * @author NLS Team
 * @package jayahr
 */
if (!is_user_logged_in()) {
	redirect(home_url());
	exit;
}
global $wpdb;
$user = wp_get_current_user();
get_header(); ?>
	<div id="profile">
		<div class="container">
			<h2>List Credit Transaction Tracking</h2>
			<?php $data = $wpdb->get_results("SELECT * FROM custom_credit WHERE user_id = ".$user->ID." ORDER BY id DESC"); 
			if ($data) : $count = 0; ?>
				<table>
					<thead>
						<tr>
							<th></th>
							<th>Order ID</th>
							<th>Order Status</th>
							<th>Credit(s)</th>
							<th>Status</th>
							<th>Notes</th>
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $item) :
							$order_id = $item->order_id;
							$credit = $item->credit;
							$status = $item->status;
							$type = $item->type;
							$order_status = $item->order_status;
							$note = $item->note;
							$time = $item->time;
							$time = new DateTime($time);
							$time = date_format($time, 'M d, Y H:i:s');
							if ($type == 2) {
								$prefix = '+';
								$status_text = 'Awarded';
							} else {
								if ($status == 0) {
									$prefix = '-';
									$status_text = 'Used';
								} else {
									$prefix = '+';
									$status_text = 'Refunded';
								}
							}
							$count++;
						?>
						<tr>
							<td><?php echo $count; ?></td>
							<td><?php echo 'Order #'.$order_id; ?></td>	
							<td><?php echo $order_status; ?></td>
							<td><?php echo $prefix.number_format($credit, 0, '.', ','); ?></td>
							<td><?php echo $status_text; ?></td>
							<td><?php echo $note; ?></td>
							<td><?php echo $time; ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			<?php else : ?>
				<p>No result</p>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer();