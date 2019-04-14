[![Build Status](https://img.shields.io/travis/bayubimantarar/ppdb.svg?style=flat-square)](https://travis-ci.org/bayubimantarar/penggajian)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](https://github.com/bayubimantarar/penggajian/pulls)
![GitHub](https://img.shields.io/github/license/bayubimantarar/penggajian.svg?style=flat-square)

# Penggajian - PT. Techno Multi Utama
Penggajian - PT. Techno Multi Utama adalah sebuah aplikasi yang bertujuan untuk :
1. Memudahkan proses pembuatan slip gaji, dengan cara :
    1. Mengunggah _file_ slip gaji yang berekstensi _.xls_ atau _file spreadsheet_

## Installation
1. Clone repository
2. Install dependencies composer

        composer install --no-dev #for production

        composer install #for development

3. Copy file environment

        cp .env.example .env

4. Generate application key

        php artisan key:generate
5. Migrate table
    
        php artisan migrate

6. Seed data to table
    
        php artisan db:seed

## Test
Test with phpunit

    ./vendor/bin/phpunit

## On Progress
1. Masih ada perubahan atribut pada _file spreadsheet_ penggajian dan _file spreadsheet_ absensi
