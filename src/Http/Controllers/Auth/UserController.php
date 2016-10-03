<?php

namespace LibreEHR\FHIR\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use LibreEHR\FHIR\Http\Controllers\Auth\AuthModel\User;
use Illuminate\Http\Response;
use LibreEHR\Core\Emr\Repositories\PatientRepository;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $data['user'] = $user;
            $patient = null;
            if ( $user->connection &&
                $user->ehr_pid ) {
                $patientRepo = new PatientRepository();
                $patientRepo->setConnection( $user->connection );
                $patient = $patientRepo->find( $user->ehr_pid );
            }

            $status = User::STATUS_NEW;
            if ( $patient ) {
                // If we have a ehr_id and a DB connection,
                // // get the reg_status from the EHR
                $status = $user->status = $patient->getStatus();
                $user->save();
            }

            $host = $_SERVER['HTTP_HOST'];
            $endpoints = array();
            $endpoints []= [
                'name' => 'user',
                'host' => $host,
                'protocol' => 'https',
                'path' =>  '/user'
            ];

            // User status can be new, pending, active, suspended
            if ( $status == User::STATUS_ACTIVE ||
                $status == User::STATUS_REGISTERED ) {
                // Endpoint to get the Patient Bundle
                $endpoints[] = [
                    'name' => 'profile',
                    'host' => $host,
                    'protocol' => 'https',
                    'path' => '/profile'
                ];
            } else if ( $status == 'new' ) {
                $endpoints[] = [
                    'name' => 'register',
                    'host' => $host,
                    'protocol' => 'https',
                    'path' =>  '/register'
                ];
            }

            $data['endpoints'] = $endpoints;
            return $data;

        } else {
            return new Response([
                'accountRegistered' => 0,
                'status'  => 'Fail',
                'message' => 'No patients found',
            ]);
        }
    }
}
