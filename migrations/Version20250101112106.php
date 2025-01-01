<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250101112106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Mediacollections (gallery, smartgallery)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE media_collection (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, name VARCHAR(60) NOT NULL, description LONGTEXT DEFAULT NULL, views INT NOT NULL, sorting INT NOT NULL, creationdate DATETIME NOT NULL, type VARCHAR(255) NOT NULL, query LONGTEXT DEFAULT NULL, mindate DATETIME DEFAULT NULL, maxdate DATETIME DEFAULT NULL, INDEX IDX_F668ABA67E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_collection_user (media_collection_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B1998EC3B52E685C (media_collection_id), INDEX IDX_B1998EC3A76ED395 (user_id), PRIMARY KEY(media_collection_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE media_collection ADD CONSTRAINT FK_F668ABA67E3C61F9 FOREIGN KEY (owner_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE media_collection_user ADD CONSTRAINT FK_B1998EC3B52E685C FOREIGN KEY (media_collection_id) REFERENCES media_collection (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_collection_user ADD CONSTRAINT FK_B1998EC3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE media_collection DROP FOREIGN KEY FK_F668ABA67E3C61F9');
        $this->addSql('ALTER TABLE media_collection_user DROP FOREIGN KEY FK_B1998EC3B52E685C');
        $this->addSql('ALTER TABLE media_collection_user DROP FOREIGN KEY FK_B1998EC3A76ED395');
        $this->addSql('DROP TABLE media_collection');
        $this->addSql('DROP TABLE media_collection_user');
    }
}
