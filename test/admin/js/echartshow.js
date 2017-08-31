$.ajax({
        url: "../template/listshow.php",
        type: "get",
        dataType: "json",
        data: "",
        success: function (data) {
            console.log(data)

            if(data){


                var option = {
            title: {
                text: '用户发表文章',
                padding:[10,20,50,30],
                x:'right'
            },
            tooltip: {
                trigger:"axis",
                formatter:"销量:{b},{c}"
            },
            legend: {
                data:[{
                    name:'数量',
                    icon:"circle",
                    textStyle:{
                        color:"blue",
                        fontSize:20,
                        fontWeight:"bold"
          
                }


                },{
                    name:'销量2',
                }],
                align:"right",
                orient:"horizontal"

            },
            xAxis: {
                data: [{
                    value:"衬衫",
                    textStyle:{
                        color:"red",
                        fontSize:20,
                       
                    }
                },"羊毛衫","雪纺衫","裤子","高跟鞋","袜子"]
            },
            yAxis: {},
            series: [{
                name: '销量',
                type: 'line',
                data: [5, 20, 36, 10, 10, 20],
                symbolSize:25,
                symbolRotate:25,
            },{
                name: '销量2',
                type: 'bar',
                data: [5, 20, 36, 10, 10, 20]
            }]
        };

            }
        }



