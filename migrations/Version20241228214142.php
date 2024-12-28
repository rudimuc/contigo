<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241228214142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Extend the user entity with additional fields (firstname, lastname, email, mobilenumber)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE user ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD email VARCHAR(100) NOT NULL, ADD mobilenumber VARCHAR(30) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE `user` DROP firstname, DROP lastname, DROP email, DROP mobilenumber');
    }
}
