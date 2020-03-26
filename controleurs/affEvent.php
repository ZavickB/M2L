<?php
require ('modeles/event.php');
$libelle = requete('SELECT libelle 
                        FROM equipements JOIN reservations_equip_lien ON  reservations_equip_lien.id_equip=equipements.id_equip
                        WHERE id_resa = '.$_GET['id'].'');

pages('affEvent',['title' => 'M2L - Votre réservation', 'admin' => $admin, 'event' => $event, 'libelle' => $libelle]);
