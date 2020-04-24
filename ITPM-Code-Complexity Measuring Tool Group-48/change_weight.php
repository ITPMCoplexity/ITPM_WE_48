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
                            <i class="flaticon-arrows" aria-hidden="true"></i>Size
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_4_tab_content" role="tab">
                            <i class="flaticon-interface-7" aria-hidden="true"></i>Variables
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_5_tab_content" role="tab">
                            <i class="flaticon-map" aria-hidden="true"></i>Methods
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_6_tab_content" role="tab">
                            <i class="flaticon-layers" aria-hidden="true"></i>Inheritance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_7_tab_content" role="tab">
                            <i class="flaticon-list-3" aria-hidden="true"></i>Coupling
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_8_tab_content" role="tab">
                            <i class="flaticon-cogwheel-2" aria-hidden="true"></i>Control Structures
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="kt-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="kt_portlet_base_demo_3_3_tab_content" role="tabpanel">

                    <h5 class="kt-font-brand">Weights related to the Size factor</h5>
                    <hr>

                    <div class="col-lg-10">
                    <div class="kt-section__content">
                        <table style="text-align: center;" class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>Program Component</th>
                                <th>Weight</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php


                            ?>

                            <tr>
                                <td class="kt-font-bold"><label style="margin-top: 7%;">Keyword</label></td>
                                <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="1"></td>

                            </tr>
                            <tr>
                                <td class="kt-font-bold"><label style="margin-top: 7%;">Identifier</label></td>
                                <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="1"></td>

                            </tr>
                            <tr>
                                <td class="kt-font-bold"><label style="margin-top: 7%;">Operator</label></td>
                                <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="1"></td>

                            </tr>
                            <tr>
                                <td class="kt-font-bold"><label style="margin-top: 7%;">Numerical Value</label></td>
                                <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="1"></td>

                            </tr>
                            <tr>
                                <td class="kt-font-bold"><label style="margin-top: 7%;">String Literal</label></td>
                                <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="1"></td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                    </div>

                    <br><hr>
                                <button type="submit" class="btn btn-brand">Save</button>
                                <button type="submit" class="btn btn-secondary">Reset to Defaults</button>



                </div>




                <div class="tab-pane" id="kt_portlet_base_demo_3_4_tab_content" role="tabpanel">
                    <h5 class="kt-font-brand">Weights related to the Variable factor</h5>
                    <hr>

                    <div class="col-lg-10">
                        <div class="kt-section__content">
                            <table style="text-align: center;" class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>Program Component</th>
                                    <th>Weight</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Global Variable</label></td>
                                    <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="2"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Local Variable</label></td>
                                    <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="1"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Primitive data type Variable</label></td>
                                    <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="1"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Composite data type Variable</label></td>
                                    <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="2"></td>

                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><hr>
                    <button type="submit" class="btn btn-brand">Save</button>
                    <button type="submit" class="btn btn-secondary">Reset to Defaults</button>
                </div>




                <div class="tab-pane" id="kt_portlet_base_demo_3_5_tab_content" role="tabpanel">
                    <h5 class="kt-font-brand">Weights related to the Method factor</h5>
                    <hr>

                    <div class="col-lg-10">
                        <div class="kt-section__content">
                            <table style="text-align: center;" class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>Program Component</th>
                                    <th>Weight</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Method with a Primitive return type</label></td>
                                    <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="1"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Method with a Composite return type </label></td>
                                    <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="2"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Method with a Void return type </label></td>
                                    <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="0"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Primitive data type parameter</label></td>
                                    <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="1"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Composite data type parameter</label></td>
                                    <td align="center"><input type="number" class="col-lg-4 form-control" placeholder="2"></td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><hr>
                    <button type="submit" class="btn btn-brand">Save</button>
                    <button type="submit" class="btn btn-secondary">Reset to Defaults</button>
                </div>







                <div class="tab-pane" id="kt_portlet_base_demo_3_6_tab_content" role="tabpanel">
                    <h5 class="kt-font-brand">Weights related to the Inheritance factor</h5>
                    <hr>

                    <div class="col-lg-12">
                        <div class="kt-section__content">
                            <table style="text-align: center;" class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>Program Component</th>
                                    <th>Weight</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="kt-font-bold"><label>A class with no Inheritance (direct or indirect) </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="0"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A class Inheriting (directly or indirectly) from one user-defined class </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="1"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A class Inheriting (directly or indirectly) from two user-defined classes              </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="2"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A class Inheriting (directly or indirectly) from three user-defined classes</label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="3"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A class Inheriting  (directly or indirectly) from more than three user-defined classes </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="4"></td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><hr>
                    <button type="submit" class="btn btn-brand">Save</button>
                    <button type="submit" class="btn btn-secondary">Reset to Defaults</button>
                </div>











                <div class="tab-pane" id="kt_portlet_base_demo_3_7_tab_content" role="tabpanel">
                    <h5 class="kt-font-brand">Weights related to the Coupling factor</h5>
                    <hr>

                    <div class="col-lg-12">
                        <div class="kt-section__content">
                            <table style="text-align: center;" class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>Program Component</th>
                                    <th>Weight</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="kt-font-bold"><label>A Recursive call</label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="2"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A Regular method calling another Regular method in the same file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="2"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A Regular method calling another Regular method in a different file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="3"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A Regular method calling a Recursive method in the same file</label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="3"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A Regular method calling a Recursive method in a different file</label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="4"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A Recursive method calling another Recursive method in the same file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="4"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A Recursive method calling another Recursive method in a different file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="5"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A Recursive method calling a  Regular method in the same file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="3"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A Recursive method calling a  Regular method in a different file</label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="4"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A  Regular method referencing a Global Variable in the same file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="1"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A  Regular method referencing a Global Variable in a different file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="2"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A Recursive method referencing a Global Variable in the same file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="1"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A Recursive method referencing a Global Variable in a different file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="2"></td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><hr>
                    <button type="submit" class="btn btn-brand">Save</button>
                    <button type="submit" class="btn btn-secondary">Reset to Defaults</button>
                </div>







                <div class="tab-pane" id="kt_portlet_base_demo_3_8_tab_content" role="tabpanel">
                    <h5 class="kt-font-brand">Weights related to the Control Structure factor</h5>
                    <hr>

                    <div class="col-lg-12">
                        <div class="kt-section__content">
                            <table style="text-align: center;" class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>Program Component</th>
                                    <th>Weight</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="kt-font-bold"><label>A Conditional Control structure such as an ‘if’ or ‘else-if’ condition</label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="2"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>An Iterative Control structure such as a ‘for’, ‘while’, or ‘do-while’ loop </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="3"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>The ‘switch’ statement in a ‘switch-case’ Control structure </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="2"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>Each ‘case’ statement in a ‘switch-case’ Control structure </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="1"></td>

                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><hr>
                    <button type="submit" class="btn btn-brand">Save</button>
                    <button type="submit" class="btn btn-secondary">Reset to Defaults</button>
                </div>




            </div>
        </div>

    </div>
    </div>

    <!--end::Portlet-->

    <!--begin::Portlet-->
        <div class="col-lg-5">
    <div class="kt-portlet kt-portlet--skin-solid kt-portlet-- kt-bg-brand">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
												<span class="kt-portlet__head-icon">
													<i class="flaticon2-information"></i>
												</span>
                <h3 class="kt-portlet__head-title">
                    Change the Default Weights
                </h3>
            </div>

        </div>
        <div class="kt-portlet__body">
            Tip : You can change the default weights allocated for the program components. <br><br>Once you add a new program again, the customized weights will be reset to defaults.
            </div>

    </div>

    <!--end::Portlet-->
        </div>




</div>

                            <!--End::Row-->

							<!--End::Dashboard 3-->
						</div>
						<!-- end:: Content -->
					</div>

<?php include 'include/footer.php'; ?>
