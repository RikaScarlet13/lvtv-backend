
<p align="center">
  <a href="https://github.com/RikaScarlet13/lvtv-backend" alt="LVTV">
    <img src="public/images/logo.png" alt="LVTV Logo" width="200"/>
  </a>
</p>

# LVTV: Live Streaming Platform for Bachelor of Arts in Broadcasting Program

## Project Overview

LVTV is a live-streaming platform designed for BAB students to practice their profession by providing real-time interaction, accessibility, and a learning environment. This platform is tailored specifically to the needs of students and instructors.

## Features

- **Real-Time Interaction:** Engage with instructors and other students through the live chat.
- **Multimedia Usage:** Use various multimedia resources to support learning and practice profession.
- **YouTube Integration:** Uses the YouTube API to store and stream video content.

## Installation

### Prerequisites

- **Node.js**: Ensure Node.js is installed.
- **Composer**: Ensure Composer is installed for managing PHP dependencies.
- **MySQL**: Ensure MySQL is installed and running.
- **Owncast**: Deployed via DigitalOcean Marketplace.
- **Laravel**: Used as the backend framework.

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
2. **Browse Past Streams:** Explore previous streams and sessions.
3. **Join the Stream:** Participate in live sessions, ask questions, and engage in discussions.

## Development

### Tech Stack

- **Frontend:** React, Bootstrap
- **Backend:** Node.js, Laravel
- **Database:** MySQL
- **Streaming:** Owncast deployed via DigitalOcean Marketplace
- **Video Storage and Streaming:** YouTube API
- **Hosting:** DigitalOcean
- **Domain Management:** GoDaddy
- **Dependency Management:** Composer for PHP dependencies

### Running Tests

To run tests, use the following command:
```bash
npm test
```


## Contributing
Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch: git checkout -b feature-name
3. Make your changes and commit them: git commit -m 'Add some feature'
4. Push to the branch: git push origin feature-name
5. Submit a pull request.

## License

This project is developed as part of the requirement for the Information Systems course and is intended for personal and educational use only. It is not licensed for commercial use or distribution.


## Contact
For any inquiries or feedback, please contact:

Project Manager: Erika Mae Camille Corpuz

Developers: 

-- Joshua James Mar

-- Khai Hou James Law

-- Timothy Carl Bundalian

-- Rommel Hanzel Navarro

Email: emc.13corpuz@gmail.com
