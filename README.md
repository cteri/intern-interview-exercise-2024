# intern-interview-exercise-2024

## **Technologies Used**
### Repo
1. **PHP**
    - Version: ^8.1
    - A general-purpose scripting language that is especially suited to web development.
2. **Laravel Framework**
    - Version: ^10.10
    - A PHP framework for web application development.
3. **Vue.js**
    - Version: ^3.4.21
    - A JavaScript framework used for building user interfaces applications.
7. **Bootstrap**
    - Version: ^5.3.3
    - An open-source CSS framework directed at responsive, mobile-first front-end web development.
8. **Chart.js**
    - Version: ^4.4.2
    - A simple yet flexible JavaScript charting library that provides declarative and responsive charts.

### Server
- **Docker Compose**: Version 3.7
- **Application Container** (`app`):
    - Image: Custom built using `Dockerfile`.
    - Container Name: `demo-app`
    - Working Directory: `/var/www/`
- **Database (MySQL)**
    - Version: 8.0
    - Container Name: `demo-db`
- **Web Server (Nginx)**
    - Image: `nginx:alpine`
    - Container Name: `demo-nginx`
    - Ports: Maps port 8080 on the host to port 80 in the container.
    - Configuration: Custom Nginx configuration from `./docker-compose/nginx`.
- **Cache (Redis)**
    - Image: `redis:alpine`
    - Container Name: `demo-redis`
    
## **Project structure**
1. **Migrations**
    - Used to define the database schema by creating and modifying tables.
    - Located in [database/migrations/](https://github.com/cteri/intern-interview-exercise-2024/tree/main/database/migrations).
2. **Models**
    - Represent the application's data and handle database interaction.
    - Found in [app/Models/](https://github.com/cteri/intern-interview-exercise-2024/tree/main/app/Models).
3. **Seeders**
    - Generate fake data for the database, useful for testing and development.
    - Stored in [database/seeders/](https://github.com/cteri/intern-interview-exercise-2024/tree/main/database/seeders).
4. **Vue.js, JavaScript**
    - Utilized for the front-end to create dynamic and interactive user interfaces.
    - Located in [resources/js/](https://github.com/cteri/intern-interview-exercise-2024/tree/main/resources/js) .
5. **Routes**
    - Define the URLs for application and map them to controller actions.
    - Defined in [routes/web.php](https://github.com/cteri/intern-interview-exercise-2024/blob/main/routes/web.php)
6. **Controllers**
    - Serve as the initial point of contact for incoming requests routed through Laravel's routing layer.
    - Located in [app/Http/Controllers/](https://github.com/cteri/intern-interview-exercise-2024/tree/main/app/Http/Controllers).
7. **Requests**
    - Handle request data validation, ensuring data integrity and security.
    - Defined in [app/Http/Requests/](https://github.com/cteri/intern-interview-exercise-2024/tree/main/app/Http/Requests).
8. **Services**
    - Responsible for the core logic of the application, with Redis cache implemented to prevent duplicate requests.
    - Defined in [app/Http/Services/](https://github.com/cteri/intern-interview-exercise-2024/tree/main/app/Http/Services).

## **Deployment Guide**
1. **Add SSH Key to GitHub:**
    - Navigate to GitHub settings and add server's SSH key for secure access to repositories.
2. **Clone Repository:**
    - Use the command `git clone git@github.com:cteri/intern-interview-exercise-2024.git` to clone the repository to cloud server.
3. **Prepare the Environment:**
    - Run `sudo apt update` to update package list.
    - Copy the environment variables template with `cp .env.example .env`.
4. **Edit Configuration Files:**
    - Modify the `Dockerfile` as needed using `vi Dockerfile`.
    - Create necessary directories for Docker Compose with the commands:
        - `mkdir -p docker-compose/nginx`
        - `mkdir -p docker-compose/mysql`
    - Configure Nginx by editing `docker-compose/nginx/demo.conf`.
    - Update the `docker-compose.yml` file using `mv docker-compose-prod.yml docker-compose.yml`.
5. **Build and Run the Application:**
    - Build the Docker container for the app using `docker-compose build app`.
    - Launch the containers in detached mode with `docker-compose up -d`.
6. **Application Setup:**
    - Update and install Composer dependencies inside the `app` container:
        - `docker-compose exec app composer update`
        - `docker-compose exec app composer install`
    - Generate an application key with `docker-compose exec app php artisan key:generate`.
7. **Database Setup:**
    - Run migrations with `docker-compose exec app php artisan migrate`.
    - Seed the database using `docker-compose exec app php artisan db:seed`.
8. **Frontend Setup:**
    - Install NPM dependencies and compile assets with `docker-compose exec app npm install && npm run production`.
9. Reference: [How To Install and Set Up Laravel with Docker Compose on Ubuntu 22.04](https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-22-04).
