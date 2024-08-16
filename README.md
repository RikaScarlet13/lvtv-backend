# LVTV: Live Streaming Platform for Students

## Project Overview

LVTV is a live streaming platform designed to enhance the educational experience for students by providing real-time interaction, accessibility, and a dynamic learning environment. This platform is tailored specifically for the needs of students and educators, enabling interactive Q&A sessions, live polls, collaborative tools, and the integration of multimedia resources.

## Features

- **Real-Time Interaction:** Engage with educators and peers through live Q&A sessions.
- **Live Polls:** Participate in polls during live sessions to enhance understanding and engagement.
- **Collaborative Tools:** Work together with classmates on projects and discussions within the platform.
- **Multimedia Integration:** Access a variety of multimedia resources to support and enrich learning.

## Installation

### Prerequisites

- **Node.js**: Ensure Node.js is installed.
- **Composer**: Ensure Composer is installed for managing PHP dependencies.
- **MySQL**: Ensure MySQL is installed and running.
- **Owncast**: Deployed via DigitalOcean Marketplace.

### Steps

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/lvtv-platform.git
    ```
2. Navigate to the project directory:
    ```bash
    cd lvtv-platform
    ```
3. Install Node.js dependencies:
    ```bash
    npm install
    ```
4. Install PHP dependencies using Composer:
    ```bash
    composer install
    ```
5. Set up the MySQL database:
    - Create a new database in MySQL.
    - Update the `.env` file with your MySQL database credentials.

6. Run migrations to set up the database schema:
    ```bash
    php artisan migrate
    ```

7. Deploy Owncast from the DigitalOcean Marketplace:
    - Visit the [DigitalOcean Marketplace](https://marketplace.digitalocean.com/apps/owncast) and deploy Owncast.
    - Configure Owncast to integrate with your Laravel application for access control.

8. Start the development server:
    ```bash
    npm start
    ```

## Usage

1. **Sign Up / Login:** Create an account or log in to start using the platform.
2. **Browse Sessions:** Explore available live streaming sessions or recorded sessions.
3. **Join a Session:** Participate in live sessions, ask questions, and engage in discussions.
4. **Collaborate:** Use the built-in tools to work on group projects or discussions.

## Development

### Tech Stack

- **Frontend:** React, Bootstrap
- **Backend:** Node.js, Express, Laravel
- **Database:** MySQL
- **Streaming:** Owncast deployed via DigitalOcean Marketplace, integrated with Laravel for access control
- **Hosting:** DigitalOcean
- **Domain Management:** GoDaddy
- **Dependency Management:** Composer for PHP dependencies

### Running Tests

To run tests, use the following command:
```bash
npm test


Contributing
Contributions are welcome! Please follow these steps:

Fork the repository.
Create a new branch: git checkout -b feature-name
Make your changes and commit them: git commit -m 'Add some feature'
Push to the branch: git push origin feature-name
Submit a pull request.
License
This project is licensed under the MIT License. See the LICENSE file for details.

Contact
For any inquiries or feedback, please contact:

Project Manager / Developer: Your Name
Email: your.email@example.com
