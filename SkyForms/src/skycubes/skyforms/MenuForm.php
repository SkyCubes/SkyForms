<?php

namespace skycubes\skyforms;

use pocketmine\Player;
use skycubes\skyforms\FormAPI\forms\MenuForm as MenuFormAPI;
use skycubes\skyforms\FormAPI\elements\Button;
use skycubes\skyforms\FormAPI\elements\Image;
use function filter_var;

class MenuForm{

	private $title;
	private $content;
	private $elements = array();
	private $response = null;

	public function __construct(string $title, string $content){
		$this->title = $title;
		$this->content = $content;
	}

	public function addButton(string $label, string $imageURL=null){
		$image = NULL;
		if($imageURL !== null){
			if(filter_var($imageURL, FILTER_VALIDATE_URL)){
				$type = Image::TYPE_URL;
			}else{
				$type = Image::TYPE_PATH;
			}
			$image = new Image($imageURL, $type);
		}
		$this->elements[] = new Button($label, $image);
	}

	public function sendTo(Player $player, $execute){
		$player->sendForm(new MenuFormAPI($this->title, $this->content, $this->elements,
			function(Player $player, Button $selected)  use (&$execute):void{
				$execute($selected->getText());
			}));
	}
}