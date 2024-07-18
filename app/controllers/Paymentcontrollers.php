<?php
require_once 'D:\Xampp\htdocs\SE\app\models\Bill.php';
require_once 'D:\Xampp\htdocs\SE\app\models\Transaction.php';
class Paymentcontrollers {
  public static function showBill($senderIPA) {
    $billObj = new Bill("", 0, 0);
    $bills = $billObj->getBills($senderIPA);
    if ($bills) {
      foreach ($bills as $bill) {
        $oneMonthAgo = date('Y-m-d', strtotime('-1 month'));
        $date = $bill['date'];
				if ($date <= $oneMonthAgo) {
          ?>
          <div class="container d-flex justify-content-around align-items-center h-100">
            <div class="d-flex justify-content-around align-items-center w-25">
              <div class="font-weight-bold" style="font-size: 20px"><?php echo $bill['facility_name'] ?></div>
              <div><?php echo $bill['amount'] ?></div>
            </div>
            <form method="post">
              <button class="btn btn-primary" name="delete_button">Delete</button>
              <button class="btn btn-primary" name="pay_button">Pay</button>
            </form>
          </div>
          <hr class="w-75"/>
          <?php
          if (isset($_POST['pay_button'])) {
            Paymentcontrollers::payBill($senderIPA, $bill['facility_name'], $bill['amount'], 1);
          }
          if (isset($_POST['delete_button'])) {
            $billObj->deleteBill($bill['id']);
          }
				}
      }
    } else {
      echo "No bills found";
    }
  }
  public static function payBill($senderIPA, $facilityName, $amount, $monthly) {
    $payment = new Transaction($amount, 0, $senderIPA);
    if($payment->makePayment($facilityName) && $monthly) {
      $bill = new Bill($facilityName, $senderIPA, $amount);
      $bill->addBill(date('Y-m-d'));
    }
  }
  public static function makeDonation($senderIPA, $facilityName, $amount) {
    $donation = new Transaction($amount, 1, $senderIPA);
    $donation->makePayment($facilityName);
  }
}