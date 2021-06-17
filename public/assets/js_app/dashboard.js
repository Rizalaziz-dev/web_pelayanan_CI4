$(function () {
  count_member();
  count_transaksi_vip();
  count_ball_sales();
  load_chart();
});

function count_member(){
  $.ajax({
		url: base_url + 'dashboard/count_member',
		type: 'POST',
    dataType: 'JSON',
		success: function(reponse){
        // console.log(reponse);
        $('#member').text(reponse);

    }
  });
}

function count_transaksi_vip(){
  $('#transaksi-vip').text(0);
}

function count_ball_sales(){
  $.ajax({
		url: base_url + 'dashboard/ball_sales',
		type: 'POST',
    dataType: 'JSON',
		success: function(response){
        console.log(response[0].qty);
        $('#ball-sales').text(response[0].qty*50);

    }
  });
}
function load_chart(){
  // 'use strict'

  $.ajax({
		url: base_url + 'dashboard/chart',
		type: 'POST',
		success: function(response){
      var chart = $.parseJSON(response);
        var ticksStyle = {
          fontColor: '#495057',
          fontStyle: 'bold'
        }

        var mode      = 'index'
        var intersect = true

        var $salesChart = $('#sales-chart')
        var salesChart  = new Chart($salesChart, {
          type   : 'bar',
          data   : {
            labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [
              {
                backgroundColor: '#007bff',
                borderColor    : '#007bff',
                data           : [chart.jan[0].qty,
                                  chart.feb[0].qty,
                                  chart.mar[0].qty,
                                  chart.apr[0].qty,
                                  chart.mei[0].qty,
                                  chart.jun[0].qty,
                                  chart.jul[0].qty,
                                  chart.agu[0].qty,
                                  chart.sep[0].qty,
                                  chart.okt[0].qty,
                                  chart.nov[0].qty,
                                  chart.des[0].qty,]
              }
            ]
          },
          options: {
            maintainAspectRatio: false,
            tooltips           : {
              mode     : mode,
              intersect: intersect
            },
            hover              : {
              mode     : mode,
              intersect: intersect
            },
            legend             : {
              display: false
            },
            scales             : {
              yAxes: [{
                // display: false,
                gridLines: {
                  display      : true,
                  lineWidth    : '4px',
                  color        : 'rgba(0, 0, 0, .2)',
                  zeroLineColor: 'transparent'
                },
                ticks    : $.extend({
                  beginAtZero: true,

                  // Include a dollar sign in the ticks
                  callback: function (value, index, values) {
                    return value*50
                  }
                }, ticksStyle)
              }],
              xAxes: [{
                display  : true,
                gridLines: {
                  display: false
                },
                ticks    : ticksStyle
              }]
            }
          }
        })
    }
  });

  // var januari,
  //     februari,
  //     maret,
  //     april,
  //     mei,
  //     juni,
  //     juli,
  //     agustus,
  //     september,
  //     oktober,
  //     november,
  //     desember;
  //     januari = 1000;
  //



}
