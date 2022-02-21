# AlliO
Backend providing user access to OpenFinance, conecting to banks to collect data and suggest the best resource to user money.

## Requirements

- Docker desktop
- XP Developer portal account

## Setup
- Clone this repository
- Run `composer install`
- Start docker containers `./vendor/bin/sail up -d`
- Start database migrations: `./vendor/bin/sail artisan migrate`
- Generate assets:  `/vendor/bin/sail npm install && /vendor/bin/sail npm run dev`
- Update .env with your API credentials
  `XP_CLIENT_ID="YOUR CLIENT ID"
  XP_SECRET="YOUR CLIENT SECRET"
  XP_OPEN_BANKING_URI="https://openapi.xpi.com.br/openbanking"`
- Open your browser at http://localhost to see the available routes.
