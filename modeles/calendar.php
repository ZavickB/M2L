<?php
        require 'SRC/Calendar/Month.php';
        require 'SRC/Calendar/Events.php';
        $pdo = get_pdo();
        $events = new Calendar\Events($pdo);
        $month = new Calendar\Month($_GET['month'] ?? null,$_GET['year'] ?? null);
        $start = $month->getStartingDay();  
        $start = $start->format('N')=== '1'? $start : $month->getStartingDay()->modify('last monday');
        $weeks = $month->getWeeks();
        $end = (clone $start)->modify('+'.(6 + 7 * ($weeks -1)). 'days');
        $events = $events->getEventsBetweenByDay($start, $end);
/*        echo'<pre>';
        print_r($events);
        echo'</pre>';  
 */
