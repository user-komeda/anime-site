<?php

namespace App\Presentation\Controllers\User;

use App\Presentation\Request\User\UpdateUserRequest;
use OpenApi\Attributes as OA;
use Psr\Http\Message\ResponseInterface as Response;

#[OA\Patch(path: '/users/{id}', operationId: "updateUser", summary: "Update a user", tags: ['Users'])]
#[OA\Parameter(
    name: 'id',
    description: "user ID",
    in: "path",
    required: true,
)]
#[OA\RequestBody(
    content: [
        new OA\MediaType(
            'application/json',
            schema: new OA\Schema(
                ref: "#/components/schemas/updateUserRequest"
            )
        ),
    ]
)]
#[OA\Response(
    response: 204,
    description: "成功時レスポンス",
    headers: [
        new OA\Header(
            header: "ETag",
            description: "作成されたリソースの識別子",
            schema: new OA\Schema(
                type: "string",
            )
        )
    ],
)]
class UpdateUserController extends UserBaseController
{
    protected function action(): Response
    {
        $id = $this->resolveArg("id");
        $updateUserRequest = UpdateUserRequest::validate($this->request);
        $this->updateUserUseCase->invoke(
            $updateUserRequest->convertToDto(),
            $id
        );
        return $this->respondWithData(204, $id);
    }
}
