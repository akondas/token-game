#!/bin/bash
echo "Fixing src/ folder"
php-cs-fixer fix src/ --level=symfony

echo "Fixing spec/ folder"
php-cs-fixer fix spec/ --level=symfony
