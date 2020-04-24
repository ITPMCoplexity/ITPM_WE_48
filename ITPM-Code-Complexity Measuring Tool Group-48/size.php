
<?php include 'include/header.php'; ?>
<?php include 'include/aside.php'; ?>

<?php

$split = $_SESSION['split_code'];
$trim = $_SESSION['trimmed'];
$file = $_SESSION['filename'];
$row_count = $_SESSION['row_count'];

?>

<div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Content Head -->
						<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
                                    <h3 class="kt-subheader__title">Size Complexity</h3>
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
                               
                                <div class="col-lg-12">
                                <div class="kt-iconbox__desc kt-font-brand">

                                    <center><h1 style="font-family: 'Fira Code'">Cs : <?php echo $total_cs = $_SESSION['total_cs']; ?>


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
                <div class="row">


                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

                      
                            </div>

                            <div class="kt-portlet__body kt-font-dark">
                                <!--begin: Datatable -->
                                <table style="font-family: 'Fira Code'; text-align: center" class="table table-striped- table-bordered table-hover" id="kt_table_1">
                                    <thead>
                                    <tr class="kt-label-bg-color-1" style="font-family: 'Fira Code Medium'">
                                        <th>Line No</th>
                                        <th>Program Statements</th>
                                        <th>Nkw</th>
                                        <th>Nid</th>
                                        <th>Nop</th>
                                        <th>Nnv</th>
                                        <th>Nsl</th>
                                        <th style="color: white" class="kt-label-bg-color-2">Cs</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $i = 0; //increment to each loop
                                    $count = 0;
                                    $total_cs = 0;

                                    $Nkw = 0;
                                    $Nid = 0;
                                    $Nop = 0;
                                    $Nnv = 0;
                                    $Nsl = 0;
                                    $Cs = 0;

                                    //Default Weights
                                    $weight_keyword = 1;
                                    $weight_identifier = 1;
                                    $weight_operator = 1;
                                    $weight_numerical = 1;
                                    $weight_string = 1;

                                    if (!$split==''){

                                    foreach($split AS $val) { // Traverse the array with FOREACH

                                        $val;

                                    // -------- Weight due to Keywords - Begin --------

                                    $keywords = ['abstract', 'assert', 'break', 'catch', 'class', 'const', 'continue', 'default', 'do', 'else', 'enum', 'extends', 'final', 'finally', 'goto', 'implements', 'import', 'instanceof', 'interface', 'native', 'new', 'package', 'private', 'protected', 'public', 'return', 'static', 'strictfp', 'super', 'synchronized', 'this', 'throw', 'throws', 'transient', 'try', 'void', 'volatile'];

                                    foreach($keywords as $word) {

                                        if (preg_match('/\babstract\b/', $val) !== false ){

                                            $abstract_count = preg_match_all('/\babstract\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bassert\b/', $val) !== false ){

                                            $assert_count = preg_match_all('/\bassert\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bbreak\b/', $val) !== false ){

                                            $break_count = preg_match_all('/\bbreak\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bcatch\b/', $val) !== false ){

                                            $catch_count = preg_match_all('/\bcatch\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bclass\b/', $val) !== false ){

                                            $class_count = preg_match_all('/\bclass\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bconst\b/', $val) !== false ){

                                            $const_count = preg_match_all('/\bconst\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bcontinue\b/', $val) !== false ){

                                            $continue_count = preg_match_all('/\bcontinue\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bdefault\b/', $val) !== false ){

                                            $default_count = preg_match_all('/\bdefault\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bdo\b/', $val) !== false ){

                                            $do_count = preg_match_all('/\bdo\b/',$val,$counter);

                                        }

                                        if (preg_match('/\belse\b/', $val) !== false ){

                                            $else_count = preg_match_all('/\belse\b/',$val,$counter);

                                        }

                                        if (preg_match('/\benum\b/', $val) !== false ){

                                            $enum_count = preg_match_all('/\benum\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bextends\b/', $val) !== false ){

                                            $extends_count = preg_match_all('/\bextends\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bfinal\b/', $val) !== false ){

                                            $final_count = preg_match_all('/\bfinal\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bfinally\b/', $val) !== false ){

                                            $finally_count = preg_match_all('/\bfinally\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bgoto\b/', $val) !== false ){

                                            $goto_count = preg_match_all('/\bgoto\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bimplements\b/', $val) !== false ){

                                            $implements_count = preg_match_all('/\bimplements\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bimport\b/', $val) !== false ){

                                            $import_count = preg_match_all('/\bimport\b/',$val,$counter);

                                        }

                                        if (preg_match('/\binstanceof\b/', $val) !== false ){

                                            $instanceof_count = preg_match_all('/\binstanceof\b/',$val,$counter);

                                        }

                                        if (preg_match('/\binterface\b/', $val) !== false ){

                                            $interface_count = preg_match_all('/\binterface\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bnative\b/', $val) !== false ){

                                            $native_count = preg_match_all('/\bnative\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bnew\b/', $val) !== false ){

                                            $new_count = preg_match_all('/\bnew\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bpackage\b/', $val) !== false ){

                                            $package_count = preg_match_all('/\bpackage\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bprivate\b/', $val) !== false ){

                                            $private_count = preg_match_all('/\bprivate\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bprotected\b/', $val) !== false ){

                                            $protected_count = preg_match_all('/\bprotected\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bpublic\b/', $val) !== false ){

                                            $public_count = preg_match_all('/\bpublic\b/',$val,$counter);

                                        }

                                        if (preg_match('/\breturn\b/', $val) !== false ){

                                            $return_count = preg_match_all('/\breturn\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bstatic\b/', $val) !== false ){

                                            $static_count = preg_match_all('/\bstatic\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bstrictfp\b/', $val) !== false ){

                                            $strictfp_count = preg_match_all('/\bstrictfp\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bsuper\b/', $val) !== false ){

                                            $super_count = preg_match_all('/\bsuper\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bsynchronized\b/', $val) !== false ){

                                            $synchronized_count = preg_match_all('/\bsynchronized\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bthis\b/', $val) !== false ){

                                            $this_count = preg_match_all('/\bthis\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bthrow\b/', $val) !== false ){

                                            $throw_count = preg_match_all('/\bthrow\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bthrows\b/', $val) !== false ){

                                            $throws_count = preg_match_all('/\bthrows\b/',$val,$counter);

                                        }

                                        if (preg_match('/\btransient\b/', $val) !== false ){

                                            $transient_count = preg_match_all('/\btransient\b/',$val,$counter);

                                        }

                                        if (preg_match('/\btry\b/', $val) !== false ){

                                            $try_count = preg_match_all('/\btry\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bvoid\b/', $val) !== false ){

                                            $void_count = preg_match_all('/\bvoid\b/',$val,$counter);

                                        }

                                        if (preg_match('/\bvolatile\b/', $val) !== false ){

                                            $volatile_count = preg_match_all('/\bvolatile\b/',$val,$counter);

                                        }

                                    }

                                    $Nkw = ( $abstract_count + $assert_count + $break_count + $catch_count + $class_count + $const_count + $continue_count + $default_count + $do_count + $else_count + $enum_count + $extends_count + $final_count + $finally_count + $goto_count + $implements_count + $import_count + $instanceof_count + $interface_count + $native_count + $new_count + $package_count + $private_count + $protected_count + $public_count + $return_count + $static_count + $strictfp_count + $super_count + $synchronized_count + $this_count + $throw_count + $throws_count + $transient_count + $try_count + $void_count + $volatile_count ) * $weight_keyword;

                                    // -------- Weight due to Keywords - End --------


                                    // -------- Weight due to Identifiers - Begin --------

                                    $identifiers_count_total = 0;

                                    for($x = 0; $x <= $row_count; $x++){

                                        if (preg_match('/class\s*(\w+)/', $val) !== false ){

                                            $count_class = preg_match_all('/class\s*(\w+)/',$val,$counter);

                                        }

                                        if (preg_match('/(?:(?:public|private|protected|static|final|native|synchronized|abstract|transient)+\s+)+[$_\w<>\[\]\s]*\s+[\$_\w]+\([^\)]*\)?\s*\{?[^\}]*\}?/', $val) !== false ){

                                            $count_methods = preg_match_all('/(?:(?:public|private|protected|static|final|native|synchronized|abstract|transient)+\s+)+[$_\w<>\[\]\s]*\s+[\$_\w]+\([^\)]*\)?\s*\{?[^\}]*\}?/',$val,$counter);

                                        }

                                        if (preg_match('/= new (.*?)\((.*?)\);|=new (.*?)\((.*?)\);/', $val) !== false ){

                                            $count_objects = preg_match_all('/= new (.*?)\((.*?)\);|=new (.*?)\((.*?)\);/',$val,$counter);

                                        }

                                        if (preg_match('/= new|=new/', $val) !== false ){

                                            $count_variables = preg_match_all('/= new|=new/',$val,$counter);

                                        }

                                        if (preg_match('/= new|=new/', $val) !== false ){

                                            $count_arguments = preg_match_all('/= new|=new/',$val,$counter);

                                        }

                                        if (preg_match('/= new|=new/', $val) !== false ){

                                            $count_data_structures = preg_match_all('/= new|=new/',$val,$counter);

                                        }


                                        $identifiers_count_total = $count_class + $count_objects + $count_methods;

                                        $Nid = $identifiers_count_total * $weight_identifier;

                                    }

                                    // -------- Weight due to Identifiers - End --------


                                    // -------- Weight due to Operators - Begin --------

                                    //$operators = array('+', '-', '*', '/', '%', '++', '--', '==', '!=', '>', '<', '>=', '<=', '&&', '||', '!', '|', '^', '~', '<<', '>>', '>>>', '<<<', ',', '->', '.', '::', '+=', '-=', '*=', '/=', '=', '>>>=', '|=', '&=', '%=', '<<=', '>>=', '^=');

                                    $operators = array('+', '-', '*', '/', '%', '=', '>', '<', '&&', '!', '|', '^', '~', ',', '.', '::' );

                                    foreach($operators as $word) {

                                        if (preg_match('/(\<\=)+|(\=\>)+|(\=\<)+|(\>\=)+|(\+)+|(\-)+|(\=)+|(\*)+|(\/)+|(\%)+|(\>)+|(\>)+|(\<)+|(\&\&)+|(\!)+|(\|)+|(\^)+|(\~)+|(\,)+|(\.)+|(\:\:)+/', $val) !== false ){

                                            $op_count = preg_match_all('/(\<\=)+|(\=\>)+|(\=\<)+|(\>\=)+|(\+)+|(\-)+|(\=)+|(\*)+|(\/)+|(\%)+|(\>)+|(\>)+|(\<)+|(\&\&)+|(\!)+|(\|)+|(\^)+|(\~)+|(\,)+|(\.)+|(\:\:)+/',$val,$counter);

                                        }

                                        $Nop = $op_count * $weight_operator;

                                    }

                                    // -------- Weight due to Operators - End --------


                                    // -------- Weight due to Numerical Values - Begin --------

                                    $numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                                    $numbers_count_total = 0;

                                    foreach($numbers as $word) {

                                        if (preg_match('/(\d)+/', $val) !== false ){

                                            $numbers_count_total = preg_match_all('/(\d)+/',$val,$counter);

                                        }

                                        $Nnv = $numbers_count_total * $weight_numerical;

                                    }

                                    // -------- Weight due to Numerical Values - End --------


                                    // -------- Weight due to String Literals - Begin --------

                                    $strings_count_total = 0;

                                    for($x = 0; $x <= $row_count; $x++){

                                        if (preg_match('/"(.*?)"/', $val) !== false ){

                                            $strings_count_total = preg_match_all('/"(.*?)"/',$val,$counter);

                                        }

                                        $Nsl = $strings_count_total * $weight_string;

                                    }

                                    // -------- Weight due to String Literals - End --------
                                    $Cs = $Nkw + $Nid + $Nop + $Nnv + $Nsl;

                                    $total_cs += $Cs;

                                    ?>

                                    <tr>
                                        <td><?php echo ++$count; ?></td>
                                        <td style="text-align: left"><?php echo $val;?></td>
                                        <td><?php echo $Nkw; ?></td>
                                        <td><?php echo $Nid; ?></td>
                                        <td><?php echo $Nop; ?></td>
                                        <td><?php echo $Nnv; ?></td>
                                        <td><?php echo $Nsl; ?></td>
                                        <td><?php echo $Cs; ?></td>
                                        <?php

                                        $i++;

                                        $_SESSION['total_cs'] = $total_cs;

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

                            <a href="total_weight.php"> <button type="button" href="total_weight.php" class="btn btn-brand"><span><i class="flaticon-home"></i></span> Total Complexity of the Program</button></a>
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
