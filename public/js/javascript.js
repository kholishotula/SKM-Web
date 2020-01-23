$(document).ready(function(){
    var canvas = document.getElementById('myChart');
    var ctx = canvas.getContext('2d');
    
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["2010", "2011", "2012", "2013"],
        datasets: [{
            label: 'Dataset 1',
            data: datas,
            color: "#878BB6",
        }, {
            label: 'Dataset 2',
            data: [250, 100, 150, 10],
            color: "#4ACAB4",
        }]
    }
    });
});




// $(document).ready(function() {

//     var tagApi = $(".tm-input").tagsManager();


//     jQuery(".typeahead").typeahead({

//       name: 'tags',

//       displayKey: 'name',

//       source: function (query, process) {

//         return $.get('app/ajax.php', { query: query }, function (data) {

//           data = $.parseJSON(data);

//           return process(data);
//         });

//       },

//       afterSelect :function (item){

//         tagApi.tagsManager("pushTag", item);

//       }

//     });

//   });

// $(document).ready(function() {
//     $('.demo').tokenize2();
// });

// $('#tambahLaporanRekapModal').on('show.bs.modal', function (e) {

//     var button = $(e.relatedTarget);
//     var modal = $(this);

//     modal.find('.modal-body').load(button.data("remote"));
// };

// });

// $('body').on('click', '[data-toggle="modal"]',function () {
//     $($(this).data("target")+' .modal-content').load($(this).data("remote"));
// });

// $(document).ready(function() {
// 	$('#butsave').on('click', function() {
// 		$("#butsave").attr("disabled", "disabled");
// 		var name = $('#name').val();
// 		var email = $('#email').val();
// 		var phone = $('#phone').val();
// 		var city = $('#city').val();
// 		if(name!="" && email!="" && phone!="" && city!=""){
// 			$.ajax({
// 				url: "save.php",
// 				type: "POST",
// 				data: {
// 					name: name,
// 					email: email,
// 					phone: phone,
// 					city: city				
// 				},
// 				cache: false,
// 				success: function(dataResult){
// 					var dataResult = JSON.parse(dataResult);
// 					if(dataResult.statusCode==200){
// 						$("#butsave").removeAttr("disabled");
// 						$('#fupForm').find('input:text').val('');
// 						$("#success").show();
// 						$('#success').html('Data added successfully !'); 						
// 					}
// 					else if(dataResult.statusCode==201){
// 					   alert("Error occured !");
// 					}
					
// 				}
// 			});
// 		}
// 		else{
// 			alert('Please fill all the field !');
// 		}
// 	});
// });
