<?php

/*
Plugin Name: WP Simple Shortcode
Description: Simple shortcode that show the date and time updating every second 
Version: 1.0
Requires at least: 6.8.2
Author: Dreidgon
Licence: GPL v2 or later
Licence URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Text Domain: wp-simple-shortcode
Domain Path: /languages
*/


if ( ! defined('ABSPATH')){
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

function wp_simple_shortcode( $atts = array(), $content = null, $tag = '' ){

     
    ob_start();

    ?>
    <div class="wp_simple_shortcode-display">
        Today is <span id="wp-current-time"><?php echo date("d-m-Y h:i:s A"); ?></span>
    </div>
    <script>
        (function(){
            function updateTime() {
                const now = new Date();  // gets current date & time
                const options = { 
                    day: "2-digit", month: "2-digit", year: "numeric", 
                    hour: "2-digit", minute: "2-digit", second: "2-digit", hour12: true 
                };
                document.getElementById("wp-current-time").textContent = 
                    new Intl.DateTimeFormat("en-GB", options).format(now);
            }
            setInterval(updateTime, 1000); // update every second
            updateTime(); // run immediately
        })();
    </script>
    <?php
   
    return ob_get_clean();

}



add_shortcode('wp-simple-shortcode', 'wp_simple_shortcode');