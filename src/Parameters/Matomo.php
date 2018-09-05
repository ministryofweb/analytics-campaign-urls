<?php
declare(strict_types=1);

namespace MinistryOfWeb\AnalyticsCampaignUrls\Parameters;

class Matomo implements ParametersInterface
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
    private $keyword;

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
     * @param string $keyword
     * @param string $content
     */
    public function __construct(
        string $campaign,
        string $medium = '',
        string $source = '',
        string $keyword = '',
        string $content = ''
    ) {
        $this->campaign = $campaign;
        $this->medium   = $medium;
        $this->source   = $source;
        $this->keyword  = $keyword;
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
    public function getKeyword(): string
    {
        return $this->keyword;
    }

    /**
     * @return string
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

        if (! empty($this->medium)) {
            $params['pk_medium'] = $this->medium;
        }

        if (! empty($this->source)) {
            $params['pk_source'] = $this->source;
        }

        if (! empty($this->keyword)) {
            $params['pk_kwd'] = $this->keyword;
        }

        if (! empty($this->content)) {
            $params['pk_content'] = $this->content;
        }

        return $params;
    }
}
