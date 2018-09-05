<?php
declare(strict_types=1);

namespace MinistryOfWeb\AnalyticsCampaignUrls\Parameters;

class GoogleAnalytics implements ParametersInterface
{
    /**
     * @var string
     */
    private $campaign;

    /**
     * @var string
     */
    private $medium;

    /**
     * @var string
     */
    private $source;

    /**
     * @var string
     */
    private $term;

    /**
     * @var string
     */
    private $content;

    /**
     * Parameters constructor.
     *
     * @param string $campaign
     * @param string $medium
     * @param string $source
     * @param string $term
     * @param string $content
     */
    public function __construct(
        string $campaign,
        string $medium = '',
        string $source = '',
        string $term = '',
        string $content = ''
    ) {
        $this->campaign = $campaign;
        $this->medium   = $medium;
        $this->source   = $source;
        $this->term     = $term;
        $this->content  = $content;
    }

    /**
     * @return string
     */
    public function getCampaign(): string
    {
        return $this->campaign;
    }

    /**
     * @return string
     */
    public function getMedium(): string
    {
        return $this->medium;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getTerm(): string
    {
        return $this->term;
    }

    /**
     * @return string
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

        if (! empty($this->medium)) {
            $params['utm_medium'] = $this->medium;
        }

        if (! empty($this->source)) {
            $params['utm_source'] = $this->source;
        }

        if (! empty($this->term)) {
            $params['utm_term'] = $this->term;
        }

        if (! empty($this->content)) {
            $params['utm_content'] = $this->content;
        }

        return $params;
    }
}
