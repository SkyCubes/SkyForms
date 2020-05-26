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
$formTitle = "Título do formulário";
$formContent = "Conteudo do modal (normalmente uma pergunta).";
$btnYes = "Sim" // Positive button text (optional)
$btnNo = "Não"; // Negative button text (optional)
$form = $this->skyforms->createModalForm($formTitle, $formContent, $btnYes, $btnNo);

$form->sendTo($player, function($response) use (&$player){
  // Yes button results in (bool)$response = true
  // No button results in (bool)$response = false
  if($response){
    $player->sendMessage("Você escolheu SIM");
  }else{
    $player->sendMessage("Você escolheu NÃO");
  }
});
```
