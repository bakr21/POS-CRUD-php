<?php require_once "./inc/header.php"; ?>
<?php require_once "./inc/nav-bar.php"; ?>
<?php require_once "./helper/dbfunction.php"; ?>



<div class="container">
    <div class="title-page mt-3 text-center">
        <h3>Create Product</h3>
        <P>Lorem ipsum dolor sit amet consectetur adipisicing elit.</P>
    </div>
    <?php if (isset($_SESSION['success_product'])) : ?>

    <div class="alert alert-success d-flex justify-content-between" role="alert">
        <?= $_SESSION['success_product'] ?>
        <button type="button" class="ms-5 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
unset($_SESSION['success_product']);
endif; ?>
    <form class="row g-3" action="controllers/product/createproductcontrollers.php" method="post" enctype="multipart/form-data" >
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputEmail4" name="name" placeholder="Enter Name Product">
        </div>
        <div class="col-md-4">
            <label for="inputCategory4" class="form-label">Category</label>
            <select id="inputState" class="form-select" name="category">
                <?php foreach(getAllCategories() as $category): ?>
                <option  value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="FormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="description"
                placeholder="Enter Description"></textarea>
        </div>
        <div class="col-md-3">
            <label for="inputZip" class="form-label">Price</label>
            <input type="text" class="form-control" id="inputZip" name="price">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Image</label>
            <input type="file" class="form-control" id="formFile" name="file">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Supplier</label>
            <a class="btn btn-secondary ms-3 btn-sm text-white p-1" href="dashboard.php">Search | Add</a>
            <select id="inputState" class="form-select" name="supplier">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-6 d-grid gap-2 mx-auto">
            <button type="submit" class="btn btn-primary">Save product</button>
        </div>
    </form>
</div>
<?php require_once "./inc/footer.php"; ?>