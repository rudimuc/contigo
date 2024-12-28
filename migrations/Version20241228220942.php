<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241228220942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Reference a person from a tag';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE tag ADD person_id INT NOT NULL');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B783217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('CREATE INDEX IDX_389B783217BBB47 ON tag (person_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B783217BBB47');
        $this->addSql('DROP INDEX IDX_389B783217BBB47 ON tag');
        $this->addSql('ALTER TABLE tag DROP person_id');
    }
}
