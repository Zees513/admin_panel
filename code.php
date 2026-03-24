<?php
include 'connection.php';

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];

   $query = mysqli_query($con, "SELECT Email FROM register WHERE Email = '$email' ");

   if(mysqli_num_rows($query) > 0 ){
    
      echo "<script>
         alert('Email id already exist')
         location.assign('register.php')
         </script>";

   }else{

     $insert =    mysqli_query($con, "INSERT into register(Name, Email, Password, Address)VALUES
     ('$name', '$email', '$pass','$address')");

     if($insert){
         echo "<script>
         alert('Data inserted successfully')
         location.assign('register.php')
         </script>";

        header('location: fetch.php');
     }

   }
  
}

// Role base login system  
if(isset($_POST['login'])){

    $email = $_POST['email'];
    $pass = $_POST['pass'];

        $query = mysqli_query($con, "SELECT  * from register WHERE Email = '$email' AND Password = '$pass' ");

        if(mysqli_num_rows($query) == 1){
            
           $data = mysqli_fetch_assoc($query);

           if($data['role'] == 'admin'){

            echo "<script>
                alert('welcome to admin Panel');
                location.assign('admin_panel/public.php?index')
            </script>";

           }else{
                echo "<script>
                alert('welcome to website');
                location.assign('user.php')
            </script>";
           }
        }
        else{
              echo "<script>
                alert('incorrect email id or password');
                location.assign('login.php')
            </script>";
        }
}





?>