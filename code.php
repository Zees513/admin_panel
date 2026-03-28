<?php
session_start();
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

           $_SESSION['admin_id'] = $data['id'];
           $_SESSION['admin_name'] = $data['name'];


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

<?php
include 'connection.php';

// INSERT CATEGORY
if(isset($_POST['category-btn'])){

    $name = $_POST['name'];

    $image = $_FILES['images']['name'];
    $tmp_name = $_FILES['images']['tmp_name'];

    $folder = "images/".$image;

    move_uploaded_file($tmp_name, $folder);

    $query = "INSERT INTO add_category (cat_name, cat_images) VALUES ('$name','$folder')";
    mysqli_query($con, $query);
}

// DELETE CATEGORY
if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $delete = "DELETE FROM add_category WHERE cat_id = '$id'";
    mysqli_query($con, $delete);
}
?>

}

?>