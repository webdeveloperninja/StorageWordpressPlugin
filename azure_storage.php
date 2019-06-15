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
    return "<blob-storage container-name='mysetupsheet' content-type='image/jpeg'></blob-storage>";
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
