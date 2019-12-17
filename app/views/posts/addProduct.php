
 <?php require APPROOT . '/views/inc/header.php'; ?>

<div class="card card-body bg-light mt-5">
   <h5 class="text-center" style="font-size: 30px; "> Dodaj izdelek</h5>
   <form action="<?php echo URLROOT; ?>/posts/addProduct" method="POST">
       <div class="form-group">
           <label for="title"> Naslov: <sup>*</sup></label>
               <!-- preverimo, če ni prazen input in ima ustrezni zapis, če nima izpišemo err message, sicer okej -->
           <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ?  'is-invalid' : '';?>" value="<?php echo $data['title'] ;?>">
           <span class="invalid-feedback"> <?php echo $data['title_err']; ?></span>
       </div>
       <div class="form-group">
           <label for="price"> Cena: <sup>*</sup></label>
               <!-- preverimo, če ni prazen input in ima ustrezni zapis, če nima izpišemo err message, sicer okej -->
           <input type="number" name="price" class="form-control form-control-lg <?php echo (!empty($data['price_err'])) ?  'is-invalid' : '';?>" value="<?php echo $data['price'] ;?>">
           <span class="invalid-feedback"> <?php echo $data['price_err']; ?></span>
       </div>
     
       <div class="form-group">
           <label for="body"> Vsebina: <sup>*</sup></label>
               <!-- preverimo, če ni prazen input in ima ustrezni zapis, če nima izpišemo err message, sicer okej -->
           <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ?  'is-invalid' : '';?>"> <?php echo $data['body']; ?></textarea>
           <span class="invalid-feedback"> <?php echo $data['body_err']; ?></span>
       </div>
       <input type="submit" class="btn btn-success" value="Dodaj">
   </form>
</div>




<?php require APPROOT . '/views/inc/footer.php'; ?>
