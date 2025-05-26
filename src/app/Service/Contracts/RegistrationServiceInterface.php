<?php

namespace App\Service\Contracts;

interface RegistrationServiceInterface
{
    public function generatePageLink(string $username, int $phonenumber, int $expiredDay): string;
}
