# DiscordAPI
DiscordAPI for PocketMine-MP plugins

# Import Class
```php
use io\enn3\discordapi\DiscordAPI;
```

# DiscordAPI
| variable | type | call |
|:------:|:------:|:------:|
| username | string | Username your Bot |
| webhook_api | string | Get From Server |

```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new DiscordAPI("UsernameBot", "WEBHOOK_API");
}
```

# sendMessage
| variable | type | call |
|:------:|:------:|:------:|
| content | string | Message/text |
| username | string | UsernameBot |
```php
private $bot;

public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->bot = new DiscordAPI("UsernameBot", "WEBHOOK_API");
    $this->bot->sendMessage("Hello there!");
}
```
