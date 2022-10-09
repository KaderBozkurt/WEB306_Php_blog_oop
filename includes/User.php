<?php
class User{
    private $id;
    private $username;
    private $password;
  /*
   * Attempt user login. if success, return a user object.
   * @param $username
   * @param$password
   * $return bool\User

   */
    public static function auth($username, $password){

        global $dbc;

        $sql = "SELECT * FROM `logins` WHERE username = :username LIMIT 1;";
        $bindVal = ['username'=> $username];
        $userRecord = $dbc->fetchArray($sql, $bindVal);

        if($userRecord){
            $userRecord = array_shift($userRecord);

            if(password_verify($password, $userRecord['password'])){

                return new self ($userRecord['id'],$userRecord['username'], $userRecord['password']);
            }
        }
        return false;
    }

    public function __construct($id, $username, $password){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

}


?>