<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('CheeVT Settings', 'cheevt-plugin-boilerplate'); ?></h1>

    <form action="options.php" method="POST">
        <?php settings_errors(); ?>
        <?php settings_fields($this->settiingsAPI->option_group); ?>
        <?php do_settings_sections($this->settiingsAPI->page); ?>
        <?php submit_button(); ?>
    </form>
</div>