<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230325232026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Places, Persons and Categories';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE person_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE place_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, name VARCHAR(255) NOT NULL, creation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE person (id INT NOT NULL, name VARCHAR(255) NOT NULL, creation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE place (id INT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, creation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, type INT DEFAULT NULL, placedisc VARCHAR(255) NOT NULL, polygon TEXT DEFAULT NULL, source_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_741D53CD727ACA70 ON place (parent_id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD727ACA70 FOREIGN KEY (parent_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tag ADD person_id INT NOT NULL');
        $this->addSql('ALTER TABLE tag ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B783217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B78312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_389B783217BBB47 ON tag (person_id)');
        $this->addSql('CREATE INDEX IDX_389B78312469DE2 ON tag (category_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tag DROP CONSTRAINT FK_389B78312469DE2');
        $this->addSql('ALTER TABLE tag DROP CONSTRAINT FK_389B783217BBB47');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE person_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE place_id_seq CASCADE');
        $this->addSql('ALTER TABLE place DROP CONSTRAINT FK_741D53CD727ACA70');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP INDEX IDX_389B783217BBB47');
        $this->addSql('DROP INDEX IDX_389B78312469DE2');
        $this->addSql('ALTER TABLE tag DROP person_id');
        $this->addSql('ALTER TABLE tag DROP category_id');
    }
}
