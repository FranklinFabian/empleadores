"use strict";

// Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

var KTApexChartsDemo = function () {
    // Private functions
    //grafico1 ------------------------>
    var grafico_dinamico = function () {


        const apexChart = "#grafico_dinamico";
        var options = {
            series: [],
            chart: {
                height: 500,
                type: 'line',
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                },
                toolbar: {
                    show: false
                }
            },
            colors: ['#ff6687', '#3aa3eb'],
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: '',
                align: 'left'
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            markers: {
                size: 1
            },
            xaxis: {
                categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul','Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                title: {
                    text: 'Meses'
                }
            },
            yaxis: {
                title: {
                    text: 'Cantidad Productos y Servicios'
                },
                min: 5,
                max: 10000
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        };

        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();


        $.getJSON(HOST_URL + '/reporte/resumen/general/grafico_dinamico/', function(response) {
            console.log(response);
            chart.updateSeries(response.serie);

        });
};

    //grafico2 ------------------------>
    var grafico_dinamico2 = function () {


        const apexChart = "#grafico_dinamico2";

        var options = {
            series: [],
            chart: {
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800,
                    animateGradually: {
                        enabled: true,
                        delay: 150
                    },
                    dynamicAnimation: {
                        enabled: true,
                        speed: 350
                    }
                },
                type: 'bar',
                height: 500,
                width: "100%"
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: 'rounded',
                    barHeight: '100%'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 1,
                colors: ['transparent']
            },
            xaxis: {
                categories: [],
            },
            legend: {
                position: "right",
                verticalAlign: "top",
                containerMargin: {
                    left: 35,
                    right: 60
                }
            },
            yaxis: {
                title: {
                    text: 'Cantidad de Servicios y Productos'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return  val + " Productos/Servicios";
                    }
                }
            },
            noData: {
                text: 'Cargando....',
                align: 'center',
                verticalAlign: 'middle',
                offsetX: 0,
                offsetY: 0,
                style: {
                    color: undefined,
                    fontSize: '14px',
                    fontFamily: undefined
                }
            },
            colors: ['#52fff9','#00a8f3','#3f48cc','#ff7f27','#9c27b0','#f44336']
        };


        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();


        $.getJSON(HOST_URL + '/reporte/resumen/general/grafico_dinamico/', function(response) {
            console.log(response);
            chart.updateSeries(response.serie);
            chart.updateOptions( {
                xaxis: {
                    categories: response.categoria
                }
            });
        });
    };

    //grafico3 ------------------------>
    var grafico_dinamico3 = function () {

        const apexChart = "#grafico_dinamico3";
        var options = {
            series: [],
            chart: {
                width: 700,
                type: 'donut',
            },
            labels: [],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            colors: ['#ffe88b','#c3c3c3','#585858','#52fff9','#00a8f3','#3f48cc','#ff7f27','#9c27b0','#f44336']
        };

        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();

        $.getJSON(HOST_URL + '/reporte/resumen/general/grafico_dinamico/', function(response) {
            console.log(response);
            chart.updateOptions( {
                series : response.serie,
                labels : response.categoria,
            });
        });
    };


return {
        // public functions
        init: function () {
            grafico_dinamico();
            grafico_dinamico2();

        },

};


}();




$(function() {
    KTApexChartsDemo.init();

    $('.select2_general').select2({
        placeholder: "Seleccione una opción"
    });


});



