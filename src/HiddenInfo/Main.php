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
//              The A+K+NH team.					   //
/////////////////////////////////////////////////////////
namespace HiddenInfo;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\event\server\RemoteServerCommandEvent;
use pocketmine\block\Block;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\math\Vector3;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;

class Main extends PluginBase implements Listener{
    public function onEnable(){
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
	$this->saveDefaultConfig();
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . "======================");	
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . TextFormat::BLUE . "   HiddenInfo v3.0  ");
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . "by ArceusMatt, kpwn_, TheNewHerobrine");
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . "======================");
		$this->getLogger()->info(TextFormat::GREEN . TextFormat::BOLD . "HiddenInfo > Plugin handlers & libraries has been started. Enabling plugin...");
    }
    public function onDisable(){
		$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . "======================");	
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . TextFormat::BLUE . "   HiddenInfo v3.0  ");
	$this->getLogger()->info(TextFormat::RED . TextFormat::BOLD . "by ArceusMatt, kpwn_, TheNewHerobrine");
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

public function onPlayerCommand(PlayerCommandPreprocessEvent $event){
	$name = $event->getPlayer()->getDisplayName();
	$command = $event->getMessage();
	if($command[0] == '/' or $command[0] == '.' && $command[1] == '/'){
		$this->getServer()->getLogger()->info("HiddenInfo: " . $name . ": " . $command);
	foreach($this->getServer()->getOnlinePlayers() as $p) {
		if($p->hasPermission("hiddeninf.cmd")){
			$p->sendMessage("§l§8[§9H§r§9idden§l§9I§r§9nfo§l§8]§r " . $name . ": " . $command);
			if(!file_exists("logs/commands.txt")){
				@mkdir($this->getDataFolder() . "logs/", 0777, true);
				file_put_contents($this->getDataFolder() . "logs/commands.txt", $name . ": " . $command . "\n", FILE_APPEND);
			} elseif(file_exists("logs/commands.txt")){
				file_put_contents($this->getDataFolder() . "logs/commands.txt", $name . ": " . $command . "\n", FILE_APPEND);
			}
			}
			}
			}
}

public function onServerCommand(ServerCommandEvent $event)
    {
		$command = $event->getCommand();
		$name = "CONSOLE";
		$this->getServer()->getLogger()->info("HiddenInfo: " . $name . ": /" . $command);
		foreach($this->getServer()->getOnlinePlayers() as $p) {
		if($p->hasPermission("hiddeninf.cmd")){
			$p->sendMessage("§l§8[§9H§r§9idden§l§9I§r§9nfo§l§8]§r " . $name . ": /" . $command);
			if(!file_exists("logs/commands.txt")){
				@mkdir($this->getDataFolder() . "logs/", 0777, true);
				file_put_contents($this->getDataFolder() . "logs/commands.txt", $name . ": /" . $command . "\n", FILE_APPEND);
			} elseif(file_exists("logs/commands.txt")){
				file_put_contents($this->getDataFolder() . "logs/commands.txt", $name . ": /" . $command . "\n", FILE_APPEND);
			}
			}
			}
    }

    public function onRemoteCommand(RemoteServerCommandEvent $event)
    {
		$command = $event->getCommand();
		$name = "Rcon";
		$this->getServer()->getLogger()->info("HiddenInfo: " . $name . ": /" . $command);
		foreach($this->getServer()->getOnlinePlayers() as $p) {
		if($p->hasPermission("hiddeninf.cmd")){
			$p->sendMessage("§l§8[§9H§r§9idden§l§9I§r§9nfo§l§8]§r " . $name . ": /" . $command);
			if(!file_exists("logs/commands.txt")){
				@mkdir($this->getDataFolder() . "logs/", 0777, true);
				file_put_contents($this->getDataFolder() . "logs/commands.txt", $name . ": /" . $command . "\n", FILE_APPEND);
			} elseif(file_exists("logs/commands.txt")){
				file_put_contents($this->getDataFolder() . "logs/commands.txt", $name . ": /" . $command . "\n", FILE_APPEND);
			}
			}
			} 
    }

	public function onBlockBreak(BlockBreakEvent $event){
		$array = [7, 49, 56, 57, 54, 120, 52, 325, 46, 259, 119, 90, 11, 10, 9, 8];
		$name = $event->getPlayer()->getName();
		foreach($array as $ids){
			if($event->getBlock()->getId() == $ids){
				$this->getServer()->getLogger()->info("HiddenInfo: " . $name . " Broke: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ());
				if(!file_exists("logs/blocks.txt")){
				@mkdir($this->getDataFolder() . "logs/", 0777, true);
				file_put_contents($this->getDataFolder() . "logs/blocks.txt", $name . " Broke: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ() . "\n", FILE_APPEND);
			} elseif(file_exists("logs/blocks.txt")){
				file_put_contents($this->getDataFolder() . "logs/blocks.txt", $name . " Broke: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ() . "\n", FILE_APPEND);
			}
			foreach($this->getServer()->getOnlinePlayers() as $p) {
		if($p->hasPermission("hiddeninf.cmd")){
			$p->sendMessage("§l§8[§9H§r§9idden§l§9I§r§9nfo§l§8]§r " . $name . " Broke: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ());
			}
			}
			if($event->getBlock()->getId() == 397 && $event->getBlock()->getDamage() == 1 or $event->getBlock()->getId() == 120 && $event->getBlock()->getDamage() == 20){
				$this->getServer()->getLogger()->info("HiddenInfo: " . $name . " Broke: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ());
				if(!file_exists("logs/blocks.txt")){
				@mkdir($this->getDataFolder() . "logs/", 0777, true);
				file_put_contents($this->getDataFolder() . "logs/blocks.txt", $name . " Broke: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ() . "\n", FILE_APPEND);
			} elseif(file_exists("logs/blocks.txt")){
				file_put_contents($this->getDataFolder() . "logs/blocks.txt", $name . " Broke: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ() . "\n", FILE_APPEND);
			}
				foreach($this->getServer()->getOnlinePlayers() as $p) {
		if($p->hasPermission("hiddeninf.cmd")){
			$p->sendMessage("§l§8[§9H§r§9idden§l§9I§r§9nfo§l§8]§r " . $name . " Broke: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ());
			}
			}
			}
		}
		}
    }

	public function onBlockPlace(BlockPlaceEvent $event){
		$array = [7, 49, 56, 57, 54, 120, 52, 325, 46, 259, 119, 90, 11, 10, 9, 8];
		$name = $event->getPlayer()->getName();
		foreach($array as $ids){
			if($event->getBlock()->getId() == $ids){
				$this->getServer()->getLogger()->info("HiddenInfo: " . $name . " Place: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ());
				if(!file_exists("logs/blocks.txt")){
				@mkdir($this->getDataFolder() . "logs/", 0777, true);
				file_put_contents($this->getDataFolder() . "logs/blocks.txt", $name . " Place: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ() . "\n", FILE_APPEND);
			} elseif(file_exists("logs/blocks.txt")){
				file_put_contents($this->getDataFolder() . "logs/blocks.txt", $name . " Place: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ() . "\n", FILE_APPEND);
			}
			foreach($this->getServer()->getOnlinePlayers() as $p) {
		if($p->hasPermission("hiddeninf.cmd")){
			$p->sendMessage("§l§8[§9H§r§9idden§l§9I§r§9nfo§l§8]§r " . $name . " Place: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ());
			}
			}
			if($event->getBlock()->getId() == 397 && $event->getBlock()->getDamage() == 1 or $event->getBlock()->getId() == 120 && $event->getBlock()->getDamage() == 20){
				$this->getServer()->getLogger()->info("HiddenInfo: " . $name . " Place: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ());
				if(!file_exists("logs/blocks.txt")){
				@mkdir($this->getDataFolder() . "logs/", 0777, true);
				file_put_contents($this->getDataFolder() . "logs/blocks.txt", $name . " Place: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ() . "\n", FILE_APPEND);
			} elseif(file_exists("logs/blocks.txt")){
				file_put_contents($this->getDataFolder() . "logs/blocks.txt", $name . " Place: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ() . "\n", FILE_APPEND);
			}
				foreach($this->getServer()->getOnlinePlayers() as $p) {
		if($p->hasPermission("hiddeninf.cmd")){
			$p->sendMessage("§l§8[§9H§r§9idden§l§9I§r§9nfo§l§8]§r " . $name . " Place: " . Block::get($event->getBlock()->getId())->getName() . " x" . $event->getBlock()->getX() . ", z" . $event->getBlock()->getZ());
			}
			}
			}
		}
		}
    }

	public function onItemPlace(PlayerInteractEvent $event){
		$name = $event->getPlayer()->getName();
		if($event->getItem()->getId() == 397 && $event->getItem()->getDamage() == 1 or $event->getItem()->getId() == 325 && $event->getItem()->getDamage() == 8 or $event->getItem()->getId() == 325 && $event->getItem()->getDamage() == 10 or $event->getItem()->getId() == 383){
			$this->getServer()->getLogger()->info("HiddenInfo: " . $name . " Item: " . Item::get($event->getItem()->getId())->getName() . " x" . $event->getPlayer()->getFloorX() . " z" . $event->getPlayer()->getFloorZ());
				$this->getServer()->getLogger()->info("HiddenInfo: " . $name . " Item: " . Item::get($event->getItem()->getId())->getName() . " x" . $event->getPlayer()->getFloorX() . " z" . $event->getPlayer()->getFloorZ());
				if(!file_exists("logs/blocks.txt")){
				@mkdir($this->getDataFolder() . "logs/", 0777, true);
				file_put_contents($this->getDataFolder() . "logs/blocks.txt", $name . " Item: " . Item::get($event->getItem()->getId())->getName() . " x" . $event->getPlayer()->getFloorX() . " z" . $event->getPlayer()->getFloorZ() . "\n", FILE_APPEND);
			} elseif(file_exists("logs/blocks.txt")){
				file_put_contents($this->getDataFolder() . "logs/blocks.txt", $name . " Item: " . Item::get($event->getItem()->getId())->getName() . " x" . $event->getPlayer()->getFloorX() . " z" . $event->getPlayer()->getFloorZ() . "\n", FILE_APPEND);
			}
				foreach($this->getServer()->getOnlinePlayers() as $p) {
		if($p->hasPermission("hiddeninf.cmd")){
			$p->sendMessage("§l§8[§9H§r§9idden§l§9I§r§9nfo§l§8]§r " . $name . " Item: " . Item::get($event->getItem()->getId())->getName() . " x" . $event->getPlayer()->getFloorX() . " z" . $event->getPlayer()->getFloorZ());
			}
			}
			}
	}

  public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch(strtolower($command->getName())){
            case "hiddeninfo":
                if(!isset($args[0])){
		    $sender->sendMessage($this->formatMessage(TextFormat::RED . "Usage: /hiddeninfo <view|credits|item>"));
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
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9U§rU§l§9ID: §r§7") . $player->getUniqueId());
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " ============================"));
                }elseif($player instanceof Player){
			
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " ===== Information about $args[1]	====="));
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9I§r§9P: §r§7" . $player->getAddress()));
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9P§r§9ort: §r§7" . $player->getPort()));
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9C§r§9lient§l§9ID: §r§7") . $player->getClientId());
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " §l§9U§rU§l§9ID: §r§7") . $player->getUniqueId());
			$sender->sendMessage($this->formatMessage(TextFormat::BLUE . " ==========================="));
		} else {
                    $sender->sendMessage("Player ".$args[1]." is not online or you can't see his information");
                }
		}
                return true;
            break;
        }
					} elseif ($args[0] == "credits") {
						$sender->sendMessage($this->formatMessage(" §6by §9Arceus§bMatt§9, §3kp§fwn_§9, §aTheNew§bHerobrine§7 | All Rights Reserved."));
					} elseif ($args[0] == "item") {
						$id = $sender->getItemInHand()->getId();
						$damage = $sender->getItemInHand()->getDamage();
						$held = $sender->getItemInHand();
						$sender->sendMessage($this->formatMessage("" . $held . " " . $id . ":" . $damage));
					} else {
						$sender->sendMessage($this->formatMessage(TextFormat::RED . "Unknown subcommand: " . $args[0] . ", \nUsage: /hiddeninfo <view|credits>"));
					}
  }
}

}

