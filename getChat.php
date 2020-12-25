<?php
	require("connectDB.php");
	$query = "SELECT * FROM Chat ORDER BY time ASC;";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result)) {
			echo '<div class="m">
					<p class="user"><span>'.$row['email'].'</span><span style="float:right">'.$row['time'].'</span></p>
					<p class="message">'.htmlspecialchars($row['message']).'</p>
				  </div>';
		}
?>