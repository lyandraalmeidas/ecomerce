<?php

    class cliente{

        private $pdo;
        
        public function __construct(){
            $this->pdo = new PDO('mysql:host=localhost;dbname=ebookscloud', 'root', '');
        }

        public function getCliente($email)
        {
            $sql = select id, nome, ativo * from clientes where email = :email;
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindValue(':email', $email);
            $consulta->execute();
            
            return $consulta->fetch(PDO::FETCH_ASSOC);
            
        }


}