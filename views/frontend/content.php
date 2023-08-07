<!-- content -->
<div class="container " id="post">

    <div class="row">
        <?php foreach ($posts as $post) { ?>


            <div class="col-md-4 my-4">
                <div class="card" style="width: 18rem;">
                    <img src="./assets/posts/<?= $post['image'] ?>" class=" card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $post['title'] ?></h5>
                        <p class="card-text"><?= substr($post['description'], 0, 100) ?></p>
                        <a href="index.php?page=detail&id=<?= $post['id'] ?>" class="btn btn-primary">View More</a>
                    </div>
                </div>
            </div>
        <?php
        } ?>
    </div>