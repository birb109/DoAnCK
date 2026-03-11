<?php
class Director {
    private $conn;
    private $id;
    private $name;
    private $info;
    private $social;
    public function __construct($conn){
        $this->conn = $conn;
    }
    public function setDirector($id,$name,$info,$social){
        $this->id = $id;
        $this->name = $name;
        $this->info = $info;
        $this->social = $social;
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
    public function getSocial(){
        return $this->social;
    }
    public function getDirectedMovies($director_id){

        $sql = "SELECT * 
                FROM movie
                WHERE director_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$director_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $movies = [];
        while($row = $result->fetch_assoc()){
            $movies[] = $row;
        }
        return $movies;
    }
}
?>
