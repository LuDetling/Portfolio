<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241015101159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE tags_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tags (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tags_project (tags_id INT NOT NULL, project_id INT NOT NULL, PRIMARY KEY(tags_id, project_id))');
        $this->addSql('CREATE INDEX IDX_90F3BFF8D7B4FB4 ON tags_project (tags_id)');
        $this->addSql('CREATE INDEX IDX_90F3BFF166D1F9C ON tags_project (project_id)');
        $this->addSql('ALTER TABLE tags_project ADD CONSTRAINT FK_90F3BFF8D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tags_project ADD CONSTRAINT FK_90F3BFF166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE tags_id_seq CASCADE');
        $this->addSql('ALTER TABLE tags_project DROP CONSTRAINT FK_90F3BFF8D7B4FB4');
        $this->addSql('ALTER TABLE tags_project DROP CONSTRAINT FK_90F3BFF166D1F9C');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE tags_project');
    }
}
