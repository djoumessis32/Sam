<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2/10/19
 * Time: 12:58 AM
 */

class Etablissement {

    protected $idEtablissement;
    protected $codeetablissement;
    protected $codenum;
    protected $nometablissementlngdeux;
    protected $nometablissementlngune;
    protected $typeetab;
    protected $adresseetab;
    protected $telephone;
    protected $fax;
    protected $codepostaletab;
    protected $siteweb;
    protected $langueune;
    protected $languedeux;
    protected $datecreationetab;
    protected $emailetablissement;
    protected $logo;
    protected $libellerelevenotelngune;
    protected $libellerelevenotelngdeux;
    protected $libelleattestationlngune;
    protected $libelleattestionlngdeux;
    protected $libelleattestionclasselngune;
    protected $libelleattestationclasselngdeux;
    protected $libelleattestationsemestrelngune;
    protected $libelleattestationsemestrelngdeux;
    protected $mentionbaspagerelevelngune;
    protected $mentionbaspagerelevelngdeux;
    protected $mentionbaspageattestlngune;
    protected $mentionbaspageattestlngdeux;
    protected $titrechefetablngune;
    protected $titrechefetablngdeux;
    protected $chainedroitecertilngune;
    protected $chainedroitecertilngdeux;
    protected $chainedroitecerticlasselngune;
    protected $chainedroitecerticlasselngdeux;
    protected $libelleservicefinancier;
    protected $titrediciplinaire;
    protected $libellediciplinaire;
    protected $sanctiondiciplinaire;
    protected $smtp_server;
    protected $login_mail;
    protected $password_mail;
    protected $couriel_mail;
    protected $param_site;
    protected $chainesigattestation;
    protected $chainesigcarteetud;
    protected $chainesigrelevnote;
    protected $chainesigdiscipline;
    protected $etabcourant;
    protected $etabproprietaire;
    protected $libcertifscolaritelngune;
    protected $libcertifscolaritelngdeux;
    protected $mentionbaspagecertifscollngune;
    protected $mentionbaspagecertifscollngdeux;
    protected $mentionbaspagesupplementlngdeux;
    protected $mentionbaspagesupplementlngune;
    protected $cosignatairelgune;
    protected $cosignatairelgdeux;
    protected $lieusignatuure;

    public function __construct(){
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
     * @param mixed $adresseetab
     */
    public function setAdresseetab($adresseetab)
    {
        $this->adresseetab = $adresseetab;
    }

    /**
     * @return mixed
     */
    public function getAdresseetab()
    {
        return $this->adresseetab;
    }

    /**
     * @param mixed $chainedroitecerticlasselngdeux
     */
    public function setChainedroitecerticlasselngdeux($chainedroitecerticlasselngdeux)
    {
        $this->chainedroitecerticlasselngdeux = $chainedroitecerticlasselngdeux;
    }

    /**
     * @return mixed
     */
    public function getChainedroitecerticlasselngdeux()
    {
        return $this->chainedroitecerticlasselngdeux;
    }

    /**
     * @param mixed $chainedroitecerticlasselngune
     */
    public function setChainedroitecerticlasselngune($chainedroitecerticlasselngune)
    {
        $this->chainedroitecerticlasselngune = $chainedroitecerticlasselngune;
    }

    /**
     * @return mixed
     */
    public function getChainedroitecerticlasselngune()
    {
        return $this->chainedroitecerticlasselngune;
    }

    /**
     * @param mixed $chainedroitecertilngdeux
     */
    public function setChainedroitecertilngdeux($chainedroitecertilngdeux)
    {
        $this->chainedroitecertilngdeux = $chainedroitecertilngdeux;
    }

    /**
     * @return mixed
     */
    public function getChainedroitecertilngdeux()
    {
        return $this->chainedroitecertilngdeux;
    }

    /**
     * @param mixed $chainedroitecertilngune
     */
    public function setChainedroitecertilngune($chainedroitecertilngune)
    {
        $this->chainedroitecertilngune = $chainedroitecertilngune;
    }

    /**
     * @return mixed
     */
    public function getChainedroitecertilngune()
    {
        return $this->chainedroitecertilngune;
    }

    /**
     * @param mixed $chainesigattestation
     */
    public function setChainesigattestation($chainesigattestation)
    {
        $this->chainesigattestation = $chainesigattestation;
    }

    /**
     * @return mixed
     */
    public function getChainesigattestation()
    {
        return $this->chainesigattestation;
    }

    /**
     * @param mixed $chainesigcarteetud
     */
    public function setChainesigcarteetud($chainesigcarteetud)
    {
        $this->chainesigcarteetud = $chainesigcarteetud;
    }

    /**
     * @return mixed
     */
    public function getChainesigcarteetud()
    {
        return $this->chainesigcarteetud;
    }

    /**
     * @param mixed $chainesigdiscipline
     */
    public function setChainesigdiscipline($chainesigdiscipline)
    {
        $this->chainesigdiscipline = $chainesigdiscipline;
    }

    /**
     * @return mixed
     */
    public function getChainesigdiscipline()
    {
        return $this->chainesigdiscipline;
    }

    /**
     * @param mixed $chainesigrelevnote
     */
    public function setChainesigrelevnote($chainesigrelevnote)
    {
        $this->chainesigrelevnote = $chainesigrelevnote;
    }

    /**
     * @return mixed
     */
    public function getChainesigrelevnote()
    {
        return $this->chainesigrelevnote;
    }

    /**
     * @param mixed $codeetablissement
     */
    public function setCodeetablissement($codeetablissement)
    {
        $this->codeetablissement = $codeetablissement;
    }

    /**
     * @return mixed
     */
    public function getCodeetablissement()
    {
        return $this->codeetablissement;
    }

    /**
     * @param mixed $codenum
     */
    public function setCodenum($codenum)
    {
        $this->codenum = $codenum;
    }

    /**
     * @return mixed
     */
    public function getCodenum()
    {
        return $this->codenum;
    }

    /**
     * @param mixed $codepostaletab
     */
    public function setCodepostaletab($codepostaletab)
    {
        $this->codepostaletab = $codepostaletab;
    }

    /**
     * @return mixed
     */
    public function getCodepostaletab()
    {
        return $this->codepostaletab;
    }

    /**
     * @param mixed $cosignatairelgdeux
     */
    public function setCosignatairelgdeux($cosignatairelgdeux)
    {
        $this->cosignatairelgdeux = $cosignatairelgdeux;
    }

    /**
     * @return mixed
     */
    public function getCosignatairelgdeux()
    {
        return $this->cosignatairelgdeux;
    }

    /**
     * @param mixed $cosignatairelgune
     */
    public function setCosignatairelgune($cosignatairelgune)
    {
        $this->cosignatairelgune = $cosignatairelgune;
    }

    /**
     * @return mixed
     */
    public function getCosignatairelgune()
    {
        return $this->cosignatairelgune;
    }

    /**
     * @param mixed $couriel_mail
     */
    public function setCourielMail($couriel_mail)
    {
        $this->couriel_mail = $couriel_mail;
    }

    /**
     * @return mixed
     */
    public function getCourielMail()
    {
        return $this->couriel_mail;
    }

    /**
     * @param mixed $datecreationetab
     */
    public function setDatecreationetab($datecreationetab)
    {
        $this->datecreationetab = $datecreationetab;
    }

    /**
     * @return mixed
     */
    public function getDatecreationetab()
    {
        return $this->datecreationetab;
    }

    /**
     * @param mixed $emailetablissement
     */
    public function setEmailetablissement($emailetablissement)
    {
        $this->emailetablissement = $emailetablissement;
    }

    /**
     * @return mixed
     */
    public function getEmailetablissement()
    {
        return $this->emailetablissement;
    }

    /**
     * @param mixed $etabcourant
     */
    public function setEtabcourant($etabcourant)
    {
        $this->etabcourant = $etabcourant;
    }

    /**
     * @return mixed
     */
    public function getEtabcourant()
    {
        return $this->etabcourant;
    }

    /**
     * @param mixed $etabproprietaire
     */
    public function setEtabproprietaire($etabproprietaire)
    {
        $this->etabproprietaire = $etabproprietaire;
    }

    /**
     * @return mixed
     */
    public function getEtabproprietaire()
    {
        return $this->etabproprietaire;
    }

    /**
     * @param mixed $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $idEtablissement
     */
    public function setIdEtablissement($idEtablissement)
    {
        $this->idEtablissement = $idEtablissement;
    }

    /**
     * @return mixed
     */
    public function getIdEtablissement()
    {
        return $this->idEtablissement;
    }

    /**
     * @param mixed $languedeux
     */
    public function setLanguedeux($languedeux)
    {
        $this->languedeux = $languedeux;
    }

    /**
     * @return mixed
     */
    public function getLanguedeux()
    {
        return $this->languedeux;
    }

    /**
     * @param mixed $langueune
     */
    public function setLangueune($langueune)
    {
        $this->langueune = $langueune;
    }

    /**
     * @return mixed
     */
    public function getLangueune()
    {
        return $this->langueune;
    }

    /**
     * @param mixed $libcertifscolaritelngdeux
     */
    public function setLibcertifscolaritelngdeux($libcertifscolaritelngdeux)
    {
        $this->libcertifscolaritelngdeux = $libcertifscolaritelngdeux;
    }

    /**
     * @return mixed
     */
    public function getLibcertifscolaritelngdeux()
    {
        return $this->libcertifscolaritelngdeux;
    }

    /**
     * @param mixed $libcertifscolaritelngune
     */
    public function setLibcertifscolaritelngune($libcertifscolaritelngune)
    {
        $this->libcertifscolaritelngune = $libcertifscolaritelngune;
    }

    /**
     * @return mixed
     */
    public function getLibcertifscolaritelngune()
    {
        return $this->libcertifscolaritelngune;
    }

    /**
     * @param mixed $libelleattestationclasselngdeux
     */
    public function setLibelleattestationclasselngdeux($libelleattestationclasselngdeux)
    {
        $this->libelleattestationclasselngdeux = $libelleattestationclasselngdeux;
    }

    /**
     * @return mixed
     */
    public function getLibelleattestationclasselngdeux()
    {
        return $this->libelleattestationclasselngdeux;
    }

    /**
     * @param mixed $libelleattestationlngune
     */
    public function setLibelleattestationlngune($libelleattestationlngune)
    {
        $this->libelleattestationlngune = $libelleattestationlngune;
    }

    /**
     * @return mixed
     */
    public function getLibelleattestationlngune()
    {
        return $this->libelleattestationlngune;
    }

    /**
     * @param mixed $libelleattestationsemestrelngdeux
     */
    public function setLibelleattestationsemestrelngdeux($libelleattestationsemestrelngdeux)
    {
        $this->libelleattestationsemestrelngdeux = $libelleattestationsemestrelngdeux;
    }

    /**
     * @return mixed
     */
    public function getLibelleattestationsemestrelngdeux()
    {
        return $this->libelleattestationsemestrelngdeux;
    }

    /**
     * @param mixed $libelleattestationsemestrelngune
     */
    public function setLibelleattestationsemestrelngune($libelleattestationsemestrelngune)
    {
        $this->libelleattestationsemestrelngune = $libelleattestationsemestrelngune;
    }

    /**
     * @return mixed
     */
    public function getLibelleattestationsemestrelngune()
    {
        return $this->libelleattestationsemestrelngune;
    }

    /**
     * @param mixed $libelleattestionclasselngune
     */
    public function setLibelleattestionclasselngune($libelleattestionclasselngune)
    {
        $this->libelleattestionclasselngune = $libelleattestionclasselngune;
    }

    /**
     * @return mixed
     */
    public function getLibelleattestionclasselngune()
    {
        return $this->libelleattestionclasselngune;
    }

    /**
     * @param mixed $libelleattestionlngdeux
     */
    public function setLibelleattestionlngdeux($libelleattestionlngdeux)
    {
        $this->libelleattestionlngdeux = $libelleattestionlngdeux;
    }

    /**
     * @return mixed
     */
    public function getLibelleattestionlngdeux()
    {
        return $this->libelleattestionlngdeux;
    }

    /**
     * @param mixed $libellediciplinaire
     */
    public function setLibellediciplinaire($libellediciplinaire)
    {
        $this->libellediciplinaire = $libellediciplinaire;
    }

    /**
     * @return mixed
     */
    public function getLibellediciplinaire()
    {
        return $this->libellediciplinaire;
    }

    /**
     * @param mixed $libellerelevenotelngdeux
     */
    public function setLibellerelevenotelngdeux($libellerelevenotelngdeux)
    {
        $this->libellerelevenotelngdeux = $libellerelevenotelngdeux;
    }

    /**
     * @return mixed
     */
    public function getLibellerelevenotelngdeux()
    {
        return $this->libellerelevenotelngdeux;
    }

    /**
     * @param mixed $libellerelevenotelngune
     */
    public function setLibellerelevenotelngune($libellerelevenotelngune)
    {
        $this->libellerelevenotelngune = $libellerelevenotelngune;
    }

    /**
     * @return mixed
     */
    public function getLibellerelevenotelngune()
    {
        return $this->libellerelevenotelngune;
    }

    /**
     * @param mixed $libelleservicefinancier
     */
    public function setLibelleservicefinancier($libelleservicefinancier)
    {
        $this->libelleservicefinancier = $libelleservicefinancier;
    }

    /**
     * @return mixed
     */
    public function getLibelleservicefinancier()
    {
        return $this->libelleservicefinancier;
    }

    /**
     * @param mixed $lieusignatuure
     */
    public function setLieusignatuure($lieusignatuure)
    {
        $this->lieusignatuure = $lieusignatuure;
    }

    /**
     * @return mixed
     */
    public function getLieusignatuure()
    {
        return $this->lieusignatuure;
    }

    /**
     * @param mixed $login_mail
     */
    public function setLoginMail($login_mail)
    {
        $this->login_mail = $login_mail;
    }

    /**
     * @return mixed
     */
    public function getLoginMail()
    {
        return $this->login_mail;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $mentionbaspageattestlngdeux
     */
    public function setMentionbaspageattestlngdeux($mentionbaspageattestlngdeux)
    {
        $this->mentionbaspageattestlngdeux = $mentionbaspageattestlngdeux;
    }

    /**
     * @return mixed
     */
    public function getMentionbaspageattestlngdeux()
    {
        return $this->mentionbaspageattestlngdeux;
    }

    /**
     * @param mixed $mentionbaspageattestlngune
     */
    public function setMentionbaspageattestlngune($mentionbaspageattestlngune)
    {
        $this->mentionbaspageattestlngune = $mentionbaspageattestlngune;
    }

    /**
     * @return mixed
     */
    public function getMentionbaspageattestlngune()
    {
        return $this->mentionbaspageattestlngune;
    }

    /**
     * @param mixed $mentionbaspagecertifscollngdeux
     */
    public function setMentionbaspagecertifscollngdeux($mentionbaspagecertifscollngdeux)
    {
        $this->mentionbaspagecertifscollngdeux = $mentionbaspagecertifscollngdeux;
    }

    /**
     * @return mixed
     */
    public function getMentionbaspagecertifscollngdeux()
    {
        return $this->mentionbaspagecertifscollngdeux;
    }

    /**
     * @param mixed $mentionbaspagecertifscollngune
     */
    public function setMentionbaspagecertifscollngune($mentionbaspagecertifscollngune)
    {
        $this->mentionbaspagecertifscollngune = $mentionbaspagecertifscollngune;
    }

    /**
     * @return mixed
     */
    public function getMentionbaspagecertifscollngune()
    {
        return $this->mentionbaspagecertifscollngune;
    }

    /**
     * @param mixed $mentionbaspagerelevelngdeux
     */
    public function setMentionbaspagerelevelngdeux($mentionbaspagerelevelngdeux)
    {
        $this->mentionbaspagerelevelngdeux = $mentionbaspagerelevelngdeux;
    }

    /**
     * @return mixed
     */
    public function getMentionbaspagerelevelngdeux()
    {
        return $this->mentionbaspagerelevelngdeux;
    }

    /**
     * @param mixed $mentionbaspagerelevelngune
     */
    public function setMentionbaspagerelevelngune($mentionbaspagerelevelngune)
    {
        $this->mentionbaspagerelevelngune = $mentionbaspagerelevelngune;
    }

    /**
     * @return mixed
     */
    public function getMentionbaspagerelevelngune()
    {
        return $this->mentionbaspagerelevelngune;
    }

    /**
     * @param mixed $mentionbaspagesupplementlngdeux
     */
    public function setMentionbaspagesupplementlngdeux($mentionbaspagesupplementlngdeux)
    {
        $this->mentionbaspagesupplementlngdeux = $mentionbaspagesupplementlngdeux;
    }

    /**
     * @return mixed
     */
    public function getMentionbaspagesupplementlngdeux()
    {
        return $this->mentionbaspagesupplementlngdeux;
    }

    /**
     * @param mixed $mentionbaspagesupplementlngune
     */
    public function setMentionbaspagesupplementlngune($mentionbaspagesupplementlngune)
    {
        $this->mentionbaspagesupplementlngune = $mentionbaspagesupplementlngune;
    }

    /**
     * @return mixed
     */
    public function getMentionbaspagesupplementlngune()
    {
        return $this->mentionbaspagesupplementlngune;
    }

    /**
     * @param mixed $nometablissementlngdeux
     */
    public function setNometablissementlngdeux($nometablissementlngdeux)
    {
        $this->nometablissementlngdeux = $nometablissementlngdeux;
    }

    /**
     * @return mixed
     */
    public function getNometablissementlngdeux()
    {
        return $this->nometablissementlngdeux;
    }

    /**
     * @param mixed $nometablissementlngune
     */
    public function setNometablissementlngune($nometablissementlngune)
    {
        $this->nometablissementlngune = $nometablissementlngune;
    }

    /**
     * @return mixed
     */
    public function getNometablissementlngune()
    {
        return $this->nometablissementlngune;
    }

    /**
     * @param mixed $param_site
     */
    public function setParamSite($param_site)
    {
        $this->param_site = $param_site;
    }

    /**
     * @return mixed
     */
    public function getParamSite()
    {
        return $this->param_site;
    }

    /**
     * @param mixed $password_mail
     */
    public function setPasswordMail($password_mail)
    {
        $this->password_mail = $password_mail;
    }

    /**
     * @return mixed
     */
    public function getPasswordMail()
    {
        return $this->password_mail;
    }

    /**
     * @param mixed $sanctiondiciplinaire
     */
    public function setSanctiondiciplinaire($sanctiondiciplinaire)
    {
        $this->sanctiondiciplinaire = $sanctiondiciplinaire;
    }

    /**
     * @return mixed
     */
    public function getSanctiondiciplinaire()
    {
        return $this->sanctiondiciplinaire;
    }

    /**
     * @param mixed $siteweb
     */
    public function setSiteweb($siteweb)
    {
        $this->siteweb = $siteweb;
    }

    /**
     * @return mixed
     */
    public function getSiteweb()
    {
        return $this->siteweb;
    }

    /**
     * @param mixed $smtp_server
     */
    public function setSmtpServer($smtp_server)
    {
        $this->smtp_server = $smtp_server;
    }

    /**
     * @return mixed
     */
    public function getSmtpServer()
    {
        return $this->smtp_server;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $titrechefetablngdeux
     */
    public function setTitrechefetablngdeux($titrechefetablngdeux)
    {
        $this->titrechefetablngdeux = $titrechefetablngdeux;
    }

    /**
     * @return mixed
     */
    public function getTitrechefetablngdeux()
    {
        return $this->titrechefetablngdeux;
    }

    /**
     * @param mixed $titrechefetablngune
     */
    public function setTitrechefetablngune($titrechefetablngune)
    {
        $this->titrechefetablngune = $titrechefetablngune;
    }

    /**
     * @return mixed
     */
    public function getTitrechefetablngune()
    {
        return $this->titrechefetablngune;
    }

    /**
     * @param mixed $titrediciplinaire
     */
    public function setTitrediciplinaire($titrediciplinaire)
    {
        $this->titrediciplinaire = $titrediciplinaire;
    }

    /**
     * @return mixed
     */
    public function getTitrediciplinaire()
    {
        return $this->titrediciplinaire;
    }

    /**
     * @param mixed $typeetab
     */
    public function setTypeetab($typeetab)
    {
        $this->typeetab = $typeetab;
    }

    /**
     * @return mixed
     */
    public function getTypeetab()
    {
        return $this->typeetab;
    }


}