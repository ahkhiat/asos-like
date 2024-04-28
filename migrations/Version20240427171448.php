<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240427171448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_variation ADD product_item_id INT DEFAULT NULL, ADD size_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_variation ADD CONSTRAINT FK_C3B8567C3B649EE FOREIGN KEY (product_item_id) REFERENCES product_item (id)');
        $this->addSql('ALTER TABLE product_variation ADD CONSTRAINT FK_C3B8567498DA827 FOREIGN KEY (size_id) REFERENCES size_option (id)');
        $this->addSql('CREATE INDEX IDX_C3B8567C3B649EE ON product_variation (product_item_id)');
        $this->addSql('CREATE INDEX IDX_C3B8567498DA827 ON product_variation (size_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_variation DROP FOREIGN KEY FK_C3B8567C3B649EE');
        $this->addSql('ALTER TABLE product_variation DROP FOREIGN KEY FK_C3B8567498DA827');
        $this->addSql('DROP INDEX IDX_C3B8567C3B649EE ON product_variation');
        $this->addSql('DROP INDEX IDX_C3B8567498DA827 ON product_variation');
        $this->addSql('ALTER TABLE product_variation DROP product_item_id, DROP size_id');
    }
}
