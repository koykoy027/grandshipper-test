# Laravel running in Docker Container
test commit
## Introduction
Hi, This sample repository shows API Service, displaying data retrieved from the API and Centralized Auth Service running in a Docker container and has a set of Actions-runner

---

## Prerequisites
- Make sure you have Docker installed on your machine

## How to run this Laravel app

### Step 1: Clone repository
- Clone this repository first

### Step 2: Build and run your container
- Go to root folder and build your app by running this command
    ```bash
    docker compose up --force-recreate -d --build
    ```

### Step 3: Install dependencies
- Install dependencies by running composer inside of a container
    ```bash
    docker compose exec app composer install
    ```
- Copy .env
    ```bash
    docker compose exec app cp .env.example .env
    ```
- Generate key for APP_KEY
    ```bash
    docker compose exec app php artisan key:generate
    ```
### Step 4: Give permission
- Give 775 permission in laravel application
    ```bash
    docker compose exec app chmod -R 777 .
    ```
- Check your application if it is in local `http://localhost` and if it is in prod `http://ip_address`

### Optional
- To run exec in bash
```
docker exec -it <container_name> bash
```

## Application used
- We used Laravel Framework (MVC) to make api and generate token that can be used for user authentication
   - Here we display user datas. File location for Controller`app/Http/Controllers/User/UserController`
   - We use JsonResources to transform models into JSON responses in a structured and consistent way. `app/Http/Resources/UserResource.php`
- Also for Frontend we used axios to display data retrieved from the API that you can see in `resources/views/welcome.blade.php`
- We use JQuery and cdn axios for this example

## Containerization
- First we'll make `Dockerfile` to define the image that docker will build
- Second we'll make `docker-compose.yml` to manage multi-container. We use NGINX for web server
- Third is we'll make configuration for the server that have port 8000, `docker-compose/nginx/default.conf`

## CI/CD
- Go in GitHub Actions tab and setup your workflows and setup the self-hosted in runners section
- Make a jobs to setup your entire application and deploy in aws ec2

## GitHub Actions installation in Ubuntu
- In GitHub repository settings, go to `Actions runners` section and create self hosted and choose Linux, Create your ec2 instance and follow the installation step form github actions.
- Test commit in your main branch and check if it is success
