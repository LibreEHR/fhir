<?php

namespace LibreEHR\FHIR\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use LibreEHR\Core\Contracts\BaseAdapterInterface;
use Illuminate\Http\Request;

class RegisterController extends AbstractController
{

    protected $patientAdapter = null;

    public function __construct( BaseAdapterInterface $patientAdapter )
    {
        $this->patientAdapter = $patientAdapter;
//        $this->middleware('auth:api');

    }

    public function index(Request $request = null)
    {
        return $this->patientAdapter->collectionToOutput($request);
    }

    public function get()
    {
        $user = Auth::user();
        return $this->patientAdapter->showPatient($user->ehr_pid);
    }

    public function post(Request $request)
    {
        // Store the record as "Master Record"
        $patient = $this->patientAdapter->storeMaster($request);
        return $patient;
    }
}

