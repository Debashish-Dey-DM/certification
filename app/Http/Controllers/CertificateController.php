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
public function store(Requset $req){
    // $cert = new GenericCertificate;
    // $cert->name = $req->input('name');
    // $cert->FatherName = $req->input('FatherName');
    // $cert->MotherName = $req->input('MotherName');
    // $cert->nid = $req->input('nid');
    // $cert->passport = $req->input('passport');
    // $cert->bid = $req->input('bid');
    // $cert->mobile = $req->input('mobile');
    // $cert->email = $req->input('email');
    // $cert->resident = $req->input('resident');
    // $cert->birthdate = $req->input('birthdate');
    // $cert->presentHoldingNumber = $req->input('presentHoldingNumber');
    // $cert->presentVillage = $req->input('presentVillage');
    // $cert->presentPostOffice = $req->input('presentPostOffice');
    // $cert->presentPoliceStation = $req->input('presentPoliceStation');
    // $cert->presentDistrict = $req->input('presentDistrict');
    // $cert->permanentVillage = $req->input('permanentVillage');
    // $cert->permanentPostOffice = $req->input('permanentPostOffice');
    // $cert->permanentPoliceStation = $req->input('permanentPoliceStation');
    // $cert->permanentDistrict = $req->input('permanentDistrict');
    // $cert->save();

    return response()->json([
        'message' => 'Certificate created successfully ',
         'test'=> $req->input('name'),
        
    ], 201);
}

}
