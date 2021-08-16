<?php
namespace App\managers;

class HistoriqueManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}


	public function getHistoriqueByNumero($numero){
		try{
			$q = $this->db->prepare("SELECT * FROM historique WHERE num_abonne = ?");
			$q->execute([$numero]);
			$re=[];
			while($d = $q->fetch(\PDO::FETCH_OBJ)) {
				$histo = new \App\models\Historique($d->id_historique, $d->facturier, $d->num_abonne, $d->id_transaction, $d->montant, $d->numero, $d->date_paiement);
				$re[] = $histo;
			}
			return $re;
		}catch(\PDOException $e){
			return null;
		}
	}


	public function getHistoriqueByPhoneNumero($numero){
    		try{
    			$q = $this->db->prepare("SELECT * FROM historique WHERE numero = ?");
    			$q->execute([$numero]);
    			$re=[];
    			while($d = $q->fetch(\PDO::FETCH_OBJ)) {
    				$histo = new \App\models\Historique($d->id_historique, $d->facturier, $d->num_abonne, $d->id_transaction, $d->montant, $numero, $d->date_paiement);
    				$re[] = $histo;
    			}
    			return $re;
    		}catch(\PDOException $e){
    			return null;
    		}
    	}

	public function create($histo){
		try{
			$q = $this->db->prepare("INSERT INTO historique(facturier,num_abonne,id_transaction,montant,numero) VALUES(:facturier, :num_abonne, :id_transaction, :montant, :numero)");
                return $q->execute($histo) ? TRUE : FALSE;
		}catch(\PDOException $e){
			echo $e->getMessage();
			return null;
		}

}

public function getAbonneID($numero){
		try{
			$q = $this->db->prepare("SELECT * FROM historique WHERE id_transaction = ?");
			$q->execute([$numero]);

			if($d = $q->fetch(\PDO::FETCH_OBJ)) {
				$histo = new \App\models\Historique($d->id_historique, $d->facturier, $d->num_abonne, $d->id_transaction, $d->montant, $d->numero, $d->date_paiement);
				return $histo;
			}
			return null;
		}catch(\PDOException $e){
			return null;
		}
	}
}