#!/usr/bin/env bash
scp -r storage/app/public/* casts-acacha-org_180128:/home/forge/casts.acacha.org/storage/app/public
php artisan publish:artisan db:seed --force
