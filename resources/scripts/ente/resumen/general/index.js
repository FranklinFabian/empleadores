"use strict";

// Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

var KTApexChartsDemo = function () {
    // Private functions

    var grafico_dinamico = function () {
        const apexChart = "#grafico_dinamico";
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
                    text: 'Cantidad de Empleadores'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return  val + " Empleadores";
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


    return {
        // public functions
        init: function () {
            grafico_dinamico();
        },

    };
}();




$(function() {
    KTApexChartsDemo.init();

    $('.select2_general').select2({
        placeholder: "Seleccione una opción"
    });


});



