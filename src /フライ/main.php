<?php

namespace fly;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\utils\UUID;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\item\Item;

use pocketmine\entity\Entity;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerGameModeChangeEvent;
use pocketmine\event\player\PlayerToggleFlightEvent;
use pocketmine\event\player\PlayerToggleGlideEvent;
use pocketmine\event\player\PlayerToggleSneakEvent;

use pocketmine\network\protocol\ExplodePacket;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\network\protocol\AddPlayerPacket;
use pocketmine\network\protocol\InteractPacket;
use pocketmine\network\protocol\RemoveEntityPacket;
use pocketmine\network\protocol\MobArmorEquipmentPacket;
use pocketmine\network\protocol\EntityMotionPacket;

use pocketmine\scheduler\PluginTask;
use pocketmine\scheduler\Task;
use pocketmine\scheduler\CallbackTask;
use pocketmine\scheduler\ServerScheduler;

class main extends PluginBase implements Listener{

public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->getLogger()->info("§cFlyKickを読み込みました");
$this->getLogger()->info("§c制作者: inko 二次配布は禁止です 作者になりすます事も禁じます");
$this->getLogger()->info("§cplugin.ymlの作成者・Plugin名は変えないで下さい");
}
	
function changeflightmode(PlayerToggleFlightEvent $event){
$player = $event->getPlayer();
$mode = $event->isFlying();
$player = Server::getInstance()->getOnlinePlayers();
foreach($players as $player){
if(!$player->isOP() && $player->isFlying()){//?
$this->getServer()->broadcastMessage("§a[§cFB§a]§b".$player->getName()."§6がFlyを使用したと判断されました。このメッセージをSSしてLobiに報告して下さい");
$player->kick("§a[§cFB§a]§e Flyを使用したと判断しました", false); 
}else{
$this->getServer()->broadcastMessage("§a[§cFB§a]§b".$player->getName()."§6がFlyを使用したと判断されました。このメッセージをSSしてLobiに報告して下さい");
$player->kick("§a[§cFB§a]§e Flyを使用したと判断しました", false); 
}
}
}
}