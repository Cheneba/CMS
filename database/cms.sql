-- Create database
CREATE DATABASE cms;
USE cms;

-- Create the users table
CREATE TABLE `cms`.`users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Create the posts table
CREATE TABLE `cms`.`posts` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `author_id` INT(11) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Add foreign key for author_id
ALTER TABLE `cms`.`posts`
ADD FOREIGN KEY (`author_id`) REFERENCES `cms`.`users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- Populate users table with password = "password"
INSERT INTO `cms`.`users` (name, email, password) VALUES
('John Doe', 'john.doe@example.com', '$2y$10$vvehnEpg9rr2NLAwd4nr3ulgDVfjOBSfPMfLR4Znp4Xlxe//Q4oym'),
('Jane Smith', 'jane.smith@example.com', '$2y$10$vvehnEpg9rr2NLAwd4nr3ulgDVfjOBSfPMfLR4Znp4Xlxe//Q4oym'),
('Alice Johnson', 'alice.johnson@example.com', '$2y$10$vvehnEpg9rr2NLAwd4nr3ulgDVfjOBSfPMfLR4Znp4Xlxe//Q4oym'),
('Bob Brown', 'bob.brown@example.com', '$2y$10$vvehnEpg9rr2NLAwd4nr3ulgDVfjOBSfPMfLR4Znp4Xlxe//Q4oym'),
('Charlie White', 'charlie.white@example.com', '$2y$10$vvehnEpg9rr2NLAwd4nr3ulgDVfjOBSfPMfLR4Znp4Xlxe//Q4oym'),
('David Wilson', 'david.wilson@example.com', '$2y$10$vvehnEpg9rr2NLAwd4nr3ulgDVfjOBSfPMfLR4Znp4Xlxe//Q4oym'),
('Emma Thompson', 'emma.thompson@example.com', '$2y$10$vvehnEpg9rr2NLAwd4nr3ulgDVfjOBSfPMfLR4Znp4Xlxe//Q4oym');

-- Populate posts table
INSERT INTO `cms`.`posts` (title, image, description, content, author_id) VALUES
('First Post by John', 'image1.jpg', 'Description for first post by John.', 'Content for first post by John.', 1),
('Second Post by John', 'image2.jpg', 'Description for second post by John.', 'Content for second post by John.', 1),
('Third Post by John', 'image3.jpg', 'Description for third post by John.', 'Content for third post by John.', 1),
('Fourth Post by John', 'image4.jpg', 'Description for fourth post by John.', 'Content for fourth post by John.', 1),
('First Post by Jane', 'image5.jpg', 'Description for first post by Jane.', 'Content for first post by Jane.', 2),
('Second Post by Jane', 'image6.jpg', 'Description for second post by Jane.', 'Content for second post by Jane.', 2),
('Third Post by Jane', 'image7.jpg', 'Description for third post by Jane.', 'Content for third post by Jane.', 2),
('Fourth Post by Jane', 'image8.jpg', 'Description for fourth post by Jane.', 'Content for fourth post by Jane.', 2),
('First Post by Alice', 'image9.jpg', 'Description for first post by Alice.', 'Content for first post by Alice.', 3),
('Second Post by Alice', 'image10.jpg', 'Description for second post by Alice.', 'Content for second post by Alice.', 3),
('Third Post by Alice', 'image11.jpg', 'Description for third post by Alice.', 'Content for third post by Alice.', 3),
('Fourth Post by Alice', 'image12.jpg', 'Description for fourth post by Alice.', 'Content for fourth post by Alice.', 3),
('First Post by Bob', 'image13.jpg', 'Description for first post by Bob.', 'Content for first post by Bob.', 4),
('Second Post by Bob', 'image14.jpg', 'Description for second post by Bob.', 'Content for second post by Bob.', 4),
('Third Post by Bob', 'image15.jpg', 'Description for third post by Bob.', 'Content for third post by Bob.', 4),
('Fourth Post by Bob', 'image16.jpg', 'Description for fourth post by Bob.', 'Content for fourth post by Bob.', 4),
('First Post by Charlie', 'image17.jpg', 'Description for first post by Charlie.', 'Content for first post by Charlie.', 5),
('Second Post by Charlie', 'image18.jpg', 'Description for second post by Charlie.', 'Content for second post by Charlie.', 5),
('Third Post by Charlie', 'image19.jpg', 'Description for third post by Charlie.', 'Content for third post by Charlie.', 5),
('Fourth Post by Charlie', 'image20.jpg', 'Description for fourth post by Charlie.', 'Content for fourth post by Charlie.', 5),
('First Post by David', 'image21.jpg', 'Description for first post by David.', 'Content for first post by David.', 6),
('Second Post by David', 'image22.jpg', 'Description for second post by David.', 'Content for second post by David.', 6),
('Third Post by David', 'image23.jpg', 'Description for third post by David.', 'Content for third post by David.', 6),
('Fourth Post by David', 'image24.jpg', 'Description for fourth post by David.', 'Content for fourth post by David.', 6),
('First Post by Emma', 'image25.jpg', 'Description for first post by Emma.', 'Content for first post by Emma.', 7),
('Second Post by Emma', 'image26.jpg', 'Description for second post by Emma.', 'Content for second post by Emma.', 7),
('Third Post by Emma', 'image27.jpg', 'Description for third post by Emma.', 'Content for third post by Emma.', 7),
('Fourth Post by Emma', 'image28.jpg', 'Description for fourth post by Emma.', 'Content for fourth post by Emma.', 7);