<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>test</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
     
    <style>   
     
    </style>
     
    <script>
        $(document).ready(function(){
         
            $('#show_more').click(function(){
        var btn_more = $(this);
        var count_show = parseInt($(this).attr('count_show'));
        var count_add  = $(this).attr('count_add');
        btn_more.val('Подождите...');
                 
        $.ajax({
                    url: "ajax.php", // куда отправляем
                    type: "post", // метод передачи
                    dataType: "json", // тип передачи данных
                    data: { // что отправляем
                        "count_show":   count_show,
                        "count_add":    count_add
                    },
                    // после получения ответа сервера
                    success: function(data){
            if(data.result == "success"){
                $('#content').append(data.html);
                    btn_more.val('Показать еще');
                    btn_more.attr('count_show', (count_show+3));
            }else{
                btn_more.val('Больше нечего показывать');
            }
                    }
                });
            });
             
        });     
    </script>
     
</head>
<body>
    <div id="content">
        <?php
            // выведем в самом начале 5 статей
            include "db.php";
             
            $sql = mysql_query("
                SELECT * FROM `tbl_news` LIMIT 5
            ") or die(mysql_error());
            $newsData = array();
            while($result = mysql_fetch_array($sql, MYSQL_ASSOC)){
                $newsData[] = $result;
            }           
            foreach($newsData as $oneNews): 
        ?>
        <div>
            <b><?=$oneNews['title'];?></b>
            <p><?=$oneNews['small_text'];?></p>
        </div>
        <?php endforeach; ?>
    </div>
     
    <input id="show_more" count_show="1" count_add="1" type="button" value="Показать еще" />
</body>
</html>
