<?php require_once "./inc/header.php"; ?>
<?php require_once "./inc/nav-bar.php"; ?>
<?php require_once "./helper/dbfunction.php"; 
$Products = getAllProductsTesting() ;
?>

<div class="container">
    <div class="row">
        <div><a href="create-product.php" class="mt-3 mb-1 btn btn-success ">Create Product</a></div>
        <div class="col">
            <?php if (isset($_SESSION['del_product'])) : ?>
                
                <div class="alert alert-danger d-flex justify-content-between" role="alert">
                    <?= $_SESSION['del_product'] ?>
        <button type="button" class="ms-5 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <?php
    unset($_SESSION['del_product']);
endif; ?>
        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">Description</th>
                <th scope="col">Img</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Supplier</th>
                <th scope="col">Action</th>
                
            </tr>
            </thead>
            <tbody>
                <?php if (empty($Products)) : ?>
                    <tr>
                        <td colspan="8">
                            <div class="alert alert-warning text-center fw-bold" role="alert">
                                No Products Found
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php $i = 1; ?>
                    <?php foreach ($Products as $product) : ?>
                    <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $product['name']?></td>
                <td><?= $product['description']?></td>
                <td><img src="img/<?php echo $product['image']; ?>"  style="height: 100px; width: 200;"
                        class="img-fluid img-thumbnail" ></td>
                <td><?= $product['category_name']?></td>
                <td><?= $product['price']?></td>
                <td><?= $product['supplier_id']?></td>
                <td> 
                        <a href="edit.php?id=" class="btn btn-success btn-sm">Edit</a>
                        
                        <form class="d-inline" action="controllers/product/deleteproductcontrollers.php" method="post">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">

                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<?php require_once "./inc/footer.php"; ?>
<?php require_once "./inc/footer.php"; ?>