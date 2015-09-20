<?php
namespace Core\Model

class Model
{
    public $pdoDNS;
    public $select;

    public function __construct()
    {
        try {
            $this->pdoDNS = new PDO('mysql:host=localhost;dbname=blog;charset=utf8;', 'root', 'root');
        } catch(\PDOException $e) {
            throw new \Exception('Nie udało się nawiązać połączenia z bazą danych!<br/>'.$e->getMessage());
        }
    }
}