# SkyForms
Form support to SkyCube plugins

### How to use:

```php
// Add $skyforms attribute to class
// Put SkyForms plugin instance to $skyforms attribute:
$this->skyforms = $this->getServer()->getPluginManager()->getPlugin("SkyForms");
```

### Creating Modal Form:
```php
$formTitle = "Modal title";
$formContent = "Modal content (usually a question).";
$btnYes = "Yes"; // Positive button text (optional)
$btnNo = "No"; // Negative button text (optional)
$form = $this->skyforms->createModalForm($formTitle, $formContent, $btnYes, $btnNo);

$form->sendTo($player, function($response) use (&$player){ // Where '$player' is a instance of \pocketmine\Player
  // Yes button results in (bool)$response = true
  // No button results in (bool)$response = false
  if($response){
    $player->sendMessage("You chose YES");
  }else{
    $player->sendMessage("You chose NO");
  }
});
```
![Modal Form](modal_form_screenshot.jpg)

### Creating Menu Form
```php
$formTitle = "Modal title";
$formLabel = "This is the label §a(Colors allowed!)";
$form = $this->skyforms->createMenuForm($formTitle, $formLabel);
// Images can be added in 2nd parameter (URL/Path)
$form->addButton("Button One", "https://www.awicons.com/free-icons/download/folder-icons/vista-folder-icons-by-lokas-software/png/128/000400-folder.png");
$form->addButton("Button Two");
$form->addButton("Button Three");

$form->sendTo($player, function($response) use (&$player){ // Where '$player' is a instance of \pocketmine\Player
  switch($response){
    case 'Button One':
      $player->sendMessage("You pressed the 1st button.");
      break;
    case 'Button Two':
      $player->sendMessage("You pressed the 2nd button.");
      break;
    case 'Button Three':
      $player->sendMessage("You pressed the 3rd button.");
      break;
  }
});
```
![Menu Form](menu_form_screenshot.jpg)
