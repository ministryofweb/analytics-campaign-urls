<?php

declare(strict_types=1);

namespace MinistryOfWeb\AnalyticsCampaignUrls\Parameters;

interface ParametersInterface
{
    /**
     * Creates the associative array of URL parameters (key = parameter name;
     * value = paramater value).
     */
    public function toArray(): array;
}
