<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240816065739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE atome (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(13) DEFAULT NULL, slug VARCHAR(13) DEFAULT NULL, electron VARCHAR(255) NOT NULL, numero INT DEFAULT NULL, symbole VARCHAR(6) NOT NULL, info_groupe VARCHAR(10) NOT NULL, info_periode VARCHAR(10) NOT NULL, info_bloc VARCHAR(10) NOT NULL, masse_volumique VARCHAR(255) NOT NULL, cas VARCHAR(255) NOT NULL, einecs VARCHAR(255) NOT NULL, masse_atomique VARCHAR(255) NOT NULL, rayon_atomique VARCHAR(255) NOT NULL, rayon_de_covalence VARCHAR(255) NOT NULL, rayon_de_van_der_waals VARCHAR(255) NOT NULL, configuration_electronique VARCHAR(255) NOT NULL, etat_oxydation VARCHAR(255) NOT NULL, decouverte_annee VARCHAR(255) NOT NULL, decouverte_noms VARCHAR(255) NOT NULL, decouverte_pays VARCHAR(255) NOT NULL, electronegativite VARCHAR(255) NOT NULL, point_de_fusion VARCHAR(255) NOT NULL, point_d_ebullition VARCHAR(255) NOT NULL, is_radioactif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE atome');
    }
}
