<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250117150345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'creating User module which contains [users, persons] tables';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE persons (id INT UNSIGNED AUTO_INCREMENT NOT NULL, gender SMALLINT UNSIGNED NOT NULL, phone VARCHAR(20) DEFAULT NULL, date_of_birth DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', country_code VARCHAR(2) DEFAULT NULL, profile_image VARCHAR(100) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_by INT UNSIGNED DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_by INT UNSIGNED DEFAULT NULL, INDEX phone (phone), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT UNSIGNED AUTO_INCREMENT NOT NULL, person_id INT UNSIGNED DEFAULT NULL, type SMALLINT UNSIGNED NOT NULL, email VARCHAR(100) NOT NULL, username VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, password_status SMALLINT UNSIGNED NOT NULL, active_status SMALLINT UNSIGNED NOT NULL, password_last_changed INT UNSIGNED DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_by INT UNSIGNED NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_by INT UNSIGNED DEFAULT NULL, login_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_logged TINYINT(1) NOT NULL, online TINYINT(1) NOT NULL, registration_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_1483A5E9217BBB47 (person_id), INDEX type (type), INDEX email (email), INDEX username (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9217BBB47');
        $this->addSql('DROP TABLE persons');
        $this->addSql('DROP TABLE users');
    }
}
