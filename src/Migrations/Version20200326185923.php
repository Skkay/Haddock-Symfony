<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200326185923 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE album (id INT AUTO_INCREMENT NOT NULL, album_ref VARCHAR(5) NOT NULL, album_titre VARCHAR(100) NOT NULL, album_parution INT NOT NULL, album_tome INT NOT NULL, album_image VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bande (id INT AUTO_INCREMENT NOT NULL, bande_place VARCHAR(1) NOT NULL, num_page INT NOT NULL, ref_album VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE case_bulle (id INT AUTO_INCREMENT NOT NULL, case_num INT NOT NULL, place_bande VARCHAR(1) NOT NULL, num_page INT NOT NULL, ref_album VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jurons (id INT AUTO_INCREMENT NOT NULL, jurons_num INT NOT NULL, jurons_texte VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, page_num INT NOT NULL, ref_album VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE se_trouver_bulle (id INT AUTO_INCREMENT NOT NULL, num_case INT NOT NULL, num_page INT NOT NULL, place_bande VARCHAR(1) NOT NULL, ref_album VARCHAR(5) NOT NULL, jurons_num INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE bande');
        $this->addSql('DROP TABLE case_bulle');
        $this->addSql('DROP TABLE jurons');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE se_trouver_bulle');
    }
}
