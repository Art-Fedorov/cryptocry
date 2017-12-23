<?php
header('Access-Control-Allow-Origin: *');
$url = null;
if (isset($_POST['url'])){
  $url = $_POST['url'];
}
if ($url != null)
{
  $content = file_get_contents($url);
} else {
  $content = file_get_contents('https://bittrex.com/api/v1.1/public/getmarkethistory?market=BTC-ETC');
}
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
      <form class="form-group row col-xs-12 col-10" method="POST" action="index.php">
        <div class="col-8">
          <input class="form-control" type="text" name="url" id="url" value="<?php echo $url; ?>" placeholder="Введите url">
        </div>
        <!-- <div class=""> -->
          <button class="btn btn-primary col-4" type="submit">Go</button>
        <!-- </div> -->
      </form>
      <div class="row form-group col-xs-12 col-10">
        <label class="col-3 col-form-label">Фильтр по total</label>
        <div class="col-6">
          <input class="form-control" type="number" name="val" id="val" value="0" placeholder="Введите val">
        </div>
        <button class="btn btn-success col-3" id="filtering" type="button">Filter</button>
      </div>

      <div id="table"></div>
  <script>
    $(document).ready(function(){
      var jsonArray = <?php echo $content; ?>;
      $.jsontotable(jsonArray.result, { id: '#table', className: 'table table-hover' });
      $('#table tr').each(function(key,val){
        var total = $(val).find('td:eq(4)');
        var fillType = $(val).find('td:eq(5)');
        fillType.swap(total);
        
        var orderType = $(val).find('td:eq(6)').text();
        if (orderType.toLowerCase()=="buy"){
          $(val).addClass('table__green');

        } else if (orderType.toLowerCase()=="sell"){
          $(val).addClass('table__red');

        }
      });
      $('#filtering').click(function(){
        $('#table tbody tr').each(function(key,val){
          var total = $(val).find('td:eq(5)');
          //var sel = $('#filterType option:selected').val();
          var inputVal = $('#val').val();
          //>=
          //if (sel==0){
            if (total.text()<inputVal) { $(val).hide(); }
            else {
              $(val).show();
            }
          //<=
          // } else {
          //     if (total.text()>inputVal) { $(val).hide(); }
          //   else {
          //     $(val).show();
          //   }
          // }
        });
      });
      
    });
  </script>
    </div>
  </div>
  
</body>

</html>