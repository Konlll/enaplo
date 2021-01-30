<?php

    if(extension_loaded('mongodb')){
        require('connect.php');

        if (isset($_POST["mentes"])) {
            $mod = $_POST["mod"];
            $tema = $_POST["tema"];
            $date = $_POST["date"];

            foreach($rows as $row){
                $jegy = $_POST[sha1($row->nev)];

                echo $mod."<br>";
                echo $tema."<br>";
                echo $date."<br>";
                echo $jegy."<br>";

                $new_jegy = [
                    'jegy_id' => rand(),
                    'tipus' => $mod, 
                    'tema' => $tema, 
                    'jegy' => $jegy,
                    'datum' => $date
                ];
                if($jegy !== null){
                    $bulk = new MongoDB\Driver\BulkWrite;
                    if(strpos($date, "-09-")){
                        $bulk->update(
                            array("id" => $row->id),
                            array('$push' => array("szeptember" => $new_jegy))
                        );
                        $manager->executeBulkWrite('enaplo.tanulok', $bulk);
                    }
                    if(strpos($date, "-10-")){
                        $bulk->update(
                            array("id" => $row->id),
                            array('$push' => array("oktober" => $new_jegy))
                        );
                        $manager->executeBulkWrite('enaplo.tanulok', $bulk);
                    }
                    if(strpos($date, "-11-")){
                        $bulk->update(
                            array("id" => $row->id),
                            array('$push' => array("november" => $new_jegy))
                        );
                        $manager->executeBulkWrite('enaplo.tanulok', $bulk);
                    }
                    if(strpos($date, "-12-")){
                        $bulk->update(
                            array("id" => $row->id),
                            array('$push' => array("december" => $new_jegy))
                        );
                        $manager->executeBulkWrite('enaplo.tanulok', $bulk);
                    }
                    if(strpos($date, "-02-")){
                        $bulk->update(
                            array("id" => $row->id),
                            array('$push' => array("februar" => $new_jegy))
                        );
                        $manager->executeBulkWrite('enaplo.tanulok', $bulk);
                    }
                    if(strpos($date, "-03-")){
                        $bulk->update(
                            array("id" => $row->id),
                            array('$push' => array("marcius" => $new_jegy))
                        );
                        $manager->executeBulkWrite('enaplo.tanulok', $bulk);
                    }
                    if(strpos($date, "-04-")){
                        $bulk->update(
                            array("id" => $row->id),
                            array('$push' => array("aprilis" => $new_jegy))
                        );
                        $manager->executeBulkWrite('enaplo.tanulok', $bulk);
                    }
                    if(strpos($date, "-05-")){
                        $bulk->update(
                            array("id" => $row->id),
                            array('$push' => array("majus" => $new_jegy))
                        );
                        $manager->executeBulkWrite('enaplo.tanulok', $bulk);
                    }
                    if(strpos($date, "-06-")){
                        $bulk->update(
                            array("id" => $row->id),
                            array('$push' => array("junius" => $new_jegy))
                        );
                        $manager->executeBulkWrite('enaplo.tanulok', $bulk);
                    }
                }

                header('location: index.php');
            }
        }

        if(isset($_POST['megse'])){
            header('location: index.php');
        }

        if(isset($_POST['torles'])){
            $date = $_POST['szdate'];
            echo "POST kérésben átjött jegyid: ".$_POST['jegyid']."<br>";
            // Végig megy az adatbázison hogy hivatkozni tudjak a jegy_id-re.
            foreach ($rows as $row) {
                foreach ($row as $honapok) {
                    if($honapok == null){
                        // ne csináljon semmit
                    } else {
                        foreach((array)$honapok as $jegy) {
                            echo "<pre>".var_dump($jegy)."</pre>";
                            if ($jegy['jegy_id'] == $_POST['jegyid']) {
                                $bulk = new MongoDB\Driver\BulkWrite;

                                if(strpos($date, "-09-")){
                                    # Ez kitörli az adott hónapból az összes jegyet.
                                    /*$bulk->update(
                                        array("id" => $row->id),
                                        array('$set' => array("oktober" => []))
                                    );
                                    $manager->executeBulkWrite('enaplo.tanulok', $bulk);*/
                                }

                            }
                        }
                    }
                }
            }
        }
    }
?>