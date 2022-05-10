<?php

require('../config/config.php');
require('../config/db.php');

//check for submit
  if(isset($_POST['submit'])){
      // get form data
      $update_id = mysqli_real_escape_string($conn,$_POST['update_id']);
      $title = mysqli_real_escape_string($conn,$_POST['title']);
      $author = mysqli_real_escape_string($conn,$_POST['author']);
      $body = mysqli_real_escape_string($conn,$_POST['body']);

$query = "UPDATE posts SET
   title='$title',
   author='$author',
   body= '$body'
         WHERE id = {$update_id}";
         
        
   



        if(mysqli_query($conn, $query)){
            header('location: '.ROOT_URL.'');
        } else {
            echo 'ERROR: '. mysqli_error($conn);
        }
  }

  //get ID
$id = mysqli_real_escape_string($conn, $_GET['id']);


// create query
$query = 'SELECT * FROM posts WHERE id = '.$id;

//get results
$result = mysqli_query($conn, $query);

//fetch data
$post = mysqli_fetch_assoc($result);

//free result
mysqli_free_result($result);

// close connection
mysqli_close($conn);

?>

<?php include('../include/header.php'); ?>



<div class="container">
    <h1 class="text-primary" id="heading"> Add Posts</h1> <br>
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    
     <div class="form-group">
         <label>Title</label>
         <input type="text" name="title" class="form-control" value="<?php echo $post['title'];?>"> 
     </div>
      
     <div class="form-group">
         <label>Author</label>
         <input type="text" name="author" class="form-control" value="<?php echo $post['author'];?>">
     </div>
      
     <div class="form-group">
         <label>Body</label>
         <textarea name="body" class="form-control"><?php echo $post['body'];?> </textarea>
     </div>
     <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
     <br>
     <input type="submit" value="submit" name="submit" class="btn btn-secondary">
  </form>
   
</div>
<?php include('../include/footer.php'); ?>