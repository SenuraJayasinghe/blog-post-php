<?php

require('../config/config.php');
require('../config/db.php');

//check for submit
if(isset($_POST['delete'])){
    // get form data
    $delete_id = mysqli_real_escape_string($conn,$_POST['delete_id']);
    
$query = " DELETE FROM posts WHERE id = {$delete_id}";
      
 



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

<body>
    <div class = "container">
    <h2 class = "text-warning" id="post-heading"> <?php echo $post['title']; ?></h2> <br>
  
        <div class="card-body">
        <small>Created on <?php echo $post['created_at']; ?> by 
        <?php echo $post['author']; ?></small>
        <p class="card-text"><?php echo $post['body']; ?></p>
        </div>
        <a href="<?php echo ROOT_URL;?>" class = "btn btn-secondary">Back</a>

        <form class="float-end" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
           <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
           <input type="submit" name="delete" value="Delete" class= "btn btn-danger">
    
        </form>
       <a href="<?php echo ROOT_URL;  ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-secondary">Edit</a>
    </div>
      
    <?php include('../include/footer.php'); ?>