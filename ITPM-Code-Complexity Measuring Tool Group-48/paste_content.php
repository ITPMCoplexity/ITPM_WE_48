<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=paste_content.php?reload=1">';
}

?>

<?php include 'include/header.php'; ?>
<?php include 'include/aside.php'; ?>

<?php if (isset($_POST['submit_content'])){

    $paste_contents = $_POST['paste_contents'];

    //  Removes single line '//' comments, treats blank characters
    $single = preg_replace('![ \t]*//.*[ \t]*[\r\n]!', '', $paste_contents);

    $multiple = preg_replace('#/\*[^*]*\*+([^/][^*]*\*+)*/#', '', $single);
    $excess = preg_replace('/\s+/', ' ', $multiple);
    $trim = trim($excess," ");
    //$for_semicolon = preg_replace('/;(?=((?!\().)*?\))/', ';', $trim);
    $for_semicolon = preg_replace_callback(/** @lang text */ '~\b(?:while|for)\s*(\((?:[^()]++|(?1))*\))~u', static function($m) {
        return str_replace(';', ';', $m[0]); },
        $trim);
    $split = preg_split('/(?<=[;{}])/', $for_semicolon, 0, PREG_SPLIT_NO_EMPTY);

    $_SESSION['split_code'] = $split;
    $_SESSION['files'] = $entry;
    $_SESSION['trimmed'] = $trim;


}



?>



    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <!-- begin:: Content Head -->
        <div class="kt-subheader  kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">Total Weight of the Program</h3>
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
												<span class="kt-portlet__head-icon kt-font-brand">
													<i class="flaticon-time-1"></i>
												</span>
                            <h3 class="kt-portlet__head-title kt-font-brand">
                                Total Complexity of the Program due to All the Factors
                            </h3>
                        </div>

                    </div>
                    <div class="kt-portlet__body kt-font-brand">


                        <div class="row">

                            <div class="col-lg-12">
                                <div class="kt-portlet kt-iconbox kt-iconbox--brand kt-iconbox--animate-slower">
                                    <div class="kt-portlet__body">
                                        <div class="kt-iconbox__body">
                                            <div class="kt-iconbox__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                                                        <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                                                    </g>
                                                </svg> </div>
                                            <div class="col-lg-12">
                                                <div class="kt-iconbox__desc kt-font-brand">

                                                    <center><h1 style="font-family: 'Fira Code'">Cpr : 50</h1></center>


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

                                        <div class="kt-portlet kt-portlet--mobile">
                                            <div class="kt-portlet__head kt-portlet__head--lg">
                                                <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                                                    <h3 class="kt-portlet__head-title kt-font-brand">
                                                        Total Complexity of the Program by Statement : </h3>&nbsp;
                                                    <h3 class="kt-portlet__head-title kt-font-dark"><?php $file = $_SESSION['filename'];
                                                        echo $file; ?>
                                                    </h3>
                                                </div>
                                                <div class="kt-portlet__head-toolbar">
                                                    <div class="kt-portlet__head-wrapper">
                                                        <div class="kt-portlet__head-actions">
                                                            <div class="dropdown dropdown-inline">
                                                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="la la-download"></i> Export
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="kt-nav">
                                                                        <li class="kt-nav__section kt-nav__section--first">
                                                                            <span class="kt-nav__section-text">Choose an option</span>
                                                                        </li>
                                                                        <li class="kt-nav__item">
                                                                            <a href="#" class="kt-nav__link">
                                                                                <i class="kt-nav__link-icon la la-print"></i>
                                                                                <span class="kt-nav__link-text">Print</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="kt-nav__item">
                                                                            <a href="#" class="kt-nav__link">
                                                                                <i class="kt-nav__link-icon la la-copy"></i>
                                                                                <span class="kt-nav__link-text">Copy</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="kt-nav__item">
                                                                            <a href="#" class="kt-nav__link">
                                                                                <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                                                                <span class="kt-nav__link-text">Excel</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="kt-nav__item">
                                                                            <a href="#" class="kt-nav__link">
                                                                                <i class="kt-nav__link-icon la la-file-text-o"></i>
                                                                                <span class="kt-nav__link-text">CSV</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="kt-nav__item">
                                                                            <a href="#" class="kt-nav__link">
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

                                            <div class="kt-portlet__body kt-font-dark">
                                                <!--begin: Datatable -->
                                                <table style="font-family: 'Fira Code'; text-align: center" class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                                    <thead>
                                                    <tr class="kt-label-bg-color-1" style="font-family: 'Fira Code Medium'">
                                                        <th>Line No</th>
                                                        <th>Program Statements</th>
                                                        <th>Cs</th>
                                                        <th>Cv</th>
                                                        <th>Cm</th>
                                                        <th>Ci</th>
                                                        <th>Ccp</th>
                                                        <th>Ccs</th>
                                                        <th style="color: white" class="kt-label-bg-color-2">TCps</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
                                                    $i = 0; //increment to each loop
                                                    $count = 0;

                                                    $split = $_SESSION['split_code'];
                                                    $trim = $_SESSION['trimmed'];

                                                    if (!$split==""){
                                                    foreach($split AS $val) { // Traverse the array with FOREACH

                                                    $val;




                                                    ?>
                                                    <tr>
                                                        <td><?php echo $count=$count+1; ?></td>
                                                        <td style="text-align: left"><?php echo $val; ?></td>

                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td style="color: white" class="kt-label-bg-color-1">2</td>
                                                        <?php $i++; }}?>
                                                    </tr>

                                                    <?php $_SESSION['row_count'] = $i; ?>

                                                    </tbody>
                                                    <tfoot>
                                                    <tr class="kt-label-bg-color-1" style="font-family: 'Fira Code Medium'">

                                                        <th colspan="2">Total</th>
                                                        <th>38</th>
                                                        <th>1</th>
                                                        <th>2</th>
                                                        <th>0</th>
                                                        <th>0</th>
                                                        <th>9</th>
                                                        <th style="color: white" class="kt-label-bg-color-2">50</th>
                                                    </tr>
                                                    </tfoot>
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

                                            <button id="kt_sweetalert_demo_83" type="button" href="index.php" class="btn btn-dark">Back</button>
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
<?php

function unlink_recursive($dir_name, $ext) {

    // Exit if there's no such directory
    if (!file_exists($dir_name)) {
        return false;
    }

    // Open the target directory
    $dir_handle = dir($dir_name);

    // Take entries in the directory one at a time
    while (false !== ($entry = $dir_handle->read())) {

        if ($entry == '.' || $entry == '..') {
            continue;
        }

        $abs_name = "$dir_name/$entry";

        if (is_file($abs_name) && preg_match("/^.+\.$ext$/", $entry)) {
            if (unlink($abs_name)) {
                continue;
            }
            return false;
        }

        // Recurse on the children if the current entry happens to be a "directory"
        if (is_dir($abs_name) || is_link($abs_name)) {
            unlink_recursive($abs_name, $ext);
        }

    }

    $dir_handle->close();
    return true;

}

?>
<?php include 'include/footer.php'; ?>
