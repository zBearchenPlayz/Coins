<?php
namespace PE;
use PE\Provider\MySQLDataProvider;
use PE\API;
use PE\Listeners\PlayerJoinListener;
use PE\Commands;

use pocketmine\plugins\PluginBase;
use pocketmine\lang\BaseLang;


class coinsystem extends PluginBase {

    const PREFIX = "§7[§eCoinSystem§7] ";

    public $provider;
    public static $instance;

    public function onEnable() {

        $this->getLogger()->info(self::PREFIX . "by §6zBearchenPlayz§7!");
<<<<<<< HEAD
        self::$instance = $this;
=======
        
        new Commands();
>>>>>>> 90408d2eaf6bd0c4b689a7c81bbc4f3a199b06d6

        $this->saveDefaultConfig();

        $lang = $this->getConfig()->get("language", BaseLang::FALLBACK_LANGUAGE);
        $this->baseLang = new BaseLang($lang, $this->getFile() . "resources/");

        $this->getLogger()->info(self::PREFIX . "Language: " . $lang);

        if($this->getConfig()->get("provider") == "mysql"){
            $this->provider = new MySQLDataProvider($this->getConfig()->getNested("mysql.host"), $this->getConfig()->getNested("mysql.username"), $this->getConfig()->getNested("mysql.password"), $this->getConfig()->getNested("mysql.password"));
        }else{
            //Comming Soon
            return;
        }
    }

    public function onDisable(){
        if(is_null($this->provider))
            $this->provider->close();
    }

    public static function getInstance(){
        return self::$instance;
    }

    /**
     * @return BaseLang
     */
    public function getLanguage(): BaseLang {
        return $this->baseLang;
    }
}
