<?php

if (!isset($_GET['reload'])) {

    echo '<meta http-equiv=Refresh content="0;url=total_weight.php?reload=1">';

}


?>

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
        return $this->indirect * $weight_one_ud_class;
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
    $zipfiles = glob('uploads/*.zip'); //get all file names with extension .zip
    foreach($zipfiles as $zips){
        if(is_file($zips))
            unlink($zips); //delete zip file
    }

} else {
    echo $GLOBALS['status']['error'];
}

$zipfiles = glob('uploads/*.zip'); //get all file names with extension .zip
foreach($zipfiles as $zips){
    if(is_file($zips))
        unlink($zips); //delete zip file
}

if ($handle = opendir('uploads')) {

    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {

            $entry_arr_af = preg_split("/\.java/", $entry);
            $entry_arr = array_filter($entry_arr_af);


            foreach ($entry_arr as $files) {

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


                <?php include 'include/total_weight_content.php'; ?>


                <?php


            }


        }


    }
    closedir($handle);
}

?>


<?php include 'include/footer.php'; ?>
