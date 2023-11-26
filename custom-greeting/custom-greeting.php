<?php
/*
Plugin Name: Custom Greeting
Description: Replaces "Howdy" with a random greeting.
Version: 1.0
Author: Brian Dean
*/

function replace_howdy($wp_admin_bar) {
    $my_account = $wp_admin_bar->get_node('my-account');
    $newtitle = str_replace('Howdy,', '<span style="color: ' . random_color() . '; font-weight: bold;">' . random_greeting() . '</span>', $my_account->title);
    $wp_admin_bar->add_node(array(
        'id' => 'my-account',
        'title' => $newtitle,
    ));
}

function random_color() {
    // Generating a random color that is not too red
    $r = dechex(mt_rand(0, 150)); // Red component is not too high
    $g = dechex(mt_rand(0, 255));
    $b = dechex(mt_rand(0, 255));
    return "#$r$g$b";
}

function random_greeting() {
    $greetings = ['Hello', 'Greetings', 'Welcome', 'Hola', 'Bonjour', 'Ciao', 'Hallo', 'Hej'];
    return $greetings[array_rand($greetings)];
}

add_filter('admin_bar_menu', 'replace_howdy', 25);

