<?php
declare(strict_types=1);

namespace MinistryOfWeb\AnalyticsCampaignUrls;

use MinistryOfWeb\AnalyticsCampaignUrls\Parameters\ParametersInterface;

class Url
{
    /**
     * @param string $url
     * @param ParametersInterface $parameters
     *
     * @return string
     */
    public static function addAnalyticsCampaignParams(string $url, ParametersInterface $parameters): string
    {
        $query = http_build_query($parameters->toArray());

        if (strpos($url, '?') === false) {
            return $url . '?' . $query;
        }

        return $url . '&' . $query;
    }
}
