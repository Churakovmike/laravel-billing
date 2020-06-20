Laravel finance
========================================

Installation
-------------
Register new service provider in config/app.php

```
ChurakovMike\Finance\FinanceServiceProvider::class,
```

Add account facade to config/app.php in section aliases

```
'aliases' => [
    'Account'   =>  ChurakovMike\Finance\Facades\Account::class
],
```

