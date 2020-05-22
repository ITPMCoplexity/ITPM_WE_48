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
                            global $weight_no_ud_class;
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
                            $parsed2 = null;
                            $pos = null;
                            $pos1 = null;
                            $indirect = 0;
                            $tot_inheritance = 0;


                            foreach ($split as $val) { // Traverse the array with FOREACH

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

                            foreach ($classes as $key) {
                                $tot_inheritance = $key->get_direct()  + $key->get_indirect() ; //Total inheritances = NoOfDirect + NoOfIndirect
                                $i++;


                                //If Ti value is less than or equal to three, then Ci = Ti.
                                if ($tot_inheritance <=3 ){
                                    $ci = $tot_inheritance;
                                }else{ //If the Ti value is greater than three, then Ci = 4
                                    $ci = 4;
                                }
                                $total_ci += $ci;

                                $printinval = $key->get_name();

                                $queryinherit = "INSERT INTO inheritancetotal(inheritanceWord, Ci_tot) VALUES('$printinval','$ci')";
                                $create_queryinherit = mysqli_query($con, $queryinherit);

                            }


                    }


?>
