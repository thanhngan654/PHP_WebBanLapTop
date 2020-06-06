<?php
/**
*Session Class co chuc nang luu phien giao dich moi lan refesh trang van luu ko lam moi trang
**/
class Session{
  /*tao session ban dau*/
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }

 public static function set($key, $val){
    $_SESSION[$key] = $val;
 }
/*set key thanh gia tri*/
 public static function get($key){
    if (isset($_SESSION[$key])) {
     return $_SESSION[$key];
    } else {
     return false;
    }
 }
/*kiemtra session co ton tai koo*/
 public static function checkSession(){
    self::init();
    if (self::get("adminlogin")== false) {
     self::destroy();
     header("Location:login.php");
    }
 }
/*kiemtra session co ton tai koo*/ 
 public static function checkLogin(){
    self::init();
    if (self::get("login")== true) {
     header("Location:index.php");
    }
 }
/*huy phien lam viec*/
 public static function destroy(){
  session_destroy();
  header("Location:login.php");
 }
}
?>
