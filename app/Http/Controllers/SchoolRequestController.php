<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ward;
use App\Models\Region;
use App\Models\School;
use App\Models\Teacher;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\School_teacher;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\SchoolRegistrationRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TeacherPasswordNotification;

class SchoolRequestController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'school_name' => 'required|string|max:255',
            'school_registration_number' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'teacher_email' => 'required|email|max:255',
            'school_email' => 'required|email|max:255',
            'school_phone_number' => 'required|string|max:15',
            'street' => 'required|string|max:255',
            'postal_address' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'response' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Create school registration request
        $schoolrequest = new SchoolRegistrationRequest;
        $schoolrequest->school_name = $request->school_name;
        $schoolrequest->school_registration_number = $request->school_registration_number;
        $schoolrequest->type = $request->type;
        $schoolrequest->level = $request->level;
        $schoolrequest->region_id = $request->region;
        $schoolrequest->district_id = $request->district;
        $schoolrequest->ward_id = $request->ward;
        $schoolrequest->first_name = $request->first_name;
        $schoolrequest->last_name = $request->last_name;
        $schoolrequest->phone_number = $request->phone_number;
        $schoolrequest->school_phone_number = $request->school_phone_number;
        $schoolrequest->school_email = $request->school_email;
        $schoolrequest->teacher_email = $request->teacher_email;
        $schoolrequest->street = $request->street;
        $schoolrequest->postal_address = $request->postal_address;
        if ($schoolrequest->save()) {
        // Generate random password
        $randomPassword = Str::random(10);

        $school = New School();
        $school->name = $request->school_name;
        $school->region_id = $request->region;
        $school->district_id = $request->district;
        $school->ward_id = $request->ward;
        $school->street = $request->street;
        $school->email = $request->school_email;
        $school->type = $request->type;
        $school->level = $request->level;
        $school->school_number = $request->school_phone_number;
        $school->school_registration_number = $request->school_registration_number;
        $school->save();

        // Create teacher record
        $teacher = new Teacher;
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->email = $request->teacher_email;
        $teacher->phone_number = $request->phone_number;
        $teacher->school_registration_number = $request->school_registration_number;
        $teacher->password = Hash::make($randomPassword);
        $teacher->save();

        // Send notification to teacher with their password
        Notification::route('mail', $teacher->email)->notify(new TeacherPasswordNotification($randomPassword));

            return response()->json(['response' => true, 'message' => 'Successfull registers a school! We will back after 3 days of work']);
        } else {
            return response()->json(['response' => false, 'message' => 'Something is  wrong! please try again!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $schoolrequest = SchoolRegistrationRequest::find($id);

        return view('pages.admin.school.edit', ['schoolrequest' => $schoolrequest]);
    }
    public function list()
    {
        $schoolrequests = SchoolRegistrationRequest::with('ward.district.region')
            ->get(['id', 'school_name', 'school_registration_number', 'email', 'type', 'level', 'contract_number', 'ward_id', 'district_id', 'region_id', 'primary_phone_number', 'secondary_phone_number']);

        return view("pages.admin.school.schoolRequests", ['requests' => $schoolrequests]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $request->validate([
            'school_name' => ['required'],
            'school_registration_number' => ['required'],
            'type' => ['required'],
            'level' => ['required'],
            'region' => ['required'],
            'district' => ['required'],
            'ward' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'primary_phone_number' => ['required'],
        ]);
        $schoolrequest = SchoolRegistrationRequest::find($request->school_request_id);
        $schoolrequest->school_name = $request->school_name;
        $schoolrequest->school_registration_number = $request->school_registration_number;
        $schoolrequest->type = $request->type;
        $schoolrequest->level = $request->level;
        $schoolrequest->region_id = $request->region;
        $schoolrequest->district_id = $request->district;
        $schoolrequest->ward_id = $request->ward;

        $schoolrequest->first_name = $request->first_name;
        $schoolrequest->middle_name = $request->middle_name;
        $schoolrequest->last_name = $request->last_name;
        $schoolrequest->primary_phone_number = $request->primary_phone_number;
        $schoolrequest->secondary_phone_number = $request->secondary_phone_number;
        $schoolrequest->motto = $request->motto;
        if ($schoolrequest->save()) {
            return response()->json(['response' => true, 'message' => 'Success, School request update!']);
        } else {
            return response()->json(['response' => false, 'message' => 'Failed, Please Try again!']);
        }
    }
    /* public function verify(Request $request)
    {
        $request->validate([
            'contract_number' => ['required'],
        ]);
        $schoolrequest = SchoolRegistrationRequest::find($request->school_request_id);
        $schoolrequest->contract_number = $request->costract_number;
        $phone_number = $schoolrequest->primary_phone_number != null ? $schoolrequest->primary_phone_number : $schoolrequest->secondary_phone_number;
        if ($schoolrequest->save()) {
            $user = new User();
            $teacher = new Teacher();
            $school = new School();
            $newSchoolTeacher = new School_teacher();

            $user->name = $phone_number;
            $user->phone_number = $phone_number;
            $user->password = Hash::make($phone_number);
            $user->must_change_password = true;
            $user->assignRole('Head Master');
            $user->assignRole('Teacher');
            $user->givePermissionTo('Head Master');
            if ($user->save()) {
                $school->name = $schoolrequest->school_name;
                $school->motto = $schoolrequest->motto;
                $school->phone_number = $phone_number;
                $school->level = $schoolrequest->level;
                $school->contact_person = '0783 891243';
                $school->school_number = $phone_number;
                $school->coperate_color = '#5D44CA';
                $school->school_registration_no = $schoolrequest->school_registration_number;
                $school->contract_number = $schoolrequest->costract_number;
                $school->status = 1;
                $school->ward_id = $schoolrequest->ward_id;
                $school->must_complete_details = true;
                $school->type = $schoolrequest->level;
                if ($school->save()) {
                    $teacher->first_name = $schoolrequest->first_name;
                    $teacher->middle_name = $schoolrequest->middle_name;
                    $teacher->last_name = $schoolrequest->last_name;
                    $teacher->phone_number = $phone_number;
                    $teacher->user_id = $user->id;
                    $teacher->ward_id = $schoolrequest->ward_id;
                    $teacher->district_id = $schoolrequest->district_id;
                    $teacher->region_id = $schoolrequest->region_id;
                    $teacher->must_complete_details = 1;
                    $teacher->active = 1;
                    if ($teacher->save()) {
                        $newSchoolTeacher->school_id = $school->id;
                        $newSchoolTeacher->teacher_id = $teacher->id;
                        if ($newSchoolTeacher->save()) {
                             $schoolrequest = SchoolRegistrationRequest::find($request->school_request_id);
                              $schoolrequest->delete();
                            return response()->json(['response' => true, 'message' => 'Success, School request verified!']);
                        } else {
                            return response()->json(['response' => false, 'message' => 'Failed, Please Try again!']);
                        }
                    } else {
                        return response()->json(['response' => false, 'message' => 'Failed, Please Try again!']);
                    }
                } else {
                    return response()->json(['response' => false, 'message' => 'Failed, Please Try again!']);
                }
            } else {
                return response()->json(['response' => false, 'message' => 'Failed, Please Try again!']);
            }
        }
    } */

}
