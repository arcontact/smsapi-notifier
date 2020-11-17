# smsapi-notifier
Provides SMSAPI integration for Symfony Notifier.

DSN example
-----------

```
// .env file
SMSAPI_DSN=smsapi://TOKEN@default?from=FROM
```

where:
 - `TOKEN` is API Token (OAuth)
 - `FROM` is sender name

See your account info at https://ssl.smsapi.pl/