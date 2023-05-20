<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenericCertificate;
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
        'presentAddress.presentHoldingNumber' => 'nullable',
        'presentAddress.presentVillage' => 'nullable',
        'presentAddress.presentPostOffice' => 'nullable',
        'presentAddress.presentPoliceStation' => 'nullable',
        'presentAddress.presentDistrict' => 'nullable',
        'permanentAddress.permanentHoldingNumber' => 'nullable',
        'permanentAddress.permanentVillage' => 'nullable',
        'permanentAddress.permanentPostOffice' => 'nullable',
        'permanentAddress.permanentPoliceStation' => 'nullable',
        'permanentAddress.permanentDistrict' => 'nullable',
        'userImage' => 'nullable',
        'idVerificationImage' => 'nullable',
        'homeVerificationimage' => 'nullable',
        
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
    $cert->presentHoldingNumber = $request->filled('presentAddress.presentHoldingNumber') ? $validatedData['presentAddress']['presentHoldingNumber'] : null;
    $cert->presentVillage = $request->filled('presentAddress.presentVillage') ? $validatedData['presentAddress']['presentVillage'] : null;
    $cert->presentPostOffice = $request->filled('presentAddress.presentPostOffice') ? $validatedData['presentAddress']['presentPostOffice'] : null;
    $cert->presentPoliceStation = $request->filled('presentAddress.presentPoliceStation') ? $validatedData['presentAddress']['presentPoliceStation'] : null;
    $cert->presentDistrict = $request->filled('presentAddress.presentDistrict') ? $validatedData['presentAddress']['presentDistrict'] : null;
    $cert->permanentHoldingNumber = $request->filled('permanentAddress.permanentHoldingNumber') ? $validatedData['permanentAddress']['permanentHoldingNumber'] : null;
    $cert->permanentVillage = $request->filled('permanentAddress.permanentVillage') ? $validatedData['permanentAddress']['permanentVillage'] : null;
    $cert->permanentPostOffice = $request->filled('permanentAddress.permanentPostOffice') ? $validatedData['permanentAddress']['permanentPostOffice'] : null;
    $cert->permanentPoliceStation = $request->filled('permanentAddress.permanentPoliceStation') ? $validatedData['permanentAddress']['permanentPoliceStation'] : null;
    $cert->permanentDistrict = $request->filled('permanentAddress.permanentDistrict') ? $validatedData['permanentAddress']['permanentDistrict'] : null;
    $cert->userImage = $request->filled('userImage') ? $validatedData['userImage'] : null;
    $cert->idVerificationImage = $request->filled('idVerificationImage') ? $validatedData['idVerificationImage'] : null;
    $cert->homeVerificationimage = $request->filled('homeVerificationimage') ? $validatedData['homeVerificationimage'] : null;
    $cert->save();

    return response()->json([
            'message' => 'Certificate created successfully ',
             'data'=> $cert,
            
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
}
