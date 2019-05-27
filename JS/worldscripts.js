$(document).ready(function () {
    var arr = new Map();
    var world="";
    var flag;
	window.onload = function(){
        
        if (window.location.href == "http://178.19.243.227/drego.php"){
            world = "dr";
        } else if(window.location.href == "http://178.19.243.227/kailria.php"){
            world = "ka";
        }
		var type_query = 8;
		$.ajax({
			url: "/ajax.php",
			type: "post",
			dataType: "json",
			data: {
				"world": world,
				"type_query": type_query
			},
							
			success: function (data) {
                // console.log(data.debug);
                $('#toappend').append(data.html);
            }
        });
        
        }
        function get_articles(type){

            $.ajax({
                
                url: "/ajax.php",
                type: "post",
                dataType: "json",
                data: {
                    "type": type,
                    "world": world,
                    "type_query": 9
                },
                                
                success: function (data) {
                    
                    $('.'+type).append(data.text);

                }
            });
        }
        
        $(document).on("click", ".navfield", function(){
            var str = $(this).text(); 
            var type = $(this).attr('type');
            var label = $(this); 
            if(str.indexOf('+') != -1){
            var l = str.replace('+','-');       
            $(this).text(l);
            get_articles(type,label);
            } else {
                var str = $(this).text();
                var l = str.replace('-','+'); 
                $(this).text(l);
                $('.'+type).text('');
            }
                 
            
           });
    
});