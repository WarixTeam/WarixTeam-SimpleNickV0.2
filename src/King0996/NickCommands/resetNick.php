<?php

namespace King0996\NickCommands;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use King0996\Main;

class resetNick extends Command
{
    public function __construct()
    {
        parent::__construct("resetnick", "Reset le pseudo d'un joueur", "/resetnick");
    }

    public function execute(CommandSender $player, string $commandLabel, array $args)
    {
        $config = new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);
        if ($player instanceof Player) {
            if ($player->hasPermission("use.resetnick")) {
                if (isset($args[0])) {
                    $player2 = $player->getServer()->getPlayerByPrefix($args[0]);
                    if ($player2 instanceof Player) {
                        $player2->setNameTag($player2->getName());
                        $player2->setDisplayName($player2->getName());
                        $player2->sendMessage(str_replace(strtolower("{name}"), $player->getName(), $config->get("resetNick_by")));
                        $player->sendMessage(str_replace(strtolower("{name}"), $player2->getName(), $config->get("resetNick_good")));
                    } else $player->sendMessage(str_replace(strtolower("{name}"), $args[0], $config->get("resetNick_wrong")));
                }
            }
        } else $player->sendMessage($config->get("console_message"));
    }
}