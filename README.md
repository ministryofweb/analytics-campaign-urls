# Analytics Campaign URLs

This library allows it to easily append campaign parameters (e. g. for Google Analytics or Piwik) to any given URL.

## Requirements

At least PHP 7.0 is required to use this library. 

## Installation

```shell
composer require ministryofweb/analytics-campaign-urls
```

## Usage

```php
<?php

use MinistryOfWeb\AnalyticsCampaignUrls\Url;
use MinistryOfWeb\AnalyticsCampaignUrls\Parameters\GoogleAnalytics;
use MinistryOfWeb\AnalyticsCampaignUrls\Parameters\Matomo;

$params = new GoogleAnalytics(
    'summer',
    'banner',
    'website',
);

$campaignUrlGA = Url::addAnalyticsCampaignParams('https://example.com/', $params);
// → https://example.com/?utm_campaign=summer&utm_medium=banner&utm_source=website

$campaignUrlGAWithExistingParam = Url::addAnalyticsCampaignParams('https://example.com/?existingparam=1', $params);
// → https://example.com/?existingparam=1&utm_campaign=summer&utm_medium=banner&utm_source=website

$matomoParams = new Matomo(
    'summer',
    'banner',
    'website',
    'keyword',
    'content'
);

$campaignUrlMatomo = Url::addAnalyticsCampaignParams('https://example.com/', $matomoParams);
// → https://example.com/?pk_campaign=summer&pk_medium=banner&pk_source=website&pk_kwd=keyword&pk_content=content
```

## Links

- [Google Analytics Campaign URL Builder][ga]
- [Matomo Campaign URL Builder][matomo]


[ga]: https://ga-dev-tools.appspot.com/campaign-url-builder/
[matomo]: https://matomo.org/docs/tracking-campaigns-url-builder/
