<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1 class='text-center mt-3'>Login form</h1>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
         <h6> Create an account? <a href="register.php">Register here</a></h6>
                <form action="code.php" method="post">
                    
                    <input type="email" placeholder="Enter your email" class="form-control mt-3" name="email"  required>
                    <input type="password" placeholder="Enter your password" class="form-control mt-3" name="pass"  required>
                   

                    <button type='submit' class="btn btn-dark mt-3" name='login'>Login</button>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>