<?php 
    require_once '../config/conexao.php';
    require_once '../models/cliente.php';
    
    class indexcontroler {

        public $cliente;

        public function __construct(){
            $db = new conexao();
            $pdo = $db->conectar();
            $this->cliente = new cliente($pdo);
        }

        public function index(){

        }

        public function verificar($email, $senha_hash){
            $dadosCliente = $this->cliente->getCliente($email);
            
            if (empty ($dadosCliente)) {
                echo "<script>mensagem = 'Usuario não encontrado!'</script>";
                return false;
            }
            else if 

        }
    }