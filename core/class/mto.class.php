<?php

/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */

/* * ***************************Includes********************************* */
require_once __DIR__  . '/../../../../core/php/core.inc.php';

class mto extends eqLogic {
    /*     * *************************Attributs****************************** */



    /*     * ***********************Methode static*************************** */

    /*
     * Fonction exécutée automatiquement toutes les minutes par Jeedom
      public static function cron() {

      }
     */


    /*
     * Fonction exécutée automatiquement toutes les heures par Jeedom
      public static function cronHourly() {

      }
     */

  
     //* Fonction exécutée automatiquement tous les jours par Jeedom
     
     public static function cronHourly($_eqLogic_id = null) {
		if ($_eqLogic_id == null) { // La fonction n’a pas d’argument donc on recherche tous les équipements du plugin
			$eqLogics = self::byType('mto', true);
		} else {// La fonction a l’argument id(unique) d’un équipement(eqLogic)
			$eqLogics = array(self::byId($_eqLogic_id));
		}		  
	
		foreach ($eqLogics as $mto) {
			if ($mto->getIsEnable() == 1) {//vérifie que l'équipement est acitf
				$cmd = $mto->getCmd(null, 'refresh');//retourne la commande "refresh si elle exxiste
				if (!is_object($cmd)) {//Si la commande n'existe pas
				  continue; //continue la boucle
				}
				$cmd->execCmd(); // la commande existe on la lance
			}
		}
	}


  
  

  
 


    /*     * *********************Méthodes d'instance************************* */

    public function preInsert() {
        
    }

  
  
  
  
  
  
  
    public function postInsert() {
        
    }

  
  
  
  
  
  
  
    public function preSave() {
    
     
        
    }

  
  
  
  
  
    public function postSave() {
        $cmd = $this->getCmd(null, 'refresh'); // On recherche la commande refresh de l’équipement
		if (is_object($cmd)) { //elle existe et on lance la commande
			 $cmd->execCmd();
		}  
    
      
      
      
        
    }

  
  
  
  
    public function preUpdate() {
      
      
      
              
    }

  
  
  

  
    public function postUpdate() {
  
      
		
      
      
      
      
       $getDataCmd = $this->getCmd(null, 'data');
        if (!is_object($getDataCmd)) {
            // Création de la commande
            $cmd = new mtoCmd();
            // Nom affiché
            $cmd->setName('Température');
            // Identifiant de la commande
            $cmd->setLogicalId('data');
            // Identifiant de l'équipement
            $cmd->setEqLogic_id($this->getId());
            // Type de la commande
            $cmd->setType('info');
            // Sous-type de la commande
            $cmd->setSubType('string');
            // Visibilité de la commande
            $cmd->setIsVisible(1);
            // Sauvegarde de la commande
            $cmd->save();
        }
        $getrefreshCmd = $this->getCmd(null, 'refresh');
        if (!is_object($getrefreshCmd)) {
            // Création de la commande
            $cmd = new mtoCmd();
            // Nom affiché
            $cmd->setName('Rafraichir');
            // Identifiant de la commande
            $cmd->setLogicalId('refresh');
            // Identifiant de l'équipement
            $cmd->setEqLogic_id($this->getId());
            // Type de la commande
            $cmd->setType('action');
            // Sous-type de la commande
            $cmd->setSubType('other');
            // Visibilité de la commande
            $cmd->setIsVisible(1);
            // Sauvegarde de la commande
            $cmd->save();
        } 
       $getTemperaturemerCmd = $this->getCmd(null, 'Temperaturemer');
        if (!is_object($getTemperaturemerCmd)) {
            // Création de la commande
            $cmd = new mtoCmd();
            // Nom affiché
            $cmd->setName('Temperature mer');
            // Identifiant de la commande
            $cmd->setLogicalId('Temperaturemer');
            // Identifiant de l'équipement
            $cmd->setEqLogic_id($this->getId());
            // Type de la commande
            $cmd->setType('info');
            // Sous-type de la commande
            $cmd->setSubType('string');
            // Visibilité de la commande
            $cmd->setIsVisible(1);
            // Sauvegarde de la commande
            $cmd->save();
        }    
       $getindiceuvCmd = $this->getCmd(null, 'indiceuv');
        if (!is_object($getindiceuvCmd)) {
            // Création de la commande
            $cmd = new mtoCmd();
            // Nom affiché
            $cmd->setName('Indice UV');
            // Identifiant de la commande
            $cmd->setLogicalId('IndiceUV');
            // Identifiant de l'équipement
            $cmd->setEqLogic_id($this->getId());
            // Type de la commande
            $cmd->setType('info');
            // Sous-type de la commande
            $cmd->setSubType('string');
            // Visibilité de la commande
            $cmd->setIsVisible(1);
            // Sauvegarde de la commande
            $cmd->save();
        }    
      
      $gettemperatureressentieCmd = $this->getCmd(null, 'temperatureressentie');
        if (!is_object($gettemperatureressentieCmd)) {
            // Création de la commande
            $cmd = new mtoCmd();
            // Nom affiché
            $cmd->setName('Température ressentie');
            // Identifiant de la commande
            $cmd->setLogicalId('Températureressentie');
            // Identifiant de l'équipement
            $cmd->setEqLogic_id($this->getId());
            // Type de la commande
            $cmd->setType('info');
            // Sous-type de la commande
            $cmd->setSubType('string');
            // Visibilité de la commande
            $cmd->setIsVisible(1);
            // Sauvegarde de la commande
            $cmd->save();
        }    
      
       
      
      
      $getventCmd = $this->getCmd(null, 'vent');
        if (!is_object($getventCmd)) {
            // Création de la commande
            $cmd = new mtoCmd();
            // Nom affiché
            $cmd->setName('Vent');
            // Identifiant de la commande
            $cmd->setLogicalId('vent');
            // Identifiant de l'équipement
            $cmd->setEqLogic_id($this->getId());
            // Type de la commande
            $cmd->setType('info');
            // Sous-type de la commande
            $cmd->setSubType('string');
            // Visibilité de la commande
            $cmd->setIsVisible(1);
            // Sauvegarde de la commande
            $cmd->save();
        }   
      
      $getventCmd = $this->getCmd(null, 'etatmer');
        if (!is_object($getventCmd)) {
            // Création de la commande
            $cmd = new mtoCmd();
            // Nom affiché
            $cmd->setName('Etat mer');
            // Identifiant de la commande
            $cmd->setLogicalId('etatmer');
            // Identifiant de l'équipement
            $cmd->setEqLogic_id($this->getId());
            // Type de la commande
            $cmd->setType('info');
            // Sous-type de la commande
            $cmd->setSubType('string');
            // Visibilité de la commande
            $cmd->setIsVisible(1);
            // Sauvegarde de la commande
            $cmd->save();
        }   
      
      $getetatducielCmd = $this->getCmd(null, 'etatduciel');
        if (!is_object($getetatducielCmd)) {
            // Création de la commande
            $cmd = new mtoCmd();
            // Nom affiché
            $cmd->setName('Etat du ciel');
            // Identifiant de la commandes
            $cmd->setLogicalId('etatduciel');
            // Identifiant de l'équipement
            $cmd->setEqLogic_id($this->getId());
            // Type de la commande
            $cmd->setType('info');
            // Sous-type de la commande
            $cmd->setSubType('string');
            // Visibilité de la commande
            $cmd->setIsVisible(1);
           
            // Sauvegarde de la commande
            $cmd->save();
        }   
      
      
      

      
      
      
      
      
    }

  
  
  
  
  
    public function preRemove() {
        
    }

  
  
  
  
  
  
  
  
    public function postRemove() {
        
    }

    /*
     * Non obligatoire mais permet de modifier l'affichage du widget si vous en avez besoin
      public function toHtml($_version = 'dashboard') {

      }
     */

    /*
     * Non obligatoire mais ca permet de déclencher une action après modification de variable de configuration
    public static function postConfig_<Variable>() {
    }
     */

    /*
     * Non obligatoire mais ca permet de déclencher une action avant modification de variable de configuration
    public static function preConfig_<Variable>() {
    }
     */

    /*     * **********************Getteur Setteur*************************** */
}

class mtoCmd extends cmd {
    /*     * *************************Attributs****************************** */


    /*     * ***********************Methode static*************************** */


    /*     * *********************Methode d'instance************************* */

    /*
     * Non obligatoire permet de demander de ne pas supprimer les commandes même si elles ne sont pas dans la nouvelle configuration de l'équipement envoyé en JS
      public function dontRemoveCmd() {
      return true;
      }
     */

    public function execute($_options = array()) {
      $eqLogic = $this->getEqLogic();
      
// Test pour ne répondre qu'à la commande rafraichir
    if ($this->getLogicalId() == 'refresh')
    {
        // On récupère l'équipement à partir de l'identifiant fournit par la commande 
        $tutorielObj = mto::byId($this->getEqlogic_id());
        // On récupère la commande 'data' appartenant à l'équipement
        $dataCmd = $tutorielObj->getCmd('info', 'data');
        $temperaturemerCmd = $tutorielObj->getCmd('info', 'temperaturemer');
        $indiceuvCmd = $tutorielObj->getCmd('info', 'indiceuv');
        $temperatureressentieCmd = $tutorielObj->getCmd('info', 'temperatureressentie');
        $etatducielCmd = $tutorielObj->getCmd('info', 'etatduciel');
        $ventCmd = $tutorielObj->getCmd('info', 'vent');
        $etatmerCmd = $tutorielObj->getCmd('info', 'etatmer');
     
       $ville = $eqLogic->getConfiguration("ville");
       $codepostal = $eqLogic->getConfiguration("codepostal");
      
      

       $url = ("http://www.meteofrance.com/previsions-meteo-plages/" . $ville . "/" . $codepostal);

  
       
  
      
      //"http://www.meteofrance.com/previsions-meteo-plages/". 
      
      
        // On lui ajoute un évènement avec pour information 'Données de test'
        $page = file_get_contents($url);
      
      
        $temp = substr($page, strpos($page, "day-summary-temperature")+25, strpos($page, " <")-4);
        $compilt = "Température : " . $temp;
      
        $eau = substr($page, strpos($page, "day-summary-eau")+17, strpos($page, " <")-4);
        $compile =  "Température  " . $eau;
      
      
       $indice = substr($page, strpos($page, "day-summary-uv")+18, strpos($page, " <")-1);
       $compilu = "Indice UV :" . $indice;
      
      
      
        $temperatureressen = substr($page, strpos($page, "Température ressentie")+32, strpos($page, " <")-2);
        $compiltr = "Température ressentie : " . $temperatureressen;
      
      
        $etatciel = substr($page, strpos($page, "day-summary-label")+19, strpos($page, " <")-2);
        $compilet = "Etat du ciel :" . $etatciel;
      -
        $vents = substr($page, strpos($page, "day-summary-indice")-25, strpos($page, " <")-2);
        $compilve = "Vitesse du vent : " . $vents;
      
      
        $etatdelamer = substr($page, strpos($page, "day-details-etat-mer")+22, strpos($page, "<")+30);
        $compiletatmer = $etatdelamer;
      
      
       
      
      
      
        
        $dataCmd->event($compilt);   
        $temperaturemerCmd->event($compile);
        $indiceuvCmd->event($compilu);  
        $temperatureressentieCmd->event($compiltr);  
        $etatducielCmd->event($compilet);  
        $ventCmd->event($compilve); 
        $etatmerCmd->event($compiletatmer);
      
      
     
      
      
        // On sauvegarde cet évènement
        $dataCmd->save();
        $temperaturemerCmd->save();
        $indiceuvCmd->save();
        $temperatureressentieCmd->save();
        $etatducielCmd->save();
        $ventCmd->save();
        $etatmerCmd->save();
      
   
        }
      
    }
  }
  
   

    /*     * **********************Getteur Setteur*************************** */

