<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Region;
use App\Models\School;
use App\Models\School_teacher;
use Illuminate\Contracts\View\View;
use App\Models\SchoolRegistrationRequest;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SchoolRequestController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
            'phone_number' => ['required'],
            'teacher_email' => ['required'],
            'school_email' => ['required'],
            'school_phone_number' => ['required'],
            'street' => ['required'],
            'postal_address' => ['required'],
        ]);


        $schoolrequest = new SchoolRegistrationRequest;
        $schoolrequest->school_name = $request->school_name;
        $schoolrequest->school_registration_number = $request->school_registration_number;
        $schoolrequest->type = $request->type;
        $schoolrequest->level = $request->level;
        $schoolrequest->region_id = $request->region;
        $schoolrequest->district_id = $request->district;
        $schoolrequest->ward_id = $request->ward;
        $schoolrequest->school_name = $request->school_name;
        $schoolrequest->first_name = $request->first_name;
        $schoolrequest->last_name = $request->last_name;
        $schoolrequest->primary_phone_number = $request->primary_phone_number;
        $schoolrequest->secondary_phone_number = $request->secondary_phone_number;
        if ($schoolrequest->save()) {
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
    public function verify(Request $request)
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
    }

}
