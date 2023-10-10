<?php
/**
 * Copyright © ...
 */

namespace App\Test\Controller;

use App\Test\Api\UpdateNumberInterface;

class UpdateNumber
{
    const HTTP_X_REQUESTED_WITH = 'HTTP_X_REQUESTED_WITH';
    const XML_HTTP_REQUEST = 'xmlhttprequest';

    private UpdateNumberInterface $updateNumber;

    public function __construct(UpdateNumberInterface $updateNumber)
    {
        $this->updateNumber = $updateNumber;
    }

    public function execute(): array
    {
        if (isset($_SERVER[self::HTTP_X_REQUESTED_WITH]) &&
            strtolower($_SERVER[self::HTTP_X_REQUESTED_WITH]) == self::XML_HTTP_REQUEST
        ) {
            try {
                $newUpdatedNUmber = $this->updateNumber->getUpdatedNumber();

                return [
                    'status' => 'success',
                    'html' => $newUpdatedNUmber
                ];
            } catch (\Exception $ex) {
                // Fetch Error MSG
            }
        }

        return [
            'status' => 'error',
            'html' => $this->updateNumber->getLastNumber()
        ];
    }
}
