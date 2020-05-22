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

$file = 0;

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
                            <h3 class="kt-subheader__title">Size Complexity</h3>
                            <span class="kt-subheader__separator kt-subheader__separator--v"></span>


                            <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                                <input type="text" class="form-control" placeholder="Search order..."
                                       id="generalSearch">
                                <span class="kt-input-icon__icon kt-input-icon__icon--right">
											<span><i class="flaticon2-search-1"></i></span>
										</span>
                            </div>
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

                    $lastRow = "SELECT * FROM ( SELECT * FROM cs ORDER BY CsID DESC LIMIT $limit) result ORDER BY CsID ASC";
                    $run_query_last = mysqli_query($con, $lastRow);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                        $CsID_last = $lastrow['CsID'];
                        $CsValue_last = $lastrow['CsValue'];

                        ?>
                        <!-- begin:: Content -->
                        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <!--Begin::Dashboard 3-->
                            <!--Begin::Row-->
                            <div class="row">


                                <div class="col-lg-12">


                                    <!--begin::Portlet-->
                                    <div style="background-color: #F4F7FF;"
                                         class="kt-portlet kt-portlet--skin-solid kt-portlet--">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-label">
						
                                                <h3 class="kt-portlet__head-title kt-font-brand">
                                                    
                                                </h3>
                                            </div>

                                        </div>
                                        <div >


                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div >
                                                        <div class="kt-portlet__body">
                                                            <div class="kt-iconbox__body">
                                                                <div class="kt-iconbox__icon">
                                                                    
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="kt-iconbox__desc kt-font-brand">

                                                                        <center><h1 style="font-family: 'Fira Code'">Cs
                                                                                : <?php echo $CsValue_last ?>


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

                                                            <div >
                                                                <div class="kt-portlet__head kt-portlet__head--lg"s>
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
                                                                    <table style="font-family: 'Fira Code'; text-align: center"
                                                                           class="table table-striped- table-bordered table-hover"
                                                                           id="kt_table_1">
                                                                        <thead>
                                                                        <tr class="kt-label-bg-color-1"
                                                                            style="font-family: 'Fira Code Medium'">
                                                                            <th>Line No</th>
                                                                            <th>Program Statements</th>
                                                                            <th>Identified Tokens</th>
                                                                            <th>Nkw</th>
                                                                            <th>Nid</th>
                                                                            <th>Nop</th>
                                                                            <th>Nnv</th>
                                                                            <th>Nsl</th>
                                                                            <th style="color: white"
                                                                                class="kt-label-bg-color-2">Cs
                                                                            </th>

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

                                                                        $lastRow = "SELECT * FROM size ORDER BY SizeID DESC LIMIT 1";
                                                                        $run_query_last = mysqli_query($con, $lastRow);

                                                                        while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                                                                        $SizeID_last = $lastrow['SizeID'];
                                                                        $Keyword_last = $lastrow['Keyword'];
                                                                        $Identifier_last = $lastrow['Identifier'];
                                                                        $Operator_last = $lastrow['Operator'];
                                                                        $NumericalValue_last = $lastrow['NumericalValue'];
                                                                        $StringLiteral_last = $lastrow['StringLiteral'];


                                                                        //Default Weights
                                                                        $weight_keyword = $Keyword_last;
                                                                        $weight_identifier = $Identifier_last;
                                                                        $weight_operator = $Operator_last;
                                                                        $weight_numerical = $NumericalValue_last;
                                                                        $weight_string = $StringLiteral_last;


                                                                        if (!$split == ''){

                                                                        foreach ($split

                                                                        as $val) { // Traverse the array with FOREACH

                                                                        $val;

                                                                        // -------- Weight due to Keywords - Begin --------

                                                                        $keywords = ['abstract', 'assert', 'break', 'catch', 'class', 'const', 'continue', 'default', 'do', 'else', 'enum', 'extends', 'final', 'finally', 'goto', 'implements', 'instanceof', 'interface', 'native', 'new', 'package', 'private', 'protected', 'public', 'return', 'static', 'strictfp', 'super', 'synchronized', 'this', 'throw', 'throws', 'transient', 'try', 'void', 'volatile'];

                                                                        $tokenkw = "";
                                                                        $tokenOp = "";
                                                                        $tokenClass = "";
                                                                        $tokenNumber = "";
                                                                        $tokenString = "";

                                                                        $count_methods_2 = 0;
                                                                        $count_methods_3 = 0;
                                                                        $count_methods_4 = 0;
                                                                        $count_methods_5 = 0;


                                                                        foreach ($keywords as $word) {


                                                                            if (preg_match('/\babstract\b/', $val) !== false) {

                                                                                $abstract_count = preg_match_all('/\babstract\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bassert\b/', $val) !== false) {

                                                                                $assert_count = preg_match_all('/\bassert\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bbreak\b/', $val) !== false) {

                                                                                $break_count = preg_match_all('/\bbreak\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bcatch\b/', $val) !== false) {

                                                                                $catch_count = preg_match_all('/\bcatch\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bclass\b/', $val) !== false) {

                                                                                $class_count = preg_match_all('/\bclass\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bconst\b/', $val) !== false) {

                                                                                $const_count = preg_match_all('/\bconst\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bcontinue\b/', $val) !== false) {

                                                                                $continue_count = preg_match_all('/\bcontinue\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bdefault\b/', $val) !== false) {

                                                                                $default_count = preg_match_all('/\bdefault\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bdo\b/', $val) !== false) {

                                                                                $do_count = preg_match_all('/\bdo\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\belse\b/', $val) !== false) {

                                                                                $else_count = preg_match_all('/\belse\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\benum\b/', $val) !== false) {

                                                                                $enum_count = preg_match_all('/\benum\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bextends\b/', $val) !== false) {

                                                                                $extends_count = preg_match_all('/\bextends\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bfinal\b/', $val) !== false) {

                                                                                $final_count = preg_match_all('/\bfinal\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bfinally\b/', $val) !== false) {

                                                                                $finally_count = preg_match_all('/\bfinally\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bgoto\b/', $val) !== false) {

                                                                                $goto_count = preg_match_all('/\bgoto\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bimplements\b/', $val) !== false) {

                                                                                $implements_count = preg_match_all('/\bimplements\b/', $val, $counter);

                                                                            }


                                                                            if (preg_match('/\binstanceof\b/', $val) !== false) {

                                                                                $instanceof_count = preg_match_all('/\binstanceof\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\binterface\b/', $val) !== false) {

                                                                                $interface_count = preg_match_all('/\binterface\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bnative\b/', $val) !== false) {

                                                                                $native_count = preg_match_all('/\bnative\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bnew\b/', $val) !== false) {

                                                                                $new_count = preg_match_all('/\bnew\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bpackage\b/', $val) !== false) {

                                                                                $package_count = preg_match_all('/\bpackage\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bprivate\b/', $val) !== false) {

                                                                                $private_count = preg_match_all('/\bprivate\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bprotected\b/', $val) !== false) {

                                                                                $protected_count = preg_match_all('/\bprotected\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bpublic\b/', $val) !== false) {

                                                                                $public_count = preg_match_all('/\bpublic\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\breturn\b/', $val) !== false) {

                                                                                $return_count = preg_match_all('/\breturn\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bstatic\b/', $val) !== false) {

                                                                                $static_count = preg_match_all('/\bstatic\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bstrictfp\b/', $val) !== false) {

                                                                                $strictfp_count = preg_match_all('/\bstrictfp\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bsuper\b/', $val) !== false) {

                                                                                $super_count = preg_match_all('/\bsuper\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bsynchronized\b/', $val) !== false) {

                                                                                $synchronized_count = preg_match_all('/\bsynchronized\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bthis\b/', $val) !== false) {

                                                                                $this_count = preg_match_all('/\bthis\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bthrow\b/', $val) !== false) {

                                                                                $throw_count = preg_match_all('/\bthrow\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bthrows\b/', $val) !== false) {

                                                                                $throws_count = preg_match_all('/\bthrows\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\btransient\b/', $val) !== false) {

                                                                                $transient_count = preg_match_all('/\btransient\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\btry\b/', $val) !== false) {

                                                                                $try_count = preg_match_all('/\btry\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bvoid\b/', $val) !== false) {

                                                                                $void_count = preg_match_all('/\bvoid\b/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/\bvolatile\b/', $val) !== false) {

                                                                                $volatile_count = preg_match_all('/\bvolatile\b/', $val, $counter);

                                                                            }

                                                                        }

                                                                        $Nkw = ($abstract_count + $assert_count + $break_count + $catch_count + $class_count + $const_count + $continue_count + $default_count + $do_count + $else_count + $enum_count + $extends_count + $final_count + $finally_count + $goto_count + $implements_count + $instanceof_count + $interface_count + $native_count + $new_count + $package_count + $private_count + $protected_count + $public_count + $return_count + $static_count + $strictfp_count + $super_count + $synchronized_count + $this_count + $throw_count + $throws_count + $transient_count + $try_count + $void_count + $volatile_count) * $weight_keyword;

                                                                        // -------- Weight due to Keywords - End --------


                                                                        // -------- Weight due to Identifiers - Begin --------

                                                                        $identifiers_count_total = 0;
                                                                        $row_count = 0;

                                                                        for ($x = 0; $x <= $row_count; $x++) {





                                                                                //Matching Classes
                                                                                $method_names_2 = (getContentsBetween($val, 'void', ') {'));
                                                                                foreach ($method_names_2 as $methods_2) {
                                                                                    if (strpos($val, $methods_2)) {



                                                                                        $count_methods_2 = substr_count($val,$methods_2);



                                                                                    }

                                                                                }
                                                                            $method_names_3 = (getContentsBetween($val, 'int', ') {'));
                                                                            foreach ($method_names_3 as $methods_3) {
                                                                                if (strpos($val, $methods_3)) {



                                                                                    $count_methods_3 = substr_count($val,$methods_3);



                                                                                }

                                                                            }

                                                                            $method_names_4 = (getContentsBetween($val, 'String', ') {'));
                                                                            foreach ($method_names_4 as $methods_4) {
                                                                                if (strpos($val, $methods_4)) {



                                                                                    $count_methods_4 = substr_count($val,$methods_4);



                                                                                }

                                                                            }

                                                                            $method_names_5 = (getContentsBetween($val, 'double', ') {'));
                                                                            foreach ($method_names_5 as $methods_5) {
                                                                                if (strpos($val, $methods_5)) {



                                                                                    $count_methods_5 = substr_count($val,$methods_5);



                                                                                }

                                                                            }








                                                                            if (preg_match('/class\s*(\w+)/', $val) !== false) {

                                                                                $count_class = preg_match_all('/class\s*(\w+)/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/(?:(?:public|private|protected|static|final|native|synchronized|abstract|transient)+\s+)+[$_\w<>\[\]\s]*\s+[\$_\w]+\([^\)]*\)?\s*\{?[^\}]*\}?/', $val) !== false) {

                                                                                $count_methods = preg_match_all('/(?:(?:public|private|protected|static|final|native|synchronized|abstract|transient)+\s+)+[$_\w<>\[\]\s]*\s+[\$_\w]+\([^\)]*\)?\s*\{?[^\}]*\}?/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/= new (.*?)\((.*?)\);|=new (.*?)\((.*?)\);/', $val) !== false) {

                                                                                $count_objects = preg_match_all('/= new (.*?)\((.*?)\);|=new (.*?)\((.*?)\);/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/= new|=new/', $val) !== false) {

                                                                                $count_variables = preg_match_all('/= new|=new/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/= new|=new/', $val) !== false) {

                                                                                $count_arguments = preg_match_all('/= new|=new/', $val, $counter);

                                                                            }

                                                                            if (preg_match('/= new|=new/', $val) !== false) {

                                                                                $count_data_structures = preg_match_all('/= new|=new/', $val, $counter);

                                                                            }


                                                                            $identifiers_count_total = $count_class + $count_objects + $count_methods + $count_methods_2 + $count_methods_3 + $count_methods_4 + $count_methods_5;

                                                                            $Nid = $identifiers_count_total * $weight_identifier;

                                                                        }

                                                                        // -------- Weight due to Identifiers - End --------


                                                                        // -------- Weight due to Operators - Begin --------

                                                                        //$operators = array('+', '-', '*', '/', '%', '++', '--', '==', '!=', '>', '<', '>=', '<=', '&&', '||', '!', '|', '^', '~', '<<', '>>', '>>>', '<<<', ',', '->', '.', '::', '+=', '-=', '*=', '/=', '=', '>>>=', '|=', '&=', '%=', '<<=', '>>=', '^=');

                                                                        $operators = array('+', '-', '*', '/', '%', '=', '>', '<', '&&', '!', '|', '^', '~', ',', '.', '::');

                                                                        foreach ($operators as $word) {

                                                                            if (preg_match('/(\<\=)+|(\=\>)+|(\=\<)+|(\>\=)+|(\+)+|(\-)+|(\=)+|(\*)+|(\/)+|(\%)+|(\>)+|(\>)+|(\<)+|(\&\&)+|(\!)+|(\|)+|(\^)+|(\~)+|(\,)+|(\.)+|(\:\:)+/', $val) !== false) {

                                                                                $op_count = preg_match_all('/(\<\=)+|(\=\>)+|(\=\<)+|(\>\=)+|(\+)+|(\-)+|(\=)+|(\*)+|(\/)+|(\%)+|(\>)+|(\>)+|(\<)+|(\&\&)+|(\!)+|(\|)+|(\^)+|(\~)+|(\,)+|(\.)+|(\:\:)+/', $val, $counter);


                                                                            }

                                                                            $Nop = $op_count * $weight_operator;

                                                                        }

                                                                        // -------- Weight due to Operators - End --------


                                                                        // -------- Weight due to Numerical Values - Begin --------

                                                                        $numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                                                                        $numbers_count_total = 0;

                                                                        foreach ($numbers as $word) {

                                                                            if (preg_match('/(\d)+/', $val) !== false) {

                                                                                $numbers_count_total = preg_match_all('/(\d)+/', $val, $counter);

                                                                            }

                                                                            $Nnv = $numbers_count_total * $weight_numerical;

                                                                        }

                                                                        // -------- Weight due to Numerical Values - End --------


                                                                        // -------- Weight due to String Literals - Begin --------

                                                                        $strings_count_total = 0;

                                                                        for ($x = 0; $x <= $row_count; $x++) {

                                                                            if (preg_match('/"(.*?)"/', $val) !== false) {

                                                                                $strings_count_total = preg_match_all('/"(.*?)"/', $val, $counter);

                                                                            }

                                                                            $Nsl = $strings_count_total * $weight_string;

                                                                        }

                                                                        // -------- Weight due to String Literals - End --------


                                                                        foreach ($keywords as $word) {


                                                                            if (preg_match('/\babstract\b/', $val) !== false) {

                                                                                preg_match_all('/\babstract\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $abstract_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }

                                                                            if (preg_match('/\bassert\b/', $val) !== false) {

                                                                                preg_match_all('/\bassert\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $assert_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bbreak\b/', $val) !== false) {

                                                                                preg_match_all('/\bbreak\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $break_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }

                                                                            if (preg_match('/\bcatch\b/', $val) !== false) {

                                                                                preg_match_all('/\bcatch\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $catch_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bclass\b/', $val) !== false) {

                                                                                preg_match_all('/\bclass\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $class_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }

                                                                            if (preg_match('/\bconst\b/', $val) !== false) {

                                                                                preg_match_all('/\bconst\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $const_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bcontinue\b/', $val) !== false) {

                                                                                preg_match_all('/\bcontinue\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $continue_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }

                                                                            if (preg_match('/\bdefault\b/', $val) !== false) {

                                                                                preg_match_all('/\bdefault\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $default_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bdo\b/', $val) !== false) {

                                                                                preg_match_all('/\bdo\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $do_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }

                                                                            if (preg_match('/\belse\b/', $val) !== false) {

                                                                                preg_match_all('/\belse\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $else_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\benum\b/', $val) !== false) {

                                                                                preg_match_all('/\benum\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $enum_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }

                                                                            if (preg_match('/\bextends\b/', $val) !== false) {

                                                                                preg_match_all('/\bextends\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $extends_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bfinal\b/', $val) !== false) {

                                                                                preg_match_all('/\bfinal\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $final_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }

                                                                            if (preg_match('/\bfinally\b/', $val) !== false) {

                                                                                preg_match_all('/\bfinally\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $finally_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bgoto\b/', $val) !== false) {

                                                                                preg_match_all('/\bgoto\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $goto_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }

                                                                            if (preg_match('/\bimplements\b/', $val) !== false) {

                                                                                preg_match_all('/\bimplements\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $implements_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\binstanceof\b/', $val) !== false) {

                                                                                preg_match_all('/\binstanceof\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $instanceof_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }

                                                                            if (preg_match('/\binterface\b/', $val) !== false) {

                                                                                preg_match_all('/\binterface\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $interface_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bnative\b/', $val) !== false) {

                                                                                preg_match_all('/\bnative\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $native_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }

                                                                            if (preg_match('/\bnew\b/', $val) !== false) {

                                                                                preg_match_all('/\bnew\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $new_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bpackage\b/', $val) !== false) {

                                                                                preg_match_all('/\bpackage\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $package_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }

                                                                            if (preg_match('/\bprivate\b/', $val) !== false) {

                                                                                preg_match_all('/\bprivate\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $private_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }

                                                                            if (preg_match('/\bprotected\b/', $val) !== false) {

                                                                                preg_match_all('/\bprotected\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $protected_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bpublic\b/', $val) !== false) {

                                                                                preg_match_all('/\bpublic\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $public_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\breturn\b/', $val) !== false) {

                                                                                preg_match_all('/\breturn\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $return_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bstatic\b/', $val) !== false) {

                                                                                preg_match_all('/\bstatic\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $static_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bstrictfp\b/', $val) !== false) {

                                                                                preg_match_all('/\bstrictfp\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $strictfp_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bsuper\b/', $val) !== false) {

                                                                                preg_match_all('/\bsuper\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $super_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bsynchronized\b/', $val) !== false) {

                                                                                preg_match_all('/\bsynchronized\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $synchronized_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bthis\b/', $val) !== false) {

                                                                                preg_match_all('/\bthis\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $this_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bthrow\b/', $val) !== false) {

                                                                                preg_match_all('/\bthrow\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $throw_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bthrows\b/', $val) !== false) {

                                                                                preg_match_all('/\bthrows\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $throws_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\btransient\b/', $val) !== false) {

                                                                                preg_match_all('/\btransient\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $transient_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\btry\b/', $val) !== false) {

                                                                                preg_match_all('/\btry\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $try_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bvoid\b/', $val) !== false) {

                                                                                preg_match_all('/\bvoid\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $void_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }
                                                                            if (preg_match('/\bvolatile\b/', $val) !== false) {

                                                                                preg_match_all('/\bvolatile\b/', $val, $counter);

                                                                                foreach ($counter as $kwd) {
                                                                                    foreach ($kwd as $kw) {

                                                                                        $volatile_kw = $kw;

                                                                                    }
                                                                                }


                                                                            }


                                                                            if ($Nkw > 0 && strpos($val, $word)) {
                                                                                //$tokenkw = $word;


                                                                            }
                                                                        }

                                                                        foreach ($operators as $op) {
                                                                            if (strpos($val, $op)) {
                                                                                $tokenOp = $op;

                                                                            }
                                                                        }

                                                                        foreach ($numbers as $number) {
                                                                            if (strpos($val, $number)) {
                                                                                $tokenNumber = $number;

                                                                            }
                                                                        }


                                                                        if ($Nkw == 0 && preg_match_all('/import /', $val, $counter)) {
                                                                            $Nkw = null;
                                                                            $Nid = null;
                                                                            $Nop = null;
                                                                            $Nnv = null;
                                                                            $Nsl = null;
                                                                        }


                                                                        for ($x = 0; $x <= $row_count; $x++) {
                                                                            //Matching Classes
                                                                            $classes = (getContentsBetween($val, 'class ', '{'));
                                                                            foreach ($classes as $class) {
                                                                                if (strpos($val, $class)) {
                                                                                    $tokenClass = $class;


                                                                                }
                                                                            }

                                                                        }

                                                                        for ($x = 0; $x <= $row_count; $x++) {
                                                                            //Matching Classes
                                                                            $method_names = (getContentsBetween($val, 'void', ') {'));
                                                                            foreach ($method_names as $methods) {
                                                                                if (strpos($val, $methods)) {


                                                                                    $method_name = $methods;

                                                                                }

                                                                            }

                                                                        }

                                                                        for ($x = 0; $x <= $row_count; $x++) {
                                                                            //Matching Classes
                                                                            $method_names11 = (getContentsBetween($val, 'int', ') {'));
                                                                            foreach ($method_names11 as $methods11) {
                                                                                if (strpos($val, $methods11)) {


                                                                                    $method_name11 = $methods11;

                                                                                }

                                                                            }

                                                                        }

                                                                        for ($x = 0; $x <= $row_count; $x++) {
                                                                            //Matching Classes
                                                                            $method_names22 = (getContentsBetween($val, 'String', ') {'));
                                                                            foreach ($method_names22 as $methods22) {
                                                                                if (strpos($val, $methods22)) {

                                                                                    $method_name22 = $methods22;

                                                                                }

                                                                            }

                                                                        }

                                                                        for ($x = 0; $x <= $row_count; $x++) {
                                                                            //Matching Classes
                                                                            $method_names33 = (getContentsBetween($val, 'double', ') {'));
                                                                            foreach ($method_names33 as $methods33) {
                                                                                if (strpos($val, $methods33)) {


                                                                                    $method_name33 = $methods33;

                                                                                }

                                                                            }

                                                                        }

                                                                        for ($x = 0; $x <= $row_count; $x++) {
                                                                            //Matching Strings
                                                                            $strings_count = preg_match_all('/"(.*?)"/', $val, $counter);

                                                                            foreach ($counter as $string) {
                                                                                foreach ($string as $str) {
                                                                                    if (strpos($val, $str)) {
                                                                                        $tokenString = $str;

                                                                                    }

                                                                                }

                                                                            }

                                                                        }


                                                                        $Cs = $Nkw + $Nid + $Nop + $Nnv + $Nsl;

                                                                        $total_cs += $Cs;


                                                                        ?>

                                                                        <tr>
                                                                            <td><?php echo ++$count; ?></td>
                                                                            <td style="text-align: left; word-wrap: break-word; max-width: 30px;"><?php echo $val; ?></td>
                                                                            <td <?php if ($val != ""){ ?>style="color: #2c77f4; word-wrap: break-word; max-width: 30px; text-align: left; font-weight: bold;"<?php } ?>><?php echo $abstract_kw . " ";
                                                                                echo $assert_kw . " ";
                                                                                echo $break_kw . " ";
                                                                                echo $catch_kw . " ";
                                                                                echo $class_kw . " ";
                                                                                echo $const_kw . " ";
                                                                                echo $continue_kw . " ";
                                                                                echo $default_kw . " ";
                                                                                echo $do_kw . " ";
                                                                                echo $else_kw . " ";
                                                                                echo $enum_kw . " ";
                                                                                echo $extends_kw . " ";
                                                                                echo $final_kw . " ";
                                                                                echo $finally_kw . " ";
                                                                                echo $goto_kw . " ";
                                                                                echo $implements_kw . " ";
                                                                                echo $instanceof_kw . " ";
                                                                                echo $interface_kw . " ";
                                                                                echo $native_kw . " ";
                                                                                echo $new_kw . " ";
                                                                                echo $package_kw . " ";
                                                                                echo $private_kw . " ";
                                                                                echo $protected_kw . " ";
                                                                                echo $public_kw . " ";
                                                                                echo $return_kw . " ";
                                                                                echo $static_kw . " ";
                                                                                echo $strictfp_kw . " ";
                                                                                echo $super_kw . " ";
                                                                                echo $synchronized_kw . " ";
                                                                                echo $this_kw . " ";
                                                                                echo $throw_kw . " ";
                                                                                echo $throws_kw . " ";
                                                                                echo $transient_kw . " ";
                                                                                echo $try_kw . " ";
                                                                                echo $void_kw . " ";
                                                                                echo $volatile_kw . " ";
                                                                                echo $method_name . " ";
                                                                                echo $method_name11 . " ";
                                                                                echo $method_name22 . " ";
                                                                                echo $method_name33 . " ";
                                                                                echo "<br>"; ?><?php echo $tokenOp;
                                                                                echo "<br>"; ?><?php echo $tokenClass;
                                                                                echo "<br>"; ?><?php echo $tokenNumber;
                                                                                echo "<br>"; ?><?php echo $tokenString;
                                                                                echo "<br>"; ?></td>
                                                                            <td <?php if ($Nkw > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Nkw; ?></td>
                                                                            <td <?php if ($Nid > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Nid; ?></td>
                                                                            <td <?php if ($Nop > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Nop; ?></td>
                                                                            <td <?php if ($Nnv > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Nnv; ?></td>
                                                                            <td <?php if ($Nsl > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Nsl; ?></td>
                                                                            <td <?php if ($Cs > 0){ ?>style="color: #2c77f4; font-weight: bold; background-color: #e0e0e0"<?php } ?>><?php echo $Cs; ?></td>
                                                                            <?php

                                                                            $i++;

                                                                            $abstract_kw = "";
                                                                            $assert_kw = "";
                                                                            $break_kw = "";
                                                                            $catch_kw = "";
                                                                            $class_kw = "";
                                                                            $const_kw = "";
                                                                            $continue_kw = "";
                                                                            $default_kw = "";
                                                                            $do_kw = "";
                                                                            $else_kw = "";
                                                                            $enum_kw = "";
                                                                            $extends_kw = "";
                                                                            $final_kw = "";
                                                                            $finally_kw = "";
                                                                            $goto_kw = "";
                                                                            $implements_kw = "";
                                                                            $instanceof_kw = "";
                                                                            $interface_kw = "";
                                                                            $native_kw = "";
                                                                            $new_kw = "";
                                                                            $package_kw = "";
                                                                            $private_kw = "";
                                                                            $protected_kw = "";
                                                                            $public_kw = "";
                                                                            $return_kw = "";
                                                                            $static_kw = "";
                                                                            $strictfp_kw = "";
                                                                            $super_kw = "";
                                                                            $synchronized_kw = "";
                                                                            $this_kw = "";
                                                                            $throw_kw = "";
                                                                            $throws_kw = "";
                                                                            $transient_kw = "";
                                                                            $try_kw = "";
                                                                            $void_kw = "";
                                                                            $volatile_kw = "";
                                                                            $method_name = "";
                                                                            $method_name11 = "";
                                                                            $method_name22 = "";
                                                                            $method_name33 = "";

                                                                            }

                                                                            }
                                                                            }
                                                                            $_SESSION['total_cs'] = $total_cs;

                                                                            $query_disp_total = "INSERT INTO cs(CsValue) VALUES('$total_cs')";
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
                                                                    <button type="button" href="total_weight.php"
                                                                            class="btn btn-brand">
                                                                         Total
                                                                        Complexity
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
