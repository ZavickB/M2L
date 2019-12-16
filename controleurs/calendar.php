<?php

require 'modeles/calendar/Month.php';
require 'modeles/calendar/Events.php';

$pdo = get_pdo();
$events = new calendar\Events($pdo);
$month = new calendar\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
$firstDay = $month->getFirstDay();
$firstDay = $firstDay->format('N') === '1'? $firstDay : $month->getFirstDay()->modify('last monday');
$weeks = $month->getWeeks();
$end = (clone $firstDay)->modify('+'.(6 + 7* ($weeks-1).' days'));
$events = $events -> getEventsBetweenByDay($firstDay, $end);
$req = $pdo->prepare("SELECT * FROM salles WHERE id_salle = ?");

pages('calendar',['title' => 'M2N - Calendrier', 'events' => $events, 'month' => $month, 'weeks' => $weeks, 'firstDay' => $firstDay, 'req' => $req]);