<?php
/*
 *  _____           _        _   ______         _   _                 
 * |  __ \         | |      | | |  ____|       | | (_)                
 * | |__) |__   ___| | _____| |_| |__ __ _  ___| |_ _  ___  _ __  ___ 
 * |  ___/ _ \ / __| |/ / _ \ __|  __/ _` |/ __| __| |/ _ \| '_ \/ __|
 * | |  | (_) | (__|   <  __/ |_| | | (_| | (__| |_| | (_) | | | \__ \
 * |_|   \___/ \___|_|\_\___|\__|_|  \__,_|\___|\__|_|\___/|_| |_|___/
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.     
 *
 * PocketFactions v1.0.1 by Luke (TheDiamondYT)
 * All rights reserved.                         
 */
 
namespace TheDiamondYT\PocketFactions\listeners;

use pocketmine\event\Listener;
use pocketmine\event\entity\EntityExplodeEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;

use TheDiamondYT\PocketFactions\PF;

class FEntityListener implements Listener {

    private $plugin;
    
    public function __construct(PF $plugin) {
        $this->plugin = $plugin;
    }
    
    public function onEntityDamage(EntityDamageEvent $event) {
        if($event instanceof EntityDamageByEntityEvent) {
            if(!$event->getEntity() instanceof Player or !$event->getDamager() instanceof Player)
                return;
                              
            $fme = $this->plugin->getPlayer($event->getEntity());
            $fhim = $this->plugin->getPlayer($event->getDamager()); 
            
            if($fme->getFaction() === $fhim->getFaction())              
                $event->setCancelled(true);
        }
    }
    
    public function onEntityExplode(EntityExplodeEvent $event) {
        
    }
}
