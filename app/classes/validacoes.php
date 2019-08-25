<?php

class Validacoes {

    public static function verificaSeExiste($tabela, $where ) {
        $sql = "SELECT * FROM $tabela WHERE $where";
        $sth = DB::getInstance()->prepare($sql);
        $sth->execute();
        if($sth->rowCount() > 0)
        return true;
        else
        return false;
    }








}