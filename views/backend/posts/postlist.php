<div class="col-md-6 offset-md-2 my-5">
    <h2 class=" mb-3">Post List</h2>

    <?php if (isset($_SESSION['expire'])) {

        $diff = time() - $_SESSION['expire'];
        if ($diff > 2) {
            unset($_SESSION['status']);
            unset($_SESSION['expire']);
        }
    } ?>

    <?php if (isset($_SESSION['status'])) { ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['status'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($posts as $post) { ?>

                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td><?= $post['title'] ?></td>
                    <td><?= $post['description'] ?></td>
                    <td>
                        <a href="admin.php?page=postedit&id=<?= $post['id'] ?>" class="text-success">Edit</a>
                        <a href="../../controller/postcontroller.php?action=delete&id=<?= $post['id'] ?>" class="text-danger">Delete</a>

                    </td>
                </tr>
            <?php
                $no++;
            } ?>
        </tbody>
    </table>


</div>