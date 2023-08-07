-- User Service
CREATE DATABASE IF NOT EXISTS user_service;
CREATE USER 'user_service'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON user_service.* TO 'user_service'@'%';
FLUSH PRIVILEGES;

-- Board Service
CREATE DATABASE IF NOT EXISTS board_service;
CREATE USER 'board_service'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON board_service.* TO 'board_service'@'%';
FLUSH PRIVILEGES;

-- Lane Service
CREATE DATABASE IF NOT EXISTS lane_service;
CREATE USER 'lane_service'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON lane_service.* TO 'lane_service'@'%';
FLUSH PRIVILEGES;

-- Ticket Service
CREATE DATABASE IF NOT EXISTS ticket_service;
CREATE USER 'ticket_service'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON ticket_service.* TO 'ticket_service'@'%';
FLUSH PRIVILEGES;