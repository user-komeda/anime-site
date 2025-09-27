<?php

namespace App\Presentation\Controllers\User;

use App\Presentation\Response\User\UserResponse;
use OpenApi\Attributes as OA;
use Psr\Http\Message\ResponseInterface as Response;

#[OA\Get(path: '/users/{id}', operationId: "viewUser", summary: "Get a single user", tags: ['Users'])]
#[OA\Parameter(
    name: 'id',
    description: "user ID",
    in: "path",
    required: true,
)]
#[OA\Response(
    response: 200,
    description: "成功時レスポンス",
    content: [
        new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                ref: "#/components/schemas/userResponse"
            )
        )
    ],
)]
class ViewUserController extends UserBaseController
{
    protected function action(): Response
    {
        $id = $this->resolveArg("id");
        $user = $this->viewUserUseCase->invoke($id);
        return $this->respondWithData(data: UserResponse::buildForOutPutDto($user));
    }
}
