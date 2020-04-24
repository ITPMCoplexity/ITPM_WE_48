<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=variables.php?reload=1">';
}

?>

<?php include 'include/header.php'; ?>
<?php include 'include/aside.php'; ?>

<?php

$split = $_SESSION['split_code'];
$trim = $_SESSION['trimmed'];
$file = $_SESSION['filename'];
$entireCodeBeforeSemicolon = $_SESSION['entireCode'];

?>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Variables Complexity</h3>
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

                                                <center><h1 style="font-family: 'Fira Code'">Cv
                                                        : <?php echo $total_Cv = $_SESSION['total_Cv']; ?></h1></center>


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
										
                                                <h3 class="kt-portlet__head-title kt-font-brand">
                                                    Complexity of the Program due to the Variables  : </h3>&nbsp;
                                                <h3 class="kt-portlet__head-title kt-font-dark"><?php $file = $_SESSION['filename'];
                                                    echo $file; ?>
                                                </h3>
                                            </div>
                                            
                                        </div>

                                        <div class="kt-portlet__body kt-font-dark">
                                            <!--begin: Datatable -->
                                            <table style="font-family: 'Fira Code'; text-align: center"
                                                   class="table table-striped- table-bordered table-hover"
                                                   id="kt_table_1">
                                                <thead>
                                                <tr class="kt-label-bg-color-1" style="font-family: 'Fira Code Medium'">
                                                    <th>Line No</th>
                                                    <th>Program Statements</th>
                                                    <th>Wvs</th>
                                                    <th>Npdtv</th>
                                                    <th>Ncdtv</th>
                                                    <th style="color: white" class="kt-label-bg-color-2">Cv</th>


                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php

                                                $i = 0; //increment to each loop
                                                $count = 0;
                                                $total_Cv = 0;

                                                $Wvs = 0;
                                                $Npdtv = 0;
                                                $Ncdtv = 0;
                                                $Cv = 0;
                                                $beforeCv = 0;

                                                //Default Weights
                                                $weight_primitive_datatype_variable = 1;
                                                $weight_composite_datatype_variable = 2;
                                                $weight_global_variable = 2;
                                                $weight_local_variable = 1;

                                                function getContentsBetween($str, $startDelimiter, $endDelimiter)
                                                {
                                                    $contents = array();
                                                    $startDelimiterLength = strlen($startDelimiter);
                                                    $endDelimiterLength = strlen($endDelimiter);
                                                    $startFrom = $contentStart = $contentEnd = 0;
                                                    while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
                                                        $contentStart += $startDelimiterLength;
                                                        $contentEnd = strpos($str, $endDelimiter, $contentStart);
                                                        if (false === $contentEnd) {
                                                            break;
                                                        }
                                                        $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
                                                        $startFrom = $contentEnd + $endDelimiterLength;
                                                    }

                                                    return $contents;

                                                }

                                                $entireCode = str_replace(';', ';', $entireCodeBeforeSemicolon);

                                                //Matching Methods - Entire Code
                                                $methods = (getContentsBetween($entireCode, ') {', '}'));

                                                //Matching Outside from Methods
                                                $codeOutsideMethods = str_replace($methods, '', $entireCode);

                                                $splitAfterSemicolon = str_replace(';', ';', $split);

                                                //For Printing of the code lines for the table
                                                if (!$splitAfterSemicolon == ""){
                                                foreach ($splitAfterSemicolon as $valAfterSemicolonReplace) { // Traverse the array with FOREACH

                                                $val = str_replace(';', ';', $valAfterSemicolonReplace);

                                                $global_variable_count_total = 0;
                                                $local_variable_count_total = 0;
                                                $primitive_datatype_variable_count_total = 0;
                                                $composite_datatype_variable_count_total = 0;


                                            /*    foreach ($variables as $variable) {

                                                    $variable;

                                                    //Matching variables inside methods (Local Variables)
                                                    $local_variable_count = preg_match_all('/byte \w+\;|short \w+\;|int \w+\;|long \w+\;|float \w+\;|double \w+\;|char \w+\;|String \w+\;|boolean \w+\;|\w+ \w+ \= \w+|\w+ \w+\, \w+\;|private \w+ \w+\;/', $method, $counter);
                                                    $local_variables = $counter;

                                                    //Converting local variable array into normal lines
                                                    foreach ($local_variables as $local) {

                                                        if (!$local == "") {

                                                            foreach ($local as $local_variable) {

                                                                //Iterate through all rows of code in the table
                                                                for ($x = 0; $x <= $row_count; $x++) {

                                                                    $local_variables; // The array of local variables
                                                                    $splitAfterSemicolon; // The array of code lines

                                                                    //echo $local_variable;// Single lines of local variables
                                                                    //echo $val;// Single lines of code
                                                                    //echo "<br>";


                                                                    //Checking the code lines if there are matching local variables
                                                                    if (strpos($val, $local_variable) !== false) {

                                                                        $local_variable_count_total = substr_count($val, $local_variable);


                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }

                                                    //Matching variables outside methods (Global Variables)
                                                    $global_variable_count = preg_match_all('/byte \w+\;|short \w+\;|int \w+\;|long \w+\;|float \w+\;|double \w+\;|char \w+\;|String \w+\;|boolean \w+\;|\w+ \w+ \= \w+|\w+ \w+\, \w+\;|private \w+ \w+\;/', $codeOutsideMethods, $counter);
                                                    $global_variables = $counter;

                                                    //Converting global variable array into normal lines
                                                    foreach ($global_variables as $global) {
                                                        $result = array_filter($global);
                                                        if (!$result == "") {
                                                            foreach ($result as $global_variable) {

                                                                //Iterate through all rows of code in the table
                                                                for ($x = 0; $x >= $row_count; $x++) {

                                                                    //print_r($global_variables);

                                                                    $global_variables; // The array of global variables
                                                                    $splitAfterSemicolon; // The array of code lines

                                                                    //echo $global_variable;// Single lines of global variables
                                                                    //echo $val;// Single lines of code
                                                                    //echo "<br>";

                                                                    //Checking the code lines if there are matching global variables

                                                                    if (strpos($val, $global_variable) !== false) {

                                                                        $global_variable_count_total = substr_count($val, $global_variable);

                                                                    }

                                                                }

                                                            }

                                                        }

                                                    }

                                                    //Matching primitive variables
                                                    $total_variable_count = preg_match_all('/byte.*?\;|short .*?\;|int .*?\;|long .*?\;|float .*?\;|double .*?\;|char .*?\;|String .*?\;|boolean .*?\;/', $entireCode, $counter);
                                                    $all_prem_variables = $counter;

                                                    //Converting all variables array into normal lines
                                                    foreach ($all_prem_variables as $vars) {
                                                        $result = array_filter($vars);
                                                        if (!$result == "") {
                                                            foreach ($result as $all_variable) {

                                                                //Iterate through all rows of code in the table
                                                                for ($x = 0; $x <= $row_count; $x++) {


                                                                    //print_r($all_variables);

                                                                    $all_prem_variables; // The array of all variables
                                                                    $splitAfterSemicolon; // The array of code lines

                                                                    //echo $all_variable;// Single lines of all variables
                                                                    //echo $val;// Single lines of code
                                                                    //echo "<br>";

                                                                    //Checking the code lines if there are matching local variables


                                                                    if (strpos($val, $all_variable) !== false) {

                                                                        $primitive_datatype_variable_count_total = substr_count($val, $all_variable);

                                                                    }

                                                                    if (preg_match('/private byte \w+, \w+\;|private short \w+, \w+\;|private int \w+, \w+\;|private long \w+, \w+\;|private float \w+, \w+\;|private double \w+, \w+\;|private char \w+, \w+\;|private String \w+, \w+\;|private boolean \w+, \w+\;/', $val)) {

                                                                        $primitive_datatype_variable_count_total = 2;

                                                                    }

                                                                    if ($Wvs > 0 && $Ncdtv > 0 && preg_match_all('/byte |short |int |long |float |double |char |String |boolean /', $val, $counter)) {

                                                                        $primitive_datatype_variable_count_total = 1;

                                                                    }

                                                                }

                                                            }

                                                        }

                                                    }

                                                    //Matching composite variables
                                                    for ($x = 0; $x <= $row_count; $x++) {


                                                        if ($Wvs > 0 && $Npdtv < 1) {

                                                            $composite_datatype_variable_count_total = 1;

                                                        } else {

                                                            $composite_datatype_variable_count_total = 0;

                                                        }

                                                        if ($Wvs > 0 && $Npdtv < 1 && preg_match_all('/\w+ \w+ \w+\, \w+\;/', $val, $counter)) {

                                                            $composite_datatype_variable_count_total = 2;

                                                        }

                                                    }


                                                    $Wvs = ($global_variable_count_total * $weight_global_variable) + ($local_variable_count_total * $weight_local_variable);

                                                    $Npdtv = $primitive_datatype_variable_count_total;

                                                    $Ncdtv = $composite_datatype_variable_count_total;

                                                }*/

                                                $beforeCv = ($weight_primitive_datatype_variable * $Npdtv) + ($weight_composite_datatype_variable * $Ncdtv);

                                                $Cv = $Wvs * $beforeCv;

                                                $total_Cv += $Cv;

                                                ?>

                                                <tr>
                                                    <td><?php echo $count = $count + 1; ?></td>
                                                    <td style="text-align: left"><?php echo $val; ?></td>
                                                    <td <?php if ($Wvs > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Wvs; ?></td>
                                                    <td <?php if ($Npdtv > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Npdtv; ?></td>
                                                    <td <?php if ($Ncdtv > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Ncdtv; ?></td>
                                                    <td <?php if ($Cv > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Cv; ?></td>
                                                    <?php

                                                    $i++;

                                                    $_SESSION['total_Cv'] = $total_Cv;

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


                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">


                                <div class="col-lg-12 ml-lg-auto">
                                    <center>

                                        <a href="total_weight.php">
                                            <button type="button" href="total_weight.php" class="btn btn-brand"><span><i
                                                            class="flaticon-home"></i></span> Total Complexity of the
                                                Program
                                            </button>
                                        </a>
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
