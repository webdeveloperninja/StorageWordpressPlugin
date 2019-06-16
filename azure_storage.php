<?php
/**
 * Plugin Name: Azure Storage
 * Plugin URI: https://github.com/webdeveloperninja/StorageWordpressPlugin
 * Description: Azure Storage
 * Version: 1.0
 * Author: Robert Smith
 */

function add_web_component()
{
    // Todo: Create admin page for inputs
    $container_name = get_option('azure_container_name');

    return "<blob-storage container-name='$container_name' content-type='image/jpeg'></blob-storage>";
}

function enqueue_custom_element()
{
    wp_enqueue_script('azure-storage-custom-element', 'https://webstoragecomponent.z22.web.core.windows.net/elements.js');
}

function enqueue_custom_element_theme()
{
    wp_enqueue_style('azure-storage-theme', 'https://webstoragecomponent.z22.web.core.windows.net/assets/indigo-pink.css', false);
}

add_shortcode('azure-storage', 'add_web_component');

add_action('wp_enqueue_scripts', 'enqueue_custom_element');

add_action('wp_enqueue_scripts', 'enqueue_custom_element_theme');

add_action('admin_menu', 'my_admin_menu');

function my_admin_menu()
{
    add_menu_page('My Top Level Menu Example', 'Top Level Menu', 'manage_options', 'myplugin/myplugin-admin-page.php', 'myplguin_admin_page', 'dashicons-tickets', 6);
}

// Include the dependencies needed to instantiate the plugin.
foreach (glob(plugin_dir_path(__FILE__) . 'admin/*.php') as $file) {
    include_once $file;
}


add_action('plugins_loaded', 'tutsplus_custom_admin_settings');
/**
 * Starts the plugin.
 *
 * @since 1.0.0
 */
function tutsplus_custom_admin_settings()
{
    $serializer = new Serializer();
    $serializer->init();

    $plugin = new Submenu(new Submenu_Page($serializer));
    $plugin->init();
}
