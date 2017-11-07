<?php
namespace App;
include "project.php";
use Project\Table as ProjectTable;
class Table {
    static function get()
    {
        echo "App.Table.get \n";
    }
}

ProjectTable::get();