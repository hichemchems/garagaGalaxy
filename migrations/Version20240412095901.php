<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240412095901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD email VARCHAR(180) NOT NULL, ADD roles JSON NOT NULL, DROP name, DROP firstname, DROP mail, DROP phone');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)');
        $this->addSql('ALTER TABLE voitures ADD modele VARCHAR(255) NOT NULL, ADD annee VARCHAR(255) NOT NULL, DROP model, DROP année');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON user');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL, ADD firstname VARCHAR(255) NOT NULL, ADD mail VARCHAR(255) NOT NULL, ADD phone INT NOT NULL, DROP email, DROP roles');
        $this->addSql('ALTER TABLE voitures ADD model VARCHAR(255) NOT NULL, ADD année VARCHAR(255) NOT NULL, DROP modele, DROP annee');
    }
}
