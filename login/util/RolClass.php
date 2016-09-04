<?php 
namespace mas_acceso\usuario\Rol;;
class Rol{
    private $r_id;
    private $r_constante;
    private $r_nombre;
    
    public function setId($id){
        $this->r_id=$id;
    }
    public function getId(){
        return $this->r_id;
    }
    public function setNombre($n){
        $this->r_nombre=$n;
    }
    public function getNombre(){
        return $this->r_nombre;
    }
    public function setConstante($c){
        $this->r_constante=$c;
    }
    public function getConstante(){
        return $this->r_constante;
    }
}