<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=methods.php?reload=1">';
}

?>

<?php include 'include/header.php'; ?>
<?php include 'include/aside.php'; ?>

<?php $split = $_SESSION['split_code']; ?>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Content Head -->
						<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
                                    <h3 class="kt-subheader__title">Methods Complexity</h3>
									<span class="kt-subheader__separator kt-subheader__separator--v"></span>
									
									
									<div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
										<input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
										<span class="kt-input-icon__icon kt-input-icon__icon--right">
											<span><i class="flaticon2-search-1"></i></span>
										</span>
									</div>
								</div>
								<div class="kt-subheader__toolbar">
									
										

										
								
								</div>
							</div>
						</div>

						<!-- end:: Content Head -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
							<!--Begin::Dashboard 3-->
<!--Begin::Row-->
<div class="row">






   <!--begin::Portlet-->
    <div style="background-color: #F4F7FF;" class="kt-portlet kt-portlet--skin-solid kt-portlet--">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
												
                
            </div>

        </div>
        <div class="kt-portlet__body kt-font-brand">


            <div class="row">

                <div class="col-lg-12">
                    
                        <div class="kt-portlet__body">
                            <div class="kt-iconbox__body">
                                <div class="kt-iconbox__icon">
                                     </div>
                                <div class="col-lg-12">
                                <div class="kt-iconbox__desc kt-font-brand">

                                    <center><h1 style="font-family: 'Fira Code'">Cm : <?php echo $total_Cm = $_SESSION['total_Cm']; ?>
                                        </h1></center>


                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



        </div>

        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row"

                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

                        <div class="kt-portlet kt-portlet--mobile">
                            <div class="kt-portlet__head kt-portlet__head--lg">
                                <div class="kt-portlet__head-label">
										
                                    <h3 class="kt-portlet__head-title kt-font-brand">
                                        Complexity of the Program due to the Methods : </h3>&nbsp;
                                    <h3 class="kt-portlet__head-title kt-font-dark"><?php $file = $_SESSION['filename'];
                                        echo $file; ?>
                                    </h3>
                                </div>
                               
                            </div>

                            <div class="kt-portlet__body kt-font-dark">
                                <!--begin: Datatable -->
                                <table style="font-family: 'Fira Code'; text-align: center" class="table table-striped- table-bordered table-hover" id="kt_table_1">
                                    <thead>
                                    <tr class="kt-label-bg-color-1" style="font-family: 'Fira Code Medium'">
                                        <th>Line No</th>
                                        <th>Program Statements</th>
                                        <th>Wmrt</th>
                                        <th>Npdtp</th>
                                        <th>Ncdtp</th>
                                        <th style="color: white" class="kt-label-bg-color-2">Cm</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    $i = 0; //increment to each loop
                                    $count = 0;
                                    $total_Cm = 0;


                                    //Default Weights
                                    $weight_primitive_retuntype = 1;
                                    $weight_composite_returntype = 2;
                                    $weight_void_returntype = 0;
                                    $weight_primitive_datatype_parameter = 1;
                                    $weight_composite_datatype_parameter = 2;

                                    if (!$split==""){
                                    foreach($split AS $val) { // Traverse the array with FOREACH

                                    $val;

                                    $Wmrt = null;
                                    $Npdtp = null;
                                    $Ncdtp = null;
                                    $NpdtpBefore = null;
                                    $NcdtpBefore = null;
                                    $Cm = null;

                                   

                                    // -------- Weight due to return type - End --------

                                    $Cm = $Wmrt + ($NpdtpBefore * $weight_primitive_datatype_parameter) + ($Ncdtp * $weight_composite_datatype_parameter);


                                    $total_Cm += $Cm;
                                    if ($NcdtpBefore == 1){

                                        $Cm = $NcdtpBefore * $weight_composite_datatype_parameter;
                                        $total_Cm += $Cm;
                                    }

                                    if (preg_match_all('/protected \w+ \w+\(.*?\) \{|private \w+ \w+\(.*?\) \{| public \w+ \w+\(.*?\) \{|public static void main\(String.*?\) {/', $val, $counter) == 0){

                                        $Cm = null;

                                    }



                                    ?>

                                    <tr>
                                        <td><?php echo ++$count; ?></td>
                                        <td style="text-align: left"><?php echo $val;?></td>
                                        <td <?php if ($Wmrt > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Wmrt; ?></td>
                                        <td <?php if ($NpdtpBefore > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $NpdtpBefore; ?></td>
                                        <td <?php if ($NcdtpBefore > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $NcdtpBefore; ?></td>
                                        <td <?php if ($Cm > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Cm; ?></td>
                                        <?php

                                        $i++;

                                        $_SESSION['total_Cm'] = $total_Cm;

                                        }

                                        }
                                        ?>
                                    </tr>


                                    </tbody>

                                </table>

                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>

                    <!-- end:: Content -->








                </div></div></div>

                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">



                    <div class="col-lg-12 ml-lg-auto">
                        <center>

                            <a href="total_weight.php"><button type="button" href="total_weight.php" class="btn btn-brand"><span><i class="flaticon-home"></i></span> Total Complexity of the Program</button></a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    <!--end::Portlet-->





</div>


                            <!--End::Row-->

							<!--End::Dashboard 3-->
						</div>
						<!-- end:: Content -->
					</div>


<?php include 'include/footer.php'; ?>
