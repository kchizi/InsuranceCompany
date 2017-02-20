<?php
class DommageCollision{

	//attributes
	private $_id;
	private $_codeCompagnie;
	private $_codeUsage;
	private $_codeClasse;
	private $_codeSousClasse;
	private $_carburant;
	private $_puissanceFiscale;
	private $_formuleCollision;
	private $_primeFixe;
	private $_franchise;
	private $_plafond;
	private $_tauxCommission;
	private $_tauxTPS;
	private $_tauxTaxe;
	private $_observation;
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

	public function setCodeUsage($codeUsage){
        $this->_codeUsage = $codeUsage;
    }

	public function setCodeClasse($codeClasse){
        $this->_codeClasse = $codeClasse;
    }

	public function setCodeSousClasse($codeSousClasse){
        $this->_codeSousClasse = $codeSousClasse;
    }

	public function setCarburant($carburant){
        $this->_carburant = $carburant;
    }

	public function setPuissanceFiscale($puissanceFiscale){
        $this->_puissanceFiscale = $puissanceFiscale;
    }

	public function setFormuleCollision($formuleCollision){
        $this->_formuleCollision = $formuleCollision;
    }

	public function setPrimeFixe($primeFixe){
        $this->_primeFixe = $primeFixe;
    }

	public function setFranchise($franchise){
        $this->_franchise = $franchise;
    }

	public function setPlafond($plafond){
        $this->_plafond = $plafond;
    }

	public function setTauxCommission($tauxCommission){
        $this->_tauxCommission = $tauxCommission;
    }

	public function setTauxTPS($tauxTPS){
        $this->_tauxTPS = $tauxTPS;
    }

	public function setTauxTaxe($tauxTaxe){
        $this->_tauxTaxe = $tauxTaxe;
    }

	public function setObservation($observation){
        $this->_observation = $observation;
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

	public function codeUsage(){
        return $this->_codeUsage;
    }

	public function codeClasse(){
        return $this->_codeClasse;
    }

	public function codeSousClasse(){
        return $this->_codeSousClasse;
    }

	public function carburant(){
        return $this->_carburant;
    }

	public function puissanceFiscale(){
        return $this->_puissanceFiscale;
    }

	public function formuleCollision(){
        return $this->_formuleCollision;
    }

	public function primeFixe(){
        return $this->_primeFixe;
    }

	public function franchise(){
        return $this->_franchise;
    }

	public function plafond(){
        return $this->_plafond;
    }

	public function tauxCommission(){
        return $this->_tauxCommission;
    }

	public function tauxTPS(){
        return $this->_tauxTPS;
    }

	public function tauxTaxe(){
        return $this->_tauxTaxe;
    }

	public function observation(){
        return $this->_observation;
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