<?php

namespace App\Action\Home;

use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Slim\Http\ServerRequest;
use Slim\Views\Twig;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Connection;

/**
 * Action.
 */
final class TestAction
{
    /**
     * @var Capsule
     */
    private $capsule;

    /**
     * The constructor.
     *
     * @param Capsule $twig The twig engine
     */
    public function __construct(Capsule $capsule, Connection $connection)
    {
        $this->capsule = $capsule;
        $this->connection = $connection;
    }

    /**
     * Action.
     *
     * @param ServerRequest $request The request
     * @param Response $response The response
     *
     * @return ResponseInterface The response
     */
    public function __invoke(ServerRequest $request, Response $response): ResponseInterface
    {
        $data = [
            'now' => date('d.m.Y H:i:s'),
            'user-1' => $this->capsule->table('users')->where('id', '=', 1)->get(),
            'user-2' => $this->connection->table('users')->where('id', '=', 2)->get(),
        ];

        return $response->withJson(['data' => $data]);
    }
}
