<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="container ">
    <div class="row mt-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">IME PRODUKTA</th>
                    <th scope="col">CENA</th>
                    <th scope="col">OPIS</th>
                    <th scope="col">IZBRIŠI</th>
                </tr>
            </thead>
            <?php foreach($data['products'] as $product) : ?>
            <tbody>
                <tr>
                    <td><?php echo $product->productId; ?></td>
                        <td><?php echo $product->title; ?></td>
                        <td><p class="text-truncate" ><?php echo $product->price; ?></p></td>
                        <td><?php echo $product->body; ?></td>
                        <td><a href="<?php echo URLROOT; ?>/products/deleteProduct/<?php echo $product->productId; ?>" class="btn btn-danger"> Izbriši </a</td>
                    </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>