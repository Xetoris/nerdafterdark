<?php

class User extends Eloquent{
    #Properties
    protected $table = 'users';

  // Find Methods
  public static function findUserByName($username)
  {
    $match = User::find(strtolower($username), ['user_name']);
    return $match;
  }

  public static function findUserByEmail($email)
  {
    $match = User::find(strtolower($email), ['email']);

    return $match == null;
  }

  //Shortcutt Methods

    public static function checkUserNameUnique($username)
    {
      return $this->findUserByName($username) == null;
    }

    public static function checkEmailUnique($email)
    {
      return $this->findUserByEmail($email) == null;
    }

    public static function authenticate($username, $password)
    {
      $user = $this->findUserByName($username);

      if($user != null)
      {
        if(password_verify($password, $this->password_hash))
        {
          return true;
        }
      }

      return false;
    }

    public function hashPassword($password)
    {
      return password_hash($password, PASSWORD_DEFAULT);
    }
}
