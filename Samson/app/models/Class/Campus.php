<?php
/**
 * Created by PhpStorm.
 * User: Befah
 * Date: 9/8/2019
 * Time: 10:44 PM
 */

class Campus
{
    protected $idcampus;
    protected $codecampus;
    protected $libellecampus_fr;
    protected $libellecampus_en;

    /**
     * Campus constructor.
     * @param $idcampus
     */
    public function __construct($data){

        $this->hydrate($data);
    }

    public function hydrate($data){
        foreach($data AS $key=>$value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method ($value);
            }
        }
    }


    /**
     * @return mixed
     */
    public function getIdcampus()
    {
        return $this->idcampus;
    }

    /**
     * @param mixed $idcampus
     */
    public function setIdcampus($idcampus)
    {
        $this->idcampus = $idcampus;
    }

    /**
     * @return mixed
     */
    public function getCodecampus()
    {
        return $this->codecampus;
    }

    /**
     * @param mixed $codecampus
     */
    public function setCodecampus($codecampus)
    {
        $this->codecampus = $codecampus;
    }

    /**
     * @return mixed
     */
    public function getLibellecampus_fr()
    {
        return $this->libellecampus_fr;
    }

    /**
     * @param mixed $libellecampus_fr
     */
    public function setLibellecampus_fr($libellecampus_fr)
    {
        $this->libellecampus_fr = $libellecampus_fr;
    }

    /**
     * @return mixed
     */
    public function getLibellecampus_en()
    {
        return $this->libellecampus_en;
    }

    /**
     * @param mixed $libellecampus_en
     */
    public function setLibellecampus_en($libellecampus_en)
    {
        $this->libellecampus_en = $libellecampus_en;
    }



}