<?php 
// JoueurMapper sert à convertir un tableau 
// (ce que retourne PDO) en objet Joueur.
// PDO retourne toujours des tableaux :

final class QcmMapper {
    public static function mapToObject(array $qcmData): Qcm
    {
        return new Qcm (
            $qcmData['id'],
            $qcmData['theme'],
            $qcmData['description']
        );
    }
}
?>