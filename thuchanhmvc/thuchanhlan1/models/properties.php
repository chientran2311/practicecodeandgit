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
    public function setProperty($PropertyId,$PropertyName,$Type,$Price,$Location, $AgentId) {
        $this->PropertyId = $PropertyId;
        $this->Type = $Type;
        $this->Price = $Price;
        $this->Location = $Location;
        $this->AgentId = $AgentId;
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
        $sql = $this->db->query('select Properties.*, Agents.AgentName from Properties inner join Agents on Properties.AgentId = Agents.AgentId order by Properties.PropertyId asc');
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
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