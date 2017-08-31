$(function(){
    var  total;
    var num = 1;
    $.ajax({
        url: "template/listshow2.php",
        type: "get",
        dataType: "json",
        data: "",
        success: function (data) {
            if (data) {
             total = data.length;
                var arr = [];
                $("#tbody").html("");
                 [].forEach.call(data, function(val) {
                    var str = [];
                   str.push('<div class="row  col-sm-12 col-sm-offset-1" style="border:1px solid #ccc;padding:10px;padding-left:30px; box-sizing:border-box;">');
                                       str.push('<div class="col-sm-9 col-sm-offset-1 row-img-5-1" >');
                      
                                      str.push(' <span style="color:red;font-size:20px;">'+val.headed+'</span>');
                                       str.push('</div>     '); 
                                         str.push('<div class="row " >');
                                           
                                      str.push('<div class="col-sm-4 row-img-5-2" >');
                                      str.push('<img src="template/' + val.img + '"  class="img-circle" style="width:140px;height:140px">');
                                        str.push('</div>');
                                    
                                       str.push(' <div class="col-sm-6 col-sm-pull-1">');
                                       str.push('  <span>&nbsp;&nbsp;&nbsp;'+val.tip+'</span>');
                                        str.push('</div>');
                                      
                                        str.push(' </div>');
                                         str.push(' </div>');
                                        arr.push(str.join(""));
                                                     

                });
               
                $("#tbody").html(arr.join(""));
               
               
            } 
        }
    })

             function fn(a){
                    $.ajax({
                            url: "template/select3.php",
                            type: "get",
                            dataType: "json",
                            data: {num: a},
                           success: function (data) {
                                if (data) {
                                    var arr1 = [];
                                    $("#tbody").html("");
                                    
                                    [].forEach.call(data, function(val) {
                                            console.log(val);
                                        var str = [];
                                    str.push('<div class="row  col-sm-12 col-sm-offset-1" style="border:1px solid #ccc;padding:10px;padding-left:30px; box-sizing:border-box;">');
                                       str.push('<div class="col-sm-9 col-sm-offset-1 row-img-5-1" >');
                      
                                      str.push(' <span style="color:red;font-size:20px;">'+val.headed+'</span>');
                                       str.push('</div>     '); 
                                         str.push('<div class="row " >');
                                           
                                      str.push('<div class="col-sm-4 row-img-5-2" >');
                                      str.push('<img src="template/' + val.img + '"  class="img-circle" style="width:140px;height:140px">');
                                        str.push('</div>');
                                    
                                       str.push(' <div class="col-sm-6 col-sm-pull-1">');
                                       str.push('  <span>&nbsp;&nbsp;&nbsp;'+val.tip+'</span>');
                                        str.push('</div>');
                                      
                                        str.push(' </div>');
                                         str.push(' </div>');
                                        arr1.push(str.join(""));
                                                     
                                     

                                              });
                               
                                    $("#tbody").html(arr1.join(""));
                                    $("#spanShow").html(total+"条记录");
                                   
                                   
                                } 
                            }
                        })



    }
                                    fn(num);
                             

    function fn1(){
        if(total%5==0){
            if(num<parseInt(total / 5)-1 && num>5){
                var nu=Number(num)-1;
                var nun1=Number(num)+1;
                var nun2=Number(num)+2;
                var nun3=Number(num)+3;
                var nun4=Number(num)+4;
              
                $("#current").html(nu);
                $("#current1").html(num);
                    
                $("#current2").html(nun1);
                 $("#current3").html(nun2);
                $("#current4").html(nun3);
                $("#current5").html(nun4);
            }
            else if(num < 6){
                $("#current").html(1);
                $("#current1").html(2);
                $("#current2").html(3);
                 $("#current3").html(4);
                $("#current4").html(5);
                $("#current5").html(6);
            }else{
                var n=parseInt(total / 5)-1;
                var num1=Number(n)+1;
                var num2=Number(n)-1;
                 var nun2=Number(n)+2;
                var nun3=Number(n)+3;
                var nun4=Number(n)+4;
                $("#current").html(num2);
                $("#current1").html(n);
                $("#current2").html(num1);
                $("#current3").html(nun2);
                $("#current4").html(nun3);
                $("#current5").html(nun4);

            }


        }else{
           if(num<parseInt(total / 5)-1 && num>5){
                var nu=Number(num)-1;
                var nun1=Number(num)+1;
                var nun2=Number(num)+2;
                var nun3=Number(num)+3;
                var nun4=Number(num)+4;
              
                $("#current").html(nu);
                $("#current1").html(num);
                    
                $("#current2").html(nun1);
                 $("#current3").html(nun2);
                $("#current4").html(nun3);
                $("#current5").html(nun4);
            }
            else if(num < 6){
                $("#current").html(1);
                $("#current1").html(2);
                $("#current2").html(3);
                 $("#current3").html(4);
                $("#current4").html(5);
                $("#current5").html(6);
            }else{
                var n=parseInt(total / 5);
                var num1=Number(n)+1;
                var num2=Number(n)-1;
                 var nun2=Number(n)+2;
                var nun3=Number(n)+3;
                var nun4=Number(n)+4;
                $("#current").html(num2);
                $("#current1").html(n);
                $("#current2").html(num1);
                $("#current3").html(nun2);
                $("#current4").html(nun3);
                $("#current5").html(nun4);

            }


        }



}
   


   var n=parseInt(total / 5);
                   function fn2(){
                  if(total%5==0){
                          if(n<6){
                            
                          }else {
                                if(num>n){
                                    num=n
                                }else{
                                    num=num;
                                }
                            fn1(num)
                        }
                     }else{
                        if(n<5){
                            
                           
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
     $("#current").click(function () {
       num= $(this).html();
        fn(num);
        
       

    })
    $("#current1").click(function () {
       num= $(this).html();
        fn(num);
        
       

    })
    ;
    $("#current2").click(function () {
        num= $(this).html();

       fn(num);
      
       
    })
    ;
    $("#current3").click(function () {
        num= $(this).html();
        fn(num);
        
       
    })
    ;
    $("#current4").click(function () {

        num= $(this).html();
        fn(num);
        
        
    })
    ;

  
    ;
    $("#current5").click(function () {
      num++;
        if(total%5==0){
          if(num>n){
            num=n;
          }

          
            
        }else{
            if(num>n){
            num=n+1;
          }
        }

            fn(num);
            
               
    })
    


})