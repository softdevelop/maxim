<?php
	function maxim_legal_list() {
?>
		<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/sinetiks-schools/style-admin.css" rel="stylesheet" />
		<div class="wrap">
			<h2>Legal Forms</h2>

			<?php
				global $wpdb;
				$rows = $wpdb->get_results("SELECT * from " . $wpdb->prefix . "preup");

				echo "<table class='wp-list-table widefat fixed'>";
				echo "
					<tr>
						<th>ID</th>
						<th>Man name</th>
						<th>Man pin</th>
						<th>Man phone</th>
						<th>Man identity</th>
						<th>Man address</th>
						<th>Man postort</th>
						<th>Man pin</th>
						<th>Woman name</th>
						<th>Woman pin</th>
						<th>Woman phone</th>
						<th>Woman identity</th>
						<th>Woman address</th>
						<th>Woman postort</th>
						<th>Woman email</th>
						<th>Action</th>
					</tr>

					";
				foreach ($rows as $row ){
					echo "<tr>";
					echo "<td>$row->id</td>";
					echo "<td>$row->man_name</td>";	
					echo "<td>$row->man_pin</td>";	
					echo "<td>$row->man_phone</td>";	
					echo "<td>$row->man_identity</td>";	
					echo "<td>$row->man_address</td>";	
					echo "<td>$row->man_postort</td>";	
					echo "<td>$row->man_email</td>";

					echo "<td>$row->women_name</td>";
					echo "<td>$row->women_pin</td>";
					echo "<td>$row->women_phone</td>";
					echo "<td>$row->women_identity</td>";
					echo "<td>$row->women_address</td>";
					echo "<td>$row->women_postort</td>";
					echo "<td>$row->women_email</td>";	
					echo "<td><a href='".admin_url('admin.php?page=maxim_legal_view&id='.$row->id)."'>View</a></td>";
					echo "</tr>";}
				echo "</table>";
			?>
		</div>
<?php
}