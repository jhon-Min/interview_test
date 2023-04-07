<?php

namespace App\Http\Controllers;

use App\Services\EmployeeManagement\Applicant;
use Illuminate\Http\Request;

class JobController extends Controller
{
    protected $applicant;

    public function __construct(Applicant $applicant)
    {
        $this->applicant = $applicant;
    }

    public function apply(Request $request)
    {
        $data = [
            'applied' => $this->applicant->applyJob(),
            'salary' => $this->applicant->salary(),
        ];

        return response()->json([
            'data' => $data
        ]);
    }
}
