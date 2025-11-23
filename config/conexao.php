<?php
    class conexao {
        private $host = 'localhost';
        private $db_name = 'livrariatop';
        private $username = 'root';
        private $password = '';

        public function conectar() {
            try {
                
                return new PDO("mysql:host=".self::$host.";dbname=".self::$db_name, self::$username, self::$password);
                
            } catch (PDOException $e) {
                die("Erro de conexão: " . $e->getMessage());
        }
    }
}
?>