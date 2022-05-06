<div class="wrap">
	<h1 class="wp-heading-inline">Contact form submissions</h1>

	<div id="post-body" class="metabox-holder">
		<div id="post-body-content">
			<div class="meta-box-sortables ui-sortable">
				<!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
				<?php $table->views(); ?>
				<form method="GET" action="">
					<!-- For plugins, we also need to ensure that the form posts back to our current page -->
					<input type="hidden" name="page" value="<?php echo esc_attr($_REQUEST['page']); ?>" />
					<!-- Now we can render the completed list table -->
					<?php $table->display(); ?>
				</form>
			</div>
		</div>
	</div>
</div>