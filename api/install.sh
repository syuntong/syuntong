#!/bin/bash

# Script to install Composer dependencies for the API backend

echo "Installing Composer dependencies..."

# Check if composer is installed
if ! command -v composer &> /dev/null
then
    echo "Composer not found. Installing Composer..."
    
    # Download and install Composer
    EXPECTED_CHECKSUM="$(php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')"
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    ACTUAL_CHECKSUM="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"

    if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ]
    then
        >&2 echo 'ERROR: Invalid installer checksum'
        rm composer-setup.php
        exit 1
    fi

    php composer-setup.php --quiet
    RESULT=$?
    rm composer-setup.php
    
    if [ $RESULT -eq 0 ]; then
        echo "Composer installed successfully"
        php composer.phar install
    else
        echo "Failed to install Composer"
        exit 1
    fi
else
    echo "Composer is already installed"
    composer install
fi

echo "Dependencies installed successfully!"
