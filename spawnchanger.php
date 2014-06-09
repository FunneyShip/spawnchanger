<?php

/*
__PocketMine Plugin__
name=SpawnChanger
description=change spawn point
version=0.0.1
author=FunneyShip
class=Spawn
apiversion=9,10,11,12
*/


class Spawn implements Plugin{
	private $api;
	public function __construct(ServerAPI $api, $server = false)
	{
		$this->api = $api;
	}
	
	public function init(){
		 if(!file_exists($this->api->plugin->configPath($this) . "config.yml"))
        {
            $this->CONFIG = new Config($this->api->plugin->configPath($this) . "config.yml", CONFIG_YAML, array(
                "x" => 0,
                "y" => 0,
                "z" => 0,
            ));
        }
    $this->CONFIG = $this->api->plugin->readYAML($this->api->plugin->configPath($this) . "config.yml");
		$this->api->addHandler("player.spawn", array($this, "handle"));
		$this->api->addHandler("player.respawn", array($this, "handle"));
		$this->api->console->register("spawn", "change's spawn", array($this, "Command"));
		$this->api->console->alias("s","spawn");
		console("[INFO][SpawnChange] SpawnChange Enabled!");
                
                $x = ($this->CONFIG["x"]);
                $y = ($this->CONFIG["y"]);
                $z = ($this->CONFIG["z"]);
}
public function Command($cmd, $issuer, $alias){

 $this->api->console->run(tp . $issuer . $x . $y . $z);
 
 }

public function __destruct(){
}
}
