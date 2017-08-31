$(function () {
    var num = 1;


    var total;


 
    $.ajax({
        url: "listshow2.php",
        type: "get",
        dataType: "json",
        data: "",
         success: function (data) {
           total=data.length;
            if (data) {
                var arr = [];
                $("#trShow").html("");
                [].forEach.call(data, function (val) {
                    var str = [];
                    str.push('<tr>');
                    str.push('<td style="text-align:left; padding-left:20px;">');
                    str.push('<input type="checkbox" name="id[]" value="" />' + val.id + '</td>');
                    str.push('<td width="10%"><img class="show" src="' + val.img + '" width="70" height="50" /></td>');
                    str.push('<td>' + val.headed + '</td>');
                    str.push('<td>' + val.date + '</td>');
                    str.push('<td>');
                    str.push('<div class="button-group">');
                    str.push('<a class="button border-main" href="../template/edit2.php?id=' + val.id + '">');
                    str.push('<span class="icon-edit" ></span> 修改</a>');
                    str.push('<a class="button border-red btnDelect " id="' + val.id + '" href="javascript:void(0)" >');
                    str.push('<span class="icon-trash-o"></span> 删除</a>');
                    str.push('</div>');
                    str.push('</td>');
                    str.push('</tr>');
                    arr.push(str.join(""));
                   
                });
                $("#trShow").html(arr.join(""));
                $(".btnDelect").click(function () {
                    var $this = $(this);
                    if (confirm("确认删除?")) {
                        $.get("doDel2.php", {id: $(this).attr("id")}, function (data) {
                            if (data) {
                               
                                $this.parent().parent().parent().remove();
                            }
                        },'text')
                    }


                });


                // alert("加载成功");
            } else {
                alert("加载失败");
            }

        }
    })







    
    function fn(a){
        $.ajax({
                url: "select3.php",
                type: "get",
                dataType: "json",
                data: {num: a},
                success: function (data) {
            // console.log(data);
            if (data) {
                var arr = [];
                $("#trShow").html("");
                [].forEach.call(data, function (val) {
                    var str = [];
                    str.push('<tr>');
                    str.push('<td style="text-align:left; padding-left:20px;">');
                    str.push('<input type="checkbox" name="id[]" value="" />' + val.id + '</td>');
                    str.push('<td width="10%"><img class="show" src="' + val.img + '" width="70" height="50" /></td>');
                    str.push('<td>' + val.headed + '</td>');
                    str.push('<td>' + val.date + '</td>');
                    str.push('<td>');
                    str.push('<div class="button-group">');
                    str.push('<a class="button border-main" href="../template/edit2.php?id=' + val.id + '">');
                    str.push('<span class="icon-edit" ></span> 修改</a>');
                    str.push('<a class="button border-red btnDelect " id="' + val.id + '" href="javascript:void(0)" >');
                    str.push('<span class="icon-trash-o"></span> 删除</a>');
                    str.push('</div>');
                    str.push('</td>');
                    str.push('</tr>');
                    arr.push(str.join(""));
                   
                });
                $("#trShow").html(arr.join(""));
                $(".btnDelect").click(function () {
                    var $this = $(this);
                    if (confirm("确认删除?")) {
                        $.get("doDel2.php", {id: $(this).attr("id")}, function (data) {
                            if (data) {
                                console.log(data);
                                $this.parent().parent().parent().remove();
                            }
                        },'text')
                    }


                });


                // alert("加载成功");
            } else {
                alert("加载失败");
            }

        }
    })



    }
                                       

function fn1(){
        if(total%5==0){
            if(num<parseInt(total / 5)-1 && num>3){
                var nu=Number(num)-1;

                var nun=Number(num)+1;
                $("#select1").html(nu);
                $("#select2").html(num);
                $("#select3").html(nun);
            }
            else if(num<4){
                $("#select1").html(1);
                $("#select2").html(2);
                $("#select3").html(3);
            }else{
                var n=parseInt(total / 5);
                var num1=Number(n)+1;
                var num2=Number(n)-1;
                $("#select1").html(num2);
                $("#select2").html(n);
                $("#select3").html(num1);
            }


        }else{
            if(num<parseInt(total / 5)  && num>3){
                var nu=Number(num)-1;
                var nun=Number(num)+1;
                $("#select1").html(nu);
                $("#select2").html(num);
                $("#select3").html(nun);
            }
            else if(num<4){
                $("#select1").html(1);
                $("#select2").html(2);
                $("#select3").html(3);
            }else{
                var n=parseInt(total / 5);
                var num1=Number(n)+1;
                var num2=Number(n)-1;
                $("#select1").html(num2);
                $("#select2").html(n);
                $("#select3").html(num1);
            }


        }



}
   fn(num);

            var n=parseInt(total / 5);
                   function fn2(){
                  if(total%5==0){
                          if(n<3){
                            if(num>n){
                                    num=n
                                }else{
                                    num=num;
                                }
                                fn1(num)
                          }else {
                                if(num>n){
                                    num=n
                                }else{
                                    num=num;
                                }
                            fn1(num)
                        }
                     }else{
                        if(n<4){
                            if(num>n){
                                    num=n+1
                                }else{
                                    num=num;
                                }
                            fn1(num);
                        }else{
                            if(num>n){
                                    num=n+1
                                }else{
                                    num=num;
                                }
                            fn1(num)
                        }
                     }  
     
                 }

    $(".current").click(function () {
       num--;
        if(num==0){
            num=1;
        }
                    fn(num);
                    fn2()
                    
                     

    })
    $(".current1").click(function () {
       num= $(this).html();
        fn(num);
       fn2();
    

    })
    ;
    $(".current2").click(function () {
        num= $(this).html();

       fn(num);
        fn2();
       
    })
    ;
    $(".current3").click(function () {
        num= $(this).html();
        fn(num);
        fn2();
       
    })
    ;
    $(".current4").click(function () {
        num++;
        
        if(total%5==0){
            if(num> parseInt(total / 5)) {
                num = parseInt(total / 5);
            }
        }else{

            if(num> parseInt(total / 5)+1) {
                num = parseInt(total / 5) + 1;
            }
        }
        fn(num);
        fn2();
        
        
    })
    ;
    $(".current5").click(function () {
        if(total%5==0){
            num = parseInt(total / 5);
        }else{
            num = parseInt(total / 5)+1;
        }

        fn(num);
       
        fn2();
    })
    ;


})




              
       
 