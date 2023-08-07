<div class="col-md-6 offset-md-2 my-5">
    <h2 class=" mb-3">User List</h2>

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
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($users as $user) { ?>

                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <a href="admin.php?page=useredit&id=<?= $user['id'] ?>" class="text-success">Edit</a>
                        <a href="../../controller/usercontroller.php?action=delete&id=<?= $user['id'] ?>" class="text-danger">Delete</a>

                    </td>
                </tr>
            <?php
                $no++;
            } ?>
        </tbody>
    </table>


</div>