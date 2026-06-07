<?php
if(!defined('MC_VERSION'))define('MC_VERSION','2026.1.0');
function mc_enqueue_assets(){
  wp_enqueue_style('mc-style',get_stylesheet_uri(),[],MC_VERSION);
  wp_enqueue_style('mc-responsive',get_template_directory_uri().'/assets/css/responsive.css',['mc-style'],MC_VERSION);
  wp_enqueue_style('mc-fonts','https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap',[],null);
  wp_enqueue_script('mc-main',get_template_directory_uri().'/assets/js/main.js',[],MC_VERSION,true);
  wp_localize_script('mc-main','mcData',['whatsapp'=>'https://wa.me/5493517629492','nonce'=>wp_create_nonce('mc_nonce')]);
}
add_action('wp_enqueue_scripts','mc_enqueue_assets');
function mc_theme_setup(){
  add_theme_support('title-tag');add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');add_theme_support('responsive-embeds');
  add_theme_support('html5',['search-form','comment-form','gallery','caption','style','script']);
  register_nav_menus(['primary'=>__('Menu Principal','mercado-connecting'),'footer'=>__('Menu Footer','mercado-connecting')]);
}
add_action('after_setup_theme','mc_theme_setup');
function mc_widgets_init(){
  register_sidebar(['name'=>__('Footer Widget','mercado-connecting'),'id'=>'footer-widget',
    'before_widget'=>'<div id="%1$s" class="widget %2$s">','after_widget'=>'</div>',
    'before_title'=>'<h3 class="widget-title">','after_title'=>'</h3>']);
}
add_action('widgets_init','mc_widgets_init');
add_filter('show_admin_bar','__return_false');
