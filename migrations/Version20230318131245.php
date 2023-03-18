<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230318131245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the basic tables';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE media_collection_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE notification_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE media_collection (id INT NOT NULL, owner_id INT NOT NULL, name VARCHAR(100) NOT NULL, description TEXT DEFAULT NULL, views INT NOT NULL, sorting INT NOT NULL, classification INT NOT NULL, discr VARCHAR(255) NOT NULL, minimum_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, maximum_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, query TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F668ABA67E3C61F9 ON media_collection (owner_id)');
        $this->addSql('CREATE TABLE media_collection_user (media_collection_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(media_collection_id, user_id))');
        $this->addSql('CREATE INDEX IDX_B1998EC3B52E685C ON media_collection_user (media_collection_id)');
        $this->addSql('CREATE INDEX IDX_B1998EC3A76ED395 ON media_collection_user (user_id)');
        $this->addSql('CREATE TABLE notification (id INT NOT NULL, text VARCHAR(500) NOT NULL, daystamp TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, link VARCHAR(100) DEFAULT NULL, icon VARCHAR(32) NOT NULL, icontype VARCHAR(32) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE setting (settingname VARCHAR(100) NOT NULL, settingvalue VARCHAR(100) NOT NULL, description VARCHAR(100) NOT NULL, PRIMARY KEY(settingname))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, roles JSON DEFAULT NULL, username VARCHAR(20) NOT NULL, password VARCHAR(100) NOT NULL, firstname VARCHAR(50) DEFAULT NULL, lastname VARCHAR(50) DEFAULT NULL, email VARCHAR(80) DEFAULT NULL, mobilenumber VARCHAR(32) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE media_collection ADD CONSTRAINT FK_F668ABA67E3C61F9 FOREIGN KEY (owner_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media_collection_user ADD CONSTRAINT FK_B1998EC3B52E685C FOREIGN KEY (media_collection_id) REFERENCES media_collection (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE media_collection_user ADD CONSTRAINT FK_B1998EC3A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE media_collection_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE notification_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('ALTER TABLE media_collection DROP CONSTRAINT FK_F668ABA67E3C61F9');
        $this->addSql('ALTER TABLE media_collection_user DROP CONSTRAINT FK_B1998EC3B52E685C');
        $this->addSql('ALTER TABLE media_collection_user DROP CONSTRAINT FK_B1998EC3A76ED395');
        $this->addSql('DROP TABLE media_collection');
        $this->addSql('DROP TABLE media_collection_user');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE setting');
        $this->addSql('DROP TABLE "user"');
    }
}
