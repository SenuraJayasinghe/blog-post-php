<?php

require('../config/config.php');
require('../config/db.php');


// create query
$query = 'SELECT * FROM posts ORDER BY created_at DESC';

//get results
$result = mysqli_query($conn, $query);

//fetch data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result
mysqli_free_result($result);

// close connection
mysqli_close($conn);
?>

<?php include('../include/header.php'); ?>



<div class="container">
    
    <h1 class="text-primary" id="heading">Posts</h1> <br>

    <?php foreach ($posts as $post) : ?>
        <div class="card text-white bg-warning mb-4">
            <div class="card-body">
                <h3 class="card-header"> <?php echo $post['title']; ?></h3>
                <i class="bi-alarm"></i>
                <small>Created on <?php echo $post['created_at']; ?> by
                    <?php echo $post['author']; ?></small>
                <p class="card-text"><?php echo $post['body']; ?></p>
                <a class="btn btn-secondary" href="<?php echo ROOT_URL;  ?>post.php?id=<?php echo $post['id']; ?>">Read more</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php include('../include/footer.php'); ?>