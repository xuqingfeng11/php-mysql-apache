$(function() {
    var total;
    var num = 1;
    var total111;
    $.ajax({
        url: "template/listshow.php",
        type: "get",
        dataType: "json",
        data: "",
        success: function(data) {
            if (data) {
                total = data.length;
                var arr = [];
                $(".bodyThird").html("");
                arr.push('<div class="panel-group" id="itany"  role="tablist" aria-multiselectable="true">');
                    [].forEach.call(data, function(val) {
                        var str = [];
                        str.push('<div class="panel panel-default">');

                            str.push('<div class="panel-heading">');
                                str.push('<a href="#'+val.id+'" class="panel-title" data-toggle="collapse" data-parent="#itany">' + val.headed + '</a>');
                            str.push('</div>');

                            str.push('<div class="panel-collapse collapse" id="'+val.id+'">');
                                str.push('<div class="panel-body">');
                                    str.push(val.tip);
                                str.push(' </div>');
                            str.push(' </div>');

                        str.push('</div>');
                        arr.push(str.join(""));

                });
                arr.push('</div>');

                $(".bodyThird").html(arr.join(""));


            }
        }
    })

    function fn(a) {
        $.ajax({
            url: "template/select1.php",
            type: "get",
            dataType: "json",
            data: {
                num: a
            },
            success: function(data) {
                if (data) {
                    var arr = [];
                    $(".bodyThird").html("");
                    arr.push('<div class="panel-group" id="itany"  role="tablist" aria-multiselectable="true">');
                    [].forEach.call(data, function(val) {
                        var str = [];
                        str.push('<div class="panel panel-default">');

                            str.push('<div class="panel-heading">');
                                str.push('<a href="#'+val.id+'" class="panel-title" data-toggle="collapse" data-parent="#itany">' + val.headed + '</a>');
                            str.push('</div>');

                            str.push('<div class="panel-collapse collapse" id="'+val.id+'">');
                                str.push('<div class="panel-body">');
                                    str.push(val.tip);
                                str.push(' </div>');
                            str.push(' </div>');

                        str.push('</div>');
                        arr.push(str.join(""));

                    });
                    arr.push('</div>');

                    $(".bodyThird").html(arr.join(""));


                }
            }
        })
    }

    fn(num);


   function fn1(){
        if(total%5==0){
            if(num<parseInt(total / 5)-1 && num>3){
                var nu=Number(num)-1;

                var nun=Number(num)+1;
                $("#select1").html(nu);
                $("#select2").html(num);
                $("#select3").html(nun);
            }
            else if(num < 4){
                $("#select1").html(1);
                $("#select2").html(2);
                $("#select3").html(3);
            }else{
                var n=parseInt(total / 5)-1;
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
                          if(n<4){
                            fn1(n);
                          }else {
                            if(num>n){
                                num=n+1
                            }else{
                                num=num;
                            }
                            fn1(num)
                        }
                     }else{
                        if(n<3){
                            var m=n+1
                            fn1(m);
                        }else{
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
                    fn2();
                    
                     

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





    $.ajax({
        url: "template/listshow1.php",
        type: "get",
        dataType: "json",
        data: "",
        success: function(data) {
            if (data) {
                total111 = data.length;
                var arr = [];
                $(".rowGov").html("");
                [].forEach.call(data, function(val) {
                    var str = [];
                    str.push(' <div class="col-sm-4  row-img-4-1">');
               
                    str.push(' <div class="col-sm-3 ">');
                     str.push('<img src="template/' + val.img + '" alt="" class="img-circle" style="width:120px;height:120px"> ');
                     str.push('</div>');
                      str.push(' <div class="col-sm-9 ">');
                     str.push(' <div row ">');

                    
                        str.push(' <div class="col-sm-3  " style="color:red;font-size:15px;height:20px;overflow:hidden">' + val.headed + '</div>');
                      
                    str.push(' <div class="col-sm-8 col-sm-offset-1" style="height:110px;overflow:hidden">' + val.tip + '</div>');
                   
                     str.push('</div>');
                      str.push('</div>');
                      str.push('</div>');
                    arr.push(str.join(""));

                });


                $(".rowGov").html(arr.join(""));


            }
        }
    })


})