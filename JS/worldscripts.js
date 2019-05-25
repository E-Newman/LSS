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
        function get_articles(type,label){

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
                    
                    label.append(data.text);

                }
            });
        }
        String.prototype.replaceAt=function(index, replacement) {
            return this.substr(0, index) + replacement+ this.substr(index + replacement.length);
        }
        $(document).on("click", ".navfield", function(){
            var str=$(this).text();
            console.log(str);
            if(str.indexOf('+') >= 0){
            var type = $(this).attr('type');
            var label = $(this);
            get_articles(type,label);
            str.replaceAt(0,"-")
            console.log(str[0]);
            $(this).text(str);
            }
           });
    
});