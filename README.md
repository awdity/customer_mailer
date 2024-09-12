# Customer Email Notification System

# Description
This Laravel project sends a "Good Morning" email to customers every day at 8 AM. It targets customers located in Bangladesh, Dhaka, with a post code of 1216. The system is designed for efficient email handling and scheduled tasks.

# Features
- Sends "Good Morning" emails daily at 8 AM.
- Filters customers by location (country: Bangladesh, city: Dhaka, post code: 1216).
- Handles bulk email sending efficiently using chunking and queuing.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/awdity/customer_mailer.git

    cd customer_mailer
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    php artisan serve
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact
For questions or feedback, please contact me at:
- Email: awdity15@gmail.com
- GitHub: [awdity](https://github.com/awdity)






