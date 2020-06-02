<?php

declare(strict_types=1);

namespace RelationalModelMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version010000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'init relational model';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE blueprint (id VARCHAR(36) NOT NULL, name VARCHAR(50) NOT NULL, create_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN blueprint.create_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN blueprint.update_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE team (id VARCHAR(36) NOT NULL, blueprint_id VARCHAR(36) DEFAULT NULL, create_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C4E0A61F40E556F5 ON team (blueprint_id)');
        $this->addSql('COMMENT ON COLUMN team.create_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN team.update_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F40E556F5 FOREIGN KEY (blueprint_id) REFERENCES blueprint (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE team DROP CONSTRAINT FK_C4E0A61F40E556F5');
        $this->addSql('DROP TABLE blueprint');
        $this->addSql('DROP TABLE team');
    }
}
