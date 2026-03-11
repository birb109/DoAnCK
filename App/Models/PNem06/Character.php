<?php
class Character {
    private $conn;
    private $id;
    private $name;
    public function __construct($conn){
        $this->conn = $conn;
    }
    public function setCharacter($id,$name){
        $this->id = $id;
        $this->name = $name;
    }
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getCharInfo($char_id){

        $sql = "
        SELECT 
            c.name AS character_name,
            a.name AS actor_name,
            m.title AS movie_title
        FROM character c
        JOIN actor a ON c.actor_id = a.id
        JOIN movie m ON c.movie_id = m.id
        WHERE c.id = ?
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$char_id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

?>
