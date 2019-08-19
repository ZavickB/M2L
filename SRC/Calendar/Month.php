<?php

/* 
GESTION DES MOIS DU CALENDRIER
 */

/*_________________________________________________________________________________________________________________________________*/

namespace Calendar;

/*_________________________________________________________________________________________________________________________________*/


class Month { 
    
    public $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
    
    private $months = ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
    public $month;
    public $year;
    
    
    /**
     * @param int $month le mois compris entre 1 et 12
     * @param string $year l'année 
     * @throws \exception
     * 
     **/
    public function __construct(?int $month = null , ?int $year = null )
    {   
        if($month===null || $month < 1 || $month >12){
           $month = intval(date('m'));
        }
        if($year===null){
           $year = intval(date('Y'));        
           if($year < 1970){
            throw new \Exception( "L'année est inférieure à 1970");
            }
        }
        $this->month = $month;
        $this->year = $year;
    }   
    /**
     * Renvoie le premier jour du mois 
     * @return \DateTime
     */
    public function getStartingDay():\DateTime{
        return new \DateTime("{$this-> year}-{$this->month}-01");

    }
    
    /**
     * Retourne le mois en toutes lettres ( ex : Mars 2018 ) 
     * @return string
     */
    
    
    public function toString(): string {
        return $this->months[$this->month - 1].' '.$this->year;
    }
    /**
     * Retourne le nombre de semaines dans le mois en cours 
     * @return int
     */
    public function getWeeks (): int {
        $start = $this->getStartingDay();
        $end = (clone $start) -> modify('+1 month - 1 day');
       // var_dump($end->format('W'),($start->format('W')));
        $weeks = intval($end->format('W'))- intval($start->format('W')) +1 ;
        if ($weeks < 0){
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }
    
  /*
   * Est-ce que le jour est dans le mois en cours 
   * @param \DateTime $date
   * @return bool
   */
    public function withinMonth(\DateTime $date): bool {
       return $this->getStartingday()->format('Y-m')=== $date -> format('Y-m');
            
   }
   
 /**
     * Renvoie le mois suivant
     *
     * @return Month
     */
    public function nextMonth(): Month {
        $month = $this->month +1;
        $year = $this->year;
        if ($month > 12){
            $month = 1;
            $year += 1;
        }
        return new Month($month,$year);
    }

    /**
     * Renvoie le mois pécédant
     *
     * @return Month
     */
    public function previousMonth(): Month {
        $month = $this->month - 1;
        $year = $this->year;
        if ($month < 1){
            $month = 12;
            $year -= 1;
        }
        return new Month($month,$year);
    }
}