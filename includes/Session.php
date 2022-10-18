<?php

/**
 *
 */
class Session{


    /*
     * Session constructor.
     */

    private $user;
    public function __construct(){
        //session_start();
        if (isset($_SESSION['user'])){
            $this->user = $_SESSION['user'];
        }

    }

    /*
     * Returns the status of the current session
     * $return bool\User
     */
    /**
     * @return false|mixed
     */
    public function isLoggedIn(){
     if($this->user){
         return $this->user;
     }else{
         return false;
     }
}

    /**
     * @return mixed
     */
    public function getUser(){
        return $this->user;

}
/*
 * Registers a logged in user object
 * @param $userObj
 */
    /**
     * @param $userObj
     * @return void
     */
    public function login($userObj){
$this->user = $userObj;
$_SESSION['user'] = $userObj;
 }

    /**
     * @return void
     */
    public function logout(){

}
}
$session = new Session();

?>