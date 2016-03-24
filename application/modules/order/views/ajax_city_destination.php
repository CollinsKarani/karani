												<option></option>
	<?php	
	foreach ($getCity as $key => $value) {
		echo "<option value='".$value['city_id']."'>".$value['type']." ".$value['city_name']."</option>";
	}
	?>
