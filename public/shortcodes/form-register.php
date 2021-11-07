<?php

function plz_script_register()
{
    wp_register_script("plz-register", plugins_url('../assets/js/register.js', __FILE__));
    wp_enqueue_script("plz-register");
}
add_action('wp_enqueue_scripts', 'plz_script_register');



function plz_add_register_form()
{
    plz_script_register();

    $response = '
    <div class="signin">
    <div class="signin__container">
             <h1 class="sigin__titulo">Register</h1>
                <form class="signin__form" id="signup">
                        <div class="signin__name name--campo">
                            <label for="Name">Name</label>
                            <input name="name" type="text" id="Name">
                        </div> 
                        <div class="signin__email name--campo">
                            <label for="email">Email</label>
                            <input name="email" type="email" id="email">
                        </div>
                        <div class="signin__pass name--campo">
                            <label for="password">Password</label>
                            <input name="password" type="password" id="password">
                        </div>
                        <div class="signin__submit">
                            <input type="submit" value="Create">
                        </div> 
                        </form>
                        <div class="msg"></div>

     </div> 
     </div>
    ';

    return $response;
}


add_shortcode("plz_register", "plz_add_register_form");
