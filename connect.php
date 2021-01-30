<?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$query = new MongoDB\Driver\Query([]);

$rows = $manager->executeQuery("enaplo.tanulok", $query);

?>