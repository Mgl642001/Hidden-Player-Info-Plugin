<?php
/////////////////////////////////////////////////////////
//  > HiddenInfo by ArceusMatt & kpwn_<                //
//													   //
//	Development team: ArceusMatt & kpwn_ (Leaders)     //
//													   //
//	@authors: ArceusMatt & kpwn_					   //
// 													   //
//  @copyright: This project has been copyrighted	   //
//				with a copyright notice legally at     //
//              Colombia. Any kind of deviations,      //
//              code malformation, etc, will           // 
//				be punished.						   //									   
//              Any kind of passing the copyright      //
//              user license limits will end to        //
//              a DMCA report.                         //
//													   //
//              Thanks for understanding this rules,   //
//													   //
//              The A+K team.						   //
/////////////////////////////////////////////////////////
namespace HiddenInfo;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
class Main extends PluginBase implements Listener{
    public function onEnable(){
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
	$this->saveDefaultConfig();
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . "======================");	
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . TextFormat::BLUE . "   HiddenInfo v1.0  ");
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . "by Arceus&kpwn_");
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . "======================");
		$this->getLogger()->info(TextFormat::GREEN . TextFormat::BOLD . "HiddenInfo > Plugin handlers & libraries has been started. Enabling plugin...");
    }
    public function onDisable(){
		$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . "======================");	
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . TextFormat::BLUE . "   HiddenInfo v1.0  ");
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . "by Arceus&kpwn_");
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . "======================");
		$this->getLogger()->info(TextFormat::GREEN . TextFormat::BOLD . "HiddenInfo > Kill signal requested. Disabling plugin...");
	}
	public function formatMessage($string, $confirm = false) {
		if($confirm) {
			return "§l§8[§9H§r§9idden§l§9I§r§9nfo§l§8]§r " . TextFormat::WHITE . "$string";
		} else {	
			return "§l§8[§9H§r§9idden§l§9I§r§9nfo§l§8]§r " . TextFormat::WHITE . "$string";
		}
	}
  public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch(strtolower($command->getName())){
            case "hiddeninfo":
                if(!isset($args[0])){
		    $sender->sendMessage($this->formatMessage(TextFormat::RED . "Usage: /hiddeninfo <view|credits>"));
                    return false;
                }
				if ($args[0] == "view") {
					if (!isset($args[1])) {
						$sender->sendMessage($this->formatMessage(TextFormat::RED . " Please write player EXACT name, usage: /hiddeninfo view <PlayerName>"));
						return true;
					} else {
                $player = $this->getServer()->getPlayer($args[1]);
				$playerExact = $this->getServer()->getPlayerExact($args[1]);
                if($player !== null){
                    if($player === $sender){
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " ===== Information about $args[1]	====="));
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9I§r§9P: §r§7" . $player->getAddress()));
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9P§r§9ort: §r§7" . $player->getPort()));
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9C§r§9lient§l§9ID: §r§7") . $player->getClientId());
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9U§r§U§l§9ID: §r§7") . $player->getUniqueId());
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " ============================"));
                }elseif($player instanceof Player){
			
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " ===== Information about $args[1]	====="));
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9I§r§9P: §r§7" . $player->getAddress()));
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9P§r§9ort: §r§7" . $player->getPort()));
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9C§r§9lient§l§9ID: §r§7") . $player->getClientId());
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9U§r§U§l§9ID: §r§7") . $player->getUniqueId());
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " ==========================="));
		} else {
                    $sender->sendMessage("Player ".$args[1]." is not online or you can't see his information");
                }
		}
                return true;
            break;
        }
					} elseif ($args[0] == "credits") {
						$sender->sendMessage($this->formatMessage(" §6by §9Arceus§bMatt §9& §3kp§fwn_§7 | All Rights Reserved."));
					} else {
						$sender->sendMessage($this->formatMessage(TextFormat::RED . "Unknown subcommand: " . $args[0] . ", \nUsage: /hiddeninfo <view|credits>"));
					}
  }
}
}

