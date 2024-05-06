<?php require_once "./inc/header.php"; ?>
<?php require_once "./inc/nav-bar.php"; ?>
<?php require_once "./helper/dbfunction.php"; 
$categories = getAllCategories();
?>


<div class="container-md">
    <div class="title-page mt-3 text-center">
        <h3>Create Categories</h3>
        <P>Lorem ipsum dolor sit amet consectetur adipisicing elit.</P>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h5>Add New Category</h5>
            <?php if (isset($_SESSION['success'])) : ?>

            <div class="alert alert-success d-flex justify-content-between" role="alert">
                <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            <?php
            unset($_SESSION['success']);
        endif;
        ?>
        <?php if (isset($_SESSION['error'])) : ?>

            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error'] ?>
            </div>

            <?php
            unset($_SESSION['error']);
            endif;
            ?>
            <form action="controllers/category/createcategorycontrollers.php" method="post" enctype="multipart/form-data" >
                <label for="inputPassword5" class="form-label">Name Category</label>
                <input type="text" class="form-control" name="name"  placeholder="Enter Name Category" required>
                <div id="passwordHelpBlock" class="form-text">
                Please make sure that the category exists before adding a new category.
                </div>
                <div class="mb-3">
                <label class="form-label">Select Category Type</label>
                        <select class="form-select" name="type" aria-label="Default select example" required>
                            <option value="Main Category">Main Category</option>
                            <option value="Sub Category">Sub Category</option>
                        </select>

                    </div>
                <div class="col-6 d-grid gap-2 mx-auto mt-3">
            <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
            </form>
        </div>
        <div class="col-md-8">
        <h5>Categories</h5>
        <?php if (isset($_SESSION['del'])) : ?>

        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['del'] ?>
        </div>

        <?php
        unset($_SESSION['del']);
        endif;
        ?>
        <div class="table-responsive">
        <table class="table table-striped table-bordered mt-3 ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Type</th>
                <th scope="col">Show Related Products</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php if (empty($categories)) : ?>
                    <tr>
                        <td colspan="5">
                            <div class="alert alert-warning text-center fw-bold" role="alert">
                                No Categories Found
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            <tr>
            <?php $i= 1; ?>
            <?php foreach ($categories as $category) : ?>
                <td scope="row" class="fw-bold"><?= $category['id'] ?></td>
                <td><?= $category['name'] ?></td>
                <td><?= $category['type'] ?></td>
                <td ><a href="product.php?category_id=<?= $category['id'] ?>" class="btn btn-warning btn-sm ">View Prodects</a></td>
                <td> 
                    <button type="button" class="btn btn-success btn-sm editbtn" data-bs-toggle="modal" data-bs-target="#editmodal">Edit</button>

                        <form class="d-inline" action="controllers/category/deletecategorycontrollers.php" method="post">
                            <input type="hidden" name="id" value="<?= $category['id'] ?>">

                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        </div>
    </div> <!-- row -->

</div> <!-- container -->

<!-- ========================> MODAL EDIT <======================== -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="#exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Category Data </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="controllers/category/updatacategorycontrollers.php" method="POST">

                    <div class="modal-body">
                        
                        <input type="hidden" name="update_id" id="update_id"value="<?= $category['id'] ?>">

                        <div class="form-group">
                            <label>Name Category</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter First Name">
                        </div>

                        <div class="form-group">
                        <label class="form-label">Select Category Type</label>                         
                            <select class="form-select" name="type" aria-label="Default select example" required>
                            <option value="Main Category">Main Category</option>
                            <option value="Sub Category">Sub Category</option>
                        </select>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updatedata"class="btn btn-primary">Update changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- ################################################################ -->

<?php require_once "./inc/footer.php"; ?>