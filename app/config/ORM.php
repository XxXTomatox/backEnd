<?php
    namespace config;
    use config\Conexion;

    use PDO;
    use PDOException;
    class ORM{
        protected $tabla;
        protected $id_tabla;
        protected $atributos;
        private $query;
        private $contadorWhere;
        function __construct(){
            $this->atributos = $this->atributos_tabla();        
        }
  
        private function atributos_tabla(){
            try {
                $consulta = Conexion::obtener_conexion()->prepare("DESCRIBE $this->tabla");
            $consulta->execute();
            $campos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $atributos = [];
            foreach($campos as $campo){
                array_push($atributos,$campo['Field']);              
            }
            return $atributos;     
            }  catch (PDOException $e) {
                echo json_encode("Error en la consulta".$e);
            }   
               
        }

        public function where($campo,$valor_campo,$tipo="AND"){
            try {
                $queryFinal= $this->query;
                if ($this->contadorWhere > 0) {
                    $queryFinal = "$queryFinal ".($tipo != "AND" ? 'OR' : $tipo)." $campo = '$valor_campo'";
                }else{
                    $this->query = "$queryFinal WHERE $campo = '$valor_campo'"; 
                }
                $this->contadorWhere++;
                return $this;
            } catch (PDOException $e) {
                echo json_encode("Error en la consulta".$e);
            }   
        }

        public function like($valor_campo,$valor_like){
            try {
                $this->query= "SELECT * FROM $this->tabla WHERE $valor_campo LIKE '$valor_like%'";
                return $this;
            } catch (PDOException $e) {
                echo json_encode("Error en la like".$e);
            }
        }
        
        public function max($valor_max) {
            try {
                $this->query= "SELECT MAX($valor_max) FROM $this->tabla";
                return $this;
            } catch (PDOException $e) {
                echo json_encode("Error en la max".$e);
            }
        }

        public function min($valor_min) {
            try {
                $this->query= "SELECT MIN($valor_min) FROM $this->tabla";
                return $this;
            } catch (PDOException $e) {
                echo json_encode("Error en la min".$e);
            }
        }

        public function sum($valor_sum) {
            try {
                $this->query= "SELECT SUM($valor_sum) FROM $this->tabla";
                return $this;
            } catch (PDOException $e) {
                echo json_encode("Error en la sum".$e);
            }
        }

        public function avg($valor_avg) {
            try {
                $this->query= "SELECT AVG($valor_avg) FROM $this->tabla";
                return $this;
            } catch (PDOException $e) {
                echo json_encode("Error en la avg".$e);
            }
        }

        public function cont($seleccion){
            try {
                $this->query = "SELECT COUNT($seleccion) FROM $this->tabla";
                return $this;
            }catch (PDOException $e) {
                echo json_encode("Error al consultar contar los datos: ".$e);
            }  
            
        }

        public function offset($valor_offset){
            try {
                $queryFinal = $this->query;
                $this->query = "$queryFinal OFFSET $valor_offset";
                return $this;
            } catch (PDOException $e) {
                echo json_encode("Error al offset los datos: " .$e);
            }
        }

        public function limit($valor_limit){
            try {
                $this->query= "SELECT * FROM $this->tabla LIMIT $valor_limit";
                return $this;
            } catch (PDOException $e) {
                echo json_encode("Error al limitar los datos: " .$e);
            }
        }

        public function all(){
            try {
                $queryFinal = $this->query;
                $consulta = Conexion::obtener_conexion()->prepare($queryFinal);
            if($consulta->execute()){
                $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $data = [];
            }    
            return $data;  
            }  catch (PDOException $e) {
                echo json_encode("Error al limitar los datos: " .$e);
            }      
        }

        public function first(){
            try {
                $queryFinal = $this->query;
                $consulta = Conexion::obtener_conexion()->prepare($queryFinal);
                if ($consulta->execute()) {
                    $data= $consulta->fetch(PDO::FETCH_ASSOC);
                }else{
                    $data= [];
                }
                return $data;
            } catch (PDOException $e) {
                echo json_encode("Error al limitar los datos: " .$e);
            }
        }

        public function get(){
            try {
                $queryFinal = $this->query;
                $consulta = Conexion::obtener_conexion()->prepare($queryFinal);
                if($consulta->execute()){
                    $data = $consulta->fetch(PDO::FETCH_ASSOC);
                }else{
                    $data = [];
                }    
                return $data;
            } catch (PDOException $e) {
                echo json_encode("Error al consultar los datos".$e);
            }  
                    
        }

        public function consulta($seleccion = ['*']){
            try {
                $seleccion = implode(',',$seleccion);
                $this->query = "SELECT $seleccion FROM $this->tabla";
                return $this;
            }catch (PDOException $e) {
                echo json_encode("Error al consultar los datos".$e);
            }  
            
        }

        public function insercion($datos){
            try {
                $temp = array();
                foreach($this->atributos as $valor){
                    if($this->id_tabla != $valor){
                        array_push($temp,$valor);                    
                    }
                }
                $propiedades = implode(",", $temp);
                $propiedades_key = ":" . implode(", :", $temp);
                $consulta = Conexion::obtener_conexion()->prepare("INSERT INTO $this->tabla ($propiedades) VALUES ($propiedades_key)");
                return $consulta->execute($datos);
            }catch (PDOException $e) {
                echo json_encode("Error al insertar los datos".$e);
            }  
        }

        public function actualizar($datos){
            try {
                $queryBloque = [];
                foreach(array_keys($datos) as $key){
                    if ($this->id_tabla != $key) {
                        array_push($queryBloque,$key.'='."'$datos[$key]'");
                    }
                };
                $queryBloque=implode(', ',$queryBloque);
                $this->query = "UPDATE $this->tabla SET $queryBloque";
                return $this;
            }catch (PDOException $e) {
                echo json_encode("Error al Actualizar los datos".$e);
            } 
        }

        public function eliminar(){
            try {
                $this->query = "DELETE FROM $this->tabla";
                return $this;
            } catch (PDOException $e) {
                echo json_encode("Error al eliminar".$e) ;
            }
        }
    }
?>



<!-- $queryFinal = $this->query;
                if ($this->contadorWhere > 0) {
                   $queryFinal  = $this->query;
                   
                    if($consulta->execute()){
                        $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    }else{
                        $data = [];
                    }
                    return $data;
                } else{
                    $this->query="$queryFinal WHERE $campo = '$valor_campo'";
                    $this->contadorWhere++; 
                    return $this;
                } -->