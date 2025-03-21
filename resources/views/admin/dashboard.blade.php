@extends('layouts.admin')

@section('customcss')
<link href="{{ env('COMMON_HOST') . 'assets/admin/css/dataTables.bootstrap4.css' }}" rel="stylesheet">

<style>
  /* Set the parent container width (this can be adjusted as needed) */
  .chart-container {
      width: 100%; /* Make the parent container take full width */
      /* max-width: 800px; Optional: Limit the maximum width */
      margin: 0 auto; /* Center the container */
  }

  /* Ensure the canvas takes up 100% width of the parent container */
  canvas {
      width: 100% !important; /* Force the canvas to be 100% of the parent */
      height: 300px !important; /* Keep aspect ratio */
  }
</style>
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="box py-2 py-md-4">
            <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between pb-21 pb-md-41">
                <div class="title">
                    <h5 class="mb-2 mb-md-0">Dashboard</h5>
                </div>
                <div class="buttons d-flex flex-wrap align-items-center justify-content-md-end">
                    <a href="#" type="button" class="btn btn-primary-app">Reset Data</a>
                    <a href="{{ route('admin.invoice.add') }}" type="button" class="btn btn-primary-app">New Invoice</a>
                    <a href="{{ route('admin.quotation.add') }}" type="button" class="btn btn-primary-app">New Quotation</a>
                </div>
            </div>
        </div>

        <div class="stats mb-4">
            <div class="row">
                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <!-- Card -->
                    <a class="card text-decoration-none h-100 p-4" href="#">
                        <div class="card-body p-0 divider">
                        <h6 class="card-subtitle mb-2">Total Quotation</h6>
                        <div class="row align-items-end gx-2 mb-3">
                            <div class="col-6">
                            <h2 class="card-title text-inherit m-0">45,689</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                            <!-- Chart -->
                            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-stat-01.svg' }}" alt="icon" width="55" height="" loading="lazy" />
                            <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="text-warning">
                            +12,02%
                        </span>
                        <span class="color-light-app ms-1">since last 30 days</span>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>

                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <!-- Card -->
                    <a class="card text-decoration-none h-100 p-4" href="#">
                        <div class="card-body p-0 divider">
                        <h6 class="card-subtitle mb-2">Total Invoice</h6>
                        <div class="row align-items-end gx-2 mb-3">
                            <div class="col-6">
                            <h2 class="card-title text-inherit m-0">15,689</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                            <!-- Chart -->
                            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-stat-02.svg' }}" alt="icon" width="55" height="" loading="lazy" />
                            <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="text-warning">
                            +2,02%
                        </span>
                        <span class="color-light-app ms-1">since last 30 days</span>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>

                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <!-- Card -->
                    <a class="card text-decoration-none h-100 p-4" href="#">
                        <div class="card-body p-0 divider">
                        <h6 class="card-subtitle mb-2">New Customers</h6>
                        <div class="row align-items-end gx-2 mb-3">
                            <div class="col-6">
                            <h2 class="card-title text-inherit m-0">5,689</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                            <!-- Chart -->
                            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-stat-03.svg' }}" alt="icon" width="55" height="" loading="lazy" />
                            <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="text-danger">
                            -1,02%
                        </span>
                        <span class="color-light-app ms-1">since last 30 days</span>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>

                <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                    <!-- Card -->
                    <a class="card text-decoration-none h-100 p-4" href="#">
                        <div class="card-body p-0">
                        <h6 class="card-subtitle mb-2">Revenue in AED</h6>
                        <div class="row align-items-end gx-2 mb-3">
                            <div class="col-6">
                            <h2 class="card-title text-inherit m-0">45,689</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                            <!-- Chart -->
                            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-stat-04.svg' }}" alt="icon" width="55" height="" loading="lazy" />
                            <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="text-warning">
                            +12,02%
                        </span>
                        <span class="color-light-app ms-1">since last 30 days</span>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
            </div>
        </div>

        <div class="row chart">
            <div class="col-lg-8 mb-3">
              <div class="card border-0">
                <h5 class="mb-2">Reports</h5>
                <div class="chartjs-custom">
                    <canvas id="chartDReport" style="width: 100%;height: auto;"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-3">
              <div class="card p-3 border">
                <h5 class="mb-2">Charts</h5>
                <div class="chartjs-custom">
                    <canvas id="chartDChart" style="width: 100%;height: auto;"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-8 mb-3">
              <div class="card border-0">
                <h5 class="mb-2">Product Details</h5>
                <table id="{{ $page['term'] }}_list" class="table table-bordered1 dt-responsive nowrap1">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Sales</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 6; $i++)
                        <tr>
                            <td class="color-light-app">#001</td>
                            <td>Magic Massage Oil</td>
                            <td class="color-light-app">Cosmetic</td>
                            <td class="color-light-app">11,500</td>
                            <td>AED 14.81</td>
                            <td class="color-light-app">
                                <div class="d-flex align-items-center status"><i class="bi bi-circle-fill text-success"></i><span>Available</span>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
              </div>
            </div>
            <div class="col-lg-4 mb-3">
              <div class="card p-3 border">
                <h5 class="mb-2">Traffic</h5>
                <div class="chartjs-custom">
                    <canvas id="chartDTraffic" style="width: 100%;height: auto;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
 
@endsection

@section('customjs')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ env('COMMON_HOST') . 'assets/admin/js/jquery.dataTables.js' }}"></script>
<script src="{{ env('COMMON_HOST') . 'assets/admin/js/dataTables.bootstrap4.js' }}"></script>

<script>
  const ctx = document.getElementById('chartDReport');

  new Chart(ctx,
  {
    type: 'line',
  data: {
    labels: ['Nov 1', 'Nov 2', 'Nov 3', 'Nov 4', 'Nov 5', 'Nov 6', 'Nov 7', 'Nov 8'],
    datasets: [
      {
        label: 'Sales',
        data: [100, 250, 250, 150, 125, 175, 200, 100],
        borderWidth: 2,
        borderColor: '#28AA93',
        backgroundColor: '#28AA93',
        tension: 0.4, // For curved lines
        pointStyle: 'circle',
        pointRadius: 0,
        pointHoverRadius: 6,
        pointHitRadius: 10,
        pointHoverBackgroundColor: '#FFFFFF',
        pointHoverBorderColor: '#28AA93',
        pointHoverBorderWidth: 2,
      },
      {
        label: 'Expenses',
        data: [140, 180, 180, 125, 140, 180, 200, 250],
        borderWidth: 2,
        borderColor: '#F67F3C',
        backgroundColor: '#F67F3C',
        tension: 0.4,
        pointStyle: 'circle',
        pointRadius: 0,
        pointHoverRadius: 6,
        pointHitRadius: 10,
        pointHoverBackgroundColor: '#FFFFFF',
        pointHoverBorderColor: '#F67F3C',
        pointHoverBorderWidth: 2,
      },
      {
        label: 'Income',
        data: [125, 215, 215, 250, 125, 180, 160, 125],
        borderWidth: 2,
        borderColor: '#FFC226',
        backgroundColor: '#FFC226',
        tension: 0.4,
        pointStyle: 'circle',
        pointRadius: 0,
        pointHoverRadius: 6,
        pointHitRadius: 10,
        pointHoverBackgroundColor: '#FFFFFF',
        pointHoverBorderColor: '#FFC226',
        pointHoverBorderWidth: 2,
      }
    ]
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top', // Place the legend on top
        align: 'start', // Center-align legend items
        maxHeight: 142,
        labels: {
          usePointStyle: true, // Use circles as legend indicators
          boxWidth: 6,
          boxHeight: 6,
          font: {
            size: 12, // Font size for legend
            family: 'Poppins', // Set Poppins font for legend
          },
          //padding: 0, // Space between legend indicator and label
          generateLabels: function(chart) {
              const originalLabels = Chart.defaults.plugins.legend.labels.generateLabels(chart);
              // Add a right gap (extra space) to each label
              originalLabels.forEach(label => {
                  label.text = '  '+ label.text +'       '; // Add space or any character for right padding
              });
              return originalLabels;
          }
        }
      },
      title: {
        display: false,
      }
    },
    layout: {
      padding: {
        // top: 20,
        // bottom: 124
        // top: 50
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        // beginAtZero: false,
        //min: 0,
        max: 300,
        ticks: {
          stepSize: 50,
          // padding: 0,
          color: '#C9C9C9',
          size: 12,
          callback: function(value, index, values) {
                            // Return the value with additional space to the right
                            return value + '      '; // Add spaces to simulate padding
                        }
        },
        border: {
            display: false, // Hides the border line of the Y-axis
        },
        font: {
          family: 'Poppins', // Set Poppins font for legend
          //size: 14,
          //weight: '500'
        }
      },
      x: {
        ticks: {
          color: '#C9C9C9',
          font: {
            size: 12
          }
        },
        grid: {
          display: false
        },
        font: {
          family: 'Poppins', // Set Poppins font for legend
          //size: 14,
          //weight: '500'
        }
      }
    },
    border: {
      display: false, // Hides the border line of the Y-axis
    },
    font: {
        family: 'Poppins', // Set Poppins font for legend
        //size: 14,
        //weight: '500'
    }
  }
}
  
  );

  const ctx1 = document.getElementById('chartDChart').getContext('2d');
    const chartDChart = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Income', 'Outcome', 'Demand', 'Stock'],
            datasets: [{
                label: 'My Dataset',
                data: [41, 10, 20, 20], // Values for Blue, Red, Yellow, and Black
                backgroundColor: ['#28AA93', '#52A2FF', '#FFC226', '#939393'], // Colors for each segment
                borderColor: ['#FFFFFF', '#FFFFFF', '#FFFFFF', '#FFFFFF'], // White border for each segment
                borderWidth: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                // legend: {
                //     position: 'bottom', // Positioning the legend at the bottom
                // },
                legend: {
                  position: 'bottom', // Place the legend on top
                  // align: 'center', // Center-align legend items
                  //maxHeight: 142,
                  labels: {
                    usePointStyle: true, // Use circles as legend indicators
                    boxWidth: 8,
                    boxHeight: 8,
                    font: {
                      size: 12, // Font size for legend
                      family: 'Poppins', // Set Poppins font for legend
                    },
                    padding: 5, // Space between legend indicator and label
                    // generateLabels: function(chart) {
                    //     const originalLabels = Chart.defaults.plugins.legend.labels.generateLabels(chart);
                    //     // Add a right gap (extra space) to each label
                    //     originalLabels.forEach(label => {
                    //         label.text = '  '+ label.text +'       '; // Add space or any character for right padding
                    //     });
                    //     return originalLabels;
                    // }
                  }
                },
                tooltip: {
                    enabled: true, // Show tooltips on hover
                }
            },
            hover: {
                mode: 'nearest',
                intersect: true,
                // onHover: function(event, chartElement) {
                //     const chart = chartDChart;
                //     if (chartElement && chartElement.length) {
                //         // Apply zoom effect on hover
                //         chart.options.animation = {
                //             duration: 300,
                //             easing: 'easeInOutQuad'
                //         };
                //         chart.update();
                //     }
                // }
                // onHover: function(event, chartElement) {
                //     const chart = chartDChart;
                //     if (chartElement && chartElement.length) {
                //         // Get the index of the hovered segment
                //         const index = chartElement[0].index;

                //         // Set hoverRadius to 2x for the hovered segment
                //         chart.data.datasets[0].hoverRadius = 20; // Apply scaling to the hovered segment

                //         // Apply box shadow effect to the hovered segment
                //         chart.data.datasets[0].hoverShadow = '0 0 15px rgba(0, 0, 0, 0.6)'; // Box shadow

                //         // Update the chart with the new hover effects
                //         chart.update();
                //     }
                // }
            },
            animation: {
                animateScale: true, // Animation to scale on hover
                animateRotate: true
            },
            elements: {
                arc: {
                    borderWidth: 2,
                    hoverBorderColor: '#FFFFFF', // Add a border on hover
                    // hoverBackgroundColor: '#e0e0e0',
                    // hoverRadius: 20,
                    hoverOffset: 20,
                    // shadowOffsetX: 0,
                    // shadowOffsetY: 0,
                    // shadowBlur: 15,
                    // shadowColor: 'rgba(0, 0, 0, 0.6)',
                    // hoverShadow : '0 0 15px rgba(0, 0, 0, 0.6)'
                }
            },
            layout: {
                padding: {
                    //top: 20,
                    //bottom: 30 // Add bottom padding to the chart layout to give space for the legend
                }
            }
        }
    });

    const ctx2 = document.getElementById('chartDTraffic').getContext('2d');
    const chartDTraffic = new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: ['Smartphone', 'Desktop', 'Others'], // Main categories
            datasets: [
                {
                    label: 'Opened', // Sub-category 1
                    data: [160, 220, 130], // Values for Smartphone in Opened and Clicked
                    backgroundColor: '#28AA93', // Blue color
                    borderColor: '#28AA93',
                    borderWidth: 0
                },
                {
                    label: 'Clicked', // Sub-category 2
                    data: [180, 120, 150], // Values for Desktop in Opened and Clicked
                    backgroundColor: '#F67F3C', // Orange color
                    borderColor: '#F67F3C',
                    borderWidth: 0
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
              legend: {
                  position: 'top', // Place the legend on top
                  align: 'end', // Center-align legend items
                  //maxHeight: 142,
                  labels: {
                    usePointStyle: true, // Use circles as legend indicators
                    boxWidth: 8,
                    boxHeight: 8,
                    font: {
                      size: 12, // Font size for legend
                      family: 'Poppins', // Set Poppins font for legend
                    },
                    padding: 5, // Space between legend indicator and label
                    // generateLabels: function(chart) {
                    //     const originalLabels = Chart.defaults.plugins.legend.labels.generateLabels(chart);
                    //     // Add a right gap (extra space) to each label
                    //     originalLabels.forEach(label => {
                    //         label.text = '  '+ label.text +'       '; // Add space or any character for right padding
                    //     });
                    //     return originalLabels;
                    // }
                  }
                },
                tooltip: {
                    enabled: true, // Show tooltips on hover
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#C9C9C9', // Set x-axis labels color to red
                    },
                    // border: {
                    //   display: false, // Hides the border line of the Y-axis
                    // },
                    grid: {
                      display: false, // Hides the border line of the Y-axis
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#C9C9C9', // Set x-axis labels color to red
                    },
                    border: {
                      display: false, // Hides the border line of the Y-axis
                    },
                    grid: {
                      display: false, // Hides the border line of the Y-axis
                    }
                }
            },
            elements: {
                bar: {
                    borderRadius: [5, 5, 5], // Top-left and top-right radius (10px)
                }
            },
            layout: {
                padding: {
                    // top: 20,
                    // bottom: 30
                }
            }
        }
    });



    $("#{{ $page['term'] }}_list").DataTable({
        searching: false,
        lengthChange: false,
        language: {
            info: "_START_ - _END_ of _TOTAL_",
            paginate: {
                previous: "<i class='bi bi-chevron-double-left'></i>  Prev",
                next: "Next  <i class='bi bi-chevron-double-right'></i>"
            }
        }
    });
</script>
@endsection