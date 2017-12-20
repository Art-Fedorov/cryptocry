<?php
header('Access-Control-Allow-Origin: *'); 
$homepage = file_get_contents('https://bittrex.com/api/v1.1/public/getmarkethistory?market=BTC-ETC');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>магия</title>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script> -->
  <script src="main.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css">

</head>

<body>
  <div class="wrapper">
    <div class="container">
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Text</label>
        <div class="col-10">
          <input class="form-control" type="text" id="url" value="" placeholder="Введите url">
        </div>
      </div>

      <div id="table"></div>
  <script>
    $(document).ready(function(){
      var jsonArray = <?php echo $homepage; ?>;
      $.jsontotable(jsonArray.result, { id: '#table', className: 'table table-hover' });
    });
  </script>
    </div>
  </div>
  
</body>

</html>