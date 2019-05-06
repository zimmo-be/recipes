<?php declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @group integration
 */
class HelloWorldControllerTest extends WebTestCase
{
    /** @var Client */
    protected $client;
    /** @var ContainerInterface */
    protected $serviceContainer;

    protected function setUp()
    {
        $this->client = static::createClient();
        $this->serviceContainer = static::$kernel->getContainer();
    }

    public function testHelloWorld(): void
    {
        $this->client->request('GET', '/');

        $this->assertEquals('Hello World!', $this->client->getResponse()->getContent());
    }
}
