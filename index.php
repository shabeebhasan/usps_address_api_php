<?php

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="container" style="margin-top: 80px !important;">
  <section class="mb-4">
    <h1>ADDRESS VALIDATOR USING USPS</h1>
    <form id="address-form" action="validate.php">
      <div class="form-group">
        <label for="exampleInputEmail1">Address Line 1</label>
        <input name="address_line_1" class="form-control" placeholder="Suit 6100" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Address Line 2</label>
        <input name="address_line_2" class="form-control" placeholder="185 Berry St" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">City</label>
        <input name="city" class="form-control" placeholder="San Francisco" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">State</label>
        <select class="form-control" id="state" name="state">
          <option value="AK">Alaska</option>
          <option value="AL">Alabama</option>
          <option value="AR">Arkansas</option>
          <option value="AZ">Arizona</option>
          <option value="CA" selected>California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DC">District of Columbia</option>
          <option value="DE">Delaware</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="IA">Iowa</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="MA">Massachusetts</option>
          <option value="MD">Maryland</option>
          <option value="ME">Maine</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MO">Missouri</option>
          <option value="MS">Mississippi</option>
          <option value="MT">Montana</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="NE">Nebraska</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NV">Nevada</option>
          <option value="NY">New York</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="PR">Puerto Rico</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VA">Virginia</option>
          <option value="VT">Vermont</option>
          <option value="WA">Washington</option>
          <option value="WI">Wisconsin</option>
          <option value="WV">West Virginia</option>
          <option value="WY">Wyoming</option>
        </select>
      </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">ZipCode</label>
        <input name="zipcode" class="form-control" placeholder="94556" required>
      </div>
      <button type="submit" class="btn btn-primary">Validate</button>
    </form>
  </section>

  <div class="modal" tabindex="-1" id="save-modal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Save Address</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Which address format do you want to save?</p>
          <div class="btn-group btn-toggle mb-3">
            <button id="originalBtn" class="btn btn-xs btn-success">ORIGINAL</button>
            <button id="stBtn" class="btn btn-xs btn-default">STANDARDRIZED (USPS)</button>
          </div>
          <pre id="address_description_orignal"></pre>
          <pre id="address_description_usps" class="collapse"></pre>
          <div id="success_message" class="alert alert-success" role="alert">
            Address Saved Successfully.
          </div>
          <div id="fail_message" class="alert alert-danger" role="alert">
            Address can't be saved.
          </div>
        </div>
        <div class="modal-footer">
          <button id="saveBtn" type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

  <script type="module" src="main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

</body>

</html>