<?php 
// JoueurMapper sert à convertir un tableau 
// (ce que retourne PDO) en objet Joueur.
// PDO retourne toujours des tableaux :

final class JoueurMapper {
    public static function mapToObject(array $joueurData): Joueur
    {
        return new Joueur(
            $joueurData['id'],
            $joueurData['pseudo'],
            $joueurData['mot_de_passe']
        );
    }
}
?>