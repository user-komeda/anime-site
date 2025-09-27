<?php

namespace App\Presentation\Response\User;

use App\Application\Dto\OutputBaseDto;
use App\Application\Dto\User\UserCreateOutputDto;
use App\Application\Dto\User\UserOutputDto;
use App\Exception\InstanceMismatchException;
use App\Presentation\Response\BaseResponse;
use JsonSerializable;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: "userResponse", title: "userResponse")]
readonly class UserResponse implements BaseResponse, JsonSerializable
{
    private function __construct(
        #[OA\Property()]
        private string $id,
        #[OA\Property()]
        private string $firstName,
        #[OA\Property()]
        private string $lastName,
        #[OA\Property()]
        private string $email
    ) {
    }

    public static function buildForOutPutDto(OutputBaseDto $dto): self
    {
        if (!$dto instanceof UserOutputDto || empty($dto->getId())) {
            throw InstanceMismatchException::forClass(UserOutputDto::class, $dto);
        }
        return new self(
            $dto->getId(),
            $dto->getFirstName(),
            $dto->getLastName(),
            $dto->getEmail()
        );
    }

    public static function buildForCreateOutPutDto(OutputBaseDto $dto): self
    {
        if (!$dto instanceof UserCreateOutputDto || empty($dto->getId())) {
            throw InstanceMismatchException::forClass(UserCreateOutputDto::class, $dto);
        }
        return new self(
            $dto->getId(),
            $dto->getFirstName(),
            $dto->getLastName(),
            $dto->getEmail()
        );
    }

    /**
     * @param array<UserOutputDto> $dtoList
     * @return array<UserResponse>
     */
    public static function buildFromArray(array $dtoList): array
    {
        return array_map(
            fn (UserOutputDto $entity) => UserResponse::buildForOutPutDto($entity),
            $dtoList
        );
    }

    /**
     * @return array<string,string>
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
        ];
    }
}
