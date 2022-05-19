<?php
/**
* Plugin Name:       Count post words
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


add_filter('the_content','add_my_content');
function add_my_content($content) {

    global $post;

    $text_content= trim( strip_tags( $post->post_content ) );
    $word_number = substr_count( "$text_content ", ' ' );

    $searched_word = get_field('inserisci_le_parole_da_mostrare_nel_post');
    $word_counter=substr_count($post->post_content, ' '. get_field('inserisci_le_parole_da_mostrare_nel_post') . ' ');

    if(is_single()) {
        $content .=  (get_field('inserisci_le_parole_da_mostrare_nel_post')) ? '<div style="padding: 50px">' . $word_counter . '</div>' : '<div style="padding: 50px">' . $word_number . '</div>';
    }

    if(get_field('inserisci_le_parole_da_mostrare_nel_post')){
        do_action('qm/info', "E stata stampato il numero di volte che la parola $searched_word è presente nell'articolo");
    }else{
        do_action('qm/info', 'E stato stampato il numero totale di parole presenti nell\'articolo');
    }

    return $content;
}