<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141004023301 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE Categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_CB8C54976C6E55B5 (nom), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Livre ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Livre ADD CONSTRAINT FK_6DA2609DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES Livre (id)');
        $this->addSql('CREATE INDEX IDX_6DA2609DBCF5E72D ON Livre (categorie_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP TABLE Categorie');
        $this->addSql('ALTER TABLE Livre DROP FOREIGN KEY FK_6DA2609DBCF5E72D');
        $this->addSql('DROP INDEX IDX_6DA2609DBCF5E72D ON Livre');
        $this->addSql('ALTER TABLE Livre DROP categorie_id');
    }
}
