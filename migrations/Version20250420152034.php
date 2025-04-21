<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250420152034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE guest_list (id SERIAL NOT NULL, event_table_id INT DEFAULT NULL, is_present BOOLEAN DEFAULT NULL, full_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6072A545AA13C18C ON guest_list (event_table_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE tables (id SERIAL NOT NULL, table_number INT NOT NULL, description VARCHAR(255) NOT NULL, max_guests INT NOT NULL, guests_count INT DEFAULT NULL, present_guests INT DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE guest_list ADD CONSTRAINT FK_6072A545AA13C18C FOREIGN KEY (event_table_id) REFERENCES tables (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE guest_list DROP CONSTRAINT FK_6072A545AA13C18C
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE guest_list
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE tables
        SQL);
    }
}
