<?php
class ErrorBlock {
  private $message;
  public function __construct($message) {
    $this->message = $message;
  }

  public function showErrorMessage() {
    echo "
      <div class='d-flex justify-content-center p-2'>
        <div class='alert alert-danger w-25 position-absolute' role='alert'>
          $this->message
        </div>
      </div>
    ";
  }
}