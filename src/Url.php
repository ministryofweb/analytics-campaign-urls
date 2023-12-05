<?php

declare(strict_types=1);

namespace MinistryOfWeb\AnalyticsCampaignUrls;

use MinistryOfWeb\AnalyticsCampaignUrls\Parameters\ParametersInterface;

class Url
{
    public static function addAnalyticsCampaignParams(string $url, ParametersInterface $parameters): string
    {
        $query = http_build_query($parameters->toArray());

        if (!str_contains($url, '?')) {
            return $url . '?' . $query;
        }

        return $url . '&' . $query;
    }
}
