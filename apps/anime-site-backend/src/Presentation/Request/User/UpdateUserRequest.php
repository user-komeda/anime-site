<?php

namespace App\Presentation\Request\User;

use App\Application\Dto\User\UserUpdateInputDto;
use App\Presentation\Request\BaseRequest;
use OpenApi\Attributes as OA;
use Psr\Http\Message\ServerRequestInterface;
use Respect\Validation\Validator as v;
use Slim\Exception\HttpBadRequestException;

#[OA\Schema(schema: "updateUserRequest", title: "updateUserRequest")]
class UpdateUserRequest extends BaseRequest
{
    public function __construct(
        #[OA\Property()]
        private readonly ?string $firstName,
        #[OA\Property()]
        private readonly ?string $lastName,
        #[OA\Property()]
        private readonly ?string $email
    ) {
    }

    public static function validate(ServerRequestInterface $request): self
    {
        $body = self::buildBody($request);
        $firstName = $body['firstName'] ?? null;
        $lastName = $body['lastName'] ?? null;
        $email = $body['email'] ?? null;

        $isValidFirstName = v::optional(v::stringType()->notEmpty())->validate(
            $firstName
        );
        $isValidLastName = v::optional(v::stringType()->notEmpty())->validate(
            $lastName
        );
        $isValidEmail = v::optional(v::email())->validate($email);

        if (!$isValidFirstName || !$isValidLastName || !$isValidEmail) {
            throw new HttpBadRequestException($request);
        }

        return new self($firstName, $lastName, $email);
    }

    public function convertToDto(): UserUpdateInputDto
    {
        return new UserUpdateInputDto(
            $this->firstName,
            $this->lastName,
            $this->email
        );
    }
}
