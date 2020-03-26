<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200326190235 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE album MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE album DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE album DROP id');
        $this->addSql('ALTER TABLE album ADD PRIMARY KEY (album_ref)');
        $this->addSql('ALTER TABLE bande MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE bande DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE bande DROP id');
        $this->addSql('ALTER TABLE bande ADD PRIMARY KEY (bande_place, num_page, ref_album)');
        $this->addSql('ALTER TABLE case_bulle MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE case_bulle DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE case_bulle DROP id');
        $this->addSql('ALTER TABLE case_bulle ADD PRIMARY KEY (case_num, place_bande, num_page, ref_album)');
        $this->addSql('ALTER TABLE jurons MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE jurons DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE jurons DROP id');
        $this->addSql('ALTER TABLE jurons ADD PRIMARY KEY (jurons_num)');
        $this->addSql('ALTER TABLE page MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE page DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE page DROP id');
        $this->addSql('ALTER TABLE page ADD PRIMARY KEY (page_num, ref_album)');
        $this->addSql('ALTER TABLE se_trouver_bulle MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE se_trouver_bulle DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE se_trouver_bulle DROP id');
        $this->addSql('ALTER TABLE se_trouver_bulle ADD PRIMARY KEY (num_case, num_page, place_bande, ref_album, jurons_num)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE album ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE bande ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE case_bulle ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE jurons ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE page ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE se_trouver_bulle ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
