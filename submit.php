
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/grid/">

    <title>Project</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <form method="post" action ="thankyou.php">
      <?php if($_GET['payment_method'] == 'cash'): ?>
        <div class="page-header">
          <h1>Cash</h1>
        </div>
        <br />

          <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">Amount</label>
            <div class="input-group">
              <div class="input-group-addon">Rs.</div>
              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" name="amount" required>
            </div>
          </div>
          <br /><br /><br />
      <?php elseif($_GET['payment_method'] == 'card'): ?>
        <div class="page-header">
          <h1>Card Payment</h1>
        </div>
        <br />
        <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">Amount</label>
            <div class="input-group">
              <div class="input-group-addon">Rs.</div>
              <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" name="amount" required>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Card Number</label>
            <input type="text" class="form-control" placeholder="Enter card number" name="card_number"required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Card Expiry</label>
            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">Month</label>
                <select class="form-control" name="month">
                  <?php for($x=1; $x<=12;$x++): ?>
                    <option><?php echo $x; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1">Year</label>
                <select class="form-control" name="year">
                  <?php for($x=2020; $x<=2035;$x++): ?>
                    <option><?php echo $x; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>

          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Security Code</label>
            <input type="text" class="form-control" placeholder="Enter security code" name="security_code"required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Card Holder</label>
            <input type="text" class="form-control" placeholder="Enter Card Holder name" name="card_holder"required>
          </div>
          <br /><br /><br />


      <?php endif; ?>
      <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
