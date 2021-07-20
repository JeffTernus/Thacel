<div style="border-bottom: 1px solid black;">
<?php $image = ".design-assets/user/userprofile.svg"; ?>
	<div>
		<img src="<?php echo $image; ?>"  style='margin-top: 4px; width: 75px';>
	</div>
	<h4><?php echo $ROW_USER["first_name"] . " " . $ROW_USER["last_name"]; ?></h4>
	<p><?php echo $ROW["post"]; ?></p>
	<h6 style="color: grey;"><?php echo $ROW["date"]; ?></h6>
</div>
