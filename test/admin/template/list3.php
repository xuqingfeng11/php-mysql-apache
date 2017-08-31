<?php
    session_start();
    require "conn.php";
    if(!array_key_exists("id", $_SESSION)){
        header("Location:login.html");
        return;
    }
?>
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="renderer" content="webkit">
        <title></title>
        <link rel="stylesheet" href="../css/pintuer.css">
        <link rel="stylesheet" href="../css/admin.css">
        <style>
          #div1{
            height: 500px;
            width: 500px;
            border:1px solid red;
          }
        </style>
        <script src="../js/jquery.js"></script>
        <script src="../js/echarts.min.js"></script>
        <script ></script>
        <script >
            $(function(){
              var arr=[];
              var str=[];
              //调用方法，进行数据的设置
              

              var myEcharts=echarts.init($("#div1")[0]);
              var option = {
                  title: {
                    text: '用户发表数量',
                    padding:[10,20,50,30],
                    x:'right'
                  },

                  tooltip: {
                    trigger:"axis",
                    formatter:"数量:{b},{c}"
                  },

                  legend: {
                    data:["数量"],
                    align:"right",
                    orient:"horizontal"
                  },

                  xAxis: {
                    data:arr
                  },
                  
                  yAxis: {},
                  
                  series: {
                    name: '数量',
                    type: 'bar',
                    data: str
                  }
              }
             

              $.ajax({
                  url: "select4.php",
                  type: "get",
                  dataType: "json",
                  data: "",
                  // async:false,
                  success: function (data) {
                      console.log("yes")
                      // console.log(data)
                      if(data){ 
                          
                          [].forEach.call(data, function (val) {
                              // console.log(val);
                       
                              
                              arr.push(val.username);
                               
                              str.push(val.um);
                             

                          })
                          console.log(arr);
                          console.log(str);

                          myEcharts.setOption(option);
                      }     
                  } ,
                  error:function(data) {
                      console.log("no")
                      console.log(data)
                  }            
              })

              




            })
        </script>
    </head>
    <body>
        <div id="div1"></div>
    </body>
</html>