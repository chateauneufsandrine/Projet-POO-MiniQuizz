<?php
// Le Repository sert à centraliser toutes les requêtes SQL 
// d'une table dans un seul fichier.
// Sans Repository → le SQL est éparpillé partout :

final class JoueurRepository
{
    public function __construct(
        private PDO $db
    ) {}

    // Méthode qui cherche un joueur par son pseudo. 
    // Retourne un objet Joueur ou null si non trouvé.
    public function findByPseudo(string $pseudo): ?Joueur
    {
        $request = $this->db->prepare('SELECT * FROM joueur WHERE pseudo = :pseudo');
        $request->execute([':pseudo' => $pseudo]);
        $joueurData = $request->fetch(PDO::FETCH_ASSOC);

        if (!$joueurData) {
            return null;
        }

        return JoueurMapper::mapToObject($joueurData);
    }

    // Méthode qui insère un nouveau joueur en base. 
    // Retourne void car elle ne retourne rien.
    public function create(string $pseudo, string $mot_de_passe_hash): void
    {
        $request = $this->db->prepare('INSERT INTO joueur(pseudo, mot_de_passe) VALUES (:pseudo, :mot_de_passe)');
        $request->execute([
            ':pseudo' => $pseudo,
            ':mot_de_passe' => $mot_de_passe_hash
        ]);
    }

    // Méthode qui récupère tous les joueurs. 
    // Retourne un tableau array d'objets Joueur.
    public function findAll(): array
    {
        $request = $this->db->prepare('SELECT * FROM joueur');
        $request->execute();
        $joueurs = $request->fetchAll(PDO::FETCH_ASSOC);

        return array_map(fn($j) => JoueurMapper::mapToObject($j), $joueurs);
    }

    public function findById(int $id): Joueur
    {
        $request = $this->db->prepare('SELECT * FROM joueur WHERE id = :id');
        $request->execute([
            ':id' => $id
        ]);

        $joueurData =  $request->fetch(PDO::FETCH_ASSOC);
        
        return JoueurMapper::mapToObject($joueurData);

    }
}
