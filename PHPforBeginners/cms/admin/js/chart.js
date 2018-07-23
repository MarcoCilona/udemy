(function (){

  if($('#columnchart_material').length) {
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
  }
  //redraw graph when window resize is completed  
  $(window).on('resize', function() {
      drawChart();
  });

  var rowsData = [['Data', 'Count']];
  
  $.ajax({
      method: 'POST',
      url: "includes/dashboard_functions.php",
      data: {
        dashboard_action: 'retrieve'
      },
      success: function (data){
        
        $arrayData = JSON.parse(data);

        $.each($arrayData, function (index, item){

          rowsData.push([index, item]);

        })

      },
      error: function (request, status, error){
        console.log("Error: " + error);
      }
  });

  function drawChart() {

    var data = google.visualization.arrayToDataTable(rowsData);

    var options = {
      legend: {position: 'none'},
      chart: {
        title: 'Number of elements',
        subtitle: 'Updated to: ' + new Date().toDateString()        
      }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }


})();
