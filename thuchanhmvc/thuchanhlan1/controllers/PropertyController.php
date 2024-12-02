<?php 
require_once ("models/properties.php");
require_once ("models/agents.php");

class PropertyController {
    public function index() {
        $object = new properties();
        $propertyList = $object->getAllData();
        require "views/index.php";
    }
    public function insert() {
    $object = new agents();
    $AgentList = $object->getAgentdata();
    require "views/insert.php";
    }
    public function edit() {
        $id = $_GET['id'];
        $object = new agents();
        $agentList = $object->getAgentdata();

        $object = new properties();
        $object->SetPropertyId($id);
        $property = $object->getDataId();
        $selectedAgentId = $property['AgentId'];
        require 'views/update.php';


    }
    public function store() {
        if (
            isset($_POST["PropertyName"]) &&
            isset($_POST["Type"]) &&
            isset($_POST["Price"]) &&
            isset($_POST["Location"]) &&
            isset($_POST["AgentId"]) 
        ) {
            $property = new Properties();
            $property->setProperty($_POST["AgentId"],$_POST["PropertyName"], $_POST["Type"],$_POST["Location"],$_POST["Price"]);
            $property->insert();

            header('location: index.php?controller=property&action=index');
        }
    }
    public function save() {
        if (
            isset($_POST["PropertyName"]) &&
            isset($_POST["Type"]) &&
            isset($_POST["Price"]) &&
            isset($_POST["Location"]) &&
            isset($_POST["AgentId"])  &&
            isset($_POST["PropertyId"]) 
        ) {
            $property = new Properties();

            $property->setProperty($_POST["PropertyName"], $_POST["Type"],$_POST["Location"],$_POST["Price"],$_POST["AgentId"]);
            $property->setPropertyId($_POST["PropertyId"]);

            $property->updateData();

            header('location: web.php?controller=property&action=index');
        }
    }
    public function delete() {
        $id = $_GET['id'];
        $object = new properties();
        $object->SetPropertyId($id);
        $object->deleteData();
        header('location: web.php?controller=property&action=index');
    }
}

?>