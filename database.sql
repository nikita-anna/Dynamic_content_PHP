CREATE DATABASE php_dynamic_content;

USE php_dynamic_content;

-- Table for storing user data
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    profile_picture VARCHAR(255)
);

-- Table for storing tasks
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_name VARCHAR(255) NOT NULL,
    status ENUM('pending', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO users (name, email, profile_picture) VALUES
('Barack Hussein Obama', 'barack@example.com', 'barack.jpeg'),
('Rahul Gandhi', 'rahul@example.com', 'rahul.jpeg');

INSERT INTO users (name, email, profile_picture) VALUES
('Shashi Tharoor', 'tharoor@example.com', 'tharoor.jpeg'),
('Sonam Wangchuk', 'sonam@example.com', 'sonam.jpeg');

