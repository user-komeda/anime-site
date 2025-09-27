<?php

namespace App\Presentation\Controllers\User;

use OpenApi\Attributes as OA;
use Psr\Http\Message\ResponseInterface as Response;

#[OA\Delete(path: '/users/{id}', operationId: "deleteUser", summary: "delete user", tags: ['Users'])]
#[OA\Parameter(
    name: 'id',
    description: "user ID",
    in: "path",
    required: true,
)]
#[OA\Response(
    response: 204,
    description: "成功時レスポンス",
)]
class DeleteUserController extends UserBaseController
{
    protected function action(): Response
    {
        $id = $this->resolveArg("id");
        $this->deleteUserUseCase->invoke($id);
        return $this->respondWithData(204);
    }
}
