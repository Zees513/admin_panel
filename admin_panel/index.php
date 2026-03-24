<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>

        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto">
                    <h3 class='text-center mt-3'>User's data</h3>
                    <table class="table table-bordered table-hover table-striped">

                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Adress</th>
                            <th>Role</th>
                            <th colspan='2' class='text-center'>Action</th>

                        </tr>

                        <?php
                        include '../connection.php';

                        $query = mysqli_query($con , "SELECT * from register");
                        // echo $query; 

                        foreach($query as $value){
                            ?>
                            <tr>
                                <td><?php echo $value['id'];?></td>
                                <td><?php echo $value['Name'];?></td>
                                <td><?php echo $value['Email'];?></td>
                                <td><?php echo $value['Password'];?></td>
                                <td><?php echo $value['Address'];?></td>
                                <td><?php echo $value['role'];?></td>
                                <td><!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $value['id'];?>">
  Edit
</button>
</td>

  <!-- Button trigger modal -->
<td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $value['id'];?>">
  delete
</button>
</td>

    <!-- update modal  start-->
     <!-- Modal -->
<div class="modal fade" id="edit<?php echo $value['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <form action="code.php" method="post">
            
             <input type="hidden" placeholder="Enter your name" class="form-control mt-3" name="id" value='<?php echo $value['id'];?>'>

                    <input type="text" placeholder="Enter your name" class="form-control mt-3" name="name" value='<?php echo $value['Name'];?>'>

                    <input type="email" placeholder="Enter your email" class="form-control mt-3" name="email"  value='<?php echo $value['Email'];?>'>

                    <input type="text" placeholder="Enter your password" class="form-control mt-3" name="pass"  value='<?php echo $value['Password'];?>'>

                    <input type="text" placeholder="Enter your address" class="form-control mt-3" name="address"  value='<?php echo $value['Address'];?>'>

                    <input type="text" placeholder="Enter your role" class="form-control mt-3" name="role" value='<?php echo $value['role'];?>'>

    
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name='update'>Update</button>

            </form>

      </div>
    </div>
  </div>
</div>
    <!-- update modal  end-->

    <!-- delete modal start -->
     <!-- Modal -->
<div class="modal fade" id="delete<?php echo $value['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        Do you really want to delete this data?
        <form action="code.php" method='post'>
          <input type="hidden" class='form-control' value='<?php echo $value['id'] ?>' name='id'>
      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name='delete' class="btn btn-danger">Delete</button>
          </form>
      </div>
    </div>
  </div>
</div>
    <!-- delete modal end -->

                            </tr>
                            
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>


         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>