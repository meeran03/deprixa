var app = angular.module('app', []);

//o de forma más simple
var anyo = new Date().getFullYear();

app.controller('myCtrl', function ($scope, $http) {

    //this fetches the data for our table
    $scope.fetchsales = function(){
        $http.get('fetchsales.php').success(function(data){

            var ctx = document.getElementById("dvCanvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [
                        {
                            label: 'Shipping',
                            backgroundColor: '#0346ff',
                            borderColor: '#0346ff',
                            data: data.prev,
                            borderWidth: 3,
                            fill: false
                        },
                        {
                            label:  'Total sales shipments',
                            backgroundColor: '#4fc3f7',
                            borderColor: '#4fc3f7',
                            data: data.year,
                            borderWidth: 3,
                            fill: false
                        },
						{
                            label:  'Total Consolidated',
                            backgroundColor: '#52c225',
                            borderColor: '#52c225',
                            data: data.pre,
                            borderWidth: 3,
                            fill: false
                        },
						{
                            label:  'Total Containers',
                            backgroundColor: '#fe2864',
                            borderColor: '#fe2864',
                            data: data.preconta,
                            borderWidth: 3,
                            fill: false
                        }

                    ]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Values'
                            },
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

        });
    }

    $scope.clear = function(){
        $scope.error = false;
        $scope.success = false;
    }

});