<?php

Class Personnage{

	private $_id = 0;
	private $_nom;
	private $_vie;
	private $_atk;
	private $_soin;

	public function __construct($nom,$vie,$atk,$soin=0,$id=0){
		$this->setNom($nom);
		$this->setVie($vie);
		$this->setAtk($atk);
		$this->setSoin($soin);
		$this->setId($id);

	}

	public function setId($id){
		
		$this->_id = $id;

	}

	public function setNom($nom){
		$this->_nom = $nom;
	}

	public function setVie($vie){
		if($vie<=0){
			$this->_vie = 0;
		}else if($vie>=150){
			$this->_vie = 150;	
		}else{
			$this->_vie = $vie;
		}	
	}

	public function setAtk($atk){
		if($atk>=0 AND $atk<=20){
			$this->_atk = $atk;
		}else{
			$this->_atk = 10;
		}		
	}

	public function setSoin($soin){
		if($soin>=0 AND $soin<=30){

			if($soin<$this->vie()){
				$this->_soin = $soin;
			}else{
				$this->_soin = $this->vie() - 1;
			}
			
		}else{
			$this->_soin = 15;
		}
		
	}

	public function nom(){
		return $this->_nom;
	}

	public function vie(){
		return $this->_vie;
	}

	public function atk(){
		return $this->_atk;
	}

	public function soin(){
		return $this->_soin;
	}

	public function id(){
		return $this->_id;
	}

}

?>