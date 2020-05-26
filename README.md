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

$form->sendTo($player, function($response) use (&$player){
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
