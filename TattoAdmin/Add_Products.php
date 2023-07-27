<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
    <title>Add Products</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    
   

    <div class="container my-5">
        <div class="row">
          <a href="stats.php">  <button class="btn btn-warning text-white "> <i class="fa-solid fa-arrow-left"></i> Back </button></a>
        </div>
        <div class="row">
            <div class="col-6" id="form">
                <h3 class="text-center" style="font-family:Times New Roman;">Add Product </h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_name">Product_name  </label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required value="">
                        
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text" class="form-control" id="description" name="description" required value="">
                    
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" required value="">  
                    </div>

                    <div class="form-group">
                        <label for="discount_price">Discount_Price</label>
                        <input type="text" class="form-control" id="discount_price" name="discount_price" required value="">  
                    </div>

                    <!-- <div class="form-group">
                        <label for="discount_price">discount_price</label>
                        <input type="text" class="form-control" id="discount_price" name="discount_price" required value="">  
                    </div> -->

                    <div class="form-group">
                        <label for="product_image">Product_image</label>
                        <input type="file" class="form-control" id="product_image" required name="product_image">
                    </div>
                    
                    
                    <!-- <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category" required maxlength="10" minlength="10" value="">
                    </div>
                     -->
                    
                    <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                    <option value="">Select a category</option>
                    <option value="traditional">Traditional Tattoo</option>
                    <option value="realism">Realism Tattoo</option>
                    <option value="watercolor">Watercolor Tattoo</option>
                    <option value="geometric">Geometric Tattoo</option>
                    <option value="tribal">Tribal Tattoo</option>
                    </select>
                    </div>

                    <button style="margin-left:196px;" type="submit" class="btn btn-warning text-white btn-lg btn-md mt-3" name="register">Add Prodcut</button>
                    <!-- <p class="text-center my-3">Already Registered <a href="login.php">Login Here</a></p> -->
                </form>
            </div>
            <div class="col-6">
                <img src="https://images.unsplash.com/photo-1564498659566-cc4eccb7d6bb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fHRhdHRvfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
    <div class="container">
        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright:
                <a class="text-dark" href="">Tatto BlazeRs.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
</body>

</html>

