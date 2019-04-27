$(document).ready(function(){        
		function arr(){
		$.ajax({		  
					url: "auth.php", // куда отправляем
					type: "post", // метод передачи
					dataType: "json", // тип передачи данных
					data: { 

						"type_query": 1
						

					},
					success: function(data){

						if (data.result == "success") {
						form();
						}

					}

		});
	};
	arr();
function form(){
	$('#regField2').css("border-color", "red");
}
});   