<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240614064333 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event_booking (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, phone_no VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, function_name VARCHAR(255) DEFAULT NULL, function_location VARCHAR(255) DEFAULT NULL, amount VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_booking_list (id INT AUTO_INCREMENT NOT NULL, evenet_bookin_id INT DEFAULT NULL, events VARCHAR(255) DEFAULT NULL, count VARCHAR(255) DEFAULT NULL, INDEX IDX_B14AD0A573339412 (evenet_bookin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_booking_list ADD CONSTRAINT FK_B14AD0A573339412 FOREIGN KEY (evenet_bookin_id) REFERENCES event_booking (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_booking_list DROP FOREIGN KEY FK_B14AD0A573339412');
        $this->addSql('DROP TABLE event_booking');
        $this->addSql('DROP TABLE event_booking_list');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
