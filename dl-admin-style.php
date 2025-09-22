<?php

/**
 * Plugin Name: Admin styles
 * Description: Adds custom styles to the admin area.
 * Version: 0.0.4
 * Author: Daniel Lúcia
 * Author URI: http://www.daniellucia.es
 * textdomain: dl-admin-styles
  * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

/*
Copyright (C) 2025  Daniel Lucia (https://daniellucia.es)

Este programa es software libre: puedes redistribuirlo y/o modificarlo
bajo los términos de la Licencia Pública General GNU publicada por
la Free Software Foundation, ya sea la versión 2 de la Licencia,
o (a tu elección) cualquier versión posterior.

Este programa se distribuye con la esperanza de que sea útil,
pero SIN NINGUNA GARANTÍA; ni siquiera la garantía implícita de
COMERCIABILIDAD o IDONEIDAD PARA UN PROPÓSITO PARTICULAR.
Consulta la Licencia Pública General GNU para más detalles.

Deberías haber recibido una copia de la Licencia Pública General GNU
junto con este programa. En caso contrario, consulta <https://www.gnu.org/licenses/gpl-2.0.html>.
*/

use DL\AdminStyles\Plugin;

defined('ABSPATH') || exit;

require_once __DIR__ . '/vendor/autoload.php';

define('DL_ADMIN_STYLES_VERSION', '0.0.4');
define('DL_ADMIN_STYLES_FILE', __FILE__);

add_action('plugins_loaded', function () {

    load_plugin_textdomain('dl-admin-styles', false, dirname(plugin_basename(__FILE__)) . '/languages');

    $plugin = new Plugin();
    $plugin->init();
});

/**
 * Limpiamos caché al activar o desactivar el plugin
 */
register_activation_hook(__FILE__, function() {
    wp_cache_flush();
});

register_deactivation_hook(__FILE__, function() {
    wp_cache_flush();
});