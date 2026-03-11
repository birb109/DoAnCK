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
            c.id,
            c.name AS character_name,
            m.title AS movie_title
        FROM character c
        JOIN movie m ON c.movie_id = m.id
        WHERE c.actor_id = ?
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
