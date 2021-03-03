var datos = [];
$(function () {
    $('#myTab li:last-child a').tab('show')
})

function mostrarDatos() {


    var nombre =$( "#selectUsu" ).val();
    $.ajax({
        url: "/datosEstadisticas/"+nombre,
        method: "get",
        success: function (response){
            $("#tab-content").css('display',"block");
            datos = response;
            var idActive = $("a.active")[0].id;
            if(idActive === "home-tab"){
                datosProyectos();
            }else if(idActive === "profile-tab"){
                datosMensajes();
            }else{
                datosTareas();
            }
        }
    });

}
$("#home-tab").on("click",datosProyectos());

$("#profile-tab").on("click",datosMensajes());

$("#messages-tab").on("click",datosTareas());


function datosMensajes(){

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
                data:[datos[0][0],datos[0][1],datos[0][2],datos[0][3],datos[0][4],
                    datos[0][5],datos[0][6],datos[0][7],datos[0][8],datos[0][9],datos[0][10],datos[0][11]]
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

}


function datosTareas(){
    $("#tab-content").css('display','block');

    var options3 = {
        series: [
            {
                name: 'Tareas asignadas',
                data: [
                    {
                        x: 'Enero',
                        y: datos[2][0]
                    },
                    {
                        x: 'Febrero',
                        y: datos[2][1]
                    },
                    {
                        x: 'Marzo',
                        y: datos[2][2]
                    },
                    {
                        x: 'Abril',
                        y: datos[2][3]
                    },
                    {
                        x: 'Mayo',
                        y: datos[2][4]
                    },
                    {
                        x: 'Junio',
                        y: datos[2][5]
                    },
                    {
                        x: 'Julio',
                        y: datos[2][6]
                    },
                    {
                        x: 'Agosto',
                        y: datos[2][7]
                    },
                    {
                        x: 'Septiembre',
                        y: datos[2][8]
                    },
                    {
                        x: 'Octubre',
                        y: datos[2][9]
                    },
                    {
                        x: 'Noviembre',
                        y: datos[2][10]
                    },
                    {
                        x: 'Diciembre',
                        y: datos[2][11]
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
}

function datosProyectos(){

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
                data:[datos[1][0],datos[1][1],datos[1][2],datos[1][3],datos[1][4],
                    datos[1][5],datos[1][6],datos[1][7],datos[1][8],datos[1][9],datos[1][10],datos[1][11]],
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
}


