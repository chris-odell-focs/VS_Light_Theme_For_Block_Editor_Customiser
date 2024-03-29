<?php

/**
 * @package FOFOBec
 */

/*
Plugin Name: Foxdell Folio BEC VS Light Theme
Plugin URI: 
Description: A theme for the Foxdell Folio Block Editor Customer inspired by the Light theme in Visual Studio Code
Version: 1.0.0
Author: Foxdell Folio
Author URI: 
License: GPLv2 or later
Text Domain: fofobecvslight
*/

function fofo_bec_vs_light_register_theme( $theme_register ) {

    $theme = $theme_register->get_new_theme();
    $theme->name = 'light_vs';
    $theme->display_name = 'VS Light';
    $theme->settings_page = 'fofo_bec_vs_light_settings_page';
    $theme->css = esc_url( plugins_url( 'style.css', __FILE__ ) );
    $theme->my_location = dirname( __FILE__ ).'/fofo-bec-vs-light-theme.php';

    $theme_register->register_theme( $theme );

}

function fofo_bec_vs_light_settings_page( $page_builder ) {
    
    $page = '<table class="form-table" style="width : 75%">
        <tbody>
            <tr> '.
                $page_builder->show_option( 'category_panel', '', '<th><label for="fofo-bec-category-panel">Category Panel</label></th><td>%s</td>', 'fofo-bec-category-panel' ).
                $page_builder->show_option( 'tag_panel', '', '<th><label for="fofo-bec-tag-panel">Tag Panel</label></th><td>%s</td>', 'fofo-bec-tag-panel' ).
            '</tr>
            <tr>'.
                $page_builder->show_option( 'featured_image_panel', '', '<th><label for="fofo-bec-featured-image-panel">Featured Image Panel</label></th><td>%s</td>', 'fofo-bec-featured-image-panel' ).
                $page_builder->show_option( 'excerpt_panel', '', '<th><label for="fofo-bec-excerpt-panel">Excerpt Panel</label></th><td>%s</td>', 'fofo-bec-excerpt-panel' ).
            '</tr>
            <tr>'.
                $page_builder->show_option( 'discussion_panel', '', '<th><label for="fofo-bec-discussion-panel">Discussion Panel</label></th><td>%s</td>', 'fofo-bec-discussion-panel' ).
                $page_builder->show_option( 'permalink_panel', '', '<th><label for="fofo-bec-permalink-panel">Permalink Panel</label></th><td>%s</td>', 'fofo-bec-permalink-panel' ).
            '</tr>
            <tr>'.
                $page_builder->show_option( 'top_toolbar', '', '<th><label for="fofo-bec-top-toolbar">Top Toolbar</label></th><td>%s</td>', 'fofo-bec-top-toolbar' ). 
                $page_builder->show_option( 'spotlight_mode', '', '<th><label for="fofo-bec-spotlight-mode">Spotlight Mode</label></th><td>%s</td>', 'fofo-bec-spotlight-mode' ).
            '</tr>
            <tr>'.
                $page_builder->show_option( 'fullscreen', '', '<th><label for="fofo-bec-fullscreen">Fullscreen</label></th><td>%s</td>', 'fofo-bec-fullscreen' ).
                $page_builder->show_option( 'edit_post_more_menu', '', '<th><label for="fofo-bec-edit-post-more-menu">\'Show more tools\' option</label></th><td>%s</td>', 'fofo-bec-edit-post-more-menu' ).
            '</tr>
        </tbody>
    </table>';

    return $page;
}

add_action('fofo_bec_register_theme',"fofo_bec_vs_light_register_theme");


/**
    Thanks to https://shellcreeper.com/how-to-create-admin-notice-on-plugin-activation/
    for the code below.
*/

/**
 * Runs only when the plugin is activated.
 * @since 1.5.0
 */
function fofo_bec_vs_light_theme_activate() {

    set_transient( 'fofo_bec_vs_light_theme_activate', true, 5 );
}

register_activation_hook( __FILE__, 'fofo_bec_vs_light_theme_activate' );


/**
 * Admin Notice on Activation.
 * @since 0.1.0
 */
function fofo_bec_vs_light_theme_admin_notice(){

    /* Check transient, if available display notice */
    if( get_transient( 'fofo_bec_vs_light_theme_activate' ) ){
        ?>
        <div class="updated notice is-dismissible">
            <p>This Plugin is an extenstion to <a hre="https://en-gb.wordpress.org/plugins/foxdell-folio-block-editor-customiser/">The Foxdell Folio Block Editor Customiser</a></p>
            <p>If the BEC is not activated as a plugin then this plugin does nothing.</p>
        </div>
        <?php
        /* Delete transient, only display this notice once. */
        delete_transient( 'fofo_bec_vs_light_theme_activate' );
    }
}


/* Add admin notice */
add_action( 'admin_notices', 'fofo_bec_vs_light_theme_admin_notice' );


