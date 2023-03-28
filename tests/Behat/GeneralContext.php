<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use Behat\Behat\Context\Context;
use Behat\Mink\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\RouterInterface;

final class GeneralContext implements Context
{
    /** @var KernelInterface */
    private $kernel;

    /** @var Session */
    private $session;

    /** @var RouterInterface */
    private $router;

    /** @var Response|null */
    private $response;

    public function __construct(KernelInterface $kernel, Session $session, RouterInterface $router)
    {
        $this->kernel = $kernel;
        $this->session = $session;
        $this->router = $router;
    }

    /**
     * @When a demo scenario sends a request to :path
     */
    public function aDemoScenarioSendsARequestTo(string $path): void
    {
        $this->response = $this->kernel->handle(Request::create($path, 'GET'));
    }

    /**
     * @Then the response should be received
     */
    public function theResponseShouldBeReceived(): void
    {
        if ($this->response === null) {
            throw new \RuntimeException('No response received');
        }
    }

    /**
     * @Then I visit the page :link
     */
    public function iVisitThePage($link): void
    {
        $this->session->visit($this->router->generate($link));
    }

    /**
     * @Then I should see :text
     */
    public function iShouldSee($text): void
    {
        if ($this->session->getPage() === null) {
            throw new \RuntimeException('No response received');
        }
        if(strpos($this->session->getPage()->getContent(), $text) === false) {
            throw new \RuntimeException('Text not found in response');
        }
    }
}
