<div class="cheevt-contact-container">
    <h4><?php _e('Contact form', 'cheevt-plugin-boilerplate'); ?></h4>
    <div class="contact-form__wrap">
        <form method="POST" id="contact-form" class="contact-form__form">
            <div class="contact-form__field">
                <label for="name"><?php _e('Name', 'cheevt-plugin-boilerplate'); ?></label>
                <input type="text" id="name" name="name" class="contact-form__input" />
            </div>
            <div class="contact-form__field">
                <label for="email"><?php _e('Email', 'cheevt-plugin-boilerplate'); ?></label>
                <input type="email" id="email" name="email" class="contact-form__input" />
            </div>
            <div class="contact-form__field">
                <label for="subject"><?php _e('Subject', 'cheevt-plugin-boilerplate'); ?></label>
                <input type="text" id="subject" name="subject" class="contact-form__input" />
            </div>
            <div class="contact-form__field">
                <label for="message"><?php _e('Message', 'cheevt-plugin-boilerplate'); ?></label>
                <textarea id="message" name="message" class="contact-form__textarea" rows="12"></textarea>
            </div>
            <div class="contact-form__btn">
                <button type="button"><?php _e('Send', 'cheevt-plugin-boilerplate'); ?></button>
            </div>
            <div class="contact-form__msg contact-form__msg--hidden"></div>
        </form>
    </div>
</div>