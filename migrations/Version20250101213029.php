<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250101213029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Mediaobjects';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE media_object (id INT AUTO_INCREMENT NOT NULL, collection_id INT NOT NULL, storagename VARCHAR(40) NOT NULL, originalfilename VARCHAR(255) NOT NULL, mimetype VARCHAR(50) DEFAULT NULL, uploaddate DATETIME NOT NULL, rating DOUBLE PRECISION DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_14D43132514956FD (collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_object_image (id INT NOT NULL, iso INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_object_video (id INT NOT NULL, duration INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE media_object ADD CONSTRAINT FK_14D43132514956FD FOREIGN KEY (collection_id) REFERENCES media_collection (id)');
        $this->addSql('ALTER TABLE media_object_image ADD CONSTRAINT FK_28EFFA31BF396750 FOREIGN KEY (id) REFERENCES media_object (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_object_video ADD CONSTRAINT FK_91152442BF396750 FOREIGN KEY (id) REFERENCES media_object (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE media_object DROP FOREIGN KEY FK_14D43132514956FD');
        $this->addSql('ALTER TABLE media_object_image DROP FOREIGN KEY FK_28EFFA31BF396750');
        $this->addSql('ALTER TABLE media_object_video DROP FOREIGN KEY FK_91152442BF396750');
        $this->addSql('DROP TABLE media_object');
        $this->addSql('DROP TABLE media_object_image');
        $this->addSql('DROP TABLE media_object_video');
    }
}
