<?php
/**
 * Plugin Name:       add favicon
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Sebastian Hornoi
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       perf-count-word
 * Domain Path:       /languages
 */

defined('ABSPATH') || exit;


add_action('wp_head', 'perf_add_favicon');
function perf_add_favicon() { ?>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/assets/images/2020-square-1.png" >
<?php }
