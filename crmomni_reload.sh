echo "Clearing code dump & swagger..."
sudo php composer.phar dump-autoload
sudo php artisan l5-swagger:generate

echo "Cache cleaning..."
sudo php artisan cache:clear
sudo php artisan config:clear
sudo php artisan route:clear
echo "Cache cleared."

echo "Settng system access..."
sudo chown -R ec2-user:ec2-user .
sudo chmod -R 777 storage/.
sudo chmod -R 777 public/.
echo "System access granted."

echo "Clearing logs..."
sudo cat /dev/null > storage/logs/laravel.log
echo "Logs cleared."

echo "Generating JWT Secret..."
sudo php artisan jwt:secret
echo "Generated JWT Secret Key"

echo "Creating DB..."
sudo php artisan migrate:refresh
echo "DB created."

echo "Creating meta and dummy data ..."
sudo php artisan module:seed Core
sudo php artisan module:seed Customer
sudo php artisan module:seed User
sudo php artisan module:seed Preference
echo "Data created..."