<?php require APPROOT . '/views/inc/header.php'; ?>



  <div class="py-5 text-center">
    <h1>Košarica</h1>
 </div>

  <div class="row">
    <div class="col-md-5 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Tvoja košarica</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Product name</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$12</span>
          <span class="text-muted">Dodaj</span>
          <span class="text-muted">Odstrani</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Poštnina</span>
          <strong>3.85€</strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Skupaj </span>
          <strong>$20</strong>
        </li>
      </ul>
    </div>

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
          <input type="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email" name="email">
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
    <!-- Kličemo array title iz controllers/Pages  -->
<?php require APPROOT . '/views/inc/footer.php'; ?>