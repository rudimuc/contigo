<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241228221548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Reference category in tag';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE tag ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B78312469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_389B78312469DE2 ON tag (category_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B78312469DE2');
        $this->addSql('DROP INDEX IDX_389B78312469DE2 ON tag');
        $this->addSql('ALTER TABLE tag DROP category_id');
    }
}
