<?php

function myRecipe_assets(){
    wp_enqueue_style('myRecipe', get_template_directory_uri() . '/css/style.css', microtime());
}

add_action('wp_enqueue_scripts', 'myRecipe_assets');