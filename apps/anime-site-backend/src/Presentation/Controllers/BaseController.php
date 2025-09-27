<?php

declare(strict_types=1);

namespace App\Presentation\Controllers;

use App\Domain\DomainException\DomainRecordNotFoundException;
use App\Presentation\Factory\ResponseFactory;
use DI\Attribute\Inject;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;

abstract class BaseController
{
    protected LoggerInterface $logger;

    protected Request $request;

    protected Response $response;

    /**
     * @var array<string,string>
     */
    protected array $args;

    #[Inject]
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array<string,string> $args
     * @return Response
     */
    public function __invoke(
        Request $request,
        Response $response,
        array $args
    ): Response {
        $this->request = $request;
        $this->response = $response;
        $this->args = $args;

        try {
            return $this->action();
        } catch (DomainRecordNotFoundException $e) {
            throw new HttpNotFoundException(
                $this->request,
                $e->getMessage()
            );
        }
    }

    /**
     * @throws DomainRecordNotFoundException
     * @throws HttpBadRequestException
     */
    abstract protected function action(): Response;

    /**
     * @return mixed
     * @throws HttpBadRequestException
     */
    protected function resolveArg(string $name)
    {
        if (!isset($this->args[$name])) {
            throw new HttpBadRequestException(
                $this->request,
                "Could not resolve argument `{$name}`."
            );
        }

        return $this->args[$name];
    }

    /**
     * @param array<object>|object|null $data
     * @param int $statusCode
     * @return Response
     */
    protected function respondWithData(
        int $statusCode = 200,
        string $id = "",
        $data = null
    ): Response {
        $payload = new ControllerPayload($statusCode, $data);
        print_r($payload);

        return ResponseFactory::create(
            $this->response,
            $payload,
            $id
        );
    }
}
