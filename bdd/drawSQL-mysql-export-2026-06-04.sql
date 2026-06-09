CREATE TABLE `Joueur`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `pseudo` VARCHAR(255) NOT NULL,
    `mot_de_passe` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `Joueur` ADD UNIQUE `joueur_pseudo_unique`(`pseudo`);
CREATE TABLE `Score`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `score` INT NOT NULL,
    `qcm_id` INT NOT NULL,
    `joueur_id` INT NOT NULL,
    `chrono` DATETIME NOT NULL
);
CREATE TABLE `Reponse`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `intitule` TEXT NOT NULL,
    `correct_ou_non` BOOLEAN NOT NULL,
    `question_id` INT NOT NULL
);
CREATE TABLE `Question`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `intitule` TEXT NOT NULL,
    `tp_limite` INT NOT NULL,
    `qcm_id` INT NOT NULL
);
CREATE TABLE `Qcm`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `theme` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL
);
ALTER TABLE
    `Score` ADD CONSTRAINT `score_joueur_id_foreign` FOREIGN KEY(`joueur_id`) REFERENCES `Joueur`(`id`);
ALTER TABLE
    `Question` ADD CONSTRAINT `question_qcm_id_foreign` FOREIGN KEY(`qcm_id`) REFERENCES `Qcm`(`id`);
ALTER TABLE
    `Reponse` ADD CONSTRAINT `reponse_question_id_foreign` FOREIGN KEY(`question_id`) REFERENCES `Question`(`id`);
ALTER TABLE
    `Score` ADD CONSTRAINT `score_qcm_id_foreign` FOREIGN KEY(`qcm_id`) REFERENCES `Qcm`(`id`);