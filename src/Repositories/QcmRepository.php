<?php

final class QcmRepository
{
    public function __construct(
        private PDO $db
    ) {}

    public function findByTheme(string $theme): ?Qcm
    {
        $request = $this->db->prepare("SELECT * FROM Qcm WHERE theme =:theme");
        $request->execute([":theme" => $theme]);
        $qcmData = $request->fetch(PDO::FETCH_ASSOC);

        if (!$qcmData) {
            return null;
        }
        // convertit le tableau en objet Qcm via le Mapper et le retourne
        return QcmMapper::mapToObject($qcmData);
    }
}
