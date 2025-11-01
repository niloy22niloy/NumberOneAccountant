@extends('admin.dashboard')

@section('content')
<style>
    /* Custom Styles for Dashboard Cards */
    .metric-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        border: none;
        cursor: default;
    }

    .metric-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .icon-container {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }

    .text-indigo-600 { background-color: #4f46e5; }
    .text-green-600 { background-color: #10b981; }
    .text-red-600 { background-color: #ef4444; }
    .text-yellow-600 { background-color: #f59e0b; }
    .text-cyan-600 { background-color: #06b6d4; }
    .text-gray-500 { background-color: #6b7280; }

    .card-title-text {
        font-size: 0.9rem;
        font-weight: 500;
        letter-spacing: 0.5px;
        color: #6b7280;
        text-transform: uppercase;
    }

    .card-value-text {
        font-size: 1.8rem;
        font-weight: 700;
        color: #1f2937;
    }

    /* Clock Styles */
    .dashboard-clock {
        font-size: 1rem;
        font-weight: 500;
        color: #4f46e5;
        text-align: right;
        margin-bottom: 15px;
    }
</style>

<div class="container-fluid mt-4">
    <div class="dashboard-clock" id="dashboardClock"></div> <!-- Clock -->

    <h2 class="mb-4 text-dark fw-bold">Dashboard Metrics</h2>
    <div class="row g-4">

        <!-- Total Users -->
        <div class="col-xl-3 col-md-6">
            <div class="card metric-card">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div class="flex-grow-1">
                        <h6 class="card-title-text mb-1">Total Users</h6>
                        <h4 class="card-value-text mb-0">{{ $totalUsers }}</h4>
                    </div>
                    <div class="icon-container text-indigo-600">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Successful Transactions -->
        <div class="col-xl-3 col-md-6">
            <div class="card metric-card">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div class="flex-grow-1">
                        <h6 class="card-title-text mb-1">Successful Transactions</h6>
                        <h4 class="card-value-text mb-0">${{ number_format($totalSuccessfullTransactionAmount, 2) }}</h4>
                    </div>
                    <div class="icon-container text-green-600">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Failed Transactions -->
        <div class="col-xl-3 col-md-6">
            <div class="card metric-card">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div class="flex-grow-1">
                        <h6 class="card-title-text mb-1">Failed Transactions</h6>
                        <h4 class="card-value-text mb-0">${{ number_format($totalFailedTransactionAmount, 2) }}</h4>
                    </div>
                    <div class="icon-container text-red-600">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Subscribers -->
        <div class="col-xl-3 col-md-6">
            <div class="card metric-card">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div class="flex-grow-1">
                        <h6 class="card-title-text mb-1">Subscribers</h6>
                        <h4 class="card-value-text mb-0">{{ $totalSubscribers }}</h4>
                    </div>
                    <div class="icon-container text-yellow-600">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Packages -->
        <div class="col-xl-3 col-md-6">
            <div class="card metric-card">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div class="flex-grow-1">
                        <h6 class="card-title-text mb-1">Active Packages</h6>
                        <h4 class="card-value-text mb-0">{{ $totalActivePackages }}</h4>
                    </div>
                    <div class="icon-container text-cyan-600">
                        <i class="fas fa-layer-group"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inactive Packages -->
        <div class="col-xl-3 col-md-6">
            <div class="card metric-card">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div class="flex-grow-1">
                        <h6 class="card-title-text mb-1">Inactive Packages</h6>
                        <h4 class="card-value-text mb-0">{{ $totalInactivePackages }}</h4>
                    </div>
                    <div class="icon-container text-gray-500">
                        <i class="fas fa-archive"></i>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End of cards row -->

    <!-- Income Chart -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card metric-card">
                <div class="card-body">
                    <h6 class="text-muted mb-3">Income in Last 7 Days</h6>
                    <div id="incomeBarChart" style="height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include ECharts -->
<script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
<script>
    // Clock Script
    function updateClock() {
        const now = new Date();
        const options = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
        document.getElementById('dashboardClock').textContent = now.toLocaleTimeString([], options);
    }
    setInterval(updateClock, 1000);
    updateClock(); // initial call

    // ECharts
    var chartDom = document.getElementById('incomeBarChart');
    var myChart = echarts.init(chartDom);

    var option = {
        title: {
            text: 'Daily Income (Last 7 Days)',
            left: 'center',
            textStyle: { fontSize: 16, fontWeight: 'normal', color: '#333' }
        },
        tooltip: {
            trigger: 'axis',
            formatter: function (params) {
                return params[0].axisValue + '<br/>Income: $' + params[0].data;
            }
        },
        xAxis: {
            type: 'category',
            data: @json($chartDates),
            axisLabel: {
                formatter: function(value) {
                    return new Date(value).toLocaleDateString();
                }
            }
        },
        yAxis: {
            type: 'value',
            axisLabel: { formatter: '${value}' },
            name: 'Amount ($)',
            nameLocation: 'middle',
            nameRotate: 90,
            nameGap: 50
        },
        series: [{
            name: 'Income',
            type: 'bar',
            data: @json($chartIncome),
            itemStyle: { color: '#4CAF50' },
            label: { show: true, position: 'top', formatter: '${@value}' }
        }]
    };

    myChart.setOption(option);
</script>
@endsection
