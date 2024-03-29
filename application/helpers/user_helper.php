<?php

function login_form() {
  $obj = &get_instance();
  return array(
    $obj->input->post('username'),
    $obj->input->post('password'),
  );
}

function register_form() {
  $obj = &get_instance();
  $user = array(
    'email' => $obj->input->post('email'),
  );
  $password = $obj->input->post('password');
  if ($password) {
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);
    $user['password'] = $encrypted_password;
  }
  return $user;
}

function register_form_validate() {
  $obj = &get_instance();
  $obj->form_validation->set_rules('email', 'Email', 'required');
  $obj->form_validation->set_rules('password', 'Password', 'required');
  $obj->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
}

function profile_form() {
  $obj = &get_instance();
  $user = array(
    'email' => $obj->input->post('email'),
  );
  $password = $obj->input->post('password');
  if ($password) {
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);
    $user['password'] = $encrypted_password;
  }
  return $user;
}

function profile_form_validate() {
  $obj = &get_instance();
  $obj->form_validation->set_rules('email', 'Email', 'required');
}

function user_form() {
  $obj = &get_instance();
  return array(
    'email' => $obj->input->post('email'),
    'password' => $obj->input->post('password'),
  );
}

function user_form_validate() {
  $obj = &get_instance();
  $obj->form_validation->set_rules('email', 'Email', 'required');
  $obj->form_validation->set_rules('password', 'Password', 'required');
}
