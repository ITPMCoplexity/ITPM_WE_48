<?php
$db['db_host'] = 'localhost';
$db['db_username'] = 'root';
$db['db_password'] = '';
$db['db_name'] = 'weightcomplexity';
$db['db_port'] = '3306';

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
if ($con) {
} else {
    ?>

    


    <?php
    die('<p style="font-size: 20px; font-weight: bold; text-align: center; margin-top: -8%;">Database Connection Error Occurred<br></p><p style="font-size: 15px; text-align: center;">Sorry for the inconvenience caused</p>');


}
?>
