<?php

namespace App\Presentation\Response;

use App\Application\Dto\OutputBaseDto;

interface BaseResponse
{
    public static function buildForOutPutDto(OutputBaseDto $dto): self;
    public static function buildForCreateOutPutDto(OutputBaseDto $dto): self;

    /**
     * @param array<OutputBaseDto> $dtoList
     * @return array<BaseResponse>
     */
    public static function buildFromArray(array $dtoList): array;
}
