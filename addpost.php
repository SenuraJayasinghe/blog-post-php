<?php

require('../config/config.php');
require('../config/db.php');

//check for submit
  if(isset($_POST['submit'])){
      // get form data

      $title = mysqli_real_escape_string($conn,$_POST['title']);
      $author = mysqli_real_escape_string($conn,$_POST['author']);
      $body = mysqli_real_escape_string($conn,$_POST['body']);


      $query = "INSERT INTO posts (title, body, author) VALUES('$title', '$body', '$author')";

        if(mysqli_query($conn, $query)){
            header('location: '.ROOT_URL.'');
        } else {
            echo 'ERROR: '. mysqli_error($conn);
        }
  }

?>

<?php include('../include/header.php'); ?>



<div class="container">
    <h1 class="text-primary" id="heading"> Add Posts <i class="bi bi-pencil-fill"></i></h1>
     <br>
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    
     <div class="form-group">
         <label>Title</label>
         <input type="text" name="title" class="form-control">
     </div>
      
     <div class="form-group">
         <label>Author</label>
         <input type="text" name="author" class="form-control">
     </div>
      
     <div class="form-group">
         <label>Body</label>
         <textarea name="body" class="form-control"> </textarea>
     </div>
     <br>
     <input type="submit" value="submit" name="submit" class="btn btn-secondary">
  </form>
   
</div>
<?php include('../include/footer.php'); ?>