<?php
/* Plugin Name: Popup */


add_action('wp_head', 'remove');
function remove() {
    remove_action('popup', 'test');
}






?>