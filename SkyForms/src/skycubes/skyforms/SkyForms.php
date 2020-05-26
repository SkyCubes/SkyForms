<?php

namespace skycubes\skyforms;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use skycubes\skyforms\{CustomForm, MenuForm, ModalForm};

class SkyForms extends PluginBase implements Listener{

	public function onEnable(){
		$this->getLogger()->info("§aSkyForms carregado com sucesso!");
	}

	public function createCustomForm(string $title = ""){		
		return new CustomForm($title);
	}
	public function createMenuForm(string $title = "", string $content){
		return new MenuForm($title, $content);
	}
	public function createModalForm(string $title, string $content, string $yesBtn, string $noBtn){
		return new ModalForm($title, $content, $yesBtn, $noBtn);
	}
						
}

?>