<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240829143926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE element DROP FOREIGN KEY FK_282D920B530A8000');
        $this->addSql('ALTER TABLE element DROP FOREIGN KEY FK_282D920BAFF1D52B');
        $this->addSql('DROP INDEX IDX_41405E39530A8000 ON element');
        $this->addSql('DROP INDEX IDX_41405E39AFF1D52B ON element');
        $this->addSql('ALTER TABLE element ADD element_category_id INT DEFAULT NULL, ADD element_groupe_id INT DEFAULT NULL, DROP atom_category_id, DROP atom_groupe_id');
        $this->addSql('ALTER TABLE element ADD CONSTRAINT FK_41405E39B8E0C54F FOREIGN KEY (element_category_id) REFERENCES element_category (id)');
        $this->addSql('ALTER TABLE element ADD CONSTRAINT FK_41405E39D24E1BA7 FOREIGN KEY (element_groupe_id) REFERENCES element_groupe (id)');
        $this->addSql('CREATE INDEX IDX_41405E39B8E0C54F ON element (element_category_id)');
        $this->addSql('CREATE INDEX IDX_41405E39D24E1BA7 ON element (element_groupe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE element DROP FOREIGN KEY FK_41405E39B8E0C54F');
        $this->addSql('ALTER TABLE element DROP FOREIGN KEY FK_41405E39D24E1BA7');
        $this->addSql('DROP INDEX IDX_41405E39B8E0C54F ON element');
        $this->addSql('DROP INDEX IDX_41405E39D24E1BA7 ON element');
        $this->addSql('ALTER TABLE element ADD atom_category_id INT DEFAULT NULL, ADD atom_groupe_id INT DEFAULT NULL, DROP element_category_id, DROP element_groupe_id');
        $this->addSql('ALTER TABLE element ADD CONSTRAINT FK_282D920B530A8000 FOREIGN KEY (atom_category_id) REFERENCES element_category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE element ADD CONSTRAINT FK_282D920BAFF1D52B FOREIGN KEY (atom_groupe_id) REFERENCES element_groupe (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_41405E39530A8000 ON element (atom_category_id)');
        $this->addSql('CREATE INDEX IDX_41405E39AFF1D52B ON element (atom_groupe_id)');
    }
}
