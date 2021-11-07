<?php
/* 
 * Plugin name:       User-Login
 * Plugin URI:        https://github.com/federicorojas11/
 * Description:       Formularios de login y registro para Yard Sales.
 * Version:           1.0
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Author:            Federico Rojas
 * Author URI:        https://github.com/federicorojas11/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       userlogin-plugin
*/

define("PLZ_URL", plugin_dir_path(__FILE__));

//API REST
require_once PLZ_URL . "/includes/API/api-register.php";
require_once PLZ_URL . "/includes/API/api-login.php";
//shortcodes
require_once PLZ_URL . "public/shortcodes/form-register.php";
require_once PLZ_URL . "public/shortcodes/form-login.php";


function plz_plugin_activate()
{
    add_role('cliente', 'Cliente', 'read_post');
}
register_activation_hook(__FILE__, 'plz_plugin_activate');

function plz_plugin_deactivate()
{
    remove_role('cliente');
}

register_deactivation_hook(__FILE__, 'plz_plugin_deactivate');
