
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
    width: 350px;
    margin: 30px auto;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
</style>

</head>
<body>

<div class="form-container">
    <h3 class="text-center">Add Category</h3>

    <form method="post" enctype="multipart/form-data">
        <label>Upload Image</label>
        <input type="file" name="images" class="form-control">

        <label class="mt-2">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter name">

        <button type="submit" name="category-btn" class="btn btn-success mt-3 w-100">
            Add Category
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
        $query = mysqli_query($con , "SELECT * FROM add_category");

        while($row = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td><?php echo $row['cat_id']; ?></td>
            <td><?php echo $row['cat_name']; ?></td>
            <td>
                <img src="<?php echo $row['cat_images']; ?>" height="60">
            </td>
            <td>
                <!-- DELETE BUTTON -->
                <form method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['cat_id']; ?>">
                    <button class="btn btn-danger btn-sm" name="delete">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>