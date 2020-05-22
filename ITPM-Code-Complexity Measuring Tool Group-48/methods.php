<?php include 'include/header.php'; ?>
<?php include 'include/aside.php'; ?>

<?php
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

?>

<?php

$ds = DIRECTORY_SEPARATOR;  // Store directory separator (DIRECTORY_SEPARATOR) to a simple variable. This is just a personal preference as we hate to type long variable name.
$storeFolder = 'uploads';   // Declare a variable for destination folder.

$tempFile = $_FILES['file']['tmp_name'];        // If file is sent to the page, store the file object to a temporary variable.
$targetPath = __DIR__ . $ds . $storeFolder . $ds;  // Create the absolute path of the destination folder.

$newFileName = $_FILES['file']['name'];
$targetFile = $targetPath . $newFileName;  // Create the absolute path of the uploaded file destination.
move_uploaded_file($tempFile, $targetFile); // Move uploaded file to destination.

// Include and initialize Extractor class (Zip file extracting)
require 'Extractor.class.php';
$extractor = new Extractor;

// Path of archive file
$archivePath = $targetFile;

// Destination path
$destPath = $storeFolder;

// Extract archive file
$extract = $extractor->extract($archivePath, $storeFolder);

$dir_name = $storeFolder;
$ext = 'zip';

if ($extract) {
    echo $GLOBALS['status']['success'];
    unlink_recursive($dir_name, $ext);

} else {
    echo $GLOBALS['status']['error'];
}


if ($handle = opendir('uploads')) {

    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {

            $entry_arr_af = preg_split("/\.java/", $entry);
            $entry_arr = array_filter($entry_arr_af);

            foreach ($entry_arr

                     as $files) {

                $content = file_get_contents('uploads/' . $entry);

//  Removes single line '//' comments, treats blank characters
                $single = preg_replace('![ \t]*//.*[ \t]*[\r\n]!', '', $content);

                $multiple = preg_replace('#/\*[^*]*\*+([^/][^*]*\*+)*/#', '', $single);
                $excess = preg_replace('/\s+/', ' ', $multiple);
                $trim = trim($excess, " ");
//$for_semicolon = preg_replace('/;(?=((?!\().)*?\))/', ';', $trim);
                $for_semicolon = preg_replace_callback(/** @lang text */ '~\b(?:while|for)\s*(\((?:[^()]++|(?1))*\))~u', static function ($m) {
                    return str_replace(';', ';', $m[0]);
                },
                    $trim);
                $split = preg_split('/(?<=[;{}])/', $for_semicolon, 0, PREG_SPLIT_NO_EMPTY);

                $_SESSION['split_code'] = $split;
                $_SESSION['files'] = $entry;
                $_SESSION['trimmed'] = $trim;
                $_SESSION['entireCode'] = $trim;
                $_SESSION['filename'] = $entry;


                ?>


                <div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

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
                <?php



                $entry_arr_af = preg_split("/\.java/", $entry);
                $entry_arr = array_filter($entry_arr_af);

                foreach ($entry_arr as $files_arr) {

                    $fi = new FilesystemIterator($storeFolder, FilesystemIterator::SKIP_DOTS);
                    $limit = (iterator_count($fi));

                    $lastRow = "SELECT * FROM ( SELECT * FROM cm ORDER BY CmID DESC LIMIT $limit) result ORDER BY CmID ASC";
                    $run_query_last = mysqli_query($con,$lastRow);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                        $CmID_last = $lastrow['CmID'];
                        $CmValue_last = $lastrow['CmValue'];

                        ?>
                        <!-- begin:: Content -->
                        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <!--Begin::Dashboard 3-->
                            <!--Begin::Row-->
                            <div class="row">


                                <div class="col-lg-12">


                                    <!--begin::Portlet-->
                                    <div style="background-color: #F4F7FF;" class="kt-portlet kt-portlet--skin-solid kt-portlet--">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-label">
												<span class="kt-portlet__head-icon kt-font-brand">
													
												
                                            </div>

                                        </div>
                                        <div class="kt-portlet__body kt-font-brand">


                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div >
                                                        <div class="kt-portlet__body">
                                                            <div class="kt-iconbox__body">
                                                                <div class="kt-iconbox__icon">
                                                                    
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="kt-iconbox__desc kt-font-brand">

                                                                        <center><h1 style="font-family: 'Fira Code'">Cm
                                                                                : <?php echo $CmValue_last ?>


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

                                                            <div class="kt-portlet kt-portlet--mobile">
                                                                <div class="kt-portlet__head kt-portlet__head--lg">
                                                                    <div class="kt-portlet__head-label">
										
                                                                        <h3 class="kt-portlet__head-title kt-font-brand">
                                                                            File Name
                                                                            : </h3>&nbsp;
                                                                        <h3 class="kt-portlet__head-title kt-font-dark"><?php echo $entry; ?>
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

                                                                        $lastRow = "SELECT * FROM methods ORDER BY 	MethodID DESC LIMIT 1";
                                                                        $run_query_last = mysqli_query($con,$lastRow);

                                                                        while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                                                                        $MethodID_last = $lastrow['MethodID'];
                                                                        $PrimitiveReturnType_last = $lastrow['PrimitiveReturnType'];
                                                                        $CompositeReturnType_last = $lastrow['CompositeReturnType'];
                                                                        $VoidReturnType_last = $lastrow['VoidReturnType'];
                                                                        $PrimitiveParameter_last = $lastrow['PrimitiveParameter'];
                                                                        $CompositeParameter_last = $lastrow['CompositeParameter'];

                                                                        $i = 0; //increment to each loop
                                                                        $count = 0;
                                                                        $total_Cm = 0;

                                                                        //Default Weights
                                                                        $weight_primitive_retuntype = $PrimitiveReturnType_last;
                                                                        $weight_composite_returntype = $CompositeReturnType_last;
                                                                        $weight_void_returntype = $VoidReturnType_last;
                                                                        $weight_primitive_datatype_parameter = $PrimitiveParameter_last;
                                                                        $weight_composite_datatype_parameter = $CompositeParameter_last;

                                                                        if (!$split==""){
                                                                        foreach($split AS $val) { // Traverse the array with FOREACH

                                                                        $val;

                                                                        $Wmrt = null;
                                                                        $Npdtp = null;
                                                                        $Ncdtp = null;
                                                                        $NpdtpBefore = null;
                                                                        $NcdtpBefore = null;
                                                                        $Cm = null;
                                                                        $row_count = 0;

                                                                        for($x = 0; $x <= $row_count; $x++){



                                                                            if (preg_match('/protected \w+ \w+\(.*?\) \{|private \w+ \w+\(.*?\) \{| public \w+ \w+\(.*?\) \{|public static void main\(String.*?\) {/', $val)){



                                                                                if (preg_match('/protected void \w+\(.*?\) \{|private void \w+\(.*?\) \{| public void \w+\(.*?\) \{|public static void main\(String.*?\) {/', $val)){

                                                                                    $Wmrt = $weight_void_returntype;

                                                                                }

                                                                                if (preg_match('/public (byte|short|int|long|float|double|char|String|boolean) \w+\(.*?\) \{|private (byte|short|int|long|float|double|char|String|boolean) \w+\(.*?\) \{|protected (byte|short|int|long|float|double|char|String|boolean) \w+\(.*?\) \{/', $val)){

                                                                                    $Wmrt = $weight_primitive_retuntype;

                                                                                }


                                                                                if (preg_match_all('/byte |short |int |long |float |double |char |String |boolean |void/', $val, $counter) == 0) {

                                                                                    $Wmrt = $weight_composite_returntype;

                                                                                }



                                                                                $methodsCount = preg_match_all('/protected \w+ \w+\(.*?\) \{|private \w+ \w+\(.*?\) \{| public \w+ \w+\(.*?\) \{|public static void main\(String.*?\) {/', $val, $counter);
                                                                                $methods_methods = $counter;

                                                                                if (!$methods_methods == "") {
                                                                                    foreach ($methods_methods as $method_method) {
                                                                                        if (!$method_method == "") {
                                                                                            foreach ($method_method as $methodAfter) {

                                                                                                $methodAfter;


                                                                                                if (preg_match_all('/\(.*?\)/', $methodAfter, $counter)) {

                                                                                                    if (preg_match_all('/byte |short |int |long |float |double |char |String |boolean /', $methodAfter, $counter)) {

                                                                                                        $NpdtpBefore = preg_match_all('/byte |short |int |long |float |double |char |String |boolean /', $methodAfter, $counter);

                                                                                                    }

                                                                                                    if(preg_match_all('/byte |short |int |long |float |double |char |String |boolean /', $methodAfter, $counter) == 0){

                                                                                                        $NcdtpBefore = 1;

                                                                                                    }

                                                                                                    if(preg_match_all('/\(\)/', $methodAfter, $counter)){

                                                                                                        $NpdtpBefore = 0;
                                                                                                        $NcdtpBefore = 0;

                                                                                                    }

                                                                                                }


                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }



                                                                            }


                                                                            if ($Wmrt >= 0 && $NpdtpBefore > 0) {

                                                                                $NcdtpBefore = 0;

                                                                            }

                                                                            if ($Wmrt >= 0 && $NcdtpBefore > 0) {

                                                                                $NpdtpBefore = 0;

                                                                            }




                                                                        }

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


                                                                            }

                                                                            }
                                                                            }
                                                                            $_SESSION['total_cm'] = $total_Cm;

                                                                            $query_disp_total = "INSERT INTO cm(CmValue) VALUES('$total_Cm')";
                                                                            mysqli_query($con, $query_disp_total);

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
                                                                    <button type="button" href="total_weight.php" class="btn btn-brand">
                                                                        <span> Total Complexity
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
                            </div>
                            <!--End::Dashboard 3-->
                        </div>
                        <!-- end:: Content -->
                        </div>
                        <?php

                    }

                }
            }

        }
    }
    closedir($handle);
}



?>

<?php include 'include/footer.php'; ?>
