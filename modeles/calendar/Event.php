<?php

namespace Calendar;

/**
 * Constructeur de la classe Event
 */
class Event{

    private $description;

    private $start;

    private $end;

    private $id_ligue;

    private $id_salle;

    private $libele;

    public function getLibele (): string{
        return $this->libelle ?? '';
    }

    public function getDescription (): string{
        return $this->description ?? '';
    }

    public function getStart (): \Datetime{
        return new \Datetime($this->start);
    }

    public function getEnd (): \Datetime{
        return new \Datetime($this->end);
    }

    public function getIdligue (): int{
        return $this->id_ligue;
    }

    public function getId_salle (): int{
        return $this->id_salle;
    }
    
    public function setNom (string $name){
        $this->nom_salle = $name;
    }

    public function setDescription (string $description){
        $this->description = $description;
    }

    public function setStart (string $start){
        $this->start = $start;
    }

    public function setEnd (string $end){
        $this->end = $end;
    }

}

?>