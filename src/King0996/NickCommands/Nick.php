<?php

namespace King0996\NickCommands;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use King0996\Main;

class Nick extends Command
{
    public function __construct()
    {
        parent::__construct("nick", "Changer son pseudo", "/nick");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $config = new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);
        if ($sender instanceof Player) {
            if (isset($args[0])) {
                $sender->setNameTag($args[0]);
                $sender->setDisplayName($args[0]);
                $sender->sendMessage(str_replace(strtolower("{name}"), $args[0], $config->get("nick_change")));
            } else $sender->sendMessage($config->get("nick_error"));
        } else$sender->sendMessage($config->get("console_message"));
    }
}