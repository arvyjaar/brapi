<?php

namespace App\Action\User;

use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Slim\Http\ServerRequest;
use App\Domain\User\Service\UserList;

/**
 * Action.
 */
final class UserListAction
{

    /**
     * The constructor.
     *
     * @param UserList $userList
     */
    public function __construct(UserList $userList)
    {
        $this->userList = $userList;
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
        $users = $this->userList->listAllUsers();
        return $response->withJson(['users' => $users]);
    }
}
