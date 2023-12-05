<?php

declare(strict_types=1);

namespace MinistryOfWeb\AnalyticsCampaignUrls\Parameters;

class GoogleAnalytics implements ParametersInterface
{
    public function __construct(
        public readonly string $campaign,
        public readonly string $medium = '',
        public readonly string $source = '',
        public readonly string $term = '',
        public readonly string $content = ''
    ) {
    }

    /**
     * @deprecated use property instead
     */
    public function getCampaign(): string
    {
        return $this->campaign;
    }

    /**
     * @deprecated use property instead
     */
    public function getMedium(): string
    {
        return $this->medium;
    }

    /**
     * @deprecated use property instead
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @deprecated use property instead
     */
    public function getTerm(): string
    {
        return $this->term;
    }

    /**
     * @deprecated use property instead
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @see https://ga-dev-tools.appspot.com/campaign-url-builder/
     *
     * @return array
     */
    public function toArray(): array
    {
        $params = [
            'utm_campaign' => $this->campaign,
        ];

        if (!empty($this->medium)) {
            $params['utm_medium'] = $this->medium;
        }

        if (!empty($this->source)) {
            $params['utm_source'] = $this->source;
        }

        if (!empty($this->term)) {
            $params['utm_term'] = $this->term;
        }

        if (!empty($this->content)) {
            $params['utm_content'] = $this->content;
        }

        return $params;
    }
}
