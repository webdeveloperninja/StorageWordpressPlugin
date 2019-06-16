<div class="wrap">

    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <form method="post" action="<?php echo esc_html(admin_url('admin-post.php')); ?>">
        <div id="universal-message-container">
            <h2>Your Azure Settings</h2>

            <div class="options">
                <p>
                    <label>Azure Storage Container Name</label>
                    <br />
                    <input type="text" name="container-name" value="<?php echo get_option('azure_container_name') ?>" />
                </p>
                <?php
                wp_nonce_field('acme-settings-save', 'acme-custom-message');
                submit_button();
                ?>
            </div>
    </form>

</div>