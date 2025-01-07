<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250107190126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Previews for Media Collections';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE media_collection ADD preview_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media_collection ADD CONSTRAINT FK_F668ABA6CDE46FDB FOREIGN KEY (preview_id) REFERENCES media_object (id)');
        $this->addSql('CREATE INDEX IDX_F668ABA6CDE46FDB ON media_collection (preview_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE media_collection DROP FOREIGN KEY FK_F668ABA6CDE46FDB');
        $this->addSql('DROP INDEX IDX_F668ABA6CDE46FDB ON media_collection');
        $this->addSql('ALTER TABLE media_collection DROP preview_id');
    }
}
