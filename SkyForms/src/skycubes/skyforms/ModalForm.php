<?php

namespace skycubes\skyforms;

use pocketmine\Player;
use skycubes\skyforms\FormAPI\forms\ModalForm as ModalFormAPI;


class ModalForm{
	private $title;
	private $response = null;
	private $content;
	private $yesBtn;
	private $noBtn;

	public function __construct(string $title, string $content, string $yesBtn, string $noBtn){
		$this->title = $title;
		$this->content = $content;
		$this->yesBtn = $yesBtn;
		$this->noBtn = $noBtn;
	}

	public function getResponse(){
		return $this->response;
	}

	public function sendTo(Player $player, $execute){
		
		$player->sendForm(new ModalFormAPI($this->title, $this->content, $this->yesBtn, $this->noBtn,
			function(Player $player, bool $response) use (&$execute):void{
				$execute($response);
			}));

	}
}