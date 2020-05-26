<?php

namespace skycubes\skyforms;

use pocketmine\Player;
use skycubes\skyforms\FormAPI\forms\CustomForm as CustomFormAPI;
use skycubes\skyforms\FormAPI\forms\CustomFormResponse;
use skycubes\skyforms\FormAPI\elements\{Dropdown, Input, Label, Slider, StepSlider, Toggle};


class CustomForm{

	private $title;
	private $elements = array();
	private $response = null;

	public function __construct(string $title){
		$this->title = $title;
	}


	public function addDropdown(string $label, array $options){
		$this->elements[] = new Dropdown($label, $options);
	}
	public function addInput(string $label, string $placeholder="", $default=""){
		$this->elements[] = new Input($label, $placeholder, $default);
	}
	public function addLabel(string $label){
		$this->elements[] = new Label($label);
	}
	public function addSlider(string $label, float $min, float $max, float $step, float $default){
		$this->elements[] = new Slider($label, $min, $max, $step, $default);
	}
	public function addStepSlider(string $label, array $options){
		$this->elements[] = new StepSlider($label, $options);
	}
	public function addToggle(string $label, bool $default){
		$this->elements[] = new Toggle($label, $default);
	}


	public function sendTo(Player $player, $execute){
		$player->sendForm(new CustomFormAPI($this->title, $this->elements,
			function(Player $player, CustomFormResponse $data) use (&$execute):void{
				$response = array();
				$data = $data->getElements();
				foreach($data as $dataResponse){
					$response[$dataResponse->getText()] = $dataResponse->getValue();
				}
				$execute($response);
			}));
	}
}