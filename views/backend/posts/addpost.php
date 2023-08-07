   <div class="col-md-6 offset-md-2">
       <h2 class="mt-5">Add New Post</h2>
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
       <form class="mt-3" action="../../controller/postcontroller.php" method="POST" enctype="multipart/form-data">

           <div class="form-group">

               <label for="title">Title</label>
               <input type="text" class="form-control " id="title" aria-describedby="emailHelp" placeholder="Enter Your Name " name="title">
               <?php if (isset($_SESSION["title"])) { ?>

                   <p class="text-danger">
                       <?php echo $_SESSION['title'] ?>
                   </p>
               <?php

                }
                ?>
           </div>

           <div class="form-group">
               <label for="description">Description</label>
               <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
               <?php if (isset($_SESSION['description'])) { ?>
                   <p class="text-danger">
                       <?= $_SESSION['description'] ?>
                   </p>
               <?php
                }
                ?>
           </div>
           <div class="form-group">
               <label for="image">Images</label>
               <input type="file" class="form-control" name="image">
               <?php if (isset($_SESSION['image'])) { ?>
                   <p class="text-danger">
                       <?= $_SESSION['image'] ?>
                   </p>
               <?php
                }
                ?>
           </div>
           <input type="hidden" name="action" value="add">
           <div class="form-bottom">

               <button type="submit" class="btn btn-primary">Save</button>


           </div>
       </form>
   </div>
   </div>
   </div>
   </div>