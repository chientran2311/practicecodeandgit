<?php 
require_once ("models/properties.php");
require_once ("models/agents.php");

class PropertyController {
    public function index() {
        $object = new properties();
        $propertyList = $object->getAllData();
        require "views/index.php";
    }
}

?>