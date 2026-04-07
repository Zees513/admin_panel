<?php include "../connection.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Category Form</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    font-family: Arial;
    background: #f4f4f4;
}

.form-container {
    background: white;
    padding: 25px;
    border-radius: 10px;
    width: 500px;
    margin: 30px auto;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
</style>

</head>
<body>

<div class="form-container">
    <h3 class="text-center">Add product</h3>

    <!-- FIX: correct action path -->
    <form action="../code.php" method="post" enctype="multipart/form-data">

    <label class="mt-2">name</label>
        <input type="text" name="p_name" class="form-control" placeholder="Enter product name" required>

        <label class="mt-2">description</label>
        <input type="text" name="pro_descript" class="form-control" placeholder="Enter product description" required>

        <label class="mt-2">price</label>
        <input type="text" name="p_price" class="form-control" placeholder="Enter product price" required>

        <label class="mt-2">quantity</label>
        <input type="text" name="p_quantity" class="form-control" placeholder="Enter product quantity" required>


<label class="mt-2">Select Category</label>
        <select name="p_category" id="">
            <?php
            $work = mysqli_query($con , "SELECT * FROM ADD_CATEGORY");
            foreach($work as $cat){
                ?>
                <option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat["cat_name"] ?></option>



                <?php
            }
            
            ?>
        </select>


        <label>Upload Image</label>
        <input type="file" name="pro_images" class="form-control" required>


        <button type="submit" name="product-btn" class="btn btn-success mt-3 w-100">
            Add product
        </button>
    </form>
</div>

<div class="container mt-4">
    <h3 class="text-center">Data</h3>

    <table class="table table-bordered table-hover text-center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        <?php
        // FIX: check query error
        $query = mysqli_query($con , "SELECT * FROM add_category") or die(mysqli_error($con));

        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td><?php echo $row['cat_id']; ?></td>
            <td><?php echo $row['cat_name']; ?></td>
            <td>
                <!-- FIX: correct image path -->
                <img src="../<?php echo $row['cat_images']; ?>" height="60">
            </td>
            <td>
                <!-- DELETE BUTTON -->
                <form action="../code.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['cat_id']; ?>">
                    <button class="btn btn-danger btn-sm" name="delete" mt-5>Delete</button>
                    <button class="btn btn-success btn-sm" name="edit" mt-5>edit</button>
                </form>
            </td>
        </tr>
        <?php 
            }
        } else {
            echo "<tr><td colspan='4'>No Data Found</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
