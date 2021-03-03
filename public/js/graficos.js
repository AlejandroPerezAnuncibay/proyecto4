var datos = [];
$(function () {
    $('#myTab li:last-child a').tab('show')
})

function mostrarDatos() {
    $("#chart").remove();
    $("#chart2").remove();
    $("#chart3").remove();


    var nombre =$( "#selectUsu" ).val();
    $.ajax({
        url: "/datosEstadisticas/"+nombre,
        method: "get",
        success: function (response){
            $("#tab-content").css('display',"block");
            datos = response;
        }
    });

}
$("#home-tab").onclick(function (){
    $("#tab-content").css('display','block');
    var options = {
        chart: {
            height: 280,
            type: "area"
        },
        dataLabels: {
            enabled: false
        },
        series: [
            {
                name: "Proyectos",
                data:[response[1][0],response[1][1],response[1][2],response[1][3],response[1][4],
                    response[1][5],response[1][6],response[1][7],response[1][8],response[1][9],response[1][10],response[1][11]],
            }
        ],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100],

            }
        },
        xaxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviemrbe','Diciembre']

        }
    };
    $("#home").append("<div id='chart' style='min-height: 295px'></div>");

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
});

$("#profile-tab").onclick(function(){

    $("#tab-content").css('display','block');

    var options2 = {
        chart: {
            height: 280,
            type: "area"
        },
        dataLabels: {
            enabled: false
        },
        series: [
            {
                name: "Mensajes",
                data:[response[0][0],response[0][1],response[0][2],response[0][3],response[0][4],
                    response[0][5],response[0][6],response[0][7],response[0][8],response[0][9],response[0][10],response[0][11]]
            }
        ],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100],

            }
        },
        xaxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviemrbe','Diciembre']

        }
    };
    $("#profile").append("<div id='chart2' style='min-height: 295px'></div>");

    var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);

    chart2.render();



});

$("#messages-tab").onclick(function (){

    var options3 = {
        series: [
            {
                name: 'Tareas asignadas',
                data: [
                    {
                        x: 'Enero',
                        y: response[2][0]
                    },
                    {
                        x: 'Febrero',
                        y: response[2][1]
                    },
                    {
                        x: 'Marzo',
                        y: response[2][2]
                    },
                    {
                        x: 'Abril',
                        y: response[2][3]
                    },
                    {
                        x: 'Mayo',
                        y: response[2][4]
                    },
                    {
                        x: 'Junio',
                        y: response[2][5]
                    },
                    {
                        x: 'Julio',
                        y: response[2][6]
                    },
                    {
                        x: 'Agosto',
                        y: response[2][7]
                    },
                    {
                        x: 'Septiembre',
                        y: response[2][8]
                    },
                    {
                        x: 'Octubre',
                        y: response[2][9]
                    },
                    {
                        x: 'Noviembre',
                        y: response[2][10]
                    },
                    {
                        x: 'Diciembre',
                        y: response[2][11]
                    }
                ]
            }
        ],
        chart: {
            height: 350,
            type: 'bar'
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '60%'
            }
        },
        colors: [
            function({ value, seriesIndex, w }) {
                if (value < 5000) {
                    return '#FF0000'
                } else {
                    return '#02DFDE'
                }
            }
        ]
    }
    $("#messages").append("<div id='chart3' style='min-height: 295px'></div>");

    var chart3 = new ApexCharts(document.querySelector('#chart3'), options3)
    chart3.render()

});



