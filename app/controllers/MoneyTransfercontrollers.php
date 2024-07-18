<?php
require_once 'D:\Xampp\htdocs\SE\app\models\Transaction.php';
require_once 'D:\Xampp\htdocs\SE\app\models\Request.php';

class MoneyTransfercontrollers {
  public static function transfer($senderIPA, $receiverIPA, $amount) {
    $transaction = new Transaction($amount, $receiverIPA, $senderIPA);
    $transaction->makeTransaction();
  }
  public static function request($senderIPA, $receiverIPA, $amount) {
    $request = new Request($amount, $senderIPA, $receiverIPA);
    $request->addRequest();
  }
  public static function showRequest($IPA) {
    $req = new Request(0, 0, 0);
    $requests = $req->getRequests($IPA);
    if ($requests) {
      foreach ($requests as $request) {
        ?>
        <div class="container d-flex justify-content-around align-items-center h-100">
						<div class="d-flex flex-column  align-items-start" style="flex-basis: 100px">
							<div class="font-weight-bold" style="font-size: 20px"><?php echo $request['sender_ipa']?></div>
						</div>
						<div><?php echo $request['amount']?></div>
            <form method="post" class="d-flex justify-content-around align-items-end h-100" style="flex-basis: 150px">
                <button class="btn btn-primary" name="reject_button">reject</button>
                <button class="btn btn-primary" name="accept_button">accept</button>
            </form>
				</div>
				<hr class="w-75"/>
        <?php
        if (isset($_POST['accept_button'])) {
          $requestObj = new Request($request['amount'], $request['sender_ipa'], $request['receiver_ipa']);
          $requestObj->deleteRequest();
          $transaction = new Transaction($request['amount'], $request['sender_ipa'], $request['receiver_ipa']);
          $transaction->makeTransaction();
        }
        if (isset($_POST['reject_button'])) {
          $requestObj = new Request($request['amount'], $request['sender_ipa'], $request['receiver_ipa']);
          $requestObj->deleteRequest();
        }
      }
    } else {
      echo "No requests found";
    }
  }
  public static function showTransactions($IPA){
    $transactions = (new Transaction(0, 0, 0))->getTransactions($IPA);
    if ($transactions) {
      foreach ($transactions as $transaction) {
        ?>
        <div class="container p-3 d-flex justify-content-between align-items-center h-100">
							<div class="font-weight-bold" style="font-size: 20px"><?php echo $transaction['sender_ipa']?></div>
              <?php if ($transaction['receiver'] == 0) { ?>
                <div class="font-weight-bold" style="font-size: 20px">Bill: to <?php echo $transaction['name'] ?></div>
                <?php } else if($transaction['receiver'] == 1) { ?>
                  <div class="font-weight-bold" style="font-size: 20px">Donation: to <?php echo $transaction['name'] ?></div>
                  <?php } else { ?>
                    <div class="font-weight-bold" style="font-size: 20px"><?php echo $transaction['receiver']?></div>
                  <?php } ?>
              <div class="font-weight-bold" style="font-size: 20px"><?php echo $transaction['amount']?></div>
              <div class="font-weight-bold" style="font-size: 20px"><?php echo $transaction['date']?></div>
				</div>
				<hr class="w-75"/>
        <?php
      }
    } else {
      echo "No transactions found";
    }
  }
  public static function ShowStatement($IPA) {
    $transactions = (new Transaction(0, 0, 0))->getTransactions($IPA);
    if ($transactions) {
      $oneMonthAgo = date('Y-m-d', strtotime('-1 month'));
      $result = [];
      foreach ($transactions as $transaction) {
        if ($transaction['date'] >= $oneMonthAgo) {
          array_push($result, $transaction);
        }
      }
      foreach ($result as $transaction) {
        ?>
        <div class="container p-3 d-flex justify-content-between align-items-center h-100">
							<div class="font-weight-bold" style="font-size: 20px"><?php echo $transaction['sender_ipa']?></div>
              <?php if ($transaction['receiver'] == 0) { ?>
                <div class="font-weight-bold" style="font-size: 20px">Bill: to <?php echo $transaction['name'] ?></div>
                <?php } else if($transaction['receiver'] == 1) { ?>
                  <div class="font-weight-bold" style="font-size: 20px">Donation: to <?php echo $transaction['name'] ?></div>
                  <?php } else { ?>
                    <div class="font-weight-bold" style="font-size: 20px"><?php echo $transaction['receiver']?></div>
                  <?php } ?>
              <div class="font-weight-bold" style="font-size: 20px"><?php echo $transaction['amount']?></div>
              <div class="font-weight-bold" style="font-size: 20px"><?php echo $transaction['date']?></div>
				</div>
				<hr class="w-75"/>
        <?php
      }
    } else {
      echo "No transactions found";
    }
  }
}