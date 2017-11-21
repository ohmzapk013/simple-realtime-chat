<?php

if (!defined("SYSTEM_PATH"))
	die("Bad request");

class MessageWithPusher {
	private $pusher;
	private $channel;
	private $event;
	public function __construct($channel, $event) {
		$config = include_once SYSTEM_PATH . 'pusher_conf.php';
		$this->pusher = new Pusher\Pusher(
			$config["key"],
			$config["secret"],
			$config["app_id"],
			["cluster" => $config["cluster"]]
		);
		$this->channel = $channel;
		$this->event = $event;
	}

	public function sendMessageToClient($content = []){
		return $this->pusher->trigger($this->channel, $this->event, $content);
	}

	/**
	 * @param mixed $channel
	 */
	public function setChannel($channel) {
		$this->channel = $channel;
	}


	/**
	 * @param mixed $event
	 */
	public function setEvent($event) {
		$this->event = $event;
	}
}