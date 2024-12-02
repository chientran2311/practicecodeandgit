<?php
require_once 'config.php';

Class properties {
    private $PropertyId;
    private $Type;
    private $PropertyName;
    private $Price;
    private $Location;
    private $AgentId;

    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host='.DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function setProperty($PropertyName,$Type,$Price,$Location, $AgentId) {
        $this->AgentId = $AgentId;
        $this->PropertyName = $PropertyName;
        $this->Type = $Type;
        $this->Location = $Location;
        $this->Price = $Price;
    }
    public function insert() {
        $sql = $this->db->prepare("INSERT INTO properties (PropertyId ,PropertyName,Type,Location,Price,AgentId ) Values (:propertyid ,:propertyname,:type,:location,:price,:agentId)");
        $sql->bindParam(":propertyid", $this->PropertyId, PDO::PARAM_INT);
        $sql->bindParam(":propertyname", $this->PropertyId, PDO::PARAM_STR);
        $sql->bindParam(":type", $this->PropertyId, PDO::PARAM_STR);
        $sql->bindParam(":location", $this->PropertyId, PDO::PARAM_STR);
        $sql->bindParam(":price", $this->PropertyId, PDO::PARAM_INT);
        $sql->bindParam(":agentId", $this->PropertyId, PDO::PARAM_INT);
        $sql->execute();
    }
    public function getAllData() {
        $sql = $this->db->prepare('select Properties.*, Agents.AgentName from Properties inner join Agents on Properties.AgentId = Agents.AgentId order by Properties.PropertyId asc');
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDataId() {
        $sql = $this->db->prepare('SELECT * FROM properties where PropertyId = :id');
        $sql->bindParam(':id', $this->PropertyId, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
    public function getDataById() {
        $query = $this->db->prepare('SELECT * FROM properties WHERE PropertyId = :id');
        $query->bindParam(':id', $this->PropertyId, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function updateData() {
        $query = $this->db->prepare('Update properties set `AgentId` = :AgentId, `PropertyName` = :PropertyName, `Type` = :Type, `Location` = :Location, `Location` = :Location, `Price` = :Price  where PropertyId = :PropertyId');
        $query->bindParam(':AgentId', $this->AgentId, PDO::PARAM_INT);
        $query->bindParam(':PropertyId', $this->PropertyId, PDO::PARAM_INT);
        $query->bindParam(':Price', $this->Price, PDO::PARAM_INT);
        $query->bindParam(':PropertyName', $this->PropertyName, PDO::PARAM_STR);
        $query->bindParam(':Type', $this->Type, PDO::PARAM_STR);
        $query->bindParam(':Location', $this->Location, PDO::PARAM_STR);
        $query->execute();
    }
    public function deleteData() {
        $sql = $this->db->prepare('DELETE From properties where PropertyId = :id');
        $sql->bindParam(':id', $this->PropertyId, PDO::PARAM_INT);
        $sql->execute(); 
    }
    public function SetPropertyId($PropertyId) {
        $this->PropertyId = $PropertyId;
    }
    public function SetType($Type) {
        $this->Type = $Type;
    }
    public function SetPropertyName($PropertyName) {
        $this->PropertyName = $PropertyName;
    }
        public function SetPrice($Price) {
            $this->Price = $Price;
    }
    public function SetLocation($Location) {
        $this->Location = $Location;
    }
    public function SetAgentId($AgentId) {
        $this->AgentId = $AgentId;
    }
    public function GetPropertyID() {
        return $this->PropertyId;
    }
    public function GetType() {
        return $this->Type;
    }
    public function GetPropertyName() {
        return $this->PropertyName;
    }
    public function GetPrice() {
        return $this->Price;
    }
    public function GetLocation() {
        return $this->Location;
    }
    public function GetAgentId() {
    return $this->AgentId;
    }

}


?>