
<!DOCTYPE html>
<html lang="en">
  <head>

  </head>


  <body>

    <div class="container">

      <div class="page-header">
        <h1>Select payment method</h1>
      </div>
        <br />
        <form method="get" action ="submit.php">

          <div class="radio">
          <label>
              <input type="radio" name="payment_method" value="cash" checked>
              Cash
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="payment_method" value="card">
              Card
            </label>
          </div>
          <br /><br /><br />
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
