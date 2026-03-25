# AnimDash

A modern PHP web application built with Docker and VS Code DevContainers.

## Features

Currently in initial development. Planned features coming soon!

## Tech Stack

- **Backend:** PHP 8.3 with Apache
- **Database:** MySQL 8.0
- **Development:** Docker, Docker Compose, VS Code DevContainers
- **Extensions:** Intelephense, Database Client, Thunder Client, Prettier

## Prerequisites

Before you begin, ensure you have the following installed:

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) (includes Docker Compose)
- [Visual Studio Code](https://code.visualstudio.com/)
- [Remote - Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers) extension for VS Code

## Getting Started

### 1. Environment Setup

Clone the repository and set up your environment variables:

```bash
# Clone the repository
git clone https://github.com/mstonedev/animdash.git
cd animdash

# Copy the environment template
cp .env.example .env
```

### 2. Configure Environment Variables

Edit the `.env` file and fill in the required values:

```env
DB_ROOT_PASSWORD=your_root_password
DB_USER=your_db_user
DB_PASS=your_db_password
DB_NAME=animdash
```

### 3. Start the Development Environment

1. Open the project in Visual Studio Code
2. When prompted, click **"Reopen in Container"**
   - Or use the Command Palette (`Cmd+Shift+P` / `Ctrl+Shift+P`) and select **"Dev Containers: Reopen in Container"**
3. Wait for the containers to build and start (first time may take a few minutes)
4. Once ready, access the application at <http://localhost:8080>

## Development Environment

### Available Services

| Service | URL | Description |
|---------|-----|-------------|
| **Web Application** | <http://localhost:8080> | Main PHP application |
| **Adminer** | <http://localhost:8081> | Database management UI |
| **MySQL Database** | localhost:3306 | Direct database connection |

### Accessing the Database via Adminer

Navigate to <http://localhost:8081> and use these credentials:

- **System:** MySQL
- **Server:** `db`
- **Username:** Value from `DB_USER` in your `.env` file
- **Password:** Value from `DB_PASS` in your `.env` file
- **Database:** `animdash`

### Pre-installed VS Code Extensions

The DevContainer includes these extensions:

- **Intelephense** - PHP IntelliSense and code intelligence
- **Database Client** - Direct database access from VS Code
- **Thunder Client** - API testing tool
- **Docker** - Docker container management
- **Prettier** - Code formatting (auto-format on save enabled)

## Project Structure

```
animdash/
├── .devcontainer/          # DevContainer configuration
│   ├── devcontainer.json  # VS Code settings & extensions
│   └── Dockerfile         # PHP 8.3-Apache container
├── src/                   # Application source code
│   ├── config/           # Configuration files
│   │   └── db.php        # Database connection
│   └── index.php         # Entry point
├── docker-compose.yml    # Multi-container orchestration
├── .env.example          # Environment variables template
├── .env                  # Your local environment (gitignored)
├── .gitignore            # Git ignore rules
└── README.md             # This file
```

## Database

- **Engine:** MySQL 8.0
- **Timezone:** America/New_York
- **Persistent Storage:** Data is stored in a Docker volume named `db_data`
- **Access Methods:**
  - Adminer UI at <http://localhost:8081>
  - Database Client extension in VS Code
  - Direct connection at localhost:3306

## Development Workflow

- All application code lives in the `src/` directory
- The `src/` directory is mapped to `/var/www/html` in the Apache container
- PHP files are automatically formatted on save using Intelephense
- Use Thunder Client for API testing
- Use Database Client or Adminer for database management
- Apache `mod_rewrite` is enabled for URL rewriting

## Troubleshooting

### Container Won't Start

- Ensure Docker Desktop is running
- Check Docker Desktop for any error messages

### Port Conflicts

If you get port conflict errors, check if ports 8080, 8081, or 3306 are already in use:

```bash
# On macOS/Linux
lsof -i :8080
lsof -i :8081
lsof -i :3306

# On Windows
netstat -ano | findstr :8080
netstat -ano | findstr :8081
netstat -ano | findstr :3306
```

### Database Connection Errors

- Verify that the `.env` file exists and contains the correct credentials
- Ensure the `db` service is running in Docker
- Check Docker logs: `docker compose logs db`

### Extensions Not Loading

Rebuild the container from the Command Palette:

- Open Command Palette (`Cmd+Shift+P` / `Ctrl+Shift+P`)
- Select **"Dev Containers: Rebuild Container"**

### Changes Not Appearing

- Refresh your browser (hard refresh: `Cmd+Shift+R` / `Ctrl+Shift+F5`)
- Check file permissions in the container
- Verify the file is saved in the `src/` directory

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

License information to be determined.
