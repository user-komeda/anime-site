<?php

namespace App\Presentation\Controllers\User;

use App\Presentation\Response\User\UserResponse;
use OpenApi\Attributes as OA;
use Psr\Http\Message\ResponseInterface as Response;

#[OA\Get(path: '/users', operationId: "getAllUser", summary: "Get all users", tags: ['Users'])]
#[OA\Response(
    response: 200,
    description: "成功時レスポンス",
    content: [
        new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                type: "array",
                items: new OA\Items(
                    ref: "#/components/schemas/userResponse"
                )
            )
        )
    ],
)]
class ListUsersController extends UserBaseController
{
    protected function action(): Response
    {
        $userDtoList = $this->listUserUseCase->invoke();
        if (sizeof($userDtoList) === 0) {
            return $this->respondWithData(data: []);
        }
        return $this->respondWithData(
            data: UserResponse::buildFromArray($userDtoList),
        );
    }
}
