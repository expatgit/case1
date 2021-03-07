<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307005717 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_data ADD address_id INT NOT NULL');
        $this->addSql('ALTER TABLE user_data ADD CONSTRAINT FK_D772BFAAF5B7AF75 FOREIGN KEY (address_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D772BFAAF5B7AF75 ON user_data (address_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_data DROP FOREIGN KEY FK_D772BFAAF5B7AF75');
        $this->addSql('DROP INDEX UNIQ_D772BFAAF5B7AF75 ON user_data');
        $this->addSql('ALTER TABLE user_data DROP address_id');
    }
}
