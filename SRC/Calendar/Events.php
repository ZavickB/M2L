<?php
/*************************************************************************************************************************************/
namespace Calendar;

/*************************************************************************************************************************************/
class Events {
    private $pdo;
    
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    
/**
 * Permet de récupérer les evenements qui commencent entre 2 dates
 * @param \DateTime $start
 * @param \DateTime $end 
 * @return array
 */

    public function getEventsBetween(\DateTime $start, \DateTime $end) : array{
        $sql= "SELECT * FROM reservations JOIN salles on reservations.id_salle=salles.id_salle where start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}' ";
        $statement = $this->pdo->query($sql);
        $results = $statement->fetchAll();
        return $results;
        }
    /**
     * Recupère les évènements commencant entre 2 dates indexés par jour
     *
     * @param \Datetime $start
     * @param \Datetime $end
     * @return array
     */
    public function getEventsBetweenByDay (\Datetime $start,\Datetime $end): array{
        $events = $this->getEventsBetween($start, $end);
        $days = [];
        foreach ($events as $event){
            $date = explode (' ', $event['start'])[0];
            if (!isset($days[$date])){
                $days[$date] = [$event];
            } else{
                $days[$date][] = $event;
            }
        }
        return $days;
    }
     
    /**
     * Recupère un évènement
     *
     * @param integer $id
     * @return array
     * @throws  \Exception
     */
    public function find(int $id): array {
       return $this->pdo->query("SELECT * FROM reservations join salles on reservations.id_salle = salles.id_salle WHERE id_resa = $id LIMIT 1")->fetch();
    }
}   

