<?php
/**
 * Session Class
 */
class Session{
    public static function init(){
         session_start();
    }

    public static function set($key, $val){ // that is the set method
        $_SESSION[$key] =  $val;
        }

    public static function get($key){ // that is the get method
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }else {
            return false;
        }
    }

    public static function checkLogin(){
    self::init(); // Here i stat this session with init method
    if (self::get("adminlogin") == true) {
        header("Location:login.php"); // I just put the transfer location as login.php page
        }
    }

    public static function checkSession(){
   self::init();
   if (self::get("adminlogin") == false) {
    self::destroy(); // I added this when is will false then its will be apply selt::destroy method
    header("Location:login.php"); // Here is define its will be transfer to admin login.php page
      }
   }




   public static function destroy(){ // that is the destory method
    session_destroy();
    header("Location:login.php");
   }
}

?>
