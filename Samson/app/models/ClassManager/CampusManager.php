<?php
/**
 * Created by PhpStorm.
 * User: Befah
 * Date: 9/8/2019
 * Time: 10:47 PM
 */

class CampusManager
{
    protected $db ;

    public function __construct($db){

        $this->db = $db;

    }

    public function Add($campus){

        $q = $this->db->prepare('INSERT INTO campus(codecampus, libellecampus_fr, libellecampus_en) VALUES(:codecampus,:libellecampus_fr,:libellecampus_en)');
        $q->bindValue(':codecampus',$campus->getCodecampus());
        $q->bindValue(':libellecampus_fr',$campus->getLibellecampus_fr());
        $q->bindValue(':libellecampus_en',$campus->getLibellecampus_en());
        $q->execute();

        $campus->hydrate(array('idcampus'=>$this->db->lastInsertId()));
        return 1;
    }

    public function Update($classelmd){

        $q = $this->db->prepare('UPDATE classelmd SET	codeclasselmd = :codeclasselmd,	libelleclasselmd = :libelleclasselmd WHERE 	idclasselmd = :idclasselmd');
        $q->bindValue(':idclasselmd',$classelmd->getIdclasselmd());
        $q->bindValue(':codeclasselmd',$classelmd->getCodeclasselmd());
        $q->bindValue(':libelleclasselmd',$classelmd->getLibelleclasselmd());
        $q->execute();

    }

    public function Delete($idclasselmd){

        $this->db->exec('DELETE FROM classelmd WHERE 	idclasselmd = $idclasselmd');

    }

    public function GetUniqueClasselmd($idclasselmd){

        $q = $this->db->query('SELECT * FROM classelmd   WHERE 	idclasselmd = '.$idclasselmd);
        return $q->fetch(PDO::FETCH_ASSOC);

    }

    public function GetListClasselmd($min=-1,$max=-1){

        $req = 'SELECT * FROM classelmd';

        if($min != $max){

            $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

        }
        $q = $this->db->query($req);
        $Listclasselmd = array();

        while($data = $q->fetch(PDO::FETCH_ASSOC)){

            $Listclasselmd[] = $data;

        }
        return $Listclasselmd;

    }

    public function GetListMultiKeysClasselmd(){

        $req = 'SELECT * 
			 FROM classelmd';
        $q = $this->db->query($req);
        $Listclasselmd = array();

        while($data = $q->fetch(PDO::FETCH_ASSOC)){

            $Listclasselmd[] = $data;

        }
        return $Listclasselmd;

    }

    public function CountClasselmd(){

        return $this->db->query('SELECT COUNT(*) FROM classelmd')->fetchColumn();

    }
}