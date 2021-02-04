<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204203909 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__relation AS SELECT id, id_relation, name, description FROM relation');
        $this->addSql('DROP TABLE relation');
        $this->addSql('CREATE TABLE relation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_relation INTEGER NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL, weight INTEGER NOT NULL)');
        $this->addSql('INSERT INTO relation (id, id_relation, name, description) SELECT id, id_relation, name, description FROM __temp__relation');
        $this->addSql('DROP TABLE __temp__relation');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__relation AS SELECT id, id_relation, name, description FROM relation');
        $this->addSql('DROP TABLE relation');
        $this->addSql('CREATE TABLE relation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_relation INTEGER NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL COLLATE BINARY, wight INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO relation (id, id_relation, name, description) SELECT id, id_relation, name, description FROM __temp__relation');
        $this->addSql('DROP TABLE __temp__relation');
    }
}
