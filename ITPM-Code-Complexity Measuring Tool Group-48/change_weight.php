<?php include 'include/header.php'; ?>
<?php include 'include/aside.php'; ?>


<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Content Head -->
						<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Change Default Weights</h3>
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
							<!--Begin::Dashboard 3-->
<!--Begin::Row-->
<div class="row">

    <div class="col-lg-7">



    <!--begin::Portlet-->
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_portlet_base_demo_3_3_tab_content" role="tab">
                            Size
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_4_tab_content" role="tab">
                            Variables
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_5_tab_content" role="tab">
                            Methods
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_6_tab_content" role="tab">
                            Inheritance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_7_tab_content" role="tab">
                            Coupling
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_8_tab_content" role="tab">
                            Control Structures
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="kt-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="kt_portlet_base_demo_3_3_tab_content" role="tabpanel">

                    <!-- Start of Size -->

                    <?php

                    $lastRow = "SELECT * FROM size ORDER BY SizeID DESC LIMIT 1";
                    $run_query_last = mysqli_query($con,$lastRow);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                    $SizeID_last = $lastrow['SizeID'];
                    $Keyword_last = $lastrow['Keyword'];
                    $Identifier_last = $lastrow['Identifier'];
                    $Operator_last = $lastrow['Operator'];
                    $NumericalValue_last = $lastrow['NumericalValue'];
                    $StringLiteral_last = $lastrow['StringLiteral'];

                    ?>
                    <h5 class="kt-font-brand">Weights related to the Size factor</h5>
                    <hr>



                    <!--begin::Form-->
                        <div class="col-lg-12">
                    <form action="" method="post" class="kt-form">
                        <div class="kt-portlet__body">


                            <div class="form-group row">
                                <label class="col-4 col-form-label">Keyword</label>
                                <div class="col-5">
                                <input value="<?php echo $Keyword_last; ?>" style="text-align: center" id="Keyword" name="Keyword" type="number" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label">Identifier</label>
                                <div class="col-5">
                                <input value="<?php echo $Identifier_last; ?>" style="text-align: center" id="Identifier" name="Identifier" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Operator</label>
                                <div class="col-5">
                                <input value="<?php echo $Operator_last; ?>" style="text-align: center" id="Operator" name="Operator" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Numerical Value</label>
                                <div class="col-5">
                                <input value="<?php echo $NumericalValue_last; ?>" style="text-align: center" id="NumericalValue" name="NumericalValue" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">String Literal</label>
                                <div class="col-5">
                                <input value="<?php echo $StringLiteral_last; ?>" style="text-align: center" id="StringLiteral" name="StringLiteral" type="number" class="form-control">
                                </div>
                            </div>



                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" name="submitSize" id="submitSize" class="btn btn-brand">Save</button>
                                <button type="submit" name="resetSize" id="resetSize" class="btn btn-secondary">Reset to Defaults</button>
                            </div>
                        </div>
                    </form>
                        </div>
                    <!--end::Form-->

                </div>
                <?php } ?>
                <?php

                if(isset($_POST['resetSize'])){

                    $resetWeights= "DELETE FROM size WHERE SizeID NOT IN ( SELECT * FROM ( SELECT SizeID FROM size ORDER BY SizeID LIMIT 1) s)";
                    mysqli_query($con,$resetWeights);
                    echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                } ?>

                <?php

                if(isset($_POST['submitSize'])){


                    $Keyword=$_POST['Keyword'];
                    $Identifier=$_POST['Identifier'];
                    $Operator=$_POST['Operator'];
                    $NumericalValue=$_POST['NumericalValue'];
                    $StringLiteral=$_POST['StringLiteral'];

                    $query = "INSERT INTO size(Keyword,Identifier,Operator,NumericalValue,StringLiteral) VALUES('$Keyword','$Identifier','$Operator','$NumericalValue','$StringLiteral')";

                    $create_query = mysqli_query($con, $query);

                    if ( $create_query ) {
                        echo " <div class='alert alert-solid-success alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Successfully Saved.</div>";
                        echo " </div>";
                        echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                    }else{
                        echo " <div class='alert alert-solid-danger alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Something went wrong.</div>";
                        echo " </div>";
                    }



                }


                ?>
                <!-- End of Size -->






                <!-- Start of Variables -->

                <div class="tab-pane" id="kt_portlet_base_demo_3_4_tab_content" role="tabpanel">
                    <?php

                    $lastRow = "SELECT * FROM variables ORDER BY VariableID DESC LIMIT 1";
                    $run_query_last = mysqli_query($con,$lastRow);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                    $VariableID_last = $lastrow['VariableID'];
                    $GlobalVariable_last = $lastrow['GlobalVariable'];
                    $LocalVariable_last = $lastrow['LocalVariable'];
                    $PrimitiveVariable_last = $lastrow['PrimitiveVariable'];
                    $CompositeVariable_last = $lastrow['CompositeVariable'];


                    ?>
                    <h5 class="kt-font-brand">Weights related to the Variable factor</h5>
                    <hr>

                    <!--begin::Form-->
                    <div class="col-lg-12">
                        <form action="" method="post" class="kt-form">
                            <div class="kt-portlet__body">


                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Global Variable</label>
                                    <div class="col-5">
                                        <input value="<?php echo $GlobalVariable_last; ?>" style="text-align: center" id="GlobalVariable" name="GlobalVariable" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Local Variable</label>
                                    <div class="col-5">
                                        <input value="<?php echo $LocalVariable_last; ?>" style="text-align: center" id="LocalVariable" name="LocalVariable" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Primitive Variable</label>
                                    <div class="col-5">
                                        <input value="<?php echo $PrimitiveVariable_last; ?>" style="text-align: center" id="PrimitiveVariable" name="PrimitiveVariable" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Composite Variable</label>
                                    <div class="col-5">
                                        <input value="<?php echo $CompositeVariable_last; ?>" style="text-align: center" id="CompositeVariable" name="CompositeVariable" type="number" class="form-control">
                                    </div>
                                </div>



                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <button type="submit" name="submitVariable" id="submitVariable" class="btn btn-brand">Save</button>
                                    <button type="submit" name="resetVariable" id="resetVariable" class="btn btn-secondary">Reset to Defaults</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end::Form-->

                </div>
            <?php } ?>
                <?php

                if(isset($_POST['resetVariable'])){

                    $resetWeights= "DELETE FROM variables WHERE VariableID NOT IN ( SELECT * FROM ( SELECT VariableID FROM variables ORDER BY VariableID LIMIT 1) s)";
                    mysqli_query($con,$resetWeights);
                    echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                } ?>

                <?php

                if(isset($_POST['submitVariable'])){


                    $GlobalVariable=$_POST['GlobalVariable'];
                    $LocalVariable=$_POST['LocalVariable'];
                    $PrimitiveVariable=$_POST['PrimitiveVariable'];
                    $CompositeVariable=$_POST['CompositeVariable'];

                    $query = "INSERT INTO variables(GlobalVariable,LocalVariable,PrimitiveVariable,CompositeVariable) VALUES('$GlobalVariable','$LocalVariable','$PrimitiveVariable','$CompositeVariable')";

                    $create_query = mysqli_query($con, $query);

                    if ( $create_query ) {
                        echo " <div class='alert alert-solid-success alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Successfully Saved.</div>";
                        echo " </div>";
                        echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                    }else{
                        echo " <div class='alert alert-solid-danger alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Something went wrong.</div>";
                        echo " </div>";
                    }



                }


                ?>
                <!-- End of Variables -->




                <!-- Start of Methods -->
                <div class="tab-pane" id="kt_portlet_base_demo_3_5_tab_content" role="tabpanel">


                    <?php

                    $lastRow = "SELECT * FROM methods ORDER BY 	MethodID DESC LIMIT 1";
                    $run_query_last = mysqli_query($con,$lastRow);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                    $MethodID_last = $lastrow['MethodID'];
                    $PrimitiveReturnType_last = $lastrow['PrimitiveReturnType'];
                    $CompositeReturnType_last = $lastrow['CompositeReturnType'];
                    $VoidReturnType_last = $lastrow['VoidReturnType'];
                    $PrimitiveParameter_last = $lastrow['PrimitiveParameter'];
                    $CompositeParameter_last = $lastrow['CompositeParameter'];

                    ?>
                    <h5 class="kt-font-brand">Weights related to the Methods factor</h5>
                    <hr>



                    <!--begin::Form-->
                    <div class="col-lg-12">
                        <form action="" method="post" class="kt-form">
                            <div class="kt-portlet__body">


                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Method with a primitive return type </label>
                                    <div class="col-5">
                                        <input value="<?php echo $PrimitiveReturnType_last; ?>" style="text-align: center" id="PrimitiveReturnType" name="PrimitiveReturnType" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Method with a composite return type</label>
                                    <div class="col-5">
                                        <input value="<?php echo $CompositeReturnType_last; ?>" style="text-align: center" id="CompositeReturnType" name="CompositeReturnType" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Method with a void return type</label>
                                    <div class="col-5">
                                        <input value="<?php echo $VoidReturnType_last; ?>" style="text-align: center" id="VoidReturnType" name="VoidReturnType" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Primitive data type parameter</label>
                                    <div class="col-5">
                                        <input value="<?php echo $PrimitiveParameter_last; ?>" style="text-align: center" id="PrimitiveParameter" name="PrimitiveParameter" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Composite data type parameter</label>
                                    <div class="col-5">
                                        <input value="<?php echo $CompositeParameter_last; ?>" style="text-align: center" id="CompositeParameter" name="CompositeParameter" type="number" class="form-control">
                                    </div>
                                </div>



                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <button type="submit" name="submitMethod" id="submitMethod" class="btn btn-brand">Save</button>
                                    <button type="submit" name="resetMethod" id="resetMethod" class="btn btn-secondary">Reset to Defaults</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end::Form-->

                </div>
            <?php } ?>
                <?php

                if(isset($_POST['resetMethod'])){

                    $resetWeights= "DELETE FROM  methods WHERE MethodID NOT IN ( SELECT * FROM ( SELECT MethodID FROM methods ORDER BY MethodID LIMIT 1) s)";
                    mysqli_query($con,$resetWeights);
                    echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                } ?>

                <?php

                if(isset($_POST['submitMethod'])){


                    $PrimitiveReturnType=$_POST['PrimitiveReturnType'];
                    $CompositeReturnType=$_POST['CompositeReturnType'];
                    $VoidReturnType=$_POST['VoidReturnType'];
                    $PrimitiveParameter=$_POST['PrimitiveParameter'];
                    $CompositeParameter=$_POST['CompositeParameter'];

                    $query = "INSERT INTO methods(PrimitiveReturnType,CompositeReturnType,VoidReturnType,PrimitiveParameter,CompositeParameter) VALUES('$PrimitiveReturnType','$CompositeReturnType','$VoidReturnType','$PrimitiveParameter','$CompositeParameter')";

                    $create_query = mysqli_query($con, $query);

                    if ( $create_query ) {
                        echo " <div class='alert alert-solid-success alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Successfully Saved.</div>";
                        echo " </div>";
                        echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                    }else{
                        echo " <div class='alert alert-solid-danger alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Something went wrong.</div>";
                        echo " </div>";
                    }



                }


                ?>

                <!-- End of Methods -->





                <!-- Start of Inheritance -->
                <div class="tab-pane" id="kt_portlet_base_demo_3_6_tab_content" role="tabpanel">


                    <?php

                    $lastRow = "SELECT * FROM inheritance ORDER BY InheritanceID DESC LIMIT 1";
                    $run_query_last = mysqli_query($con,$lastRow);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                    $InheritanceID_last = $lastrow['InheritanceID'];
                    $NoInheritance_last = $lastrow['NoInheritance'];
                    $OneUserDefined_last = $lastrow['One'];
                    $TwoUserDefined_last = $lastrow['Two'];
                    $ThreeUserDefined_last = $lastrow['Three'];
                    $MoreUserDefined_last = $lastrow['MoreThree'];

                    ?>
                    <h5 class="kt-font-brand">Weights related to the Inheritance factor</h5>
                    <hr>



                    <!--begin::Form-->
                    <div class="col-lg-12">
                        <form action="" method="post" class="kt-form">
                            <div class="kt-portlet__body">


                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A class with no inheritance (direct or indirect)</label>
                                    <div class="col-5">
                                        <input value="<?php echo $NoInheritance_last; ?>" style="text-align: center" id="NoInheritance" name="NoInheritance" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A class inheriting (directly or indirectly) from one user-defined class </label>
                                    <div class="col-5">
                                        <input value="<?php echo $OneUserDefined_last; ?>" style="text-align: center" id="OneUserDefined" name="OneUserDefined" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A class inheriting (directly or indirectly) from two user-defined classes </label>
                                    <div class="col-5">
                                        <input value="<?php echo $TwoUserDefined_last; ?>" style="text-align: center" id="TwoUserDefined" name="TwoUserDefined" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A class inheriting (directly or indirectly) from three user-defined classes</label>
                                    <div class="col-5">
                                        <input value="<?php echo $ThreeUserDefined_last; ?>" style="text-align: center" id="ThreeUserDefined" name="ThreeUserDefined" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A class inheriting (directly or indirectly) from more than three user-defined classes</label>
                                    <div class="col-5">
                                        <input value="<?php echo $MoreUserDefined_last; ?>" style="text-align: center" id="MoreUserDefined" name="MoreUserDefined" type="number" class="form-control">
                                    </div>
                                </div>



                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <button type="submit" name="submitInheritance" id="submitInheritance" class="btn btn-brand">Save</button>
                                    <button type="submit" name="resetInheritance" id="resetInheritance" class="btn btn-secondary">Reset to Defaults</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end::Form-->

                </div>
            <?php } ?>
                <?php

                if(isset($_POST['resetInheritance'])){

                    $resetWeights= "DELETE FROM inheritance WHERE InheritanceID NOT IN ( SELECT * FROM ( SELECT InheritanceID FROM inheritance ORDER BY InheritanceID LIMIT 1) s)";
                    mysqli_query($con,$resetWeights);
                    echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                } ?>

                <?php

                if(isset($_POST['submitInheritance'])){


                    $NoInheritance=$_POST['NoInheritance'];
                    $OneUserDefined=$_POST['OneUserDefined'];
                    $TwoUserDefined=$_POST['TwoUserDefined'];
                    $ThreeUserDefined=$_POST['ThreeUserDefined'];
                    $MoreUserDefined=$_POST['MoreUserDefined'];

                    $query = "INSERT INTO inheritance(NoInheritance,One,Two,Three,MoreThree) VALUES('$NoInheritance','$OneUserDefined','$TwoUserDefined','$ThreeUserDefined','$MoreUserDefined')";

                    $create_query = mysqli_query($con, $query);

                    if ( $create_query ) {
                        echo " <div class='alert alert-solid-success alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Successfully Saved.</div>";
                        echo " </div>";
                        echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                    }else{
                        echo " <div class='alert alert-solid-danger alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Something went wrong.</div>";
                        echo " </div>";
                    }



                }


                ?>


                <!-- End of Inheritance -->




                <!-- Start of Coupling -->

                <div class="tab-pane" id="kt_portlet_base_demo_3_7_tab_content" role="tabpanel">
                    <?php

                    $lastRow = "SELECT * FROM  coupling ORDER BY CouplingID DESC LIMIT 1";
                    $run_query_last = mysqli_query($con,$lastRow);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                    $CouplingID_last = $lastrow['CouplingID'];
                    $RecursiveCall_last = $lastrow['RecursiveCall'];
                    $Reg_Reg_Same_last = $lastrow['Column2'];
                    $Reg_Reg_Diff_last = $lastrow['Column3'];
                    $Reg_Rec_Same_last = $lastrow['Column4'];
                    $Reg_Rec_Diff_last = $lastrow['Column5'];
                    $Rec_Rec_Same_last = $lastrow['Column6'];
                    $Rec_Rec_Diff_last = $lastrow['Column7'];
                    $Rec_Reg_Same_last = $lastrow['Column8'];
                    $Rec_Reg_Diff_last = $lastrow['Column9'];
                    $Reg_Global_Same_last = $lastrow['Column10'];
                    $Reg_Global_Diff_last = $lastrow['Column11'];
                    $Rec_Global_Same_last = $lastrow['Column12'];
                    $Rec_Global_Diff_last = $lastrow['Column13'];

                    ?>
                    <h5 class="kt-font-brand">Weights related to the Coupling factor</h5>
                    <hr>



                    <!--begin::Form-->
                    <div class="col-lg-12">
                        <form action="" method="post" class="kt-form">
                            <div class="kt-portlet__body">


                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A recursive call </label>
                                    <div class="col-5">
                                        <input value="<?php echo $RecursiveCall_last; ?>" style="text-align: center" id="RecursiveCall" name="RecursiveCall" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A regular method calling another regular method in the same file</label>
                                    <div class="col-5">
                                        <input value="<?php echo $Reg_Reg_Same_last; ?>" style="text-align: center" id="Reg_Reg_Same" name="Reg_Reg_Same" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A regular method calling another regular method in a different file</label>
                                    <div class="col-5">
                                        <input value="<?php echo $Reg_Reg_Diff_last; ?>" style="text-align: center" id="Reg_Reg_Diff" name="Reg_Reg_Diff" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A regular method calling a recursive method in the same file</label>
                                    <div class="col-5">
                                        <input value="<?php echo $Reg_Rec_Same_last; ?>" style="text-align: center" id="Reg_Rec_Same" name="Reg_Rec_Same" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A regular method calling a recursive method in a different file</label>
                                    <div class="col-5">
                                        <input value="<?php echo $Reg_Rec_Diff_last; ?>" style="text-align: center" id="Reg_Rec_Diff" name="Reg_Rec_Diff" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A recursive method calling another recursive method in the same file</label>
                                    <div class="col-5">
                                        <input value="<?php echo $Rec_Rec_Same_last; ?>" style="text-align: center" id="Rec_Rec_Same" name="Rec_Rec_Same" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A recursive method calling another recursive method in a different file</label>
                                    <div class="col-5">
                                        <input value="<?php echo $Rec_Rec_Diff_last; ?>" style="text-align: center" id="Rec_Rec_Diff" name="Rec_Rec_Diff" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A recursive method calling a regular method in the same file</label>
                                    <div class="col-5">
                                        <input value="<?php echo $Rec_Reg_Same_last; ?>" style="text-align: center" id="Rec_Reg_Same" name="Rec_Reg_Same" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A recursive method calling a regular method in a different file </label>
                                    <div class="col-5">
                                        <input value="<?php echo $Rec_Reg_Diff_last; ?>" style="text-align: center" id="Rec_Reg_Diff" name="Rec_Reg_Diff" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A regular method referencing a global variable in the same file </label>
                                    <div class="col-5">
                                        <input value="<?php echo $Reg_Global_Same_last; ?>" style="text-align: center" id="Reg_Global_Same" name="Reg_Global_Same" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A regular method referencing a global variable in a different file</label>
                                    <div class="col-5">
                                        <input value="<?php echo $Reg_Global_Diff_last; ?>" style="text-align: center" id="Reg_Global_Diff" name="Reg_Global_Diff" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A recursive method referencing a global variable in the same file</label>
                                    <div class="col-5">
                                        <input value="<?php echo $Rec_Global_Same_last; ?>" style="text-align: center" id="Rec_Global_Same" name="Rec_Global_Same" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A recursive method referencing a global variable in a different file </label>
                                    <div class="col-5">
                                        <input value="<?php echo $Rec_Global_Diff_last; ?>" style="text-align: center" id="Rec_Global_Diff" name="Rec_Global_Diff" type="number" class="form-control">
                                    </div>
                                </div>



                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <button type="submit" name="submitCoupling" id="submitCoupling" class="btn btn-brand">Save</button>
                                    <button type="submit" name="resetCoupling" id="resetCoupling" class="btn btn-secondary">Reset to Defaults</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end::Form-->

                </div>
            <?php } ?>
                <?php

                if(isset($_POST['resetCoupling'])){

                    $resetWeights= "DELETE FROM coupling WHERE CouplingID NOT IN ( SELECT * FROM ( SELECT CouplingID FROM coupling ORDER BY CouplingID LIMIT 1) s)";
                    mysqli_query($con,$resetWeights);
                    echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                } ?>

                <?php

                if(isset($_POST['submitCoupling'])){


                    $RecursiveCall=$_POST['RecursiveCall'];
                    $Reg_Reg_Same=$_POST['Reg_Reg_Same'];
                    $Reg_Reg_Diff=$_POST['Reg_Reg_Diff'];
                    $Reg_Rec_Same=$_POST['Reg_Rec_Same'];
                    $Reg_Rec_Diff=$_POST['Reg_Rec_Diff'];
                    $Rec_Rec_Same=$_POST['Rec_Rec_Same'];
                    $Rec_Rec_Diff=$_POST['Rec_Rec_Diff'];
                    $Rec_Reg_Same=$_POST['Rec_Reg_Same'];
                    $Rec_Reg_Diff=$_POST['Rec_Reg_Diff'];
                    $Reg_Global_Same=$_POST['Reg_Global_Same'];
                    $Reg_Global_Diff=$_POST['Reg_Global_Diff'];
                    $Rec_Global_Same=$_POST['Rec_Global_Same'];
                    $Rec_Global_Diff=$_POST['Rec_Global_Diff'];


                    $query = "INSERT INTO coupling(RecursiveCall,Column2,Column3,Column4,Column5,Column6,Column7,Column8,Column9,Column10,Column11,Column12,Column13) VALUES('$RecursiveCall','$Reg_Reg_Same','$Reg_Reg_Diff','$Reg_Rec_Same','$Reg_Rec_Diff','$Rec_Rec_Same','$Rec_Rec_Diff','$Rec_Reg_Same','$Rec_Reg_Diff','$Reg_Global_Same','$Reg_Global_Diff','$Rec_Global_Same','$Rec_Global_Diff')";

                    $create_query = mysqli_query($con, $query);

                    if ( $create_query ) {
                        echo " <div class='alert alert-solid-success alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Successfully Saved.</div>";
                        echo " </div>";
                        echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                    }else{
                        echo " <div class='alert alert-solid-danger alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Something went wrong.</div>";
                        echo " </div>";
                    }



                }


                ?>


                <!-- End of Coupling -->






                <!-- Start of Control Structures -->

                <div class="tab-pane" id="kt_portlet_base_demo_3_8_tab_content" role="tabpanel">
                    <?php

                    $lastRow = "SELECT * FROM controlstructures ORDER BY ControlStructureID DESC LIMIT 1";
                    $run_query_last = mysqli_query($con,$lastRow);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                    $ControlStructureID_last = $lastrow['ControlStructureID'];
                    $CSif_last = $lastrow['CSif'];
                    $CSiterative_last = $lastrow['CSfor'];
                    $CSswitch_last = $lastrow['CSswitch'];
                    $CScase_last = $lastrow['CScase'];

                    ?>
                    <h5 class="kt-font-brand">Weights related to the Control Structures factor</h5>
                    <hr>



                    <!--begin::Form-->
                    <div class="col-lg-12">
                        <form action="" method="post" class="kt-form">
                            <div class="kt-portlet__body">


                                <div class="form-group row">
                                    <label class="col-4 col-form-label">A conditional control structure such as an ‘if’ or ‘else-if’ condition</label>
                                    <div class="col-5">
                                        <input value="<?php echo $CSif_last; ?>" style="text-align: center" id="CSif" name="CSif" type="number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label">An iterative control structure such as a ‘for’, ‘while’, or ‘do-while’ loop</label>
                                    <div class="col-5">
                                        <input value="<?php echo $CSiterative_last; ?>" style="text-align: center" id="CSiterative" name="CSiterative" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">The ‘switch’ statement in a ‘switch-case’ control structure</label>
                                    <div class="col-5">
                                        <input value="<?php echo $CSswitch_last; ?>" style="text-align: center" id="CSswitch" name="CSswitch" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Each ‘case’ statement in a ‘switch-case’ control structure</label>
                                    <div class="col-5">
                                        <input value="<?php echo $CScase_last; ?>" style="text-align: center" id="CScase" name="CScase" type="number" class="form-control">
                                    </div>
                                </div>




                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <button type="submit" name="submitCs" id="submitCs" class="btn btn-brand">Save</button>
                                    <button type="submit" name="resetCs" id="resetCs" class="btn btn-secondary">Reset to Defaults</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end::Form-->

                </div>
            <?php } ?>
                <?php

                if(isset($_POST['resetCs'])){

                    $resetWeights= "DELETE FROM controlstructures WHERE ControlStructureID NOT IN ( SELECT * FROM ( SELECT ControlStructureID FROM controlstructures ORDER BY ControlStructureID LIMIT 1) s)";
                    mysqli_query($con,$resetWeights);
                    echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                } ?>

                <?php

                if(isset($_POST['submitCs'])){


                    $CSif=$_POST['CSif'];
                    $CSiterative=$_POST['CSiterative'];
                    $CSswitch=$_POST['CSswitch'];
                    $CScase=$_POST['CScase'];


                    $query = "INSERT INTO controlstructures(CSif,CSfor,CSswitch,CScase) VALUES('$CSif','$CSiterative','$CSswitch','$CScase')";

                    $create_query = mysqli_query($con, $query);

                    if ( $create_query ) {
                        echo " <div class='alert alert-solid-success alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Successfully Saved.</div>";
                        echo " </div>";
                        echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                    }else{
                        echo " <div class='alert alert-solid-danger alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Something went wrong.</div>";
                        echo " </div>";
                    }



                }


                ?>


                <!-- End of Control Structures -->


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
