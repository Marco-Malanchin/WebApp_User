<?php 
    Class Order
    {
        protected $conn;
        protected $table_name = "`order`";

        protected $user_ID;
        protected $total_price;
        protected $date_hour_sale;
        protected $break_ID;
        protected $status_ID;
        protected $pickup_ID;
        protected $json;


        //chi deve calcolare il prezzo totale del carrello? quelli che fanno il carrello

        public function __construct($db)
        {
            $this->conn = $db;
        }

        function getArchiveOrder() // Ottiene tutti gli ordini
        {
            $query = "SELECT * FROM $this->table_name";

            $stmt = $this->conn->query($query);

            return $stmt;
        }

        function getArchiveOrderPaninara(){
            $query = "select o.id as 'id', u.email as 'user', o.created as 'created', p.name as 'pickup', b.`time` as 'break', s.description as 'status'
            from `order` o 
            left join `user` u on u.id = o.`user` 
            left join break b on b.id  = o.break 
            left join pickup p on p.id = o.pickup 
            left join status s ON s.id = o.status
            where o.status = 1;";

            $stmt = $this->conn->query($query);

            return $stmt;
        }

        function getOrder($id) // Ottiene l'ordine con l'id passato alla funzione
        {
            $query = "SELECT * FROM $this->table_name WHERE id = $id";

            $stmt = $this->conn->query($query);

            return $stmt;
        }

        function getArchiveOrderStatus($id) // Ottiene gli ordini in base allo stato
        {
            $query = "SELECT * FROM $this->table_name WHERE status = $id";

            $stmt = $this->conn->query($query);

            return $stmt;
        }

        function getArchiveOrderBreak($id) // Ottiene gli ordini in base alla ricreazione
        {
            $query = "SELECT * FROM $this->table_name WHERE break = $id";

            $stmt = $this->conn->query($query);

            return $stmt;
        }

        function getArchiveOrderUser($id) // Ottiene gli ordini in base alla ricreazione
        {
            $query =    "SELECT o.id as 'id', u.email as 'user', o.created as'created', p.name as 'pickup', b.`time`  as 'break', s.description  as 'status'
            FROM `order` o
            inner join `user` u on u.id = o.`user`
            inner join pickup p on p.id = o.pickup 
            inner join break b on b.id = o.break
            inner join status s on s.id = o.status
            WHERE user = '".$id."'
            order by o.created asc;";

            $stmt = $this->conn->query($query);

            return $stmt;
        }

        function delete($id){ // Annulla un ordine

            $query = "UPDATE $this->table_name SET status = 3 WHERE id = $id";

            $stmt = $this->conn->query($query);

            return $stmt;
        }



        /*
            Esempio body da passare alla funzione

            {
                "user_ID": 1,
                "total_price": 15.50,
                "break_ID": 1,
                "status_ID": 1,
                "pickup_ID": 1,
                "products": [
                        {"ID": 1, "quantity": 1},
                        {"ID": 2, "quantity": 1},
                        {"ID": 3, "quantity": 2}
                    ],
                "json": {
                "user_ID": 1,
                "total_price": 15.50,
                "break_ID": 1,
                "status_ID": 1,
                "pickup_ID": 1,
                "products": [
                        {"name": "panino al prosciutto", "price": 3, "quantity":1},
                        {"name": "panino al salame", "price": 3, "quantity":1},
                        {"name": "panino proteico", "price": 3, "quantity":2}
                    ]
                }
            }
        */
        /*
        'id' => $id,
        'user' => $user,
        'created' => $created,
        'pickup' => $pickup,
        'break' => $break,
        'status' => $status,
        'json' => json_decode($json)
        */
        function setOrder($user_ID, $break_ID, $status_ID, $pickup_ID, $json){ // Crea un ordine di vetrina

            $query = "INSERT INTO $this->table_name (`user`,break, status, pickup, json)
                      VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('iiiis', $user_ID,  $break_ID, $status_ID, $pickup_ID, $json);
            if ($stmt->execute())
            {
                return $stmt;
            }
            else
            {
                return "";
            }
        }
        function getProductsOrder($id_order){
        $sql = "select p.id as 'id', p.name as 'name', po.quantity as 'quantity', sum(po.quantity*p.price) as 'price'
        from `order` o 
        inner join product_order po on po.`order` = o.id 
        inner join product p on p.id = po.product 
        where o.id='".$id_order."' 
        group by p.id;";

        $result = $this->conn->query($sql);

        return $result;
        }

        function getPriceOrder($id_order){
        $sql = "select sum(po.quantity*p.price) as 'price'
            from `order` o 
            inner join product_order po on po.`order` = o.id 
            inner join product p on p.id = po.product 
            where o.id='".$id_order."' 
            group by o.id;";
    
            $result = $this->conn->query($sql);
    
            return $result;
        }

        function getOrderByClassAndBreak(){
        $sql = "select distinct  o.id as 'id', c.`year` as 'year', c.`section` as 'section', o.created as 'created', p.name as 'pickup', b.`time` as 'break', s.description as 'status'
        from `order` o 
        inner join `user` u on u.id = o.`user` 
        inner join user_class uc on uc.`user` = u.id 
        inner join class c on c.id = uc.class 
        left join break b on b.id  = o.break 
        left join pickup p on p.id = o.pickup 
        left join status s ON s.id = o.status
        where o.status = 1
        order by o.created asc;";

        $result = $this->conn->query($sql);

        return $result;
        }
        
        function setStatusPaninara($id, $status){
            $sql = "update `order` o
                    set status = '".$status."'
                    where o.id = '".$id."';";
    
            $result = $this->conn->query($sql);
    
            return $result;
        }
    }
?>