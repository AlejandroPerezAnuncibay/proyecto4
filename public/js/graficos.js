var options = {
    chart: {
        type: 'line'
    },
    series: [{
        name: 'Proyectos creados',
        data: [30,40,35,50,49,60,70,91,125]
    }],
    xaxis: {
        categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviemrbe','Diciembre']
    }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();

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
            data: [45, 52, 38, 45, 19, 23, 2, 52, 38, 45, 19, 23]
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

var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);

chart2.render();

