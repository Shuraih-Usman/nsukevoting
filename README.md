# NSUK eVoting System

## Project Overview
The NSUK eVoting System is an online voting platform designed for Nasarawa State University, Keffi (NSUK). It enables secure, efficient, and transparent voting processes for various student elections. The system is built using modern web technologies including PHP, Laravel, MySQL, Bootstrap, JavaScript, jQuery, and DataTables.

## Technologies Used
- **PHP**: Server-side scripting language used for backend development.
- **Laravel**: PHP framework used for building robust and scalable applications.
- **MySQL**: Relational database management system for storing election data.
- **Bootstrap**: Frontend framework for responsive and modern UI design.
- **JavaScript**: Programming language for client-side scripting.
- **jQuery**: JavaScript library for simplified DOM manipulation and event handling.
- **DataTables**: jQuery plugin for enhancing HTML tables with advanced features.

## Features
- **User Authentication**: Secure login and registration for voters and administrators.
- **Role Management**: Different user roles such as administrators, voters, and candidates.
- **Election Management**: Create, update, and delete elections, candidates, and positions.
- **Voting Process**: Secure and anonymous voting with real-time results.
- **Results Display**: Real-time display of election results using DataTables.
- **Audit Logs**: Tracking of all system activities for security and transparency.
- **Responsive Design**: Mobile-friendly interface using Bootstrap.

## Installation and Setup
1. **Clone the Repository**:
    ```sh
    git clone https://github.com/Shuraih-Usman/nsukevoting.git
    cd nsukevoting
    ```

2. **Install Dependencies**:
    ```sh
    composer install
    npm install
    ```

3. **Environment Setup**:
    - Copy the `.env.example` file to `.env` and configure your environment settings (database credentials, application URL, etc.).
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database Setup**:
    - look for database file name evoting(1).sql and create a database with  name evoting import it there, and change your details.
    ```sh
    php artisan migrate
    ```


6. **Run the Application**:
    ```sh
    php artisan serve
    ```

7. **Access the Application**:
    - Open your web browser and navigate to `http://localhost:8000`.

## Project Structure
- **app**: Contains the core application code including models, controllers, and middleware.
- **database**: Database migrations and seeders.
- **public**: Publicly accessible files including index.php, assets (CSS, JS).
- **resources**: Views, frontend assets (Sass, JS), and language files.
- **routes**: Application routes.
- **tests**: Automated tests.

## Key Components
- **User Authentication**:
  - Implemented using Laravel's built-in authentication scaffolding.
  - Custom middleware to handle role-based access control.

- **Election Management**:
  - Admin interface for managing elections, candidates, and positions.
  - CRUD operations implemented using Laravel's Eloquent ORM.

- **Voting Process**:
  - Secure voting mechanism ensuring one vote per user per election.
  - Real-time vote counting and result display.

- **DataTables Integration**:
  - Enhanced user experience for viewing election results and managing data.
  - Server-side processing for efficient handling of large datasets.

## Security Considerations
- **Encryption**: Ensuring sensitive data is encrypted.
- **Validation**: Robust input validation to prevent SQL injection and XSS attacks.
- **Authentication**: Secure user authentication and session management.
- **Authorization**: Role-based access control to protect administrative functionalities.

## Future Enhancements
- **Email Notifications**: Notify users about election events and results.
- **Mobile App**: Develop a mobile application for better accessibility.
- **Blockchain Integration**: Enhance security and transparency using blockchain technology for vote recording.

## Contribution Guidelines
- Fork the repository and create a new branch for your feature or bugfix.
- Ensure your code follows the project's coding standards.
- Write tests for any new functionality.
- Submit a pull request with a detailed description of your changes.

## Contact Information
- **Project Maintainer**: [Shuraih99]
- **Email**: shuraihusman@gmail.com
- **GitHub**: [Shuraihu Usman](https://github.com/Shuraih-Usman)

This documentation provides an overview and guidance for setting up and contributing to the NSUK eVoting System. For detailed information on specific components and code, refer to the comments and documentation within the codebase.
