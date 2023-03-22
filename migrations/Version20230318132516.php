<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230318132516 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creation date for media collections';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE media_collection ADD creation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE media_collection DROP creation_date');
    }
}
