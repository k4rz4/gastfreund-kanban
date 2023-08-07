---

# Microservices-Based Task Management System

System is designed around the microservices architecture, providing scalability, maintainability, and clear separation of concerns. With incorporation of the benefits of both HTTP-based communication and RabbitMQ for asynchronous event handling, coupled with WebSockets for real-time client updates.

## Table of Contents
1. System Overview
2. Services Description
3. Diagram
4. Communication Mechanisms
5. Setting Up the Development Environment
6. Testing
7. Future Enhancements

## 1. System Overview

This task management system is composed of several distinct microservices:

- **User Service**: Manages user data, authentication, and profile-related functionalities.
- **Board Service**: Maintains boards and their metadata.
- **Lane Service**: Handles lanes, essentially columns or categories for tickets.
- **Ticket Service**: Focuses on individual task tickets, their statuses, assignments, and descriptions.

## 2. Services Description

- **User Service**:
  - Endpoints: CRUD operations for users.
  - Database: Stores user profiles, hashed passwords, etc.
  
- **Board Service**:
  - Endpoints: CRUD for boards.
  - Database: Contains board names, associated user IDs.
  
- **Lane Service**:
  - Endpoints: CRUD for lanes.
  - Database: Holds lane titles, associated board IDs.
  
- **Ticket Service**:
  - Endpoints: CRUD for tickets.
  - Database: Maintains ticket details, assigned users, status, priority, and the lane they're placed in.

## 3. Diagram

![alt text](https://raw.githubusercontent.com/k4rz4/gastfreund-kanban/master/diagram.png)

## 4. Communication Mechanisms

- **HTTP for Direct Communication**: Standard synchronous communication for immediate feedback.
- **RabbitMQ for Asynchronous Events**: Utilized for actions across services, e.g., a change in one service that might influence another.
- **WebSockets at API Gateway**: Offers real-time updates to the frontend from the system [TODO].

## 5. Setting Up the Development Environment

```
docker-compose up -d
```

## 6. Testing

- Unit tests for each service.

## 7. Future Enhancements

- **Service Mesh Implementation**:  Using tools like Istio for better inter-service communication, security, and monitoring.
- **Advanced Monitoring and Logging**: Incorporate tools like Prometheus and Grafana for detailed system metrics and ELK stack for logging.
- **CI/CD Enhancements**: Expand the CI/CD pipeline to include more automated tests, blue-green deployments, etc.
- **Integration testing**: Integration testing for the system as a whole
- **Load testing**: Especially for WebSockets.
- **WebSockets at API Gateway**: For real-time updates to the frontend


