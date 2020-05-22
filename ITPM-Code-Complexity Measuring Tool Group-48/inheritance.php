<?php include 'include/header.php'; ?>
<?php include 'include/aside.php'; ?>

<?php
//function to sort the class_name using getBetween function
function getBetween($codeLine, $start, $end)
{
    $codeLine = " " . $codeLine;
    $ini = strpos($codeLine, $start);
    if ($ini == 0)
        return " ";
    $ini += strlen($start);
    $len = strpos($codeLine, $end, $ini) - $ini;
    return substr($codeLine, $ini, $len);
}
//To sort out the classes, direct inheritances and indirect inheritances using OOP
class inheritance
{
    public $name;
    public $indirect;
    public $superClass;
    function __construct()
    {
        $this->name = "";
        $this->indirect = 0;
        $this->superClass = null;
    }
    function set_name($name)
    {
        $this->name = $name;
    }
    function set_indirect($indirect)
    {
        $this->indirect = $indirect;
    }
    function set_extends($var)
    {
        $this->superClass = $var;
    }
    function get_extends()
    {
        return $this->superClass;
    }
    function get_name()
    {
        return $this->name;
    }
    function get_direct()
    {
        global $weight_no_ud_class; //weight due to zero user-defined class
        global $weight_one_ud_class;//weight due to one user-defined class
        if (is_string($this->superClass)) {
            $ix = $weight_one_ud_class;
        } else {
            $ix = $weight_no_ud_class;
        }
        return $ix;
    }
    function get_indirect()
    {
        global $weight_one_ud_class;//weight due to one user-defined class
        return $this->indirect * $weight_one_ud_class   ;
    }
}
//Function to find No Of Indirect Inheritances
function findNidi($extend)
{
    global $classes;
    global $cnt;
    foreach ($classes as $key) {
        if ($key->get_name() == $extend) {
            $name1 = $key->get_extends();
            if (!empty($name1)) {
                $cnt++;
                findNidi($name1);
            }
        }
    }
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
                            <h3 class="kt-subheader__title">Inheritance Complexity</h3>
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

                    $lastRow = "SELECT * FROM ( SELECT * FROM ci ORDER BY CiID DESC LIMIT $limit) result ORDER BY CiID ASC";
                    $run_query_last = mysqli_query($con,$lastRow);

                    
                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                        $CiID_last = $lastrow['CiID'];
                        $CiValue_last = $lastrow['CiValue'];

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

                                                                        <center><h1 style="font-family: 'Fira Code'">Ci
                                                                                : <?php echo $CiValue_last ?>


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
                                                                    <table style="font-family: 'Fira Code'; text-align: center"
                                                                           class="table table-striped- table-bordered table-hover"
                                                                           id="kt_table_1">
                                                                        <thead>
                                                                        <tr class="kt-label-bg-color-1"
                                                                            style="font-family: 'Fira Code Medium'">
                                                                            <th>Count</th>
                                                                            <th>Class Name</th>
                                                                            <th>No. of direct inheritances</th>
                                                                            <th>No. of indirect inheritances</th>
                                                                            <th>Total inheritances</th>
                                                                            <th style="color: white" class="kt-label-bg-color-2">Ci</th>

                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php

                                                                        $lastRow = "SELECT * FROM inheritance ORDER BY InheritanceID DESC LIMIT 1";
                                                                        $run_query_last = mysqli_query($con, $lastRow);

                                                                        while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                                                                        $InheritanceID_last = $lastrow['InheritanceID'];
                                                                        $NoInheritance_last = $lastrow['NoInheritance'];
                                                                        $OneUserDefined_last = $lastrow['One'];
                                                                        $TwoUserDefined_last = $lastrow['Two'];
                                                                        $ThreeUserDefined_last = $lastrow['Three'];
                                                                        $MoreUserDefined_last = $lastrow['MoreThree'];


                                                                        $i = 0;  //increment to each loop
                                                                        $line_count = 0;
                                                                        $count = 0;
                                                                        $count2 = 0;
                                                                        $total_ci = 0;

                                                                        //Default weights
                                                                        $weight_no_ud_class = $NoInheritance_last;
                                                                        $weight_one_ud_class = $OneUserDefined_last;
                                                                        $weight_two_ud_class = $TwoUserDefined_last;
                                                                        $weight_three_ud_class = $ThreeUserDefined_last;
                                                                        $weight_more_ud_class = $MoreUserDefined_last;


                                                                        // sorting classes end
                                                                        $count = 0;
                                                                        $classes = [];  //array to store class objects
                                                                        $inClasses = false;
                                                                        $parsed1 = null;
                                                                        $parsed2=null;
                                                                        $pos=null;
                                                                        $pos1=null;
                                                                        $indirect = 0;
                                                                        $tot_inheritance = 0;



                                                                        foreach ($split

                                                                        as $val) { // Traverse the array with FOREACH

                                                                        $direct = 0;
                                                                        $indirect = 0;
                                                                        $tot_inheritance = 0;
                                                                        $ci = 0;

                                                                        //Calling the two functions of getBetween to sort the class_names
                                                                        $val;
                                                                        $arr = $val;

                                                                        // $parent_class = $parsed;
                                                                        // $child_class = $parsed1;
                                                                        // $found_parent = $parsed2;
                                                                        $parsed = getBetween($arr, "class", "{");

                                                                        $parsed1 = getBetween($arr, "class", "extends");

                                                                        $parsed2 = getBetween($arr, "extends", "{");

                                                                        //pos_extends = pos;
                                                                        //pos_class = pos1;

                                                                        $word_1 = 'extends';
                                                                        $pos = strpos($arr, $word_1);

                                                                        $word_2 = "class";
                                                                        $pos1 = strpos($arr, $word_2);

                                                                        $pos2 = strpos($arr, $parsed2);


                                                                            //To check the classes and push classes as objects into an array
                                                                            if (is_integer($pos1)) {


                                                                                if (is_integer($pos)&& is_string($parsed1)) {
                                                                                    $p = $parsed1 ;

                                                                                }
                                                                                elseif(is_integer($pos) && is_string($parsed)){
                                                                                    $p = $parsed;
                                                                                }

                                                                                else if(is_integer($pos1)&& is_string($parsed)){
                                                                                    $p = $parsed ;

                                                                                }

                                                                                $className = $p;

                                                                                foreach ($classes as $key) {
                                                                                    if ($key->get_name() == $className) {
                                                                                        $inClasses = true; //inClasses is the array where the class objects are stored
                                                                                    }
                                                                                }

                                                                                if (!$inClasses) {

                                                                                    $classObj = new inheritance;
                                                                                    $classObj->set_name($className);

                                                                                    array_push($classes, $classObj);
                                                                                }


                                                                                if ($pos == true && is_string($parsed1)) {
                                                                                    foreach ($classes as $key) {
                                                                                        if ($key->get_name() == $parsed1) {
                                                                                            $key->set_extends($parsed2);
                                                                                        }
                                                                                    }
                                                                                }
                                                                                //pushing ends

                                                                            }
                                                                        }

                                                                            $i = 0;
                                                                            $cnt = 0;

                                                                            //Call NIDI function recursively and set No Of Indirect Inheritances of the class object
                                                                            foreach ($classes as $key) {
                                                                                $firstName = $key->get_name();
                                                                                $name = $key->get_extends();
                                                                                if (!empty($name)) {
                                                                                    $cnt ++;
                                                                                    findNidi($name);
                                                                                    $key->set_indirect($cnt-1);
                                                                                }

                                                                            }


                                                                        ?>

                                                                        <?php
                                                                        foreach ($classes as $key) {
                                                                        $tot_inheritance = $key->get_direct()  + $key->get_indirect() ; //Total inheritances = NoOfDirect + NoOfIndirect
                                                                        $i++;


                                                                        //If Ti value is less than or equal to three, then Ci = Ti.
                                                                        if ($tot_inheritance <=3 ){
                                                                            $ci = $tot_inheritance;
                                                                        }else{ //If the Ti value is greater than three, then Ci = 4
                                                                            $ci = 4;
                                                                        }
                                                                        $total_ci = $total_ci + $ci;


                                                                        ?>

                                                                            <tr>
                                                                            <td><?php echo $i ; ?></td>
                                                                            <td style="text-align: left"><?php
                                                                                echo $key->get_name();
                                                                                ?></td>
                                                                            <td><?php echo $key->get_direct() ; ?></td>
                                                                            <td><?php echo $key->get_indirect() ; ?></td>
                                                                            <td><?php echo $tot_inheritance; ?></td>
                                                                            <td><?php echo $ci; ?></td>


                                                                        <?php } ?>

                                                                            <?php

                                                                            $i++;





                                                                            }

                                                                            $_SESSION['total_ci'] = $total_ci;

                                                                            $query_disp_total = "INSERT INTO ci(CiValue) VALUES('$total_ci')";
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
                                                                         Total Complexity
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
