<?php

class User_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function find_all() {
    return $this->db->get('users')->result();
  }

  function read($id) {
    return $this->db->get_where('users', array('id' => $id))->row();
  }

  function read_by_username_and_password($username, $password) {
    $this->db->group_start();
    $this->db->where('username', $username);
    $this->db->or_where('email', $username);
    $this->db->group_end();
    $user = $this->db->get('users')->row();
    if ($user && password_verify($password, $user->password)) {
      return $user;
    }
    return null;
  }

  function save($user) {
    $this->db->insert('users', $user);
  }

  function update($user, $id) {
    $this->db->update('users', $user, array('id' => $id));
  }

  function delete($id) {
    $this->db->delete('users', array('id' => $id));
  }

}
