# Pelaporan Pengaduan Masyarakat

A Laravel-based Public Complaint Management System that allows citizens to submit and track their complaints while enabling staff members to manage and respond to these complaints efficiently.

## Features

-   Multi-auth system (Admin, Staff, and Public Users)
-   Complaint submission with image attachments
-   Complaint tracking and status updates
-   Staff response management
-   User management
-   Report generation
-   Mobile-responsive interface

## Requirements

-   PHP >= 8.0
-   MySQL >= 5.7
-   Composer
-   Node.js & NPM (for asset compilation)
-   Laravel 8.x requirements

## Installation

1. Clone the repository

```bash
git clone https://github.com/yourusername/Pelaporan-Pengaduan-Masyarakat.git
cd Pelaporan-Pengaduan-Masyarakat
```

2. Install PHP dependencies

```bash
composer install
```

3. Copy environment file and configure your database

```bash
cp .env.example .env
```

4. Configure your `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_pelaporan
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Generate application key

```bash
php artisan key:generate
```

6. Run database migrations and seeders

```bash
php artisan migrate:fresh --seed
```

7. Create storage link

```bash
php artisan storage:link
```

8. Start the development server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Default Users

After running the seeders, you can use these default accounts:

### Admin

-   Email: admin@gmail.com
-   Password: admin1298

### Staff

-   Email: petugas@gmail.com
-   Password: admin1298

### Public User

-   Email: neddy@gmail.com
-   Password: neddy1298

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support, please create an issue in the GitHub repository or contact the maintainers.
