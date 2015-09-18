<?php
/**
 * Plugin Name: MBInfo Frontend Editor
 * Plugin URI: http://example.com/wordpress-plugins/my-plugin
 * Description: Allow to edit in front end.
 * Version: 0.1
 * Author: Kyaw Tun
 * Author URI: http://mbinfo.mbi.nus.edu.sg
 * License: MIT
 */


register_activation_hook(__FILE__, 'mbinfo_frontend_install');
add_action( 'wp_enqueue_scripts', 'mbinfo_frontend_enqueue_scripts' );
add_filter('the_content', 'mbinfo_frontend_content_filter');


function mbinfo_frontend_install() {

}

function mbinfo_frontend_enqueue_scripts() {
    $css_url = plugins_url('css/frontend.css', __FILE__ );
    $js_url = plugins_url('js/frontend.js', __FILE__ );
    wp_enqueue_style('mbinfo-figure-frontend-css', $css_url, false, '1.0.0', 'screen');
    wp_enqueue_style('mbinfo-figure-frontend-js', $js_url, false, '1.0.0', 'screen');
}

function mbinfo_frontend_content_filter($content) {
    if( is_singular() && is_main_query() ) {
        $slug = '<div class="mbi-edit">[<a href="#edit">Edit</a>]</div>';
        $from = ['</h1>', '</h2>', '</h3>', '</h4>'];
        $to = [];
        foreach ($from as $f) {
            array_push($to, $slug . $f);
        }
        $content = str_replace($from, $to, $content);
    }
    return $content;
}

