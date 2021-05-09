# pdActivity Bundle
Symfony 5 logs HTTP and Mail.

[![Packagist](https://img.shields.io/packagist/dt/appaydin/pd-activity.svg)](https://github.com/appaydin/pd-activity)
[![Github Release](https://img.shields.io/github/release/appaydin/pd-activity.svg)](https://github.com/appaydin/pd-activity)
[![license](https://img.shields.io/github/license/appaydin/pd-activity.svg)](https://github.com/appaydin/pd-activity)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/appaydin/pd-activity.svg)](https://github.com/appaydin/pd-activity)

Installation
---

#### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
composer require appaydin/pd-activity
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

#### Step 2: Enable the Bundle

With Symfony 5, the package will be activated automatically. But if something goes wrong, you can install it manually.

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
<?php
// config/bundles.php

return [
    //...
    Pd\ActivityBundle\PdActivityBundle::class => ['all' => true]
];
```
#### Step 3: Doctrine Settings
```yaml
# config/packages/doctrine.yaml

doctrine:
    orm:
        resolve_target_entities:
            Pd\ActivityBundle\Entity\UserInterface: App\Entity\User
```

#### Step 4: Settings Bundle
Create a "pd_activity.yaml" file for the settings.
```yaml
# config/packages/pd_activity.yaml

pd_activity:
    log_mailer: true
    log_request: true
    request_exclude_methods: [] # example: ['GET','POST','PATCH', ...]
    request_match_uri: ^\/admin
```

View Logs
---
```php
# src/Controller/LogViewerController.php

use Pd\ActivityBundle\Repository\ActivityLogRepository;
use Pd\ActivityBundle\Repository\MailLogRepository;

public function view(ActivityLogRepository $activityLog, MailLogRepository $mailLog) {
    $activityLog->getUserLogs($this->getUser());
    $mailLog->findAll();
    ...
}
```
