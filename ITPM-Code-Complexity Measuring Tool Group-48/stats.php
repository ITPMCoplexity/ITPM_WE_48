<?php include 'include/header.php'; ?>
<?php include 'include/aside.php'; ?>

<script type="text/javascript" src="assets/js/chart/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/chart/Chart.min.js"></script>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Statistics</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>


                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                    <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
											<span><i class="flaticon2-search-1"></i></span>
										</span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">


                <a href="index.php" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10">
                    Add New
                </a>

            </div>
        </div>
    </div>

    <!-- end:: Content Head -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


        <!--Begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label"><span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                            <h3 class="kt-portlet__head-title">
                                Complexities of the Previously Uploaded Files
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--begin::Form-->
                        <div class="form-group row">

                            <div class="col-lg-12 col-md-9 col-sm-12">


                                <div id="chart-container">
                                    <canvas id="graphCanvas"></canvas>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">


                        <!-- begin:: Content -->
                        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

                            <div class="kt-portlet kt-portlet--mobile">
                                <div class="kt-portlet__head kt-portlet__head--lg">
                                    <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                                <h3 class="kt-portlet__head-title">
                                    Previously Uploaded Files
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="kt-portlet__head-actions">
                                        <div class="dropdown dropdown-inline">
                                            <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="la la-download"></i> Export
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__section kt-nav__section--first">
                                                        <span class="kt-nav__section-text">Choose an option</span>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a onclick="window.print()"
                                                           class="kt-nav__link">
                                                            <i class="kt-nav__link-icon la la-print"></i>
                                                            <span class="kt-nav__link-text">Print</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a onclick="generate()"
                                                           class="kt-nav__link">
                                                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                            <span class="kt-nav__link-text">PDF</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">

                            <div class="kt-portlet kt-iconbox kt-iconbox--success kt-iconbox--animate-slow">
                                <div class="kt-portlet__body">
                                    <div class="kt-iconbox__body">
                                        <div class="kt-iconbox__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                          fill="#000000" opacity="0.3"/>
                                                    <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z"
                                                          fill="#000000"/>
                                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                          fill="#000000"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="kt-iconbox__desc kt-font-success">


                                                <center><h3 style="font-family: 'Fira Code'">Average Complexity of All Previously Uploaded Programs
                                                    </h3>
                                                    <h1 style="font-family: 'Fira Code'"><?php




                                                        $avgstat = "SELECT AVG(statComplexity) FROM statistics;";
                                                        $avgstat_query = mysqli_query($con, $avgstat);


                                                        while ($avg_stat = mysqli_fetch_assoc($avgstat_query)) {
                                                        $avg_complexity = $avg_stat['AVG(statComplexity)'];

                                                 echo $avg_complexity;
                                                        }


                                                        ?></h1>
                                                </center>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--begin: Datatable -->
                            <table style="text-align: center" class="table table-striped- table-bordered table-hover table-checkable"
                                   id="kt_table_1">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>File Name</th>
                                    <th>Total Complexity</th>
                                </tr>
                                </thead>
                                <tbody>

<?php

                                $stats2 = "SELECT * FROM statistics";
                                $run_query_sta = mysqli_query($con, $stats2);

                                $i=1;

                                while ($lastrow = mysqli_fetch_assoc($run_query_sta)) {
                                $stafilename = $lastrow['statFilename'];
                                $stacomplexity = $lastrow['statComplexity'];
?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $stafilename; ?></td>
                                    <td><?php echo $stacomplexity; ?></td>

                                </tr>

                                <?php $i++; } ?>
                                </tbody>
                            </table>

                            <!--end: Datatable -->
                        </div>
                    </div>
                        </div>
                </div>
            </div>
                </div></div>
        </div>
    </div>
    <!-- end:: Content -->
</div>

<script>
    $(document).ready(function () {
        showGraph();
    });


    function showGraph() {
        {
            $.post("include/data.php",
                function (data) {
                    console.log(data);
                    var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].statFilename);
                        marks.push(data[i].statComplexity);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Complexities of the Uploaded Files',
                                backgroundColor: '#007bff',
                                borderColor: '#007bff',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
        }
    }
</script>

<?php include 'include/footer.php'; ?>
