<?php
require_once("config.php");
 Class agents {
    private $AgentId;
    private $AgentName;
    private $ContactInfo;

    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host='.DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getAgentdata(){
        $sql = $this->db->prepare('select * from agents');
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function setAgentId($agentId) {
        $this->AgentId = $agentId;
    }
    public function setAgentName($agentName) {
        $this->AgentName = $agentName;
    }
    public function setContactInfo($ContactInfo) {
        $this->ContactInfo = $ContactInfo;
    }
    public function GetAgentId() {
        return $this->AgentId;
    }
    public function GetContactInfo() {
        return $this->ContactInfo;
    }
    public function GetAgentName() {
        return $this->AgentName;
    }
 }
?>