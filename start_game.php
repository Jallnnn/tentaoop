<?php

include_once("nodebite-swiss-army-oop.php");
$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oop2",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oop2"
));

unset($ds->players);
unset($ds->computer_player);
unset($ds->tools);
unset($ds->challenges);

$players = &$ds->players;
$computer_player = &$ds->computer_player;
$tools = &$ds->tools;
$challenges = &$ds->challenges;

if (isset($_REQUEST["playerName"]) && isset($_REQUEST["playerClass"])) {
  //else store data in variables
  $create_player = $_REQUEST["playerName"];
  $create_class = $_REQUEST["playerClass"];

  $new_player = New $create_class($create_player);
  $players[] = &$new_player;

  } 
else {
  //if not enough request data was recieved, exit script
  echo(json_encode(false));
  exit();
  }

  $humanName = $_POST['humanName'];

  $humanName = array(
      "Peter",
      "Pelle",
      "Anna"
    );

    $random_human_name = mt_rand(0,2);
    $human = New Human($humanName[$random_human_name]);

$all_classes = array("Human", "Baron", "Dragon");
$random_class = $create_class;
while ($create_class == $random_class) {
	$randomIndex = rand(0, count($all_classes) - 1);
	$random_class = $all_classes[$randomIndex];
}

$humanName = array(
      "John",
      "Henrik",
      "Teodor"
    );

    $random_human_name = mt_rand(0,2);
    $computer_player[] = New $random_class($humanName[$random_human_name]);


$random_class2 = $random_class;
while ($create_class == $random_class || $random_class2 == $random_class) {
	$randomIndex = rand(0, count($all_classes) - 1);
	$random_class = $all_classes[$randomIndex];
}


$humanName = array(
      "Olaf",
      "Niklas",
      "Theo"
    );

    $random_human_name = mt_rand(0,2);
    $computer_player[] = New $random_class2($humanName[$random_human_name]);


$tools = array();

	$tools[] = New Tool(
		"Long sword",
		array(
			"attackdamage" => 40,
			"attackspeed" => 30,
		)
	);

	$tools[] = New Tool(
		"Large rod",
		array(
			"abilitypower" => 60,
			"attackspeed" => 30,
		)
	);


	$tools[] = New Tool(
		"Chain armor",
		array(
			"armor" => 50,
		)
	);

	$tools[] = New Tool(
		"Rabadon deathcap",
		array(
			"abilitypower" => 90,
		)
	);

	$tools[] = New Tool(
		"dorans blade",
		array(
			"attackdamage" => 20,
		)
	);

	$tools[] = New Tool(
		"dorans shield",
		array(
			"armor" => 20,
		)
	);

	$tools[] = New Tool(
		"cloth armor",
		array(
			"armor" => 30,
		)
	);

	$tools[] = New Tool(
		"Health potion",
		array(
			"health" => 50,
		)
	);

	$tools[] = New Tool(
		"Damage potion",
		array(
			"attackdamage" => 40,
		)
	);

$challenges = array();

	$challenges[] = New Challenge(
		"You meet a minion on summoners rift".
		"and he want to kill you!",
		array(
			"attackspeed" => 50,
			"abilitypower" => 55,
			"attackdamage" => 40,
			"armor" => 40
			

		)
	);

	$challenges[] = New Challenge(
		"You are chilling at summoners rift".
		"When Leblanc is dashing towards you".
		"You need to be ready to attack when she reaches you!",
		array(
			"attackspeed" => 50,
			"abilitypower" => 60,
			"attackdamage" => 20,
			"armor" => 30
		)
	);

	$challenges[] = New Challenge(
		"you find yourself a blue buff".
		"It looks at you,".
		"And he goes for the attack",
		array(
			"attackspeed" => 45,
			"abilitypower" => 55,
			"attackdamage" => 40,
			"armor" => 30
		)
	);

	$challenges[] = New Challenge(
		"In the bushes you find garen, ".
		"He starts charging towards you, DEMACIA!",
		array(
			"attackspeed" => 85,
			"abilitypower" => 70,
			"attackdamage" => 65,
			"armor" => 30
		)
	);

	$challenges[] = New Challenge(
		"You reach a tower, ".
		"It start firing a laser towards you.",
		array(
			"attackspeed" => 80,
			"abilitypower" => 65,
			"attackdamage" => 60,
			"armor" => 30
		)
	);

	$challenges[] = New Challenge(
		"You enter the enemy base, ".
		"You fins yourself a inhibitor. ".
		"Fast, kill the inhib.",
		array(
			"attackspeed" => 75,
			"abilitypower" => 55,
			"attackdamage" => 50,
			"armor" => 60
		)
	);

	$challenges[] = New Challenge(
		"You find the enemy nexus, but something is behind you ".
		"Annie releases her tibbers, kill her fast!",
		array(
			"attackspeed" => 50,
			"abilitypower" => 50,
			"attackdamage" => 40,
			"armor" => 30
		)
	);

	$challenges[] = New Challenge(
		"Defend you tower and kill the minion. ",
		array(
			"attackspeed" => 50,
			"abilitypower" => 55,
			"attackdamage" => 40,
			"armor" => 30
		)
	);

	$challenges[] = New Challenge(
		"Defend your nexus from Nidalee and Graves!",
		array(
			"attackspeed" => 50,
			"abilitypower" => 55,
			"attackdamage" => 40,
			"armor" => 30
		)
	);

	$challenges[] = New Challenge(
		"You sneak into the enemy base,".
		"No one notices you. ".
		"Kill the nexus quickly!",
		array(
			"attackspeed" => 50,
			"abilitypower" => 55,
			"attackdamage" => 40,
			"armor" => 30
		)
	);

//, $ds->computer_player, $ds->tools, $ds->challenges

echo(json_encode(array($ds->players)));


