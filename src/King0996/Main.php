<?php

namespace King0996;

use King0996\NickCommands\resetNick;
use King0996\NickCommands\unNick;
use pocketmine\plugin\PluginBase;
use King0996\NickCommands\Nick;

class Main extends PluginBase
{
    private static Main $main;

    public function onEnable(): void
    {
        self::$main = $this;
        $this->saveResource("config.yml");
        $this->getLogger()->info("Plugin on | By King0996");

        $this->getServer()->getCommandMap()->register("", new resetNick());
        $this->getServer()->getCommandMap()->register("", new unNick());
        $this->getServer()->getCommandMap()->register("", new Nick());
    }

    public static function getInstance(): Main
    {
        return self::$main;
    }

    public function onDisable(): void
    {
        $this->getLogger()->info("Plugin off | By King0996");
    }
}