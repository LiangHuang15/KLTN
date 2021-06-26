<?php include("slider.php");?>

<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Thống kê theo người dùng</h3>
                            <p class="text-subtitle text-muted">Biểu đồ thống kê </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thống kê theo người dùng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Line Area Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="area"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Radial Gradient Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="radialGradient"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Line Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="line"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Bar Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Radial Gradient Chart</h4>
                                </div>
                                <div class="card-body">
                                    <div id="candle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <script src="assets/vendors/dayjs/dayjs.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/ui-apexchart.js"></script>

<?php include("footer.php");?>