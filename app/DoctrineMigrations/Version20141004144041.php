<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141004144041 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE Auteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auteur_livre (auteur_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_A6DFA5E060BB6FE6 (auteur_id), INDEX IDX_A6DFA5E037D925CB (livre_id), PRIMARY KEY(auteur_id, livre_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auteur_livre ADD CONSTRAINT FK_A6DFA5E060BB6FE6 FOREIGN KEY (auteur_id) REFERENCES Auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE auteur_livre ADD CONSTRAINT FK_A6DFA5E037D925CB FOREIGN KEY (livre_id) REFERENCES Livre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE auteur_livre DROP FOREIGN KEY FK_A6DFA5E060BB6FE6');
        $this->addSql('DROP TABLE Auteur');
        $this->addSql('DROP TABLE auteur_livre');
    }
}
