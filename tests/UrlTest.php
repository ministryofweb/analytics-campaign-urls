<?php

namespace MinistryOfWeb\AnalyticsCampaignUrls;

use MinistryOfWeb\AnalyticsCampaignUrls\Parameters\GoogleAnalytics;
use MinistryOfWeb\AnalyticsCampaignUrls\Parameters\Matomo;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function testIfUrlBuildingWithGoogleAnalyticsCampaignMediumSourceWorksAsExpected()
    {
        $expected = 'https://example.com/?utm_campaign=summer&utm_medium=banner&utm_source=website';
        $parameters = new GoogleAnalytics('summer', 'banner', 'website');

        $this->assertEquals($expected, Url::addAnalyticsCampaignParams('https://example.com/', $parameters));
    }

    public function testIfUrlBuildingWithGoogleAnalyticsAllParametersWorksAsExpected()
    {
        $expected = 'https://example.com/?utm_campaign=summer&utm_medium=banner&utm_source=website&utm_term=term&utm_content=content';
        $parameters = new GoogleAnalytics('summer', 'banner', 'website', 'term', 'content');

        $this->assertEquals($expected, Url::addAnalyticsCampaignParams('https://example.com/', $parameters));
    }

    public function testIfUrlBuildingWithMatomoCampaignMediumSourceWorksAsExpected()
    {
        $expected = 'https://example.com/?pk_campaign=summer&pk_medium=banner&pk_source=website';
        $parameters = new Matomo('summer', 'banner', 'website');

        $this->assertEquals($expected, Url::addAnalyticsCampaignParams('https://example.com/', $parameters));
    }

    public function testIfUrlBuildingWithMatomoAllParametersWorksAsExpected()
    {
        $expected = 'https://example.com/?pk_campaign=summer&pk_medium=banner&pk_source=website&pk_kwd=keyword&pk_content=content';
        $parameters = new Matomo('summer', 'banner', 'website', 'keyword', 'content');

        $this->assertEquals($expected, Url::addAnalyticsCampaignParams('https://example.com/', $parameters));
    }

    public function testIfUrlBuildingWithExistingParamsWorksAsExpected()
    {
        $expected = 'https://example.com/?foo=bar&utm_campaign=summer&utm_medium=banner&utm_source=website';
        $parameters = new GoogleAnalytics('summer', 'banner', 'website');

        $this->assertEquals($expected, Url::addAnalyticsCampaignParams('https://example.com/?foo=bar', $parameters));

        $expected = 'https://example.com/?foo=bar&bar=baz&utm_campaign=summer&utm_medium=banner&utm_source=website';
        $parameters = new GoogleAnalytics('summer', 'banner', 'website');

        $this->assertEquals($expected, Url::addAnalyticsCampaignParams('https://example.com/?foo=bar&bar=baz', $parameters));
    }
}
