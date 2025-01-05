<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250105195135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Classification table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE classification (id INT NOT NULL, name VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE classification');
    }
}
