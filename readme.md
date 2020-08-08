## SaFraffle

SafRaffle is to be a Laravel 5.8 powered REST API to manage and serve a simple raffle platform

Includes a simple browser-based administration system to:
- Add new raffles
- Add items to raffles
- Edit raffle items

Raffles have set start and end dates, before and after which they will not be accesible via the API

The API:
- Serves a description of the raffle 
- Serves a list of raffle items and descriptions
- Provides interface to select number of tickets and apply towards an item
- Verifies purchase of tickets and registers them in the database

Tickets in database are associated with the purchaser's contact information and a confirmation email is sent to their provided email.

