<?php
    /* Testing PHPconnection with MongoDB and getting documents from a database */

    // making sure the extension is loaded
    if (extension_loaded("mongodb")) {
        try{

            // create the manager with the default server address
            $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

            // this is the query that will get all documents
            $query = new MongoDB\Driver\Query([]);

            // execute query and return a cursour that can iterate over the results
            $rows = $manager->executeQuery("enaplo.tanulok", $query);

            foreach($rows as $row){
                echo "<h1>$row->nev</h1>";
                //echo '<pre>',var_dump($row->jegyek),'</pre>';

                foreach ($row->jegyek as $honap) {
                    //echo "<pre>",var_dump($honap),"</pre>";

                    foreach ($honap->szeptember as $jegy) {
                        echo "<pre>",var_dump($jegy),"</pre>";
                    }
                }
            }
        }
        catch(MongoConnectionException $e){
            var_dump($e);
        }
    }
?>