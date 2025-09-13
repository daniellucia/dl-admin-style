<?php

namespace DL\AdminStyles;

defined('ABSPATH') || exit;

class Plugin
{

    private $version = DL_ADMIN_STYLES_VERSION;

    public function __construct() {}

    /**
     * Iniciamos el plugin
     * @return void
     * @author Daniel Lucia
     */
    public function init(): void
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'), 100);
    }

    public function enqueue_styles()
    {
        wp_enqueue_style(
            'dl-admin-google-fonts',
            'https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&display=swap',
            [],
            ver: $this->version
        );

        wp_enqueue_style(
            'dl-admin-style',
            plugin_dir_url(DL_ADMIN_STYLES_FILE) . 'assets/css/admin-style.css',
            ['dl-admin-google-fonts'],
            $this->version
        );
    }
}
