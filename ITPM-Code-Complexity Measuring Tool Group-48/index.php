<?php include 'include/header.php'; ?>
<?php include 'include/aside.php'; ?>

<?php

if (!is_dir('uploads')) {
    if (!mkdir('uploads', 0777, true) && !is_dir('uploads')) {
        throw new \RuntimeException(sprintf('Directory "%s" was not created', 'uploads'));
    }
}

unset ($_SESSION["split_code"]);
unset ($_SESSION["trimmed"]);
unset ($_SESSION["filename"]);
unset ($_SESSION["row_count"]);
unset ($_SESSION["entireCode"]);


$folder = 'uploads';


$files = glob($folder . '/*');


foreach ($files as $file) {
    
    if (is_file($file)) {
        
        unlink($file);
    }
}

if (!isset($_COOKIE[$cookie_name])) {

    $resetWeights_size = "DELETE FROM size WHERE SizeID NOT IN ( SELECT * FROM ( SELECT SizeID FROM size ORDER BY SizeID LIMIT 1) s)";
    $resetWeights_variables = "DELETE FROM variables WHERE VariableID NOT IN ( SELECT * FROM ( SELECT VariableID FROM variables ORDER BY VariableID LIMIT 1) s)";
    $resetWeights_methods = "DELETE FROM methods WHERE MethodID NOT IN ( SELECT * FROM ( SELECT MethodID FROM methods ORDER BY MethodID LIMIT 1) s)";
    $resetWeights_inheritance = "DELETE FROM inheritance WHERE InheritanceID NOT IN ( SELECT * FROM ( SELECT InheritanceID FROM inheritance ORDER BY InheritanceID LIMIT 1) s)";
    $resetWeights_coupling = "DELETE FROM coupling WHERE CouplingID NOT IN ( SELECT * FROM ( SELECT CouplingID FROM coupling ORDER BY CouplingID LIMIT 1) s)";
    $resetWeights_controlStructures = "DELETE FROM controlstructures WHERE ControlStructureID NOT IN ( SELECT * FROM ( SELECT ControlStructureID FROM controlstructures ORDER BY ControlStructureID LIMIT 1) s)";

    mysqli_query($con, $resetWeights_size);
    mysqli_query($con, $resetWeights_variables);
    mysqli_query($con, $resetWeights_methods);
    mysqli_query($con, $resetWeights_inheritance);
    mysqli_query($con, $resetWeights_coupling);
    mysqli_query($con, $resetWeights_controlStructures);

}

$resetCs = "DELETE FROM cs WHERE CsID NOT IN ( SELECT * FROM ( SELECT CsID FROM cs ORDER BY CsID LIMIT 1) s)";
$resetCv = "DELETE FROM cv WHERE CvID NOT IN ( SELECT * FROM ( SELECT CvID FROM cv ORDER BY CvID LIMIT 1) s)";
$resetCm = "DELETE FROM cm WHERE CmID NOT IN ( SELECT * FROM ( SELECT CmID FROM cm ORDER BY CmID LIMIT 1) s)";
$resetCi = "DELETE FROM ci WHERE CiID NOT IN ( SELECT * FROM ( SELECT CiID FROM ci ORDER BY CiID LIMIT 1) s)";
$resetCcp = "DELETE FROM ccp WHERE CcpID NOT IN ( SELECT * FROM ( SELECT CcpID FROM ccp ORDER BY CcpID LIMIT 1) s)";
$resetCcs = "DELETE FROM ccs WHERE CcsID NOT IN ( SELECT * FROM ( SELECT CcsID FROM ccs ORDER BY CcsID LIMIT 1) s)";

$resetTotalComp = "DELETE FROM totalcomplexity WHERE totalcomplexityID NOT IN ( SELECT * FROM ( SELECT totalcomplexityID FROM totalcomplexity ORDER BY totalcomplexityID LIMIT 1) s)";
$resetFinalComp = "DELETE FROM finaltotal WHERE FinalTotalID NOT IN ( SELECT * FROM ( SELECT FinalTotalID FROM finaltotal ORDER BY FinalTotalID LIMIT 1) s)";

$resetInherit = "DELETE FROM inheritancetotal WHERE inheri_tot_ID NOT IN ( SELECT * FROM ( SELECT inheri_tot_ID FROM inheritancetotal ORDER BY inheri_tot_ID LIMIT 0) s)";
$resetInheritfinal = "DELETE FROM inheritancefinaltotal WHERE inherifinal_total_ID NOT IN ( SELECT * FROM ( SELECT inherifinal_total_ID FROM inheritancefinaltotal ORDER BY inherifinal_total_ID LIMIT 0) s)";

mysqli_query($con, $resetCs);
mysqli_query($con, $resetCv);
mysqli_query($con, $resetCm);
mysqli_query($con, $resetCi);
mysqli_query($con, $resetCcp);
mysqli_query($con, $resetCcs);

mysqli_query($con, $resetTotalComp);
mysqli_query($con, $resetFinalComp);

mysqli_query($con, $resetInherit);
mysqli_query($con, $resetInheritfinal);

?>


<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
              
                
                

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

    

    
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        
        <div class="row">
            <div class="col-lg-12">
            
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Upload a File From Your PC
                        </h3>
                    </div>
                </div>

                
                <form action="total_weight.php" method="post" enctype="multipart/form-data"
                      class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">

                        
                        <div class="form-group row">

                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
                                    <div class="dropzone-msg dz-message needsclick">
                                        <h3 class="dropzone-msg-title">Drop Files Here or Click to Upload</h3>
                                        <span class="dropzone-msg-desc">Compatible with Java & C++</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-7 ml-lg-auto">

                                    <button type="submit" name="upload" id="upload" class="btn btn-brand">Upload
                                    </button>
                                    <button onclick="location.href='index.php'" type="reset" id="reset"
                                            class="btn btn-secondary">Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                
            </div>
            </div>
            </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div >
                    <div class="kt-portlet__body">
                        <div class="kt-iconbox__body">
                            <div class="kt-iconbox__icon">
                                
                            </div>
                            <div class="kt-iconbox__desc">
                                <h3 class="kt-iconbox__title">
                                    <a class="kt-link" href="">OR</a>
                                </h3>
                                <div class="kt-iconbox__content">
                                    Write the code below 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        
        <div class="row">
            <div class="col-lg-12">
            
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Write Your Code Below
                        </h3>
                    </div>
                </div>

                
                <form action="paste_content.php" method="post" class="kt-form kt-form--fit kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="form-group row is-valid">


                            <div class="col-lg-12 col-md-9 col-sm-12">
                                <textarea name="paste_contents" id="paste_contents" class="form-control"
                                          data-provide="markdown" rows="20"></textarea>

                            </div>
                        </div>

                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-7 ml-lg-auto">
                                    <input type="submit" name="submit_content" id="submit_content"
                                           class="btn btn-brand">
                                    <input type="hidden" name="submit_content" value="1">
                                    <button onclick="location.href='index.php'" type="reset" class="btn btn-secondary">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                
            </div>

        </div>        
        </div>

        
    </div>
    
</div>

<?php include 'include/footer.php'; ?>
