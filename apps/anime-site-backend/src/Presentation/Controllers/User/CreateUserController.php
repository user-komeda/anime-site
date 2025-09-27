<?php

declare(strict_types=1);

namespace App\Presentation\Controllers\User;

use App\Presentation\Request\User\CreateUserRequest;
use App\Presentation\Response\User\UserResponse;
use OpenApi\Attributes as OA;
use Psr\Http\Message\ResponseInterface as Response;

#[OA\Post(path: '/users', operationId: "createUser", summary: "Create a user", tags: ['Users'])]
#[OA\RequestBody(
    content: [
        new OA\MediaType(
            'application/json',
            schema: new OA\Schema(
                ref: "#/components/schemas/createUserRequest"
            )
        ),
    ]
)]
#[OA\Response(
    response: 201,
    description: "成功時レスポンス",
    headers: [
        new OA\Header(
            header: "Location",
            description: "作成されたリソースのURL",
            schema: new OA\Schema(
                type: "string",
                example: "http://localhost:8080/users/e7b8c7d1-4f1b-4b2a-9f62-8cbb4a5d9d3f"
            )
        )
    ],
    content: [
        new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                ref: "#/components/schemas/userResponse"
            )
        )
    ]
)]
class CreateUserController extends UserBaseController
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $createUserRequest = CreateUserRequest::validate(
            $this->request
        );
        $createdUser = $this->createUserUseCase->invoke(
            $createUserRequest->convertToDto()
        );
        return $this->respondWithData(201, $createdUser->getId(), UserResponse::buildForCreateOutPutDto($createdUser));
    }
}
