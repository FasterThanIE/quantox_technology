CREATE TABLE grades (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_3AE36110A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
CREATE TABLE csm (id INT NOT NULL, grade INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
CREATE TABLE csmb (id INT NOT NULL, grade INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
ALTER TABLE grades ADD CONSTRAINT FK_3AE36110A76ED395 FOREIGN KEY (user_id) REFERENCES users (id);
ALTER TABLE csm ADD CONSTRAINT FK_82C19BBBBF396750 FOREIGN KEY (id) REFERENCES grades (id) ON DELETE CASCADE;
ALTER TABLE csmb ADD CONSTRAINT FK_2D8F4466BF396750 FOREIGN KEY (id) REFERENCES grades (id) ON DELETE CASCADE;
