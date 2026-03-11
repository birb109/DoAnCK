<?php
class Actor {
    private $conn;
    private $id;
    private $name;
    private $info;
    public function __construct($conn){
        $this->conn = $conn;
    }
    public function setActor($id,$name,$info){
        $this->id = $id;
        $this->name = $name;
        $this->info = $info;
    }
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getInfo(){
        return $this->info;
    }

    public function getCharacters($actor_id){
         $sql = "
        SELECT 
            Character_ID,
            Character_Name,
            Movie_ID
        FROM tbl_character
        WHERE Actor_ID = ?
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$actor_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $characters = [];
        while($row = $result->fetch_assoc()){
            $characters[] = $row;
        }
        return $characters;
    }
}
?>
