<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenericCertificate;
use App\Models\Application;
class CertificateController extends Controller
{

//     public function store2(Request $request)
// {
//     $user = new User;

//     $user->name = $request->input('name');
//     $user->email = $request->input('email');
//     $user->password = Hash::make($request->input('password'));

//     $user->save();

//     return response()->json(['message' => 'User created', 'user' => $user], 201);
// }
 public function store(Request $request){
        $validatedData = $request->validate([
        'name' => 'required',
        'fatherName' => 'nullable',
        'motherName' => 'nullable',
        'nid' => 'nullable',
        'passport' => 'nullable',
        'bid' => 'nullable',
        'mobile' => 'nullable',
        'email' => 'nullable',
        'birthdate' => 'nullable',
        'resident' => 'nullable',
        'service' => 'nullable',
        'presentHoldingNumber' => 'nullable',
        'presentVillage' => 'nullable',
        'presentPostOffice' => 'nullable',
        'presentPoliceStation' => 'nullable',
        'presentDistrict' => 'nullable',
        'permanentHoldingNumber' => 'nullable',
        'permanentVillage' => 'nullable',
        'permanentPostOffice' => 'nullable',
        'permanentPoliceStation' => 'nullable',
        'permanentDistrict' => 'nullable',
        'userImage' => 'nullable',
        'idVerificationImage' => 'nullable',
        'homeVerificationimage' => 'nullable',
        'deathVerificationimage' => 'nullable',
        
        // Add validation rules for other fields
    ]);
    $cert = new GenericCertificate;
    $cert->name = $request->filled('name') ? $validatedData['name'] : null;
    $cert->FatherName = $request->filled('fatherName') ? $validatedData['fatherName'] : null;
    $cert->MotherName = $request->filled('motherName') ? $validatedData['motherName'] : null;
    $cert->nid = $request->filled('nid') ? $validatedData['nid'] : null;
    $cert->passport = $request->filled('passport') ? $validatedData['passport'] : null;
    $cert->bid = $request->filled('bid') ? $validatedData['bid'] : null;
    $cert->mobile = $request->filled('mobile') ? $validatedData['mobile'] : null;
    $cert->email = $request->filled('email') ? $validatedData['email'] : null;
    $cert->resident = $request->filled('resident') ? $validatedData['resident'] : null;
    $cert->service = $request->filled('service') ? $validatedData['service'] : null;
    $cert->birthdate = $request->filled('birthdate') ? $validatedData['birthdate'] : null;
    $cert->presentHoldingNumber = $request->filled('presentHoldingNumber') ? $validatedData['presentHoldingNumber'] : null;
    $cert->presentVillage = $request->filled('presentVillage') ? $validatedData['presentVillage'] : null;
    $cert->presentPostOffice = $request->filled('presentPostOffice') ? $validatedData['presentPostOffice'] : null;
    $cert->presentPoliceStation = $request->filled('presentPoliceStation') ? $validatedData['presentPoliceStation'] : null;
    $cert->presentDistrict = $request->filled('presentDistrict') ? $validatedData['presentDistrict'] : null;
    $cert->permanentHoldingNumber = $request->filled('permanentHoldingNumber') ? $validatedData['permanentHoldingNumber'] : null;
    $cert->permanentVillage = $request->filled('permanentVillage') ? $validatedData['permanentVillage'] : null;
    $cert->permanentPostOffice = $request->filled('permanentPostOffice') ? $validatedData['permanentPostOffice'] : null;
    $cert->permanentPoliceStation = $request->filled('permanentPoliceStation') ? $validatedData['permanentPoliceStation'] : null;
    $cert->permanentDistrict = $request->filled('permanentDistrict') ? $validatedData['permanentDistrict'] : null;

    if ($request->hasFile('userImage')) {
        $userImageName = uniqid().'.'.$request->userImage->extension();  
        $request->userImage->move(public_path('images'), $userImageName);
        $userImagePath = 'images/' . $userImageName;
        } else {
        $userImagePath = null;
        }
        if ($request->hasFile('idVerificationImage')) {
        $idVerificationImageName = uniqid().'.'.$request->idVerificationImage->extension();
        $request->idVerificationImage->move(public_path('images'), $idVerificationImageName);
        $idVerificationImageNamePath = 'images/' . $idVerificationImageName;
        } else {
        $idVerificationImageNamePath = null;
        }
        if ($request->hasFile('homeVerificationimage')) {
        $homeVerificationimageName = uniqid().'.'.$request->homeVerificationimage->extension();
        $request->homeVerificationimage->move(public_path('images'), $homeVerificationimageName);
        $homeVerificationimageNamePath = 'images/' . $homeVerificationimageName;
        } else {
        $homeVerificationimageNamePath = null;
        }
        if ($request->hasFile('deathVerificationimage')) {
        $deathVerificationimageName = uniqid().'.'.$request->deathVerificationimage->extension();
        $request->deathVerificationimage->move(public_path('images'), $deathVerificationimageName);
        $deathVerificationimageNamePath = 'images/' . $deathVerificationimageName;
        } else {
        $deathVerificationimageNamePath = null;
        }

        $cert->userImage = $userImagePath;
        $cert->idVerificationImage = $idVerificationImageNamePath;
        $cert->homeVerificationimage = $homeVerificationimageNamePath;
        $cert->deathVerificationimage = $deathVerificationimageNamePath;
        $cert->save();
        $certificate = GenericCertificate::find($cert->id);
        $year = date('Y');
        $month = date('m');
        $serial = str_pad($cert->id, 11, '0', STR_PAD_LEFT);
        $uid = $year . $month . $serial;
        $certificate->certificateId = $uid;
        $certificate->save();
    return response()->json([
            'message' => 'Certificate created successfully ',
        //      'data'=> $cert,
             'data'=> $certificate,
            
        ], 201);
}
public function get(){
    $cert = GenericCertificate::all();
    return response()->json([
            'message' => 'Certificate created successfully ',
             'data'=> $cert,
            
        ], 201);
}

public function getById($id){
    $cert = GenericCertificate::find($id);
    return response()->json([
            'message' => 'Certificate created successfully ',
             'data'=> $cert,
            
        ], 201);
}
public function getByService($service){
    $cert = GenericCertificate::where('service',$service)->get();
    return response()->json([
            'message' => 'Certificate created successfully ',
             'data'=> $cert,
            
        ], 201);
}

public function imageUpload(Request $request){
//     $imageName = time().'.'.$request->userImage->extension();  
//     $request->userImage->move(public_path('images'), $imageName);
    //get path
        $year = date('Y');
        $month = date('m');
        $serial = str_pad(2, 11, '0', STR_PAD_LEFT);
        $uid = $year . $month . $serial;
//        $imagePath = 'images/' . $imageName;
    return response()->json([
            'message' => 'Certificate created successfully ',
        //      'data'=> $imageName,
        //      'path'=> $imagePath,
             'uid' => $uid,
        ], 201);
}

public function storeApplication(Request $request){
    $validatedData = $request->validate([
        'name' => 'required',
        'fatherName' => 'nullable',
        'motherName' => 'nullable',
        'nid' => 'nullable',
        'passport' => 'nullable',
        'bid' => 'nullable',
        'mobile' => 'nullable',
        'email' => 'nullable',
        'birthdate' => 'nullable',
        'resident' => 'nullable',
        'service' => 'nullable',
        'presentHoldingNumber' => 'nullable',
        'presentVillage' => 'nullable',
        'presentPostOffice' => 'nullable',
        'presentPoliceStation' => 'nullable',
        'presentDistrict' => 'nullable',
        'permanentHoldingNumber' => 'nullable',
        'permanentVillage' => 'nullable',
        'permanentPostOffice' => 'nullable',
        'permanentPoliceStation' => 'nullable',
        'permanentDistrict' => 'nullable',
        'userImage' => 'nullable',
        'idVerificationImage' => 'nullable',
        'homeVerificationimage' => 'nullable',
        'deathVerificationimage' => 'nullable',
        
        // Add validation rules for other fields
    ]);
     $eightDigitUuid = '';
    for ($i = 0; $i < 8; $i++) {
    $eightDigitUuid .= mt_rand(0, 9);
}
    $cert = new Application;
    $cert->name = $request->filled('name') ? $validatedData['name'] : null;
    $cert->applicationId = $eightDigitUuid;
    $cert->FatherName = $request->filled('fatherName') ? $validatedData['fatherName'] : null;
    $cert->MotherName = $request->filled('motherName') ? $validatedData['motherName'] : null;
    $cert->nid = $request->filled('nid') ? $validatedData['nid'] : null;
    $cert->passport = $request->filled('passport') ? $validatedData['passport'] : null;
    $cert->bid = $request->filled('bid') ? $validatedData['bid'] : null;
    $cert->mobile = $request->filled('mobile') ? $validatedData['mobile'] : null;
    $cert->email = $request->filled('email') ? $validatedData['email'] : null;
    $cert->resident = $request->filled('resident') ? $validatedData['resident'] : null;
    $cert->service = $request->filled('service') ? $validatedData['service'] : null;
    $cert->birthdate = $request->filled('birthdate') ? $validatedData['birthdate'] : null;
    $cert->presentHoldingNumber = $request->filled('presentHoldingNumber') ? $validatedData['presentHoldingNumber'] : null;
    $cert->presentVillage = $request->filled('presentVillage') ? $validatedData['presentVillage'] : null;
    $cert->presentPostOffice = $request->filled('presentPostOffice') ? $validatedData['presentPostOffice'] : null;
    $cert->presentPoliceStation = $request->filled('presentPoliceStation') ? $validatedData['presentPoliceStation'] : null;
    $cert->presentDistrict = $request->filled('presentDistrict') ? $validatedData['presentDistrict'] : null;
    $cert->permanentHoldingNumber = $request->filled('permanentHoldingNumber') ? $validatedData['permanentHoldingNumber'] : null;
    $cert->permanentVillage = $request->filled('permanentVillage') ? $validatedData['permanentVillage'] : null;
    $cert->permanentPostOffice = $request->filled('permanentPostOffice') ? $validatedData['permanentPostOffice'] : null;
    $cert->permanentPoliceStation = $request->filled('permanentPoliceStation') ? $validatedData['permanentPoliceStation'] : null;
    $cert->permanentDistrict = $request->filled('permanentDistrict') ? $validatedData['permanentDistrict'] : null;

    if ($request->hasFile('userImage')) {
        $userImageName = uniqid().'.'.$request->userImage->extension();  
        $request->userImage->move(public_path('images'), $userImageName);
        $userImagePath = 'images/' . $userImageName;
        } else {
        $userImagePath = null;
        }
        if ($request->hasFile('idVerificationImage')) {
        $idVerificationImageName = uniqid().'.'.$request->idVerificationImage->extension();
        $request->idVerificationImage->move(public_path('images'), $idVerificationImageName);
        $idVerificationImageNamePath = 'images/' . $idVerificationImageName;
        } else {
        $idVerificationImageNamePath = null;
        }
        if ($request->hasFile('homeVerificationimage')) {
        $homeVerificationimageName = uniqid().'.'.$request->homeVerificationimage->extension();
        $request->homeVerificationimage->move(public_path('images'), $homeVerificationimageName);
        $homeVerificationimageNamePath = 'images/' . $homeVerificationimageName;
        } else {
        $homeVerificationimageNamePath = null;
        }
        if ($request->hasFile('deathVerificationimage')) {
        $deathVerificationimageName = uniqid().'.'.$request->deathVerificationimage->extension();
        $request->deathVerificationimage->move(public_path('images'), $deathVerificationimageName);
        $deathVerificationimageNamePath = 'images/' . $deathVerificationimageName;
        } else {
        $deathVerificationimageNamePath = null;
        }

        $cert->userImage = $userImagePath;
        $cert->idVerificationImage = $idVerificationImageNamePath;
        $cert->homeVerificationimage = $homeVerificationimageNamePath;
        $cert->deathVerificationimage = $deathVerificationimageNamePath;
        $cert->save();
    return response()->json([
            'message' => 'Application created successfully ',
        //      'data'=> $cert,
             'data'=> $cert,
            
        ], 201);
}
public function getApplications(){
    $applications = Application::all();
    return response()->json([
            'message' => 'All Applications ',
        //      'data'=> $cert,
             'data'=> $applications,
            
        ], 201);
    }
public function getApplicationById($id){
    $application = Application::find($id);
    return response()->json([
            'message' => 'Application ',
        //      'data'=> $cert,
             'data'=> $application,
            
        ], 201);
    }
public function getApplicationByService($service){
    $application = Application::where('service', $service)->get();
    return response()->json([
            'message' => 'Application ',
        //      'data'=> $cert,
             'data'=> $application,
            
        ], 201);
    }
public function getApplicationByApplicationId($applicationId){
    $application = Application::where('applicationId', $applicationId)->get();
    return response()->json([
            'message' => 'Application ',
        //      'data'=> $cert,
             'data'=> $application,
            
        ], 201);
    }
public function updateApplicationStatus(Request $request, $id){
    $application = Application::find($id);
    // if request status value is Approved
    if( $request->input('status') === 'Approved' ){
        $application->status = $request->status;
        $application->save();
        // transfer all data to certificate table
        $year = date('Y');
        $month = date('m');
        $serial = str_pad($application->id, 11, '0', STR_PAD_LEFT);
        $uid = $year . $month . $serial;
        
        $cert = new GenericCertificate;
        $cert->name = $application->name;
        $cert->certificateId = $uid;
        $cert->FatherName = $application->FatherName;
        $cert->MotherName = $application->MotherName;
        $cert->nid = $application->nid;
        $cert->passport = $application->passport;
        $cert->bid = $application->bid;
        $cert->mobile = $application->mobile;
        $cert->email = $application->email;
        $cert->resident = $application->resident;
        $cert->service = $application->service;
        $cert->birthdate = $application->birthdate;
        $cert->presentHoldingNumber = $application->presentHoldingNumber;
        $cert->presentVillage = $application->presentVillage;
        $cert->presentPostOffice = $application->presentPostOffice;
        $cert->presentPoliceStation = $application->presentPoliceStation;
        $cert->presentDistrict = $application->presentDistrict;
        $cert->permanentHoldingNumber = $application->permanentHoldingNumber;
        $cert->permanentVillage = $application->permanentVillage;
        $cert->permanentPostOffice = $application->permanentPostOffice;
        $cert->permanentPoliceStation = $application->permanentPoliceStation;
        $cert->permanentDistrict = $application->permanentDistrict;
        $cert->userImage = $application->userImage;
        $cert->idVerificationImage = $application->idVerificationImage;
        $cert->homeVerificationimage = $application->homeVerificationimage;
        $cert->deathVerificationimage = $application->deathVerificationimage;
        $cert->save();
        return response()->json([
            'message' => 'Application ',
        //      'data'=> $cert,
             'data'=> $cert,
            
        ], 201);
    }
    // if request status value is Rejected
    if( $request->input('status') === 'Rejected' ){
        $application->status = $request->status;
        $application->save();
        return response()->json([
            'message' => 'Application ',
        //      'data'=> $cert,
             'data'=> $application,
            
        ], 201);
    }
    // if request status value is Pending
    if( $request->input('status') === 'Pending' ){
        $application->status = $request->status;
        $application->save();
        return response()->json([
            'message' => 'Application ',
        //      'data'=> $cert,
             'data'=> $application,
            
        ], 201);
    }

    
    
    }
public function getApplicationByStatus($status){
    $application = Application::where('status', $status)->get();
    return response()->json([
            'message' => 'Application ',
        //      'data'=> $cert,
             'data'=> $application,
            
        ], 201);
    }
}
