<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="col-md-7 order-md-1">
        <h4 class="mb-3">Podatki za plačilo</h4>
        <form class="needs-validation" action="<?php echo URLROOT; ?>/pages/charge" method="POST" id="payment-form" novalidate="">
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName">Ime</label>
                <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Ime" name="first_name" >
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName">Priimek</label>
                <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Priimek" name="last_name" >
            </div>
            </div>
            <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email" name="email" >
            </div>

            <div class="mb-3">
            <label for="address">Naslov</label>
            <input type="text" class="form-control form-control mb-3 StripeElement StripeElement--empty" id="address" name="place" placeholder="Koroška ulica 1" required="">
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="state">Mesto</label>
                <input type="text" class="form-control form-control mb-3 StripeElement StripeElement--empty" id="city" name="city" placeholder="Maribor" required="">
            </div>
            <div class="col-md-6 mb-3">
                <label for="zip">Poštna številka</label>
                <input type="text" class="form-control form-control mb-3 StripeElement StripeElement--empty" id="zip" name="zip" placeholder="" required="">
            </div>
            </div>

            <div class="row">
            <div class="col-md-12 mb-3">
                <div id="card-element" class="form-control">
                        <!-- A Stripe Element will be inserted here. -->
                </div>
            </div>
            </div>
            <div id="card-errors" role="alert"></div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Plačaj</button>
        </form>
        </div>
    </div>
</div>

    

      <script src="https://js.stripe.com/v3/"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="<?php echo URLROOT; ?>/js/charge.js"></script>
      <?php require APPROOT . '/views/inc/footer.php'; ?>