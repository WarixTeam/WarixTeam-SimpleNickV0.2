<?php

namespace King0996\NickCommands;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use King0996\Main;

class unNick extends Command
{
    public function __construct()
    {
        parent::__construct("unnick", "Enlever le nick", "/unnick");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $config = new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);
        if ($sender instanceof Player) {
            $sender->setNameTag($sender->getName());
            $sender->setDisplayName($sender->getName());
            $sender->sendMessage(str_replace(strtolower("{name}"), $sender->getName(), $config->get("unNick_un")));
        } else $sender->sendMessage($config->get("console_message"));
    }
}