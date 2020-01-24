$(document).ready(function(){
    var canvas = document.getElementById('myChart');
    var ctx = canvas.getContext('2d');
    
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["2010", "2011", "2012", "2013"],
            datasets: [{
                label: 'Dataset 1',
                data:  [300, 400, 250, 20],
                color: "#878BB6",
            }, {
                label: 'Dataset 2',
                data: [250, 100, 150, 10],
                color: "#4ACAB4",
            }]
        }
    });

    $(document).on("scroll", function () {
        var pageTop = $(document).scrollTop()
        var pageBottom = pageTop + $(window).height()
        var tags = $(".scroll-animate")
      
        for (var i = 0; i < tags.length; i++) {
          var tag = tags[i]
      
          if ($(tag).position().top < pageBottom) {
            $(tag).addClass("visible")
          } else {
            $(tag).removeClass("visible")
          }
        }
    });    
});
