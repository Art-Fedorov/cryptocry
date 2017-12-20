$(document).ready(function(){
  var url = "https://bittrex.com/api/v1.1/public/getmarkethistory";

  var $table = $('#main-table');

  $.ajax({
    url: url,
    data: {
      market: "BTC-ETC"
    },
    success: function(data){
      console.log(data);
    }
  });
});