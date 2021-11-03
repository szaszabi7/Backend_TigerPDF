<?php 

namespace Petrik\Pdf;

class Tiger {
    private $id;
    private $nev;
    private $tulajdonosNeve;
    private $orokbefogadasDatuma;

    public function __construct(string $nev, string $tulajdonosNeve, \DateTime $orokbefogadasDatuma) {
        $this -> nev = $nev;
        $this -> tulajdonosNeve = $tulajdonosNeve;
        $this -> orokbefogadasDatuma = $orokbefogadasDatuma;
    }

    public function getId() {
        return $this -> id;
    }

    public function getNev() {
        return $this -> nev;
    }

    public function getTulajdonosNeve() {
        return $this -> tulajdonosNeve;
    }

    public function getOrokbefogadasDatuma() {
        return $this -> orokbefogadasDatuma;
    }

    public function toString() : String{
        return "Név: " . $this -> nev . "\nTulajdonos Neve: " . $this -> tulajdonosNeve . "\nÖrökbefogadás Dátuma: " . $this -> orokbefogadasDatuma ->format('Y-m-d');
    }

    public static function osszes() : array {
        global $db;
        
        $t = $db -> query("SELECT * FROM tigers ORDER BY id ASC")
            -> fetchAll();
            $eredmeny = [];
            
            foreach ($t as $elem) {
                $tigers = new Tiger($elem['nev'], $elem['tulajdonosNeve'], new \DateTime($elem['orokbefogadasDatuma']));
                $tigers -> id = $elem['id'];
            $eredmeny[] = $tigers;
        }
        
        return $eredmeny;
    }
}