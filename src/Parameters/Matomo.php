<?php

declare(strict_types=1);

namespace MinistryOfWeb\AnalyticsCampaignUrls\Parameters;

class Matomo implements ParametersInterface
{
    public function __construct(
        public readonly string $campaign,
        public readonly string $medium = '',
        public readonly string $source = '',
        public readonly string $keyword = '',
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
    public function getKeyword(): string
    {
        return $this->keyword;
    }

    /**
     * @deprecated use property instead
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @see https://matomo.org/docs/tracking-campaigns-url-builder/
     *
     * @return array
     */
    public function toArray(): array
    {
        $params = [
            'pk_campaign' => $this->campaign,
        ];

        if (!empty($this->medium)) {
            $params['pk_medium'] = $this->medium;
        }

        if (!empty($this->source)) {
            $params['pk_source'] = $this->source;
        }

        if (!empty($this->keyword)) {
            $params['pk_kwd'] = $this->keyword;
        }

        if (!empty($this->content)) {
            $params['pk_content'] = $this->content;
        }

        return $params;
    }
}
