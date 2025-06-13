<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250613125331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE contact ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD phone LONGTEXT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE contact ADD CONSTRAINT FK_4C62E6382A68F4D1 FOREIGN KEY (formule_id) REFERENCES formule (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tags_project ADD CONSTRAINT FK_90F3BFF8D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tags_project ADD CONSTRAINT FK_90F3BFF166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6382A68F4D1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE contact DROP firstname, DROP lastname, DROP phone
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tags_project DROP FOREIGN KEY FK_90F3BFF8D7B4FB4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tags_project DROP FOREIGN KEY FK_90F3BFF166D1F9C
        SQL);
    }
}
