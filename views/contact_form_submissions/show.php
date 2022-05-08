<div class="wrap">
	<h1 class="wp-heading-inline">
		<?php printf(
			__('Contact form submission #%d', 'cheevt-plugin-boilerplate'),
			$submission['ID']
		); ?>
	</h1>
	<hr>
	<span>Submitted at: <?php echo $submission['created_at']; ?></span>

	<div id="post-body" class="metabox-holder">
		<div id="post-body-content">
			<p><b><?php _e('Name', 'cheevt-plugin-boilerplate'); ?></b>: <?php echo $submission['name']; ?></p>
			<p><b><?php _e('Email', 'cheevt-plugin-boilerplate'); ?></b>: <?php echo $submission['email']; ?></p>
			<p><b><?php _e('Subject', 'cheevt-plugin-boilerplate'); ?></b>: <?php echo $submission['subject']; ?></p>
			<p><b><?php _e('Message', 'cheevt-plugin-boilerplate'); ?></b>:<hr> <?php echo $submission['message']; ?></p>
		</div>
	</div>
</div>