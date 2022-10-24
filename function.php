<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "projekgame") or die;

    // if
    if(isset($_POST["action"])){
        if($_POST["action"] == "register"){
          register();
        }
        else if($_POST["action"] == "login"){
          login();
        }
    }

    //BUAT REGISTER

    function register(){
        global $conn;
      
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $id = rand(10000,99999);
        $date = date('Y/m/d H:i:s');
      
        if(empty($fullname) && empty($username) && empty($password)){
          echo "Please Fill Out The Form!";
          exit;
        }

        if(empty($fullname) || empty($username) || empty($password)){
          echo "Please Fill Out The Form!";
          exit;
        }
      
        $user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        if(mysqli_num_rows($user) > 0){
          echo "Username Has Already Taken";
          exit;
        }
      
        $query = "INSERT INTO user VALUES('$id','$fullname', '$username', '$password', '$date')";
        mysqli_query($conn, $query);
        echo "Registration Successful";
        $_SESSION['register'] = true;
    }

    //LOGIN

    function login(){
        global $conn;
      
        $username = $_POST["username"];
        $password = $_POST["password"];
      
        $user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
      
        if(mysqli_num_rows($user) > 0){
      
          $row = mysqli_fetch_assoc($user);
      
          if($password == $row['password']){
            echo "Login Successful";
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
          }
          else{
            echo "Wrong Password";
            exit;
          }
        }
        else{
          echo "User Not Registered";
          exit;
        }
      }
      
?>