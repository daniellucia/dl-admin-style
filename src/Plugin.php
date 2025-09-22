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
        add_action('admin_head', array($this, 'add_admin_preconnect'), 5);
    }

    public function enqueue_styles()
    {

        if (!is_admin()) {
            return;
        }

        wp_enqueue_style(
            'dl-admin-google-fonts',
            'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap',
            [],
            $this->version
        );

        wp_enqueue_style(
            'dl-admin-style',
            plugin_dir_url(DL_ADMIN_STYLES_FILE) . 'assets/css/admin-style.css',
            ['dl-admin-google-fonts'],
            $this->version
        );
    }

    /**
     * Añadimos preconnect para las fuentes de Google
     * @return void
     * @author Daniel Lucia
     */
    public function add_admin_preconnect()
    {
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    }
}
