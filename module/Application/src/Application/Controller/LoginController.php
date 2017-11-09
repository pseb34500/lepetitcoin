<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController
{
    public function indexAction()
    {

      session_start();
       try{
       $con = new \PDO ("mysql:host=localhost;dbname=login","root","root");
      if(isset($_POST['signup'])){
       $name = $_POST['name'];
       $email = $_POST['email'];
       $pass = $_POST['pass'];
       $date = $_POST['date'];
       $month = $_POST['month'];
       $year = $_POST['year'];

       $insert = $con->prepare("INSERT INTO users (name,email,pass,date,month,year)
       values(:name,:email,:pass,:date,:month,:year) ");
      $insert->bindParam(':name',$name);
      $insert->bindParam(':email',$email);
      $insert->bindParam(':pass',$pass);
      $insert->bindParam(':date',$date);
      $insert->bindParam(':month',$month);
      $insert->bindParam(':year',$year);
      $insert->execute();
      }elseif(isset($_POST['signin'])){
       $email = $_POST['email'];
       $pass = $_POST['pass'];

       $select = $con->prepare("SELECT * FROM users WHERE email='$email' and pass='$pass'");
       $select->setFetchMode(\PDO::FETCH_ASSOC);
       $select->execute();
       $data=$select->fetch();
       if($data['email']!=$email and $data['pass']!=$pass)
       {
        echo "invalid email or pass";
       }
       elseif($data['email']==$email and $data['pass']==$pass)
       {
       $_SESSION['email']=$data['email'];
          $_SESSION['name']=$data['name'];
  header("location:index");
       }
       }
      }
      catch(\PDOException $e)
      {
      echo "error".$e->getMessage();
      }


        return new ViewModel();
    }


    public function profileAction()
    {
      session_start();
      if(empty($_SESSION['email']))
      {
       header("location:index");
      }


        return new ViewModel();
    }


    




    // public function logoutAction()
    // {
    //   session_start();
    //   // session_destroy();
    //   header("location:profile");
    //   echo $username;
    //
    //   return new ViewModel();
    //
    // }
    //
    //
    //
    //
    // public function loginAction()
    // {
    //   session_start();
    //
    //   echo "Bonjour" . $_SESSION['username'];
    //
    //   if (isset($_POST['logout'])){
    //     session_start();
    //     session_destroy();
    //     header('location: index');
    //   }
    //     return new ViewModel();
    // }


}
