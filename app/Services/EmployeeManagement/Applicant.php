<?php

namespace App\Services\EmployeeManagement;

class Applicant implements Employee
{
    public function applyJob(): bool
    {
        return true;
    }

    public function salary(): int
    {
        // TODO: Implement salary() method.
        return 1500;
    }
}
