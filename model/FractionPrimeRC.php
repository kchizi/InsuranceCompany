<?php
class FractionPrimeRC{

	//attributes
	private $_id;
	private $_codeCompagnie;
	private $_nombreMois;
	private $_tauxMois;
	private $_created;
	private $_createdBy;
	private $_updated;
	private $_updatedBy;

	//le constructeur
    public function __construct($data){
        $this->hydrate($data);
    }
    
    //la focntion hydrate sert à attribuer les valeurs en utilisant les setters d\'une façon dynamique!
    public function hydrate($data){
        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

	//setters
	public function setId($id){
        $this->_id = $id;
    }
	public function setCodeCompagnie($codeCompagnie){
        $this->_codeCompagnie = $codeCompagnie;
    }

	public function setNombreMois($nombreMois){
        $this->_nombreMois = $nombreMois;
    }

	public function setTauxMois($tauxMois){
        $this->_tauxMois = $tauxMois;
    }

	public function setCreated($created){
        $this->_created = $created;
    }

	public function setCreatedBy($createdBy){
        $this->_createdBy = $createdBy;
    }

	public function setUpdated($updated){
        $this->_updated = $updated;
    }

	public function setUpdatedBy($updatedBy){
        $this->_updatedBy = $updatedBy;
    }

	//getters
	public function id(){
        return $this->_id;
    }
	public function codeCompagnie(){
        return $this->_codeCompagnie;
    }

	public function nombreMois(){
        return $this->_nombreMois;
    }

	public function tauxMois(){
        return $this->_tauxMois;
    }

	public function created(){
        return $this->_created;
    }

	public function createdBy(){
        return $this->_createdBy;
    }

	public function updated(){
        return $this->_updated;
    }

	public function updatedBy(){
        return $this->_updatedBy;
    }

}