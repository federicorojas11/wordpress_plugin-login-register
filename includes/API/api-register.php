<?php

function plz_api_register()
{

    register_rest_route(
        "plz",
        "register",
        array(
            'methods' => 'POST',
            'callback' => 'plz_register_callback'
        )
    );
}

function plz_register_callback($request)
{
    $is_user_exist = get_user_by("login", $request["name"]);
    $is_email_exist = get_user_by("email", $request["email"]);

    if ($is_user_exist) {
        return array('msg' => "Ese usuario ya existe");
    } elseif ($is_email_exist) {
        return array('msg' => "Ya existe un usuario con ese email");
    }

    $args = array(
        "user_login" => $request['name'],
        "user_pass" => $request['password'],
        "user_email" => $request['email'],
        "role" => "cliente"
    );

    $user = wp_insert_user($args);

    return array('msg' => 'Usuario registrado', $user);
}
add_action("rest_api_init", "plz_api_register");
