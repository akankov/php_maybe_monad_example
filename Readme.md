# Example of using Maybe monad in Symfony project

## Installation

```bash
composer install
symfony server:start
```

## Usage

Request to the endpoint with `?email=john.doe@example.com` query parameter:

```bash
curl "http://127.0.0.1:8000/?email=john.doe@example.com"
# {"name":"John Doe","email":"john.doe@example.com"}
```

Request to the endpoint with no parameters:
```bash
curl "http://127.0.0.1:8000"
# {"name":"Unknown","email":"Unavailable"}
```
