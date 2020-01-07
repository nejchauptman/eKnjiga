<?php 

    require_once '../app/config/config.php';
    require_once '../app/libraries/Database.php';
    require_once '../app/model/Transaction.php';

    $transaction = new Transaction();

    $transactions = $transaction->getTransactionById($_SESSION['user_id']);
?>

<?php require APPROOT . '/views/inc/header.php';?>
  <div class="container mt-4">
    
    <hr>
    <h2>Moja naročila</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Transakcija ID</th>
          <th>Uporabnik ID</th>
          <th>Ime</th>
          <th>Priimek</th>
          <th>Produkt</th>
          <th>Cena</th>
          <th>Datum</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($transactions as $t): ?>
          <tr>
            <td><?php echo $t->id; ?></td>
            <td><?php echo $t->user_id; ?></td>
            <td><?php echo $t->user_name; ?></td>
            <td><?php echo $t->user_lastname; ?></td>
            <td><?php echo $t->product; ?></td>
            <td><?php echo sprintf('%.2f', $t->amount / 100); ?> <?php echo strtoupper($t->currency); ?></td>
            <td><?php echo $t->created_at; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <br>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>
