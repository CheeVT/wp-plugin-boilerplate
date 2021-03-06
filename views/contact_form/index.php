<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('Contact form submissions', 'cheevt-plugin-boilerplate'); ?></h1>

	<div id="post-body" class="metabox-holder">
		<div id="post-body-content">
			<div class="meta-box-sortables ui-sortable">
				<form class="search-form" method="get">
					<?php $table->search_box(__('Search Submissions', 'cheevt-plugin-boilerplate'), 'submission'); ?>
					<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
					<input type="hidden" name="action" value="search" />
				</form>
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