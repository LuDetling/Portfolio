<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241025091938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE contact_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE formule_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE contact (id INT NOT NULL, formule_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, message TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4C62E6382A68F4D1 ON contact (formule_id)');
        $this->addSql('CREATE TABLE formule (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6382A68F4D1 FOREIGN KEY (formule_id) REFERENCES formule (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE contact_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE formule_id_seq CASCADE');
        $this->addSql('ALTER TABLE contact DROP CONSTRAINT FK_4C62E6382A68F4D1');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE formule');
    }
}
