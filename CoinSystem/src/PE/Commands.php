<?php 
namespace PE;
use PE\coinsystem;

use pocketmine\command\Commands;
use pocketmine\command\CommandSender;

class Commands implements CommandExecutor{
    
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        if($cmd->getName() == "coins"){
            switch($args[0]){
                case "add":
                    if(!empty($args[1]) && !empty($args[2])){
                        API::addCoins($args[1], intval($args[2]));
                        $sender->sendMessage("§c".$player." gets ".$args[2]." coins");
                    }else{
                        $sender->sendMessage("Usage: /coins add <player> <coins>");
                    }
                    break;
                case "set":
                    if(!empty($args[1]) && !empty($args[2])){
                        API::setCoins($args[1], intval($args[2]));
                        $sender->sendMessage("§c".$player." have now ".$args[2]." coins");
                    }else{
                        $sender->sendMessage("Usage: /coins set <player> <coins>");
                        }
                    break;
                case "remove":
                    if(!empty($args[1]) && !empty($args[2])){
                        API::removeCoins($args[1], intval($args[2]));
                        $sender->sendMessage("§c".$player." have ".$args[2]." coins");
                    }else{
                        $sender->sendMessage("Usage: /coins remove <player> <coins>");
                        }
                        break;
                    
            }
            return true;
        }
    }
}
