<?php

spl_autoload_register(function ($class) {
    require __DIR__ . "/../COMMON/$class.php";
});

set_exception_handler("errorHandler::handleException");
set_error_handler("errorHandler::handleError");

class PickUp
{
    protected $conn;

    
    public function __construct($db)
    {
        $this->conn=$db;
    }

    /*private Connect $db;
    private PDO $conn;

    public function __construct()
    {
        $this->db = new Connect;
        $this->conn = $this->db->getConnection();
    }*/


    public function getArchivePickup()
    {
        // Da rivedere la query
        $sql = "SELECT id,name
            FROM pickup
            WHERE 1=1";

        return $this->conn->query($sql);

        /*$stmt = $this->conn->prepare($sql);

        return $stmt->execute();*/
    }

    public function addPickup($name){ 

        $sql = sprintf("INSERT INTO pickup (name)
        VALUES('%s');",
        $this->conn->real_escape_string($name));

        $result = $this->conn->query($sql);

        return $result;
    }

    public function getPickupId($id){
        $query = "select o.id as 'id', u.email as 'user', o.created as 'created', p.name as 'pickup', b.`time` as 'break', s.description as 'status'
            from `order` o 
            left join `user` u on u.id = o.`user` 
            left join break b on b.id  = o.break 
            left join pickup p on p.id = o.pickup 
            left join status s ON s.id = o.status
            where o.pickup = '".$id."'; ";

            $stmt = $this->conn->query($query);

            return $stmt;
    }
}
