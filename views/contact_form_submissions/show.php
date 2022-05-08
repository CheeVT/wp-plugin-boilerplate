<div class="wrap">
	<h1 class="wp-heading-inline">Contact form submission #<?php echo $submission['ID']; ?></h1>
	<hr>
	<span>Submitted at: <?php echo $submission['created_at']; ?></span>

	<div id="post-body" class="metabox-holder">
		<div id="post-body-content">
			<p><b>Name</b>: <?php echo $submission['name']; ?></p>
			<p><b>Email</b>: <?php echo $submission['email']; ?></p>
			<p><b>Subject</b>: <?php echo $submission['subject']; ?></p>
			<p><b>Message</b>:<hr> <?php echo $submission['message']; ?></p>
		</div>
	</div>
</div>