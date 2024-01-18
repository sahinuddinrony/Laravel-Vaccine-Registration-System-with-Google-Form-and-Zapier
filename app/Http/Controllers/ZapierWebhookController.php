<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VaccineCenter;
use App\Models\UserVaccineRegistration;

class ZapierWebhookController extends Controller
{
    public function handleWebhookRegistration(Request $request)
    {

        $vaccineCenter = VaccineCenter::query()->firstWhere('name', 'like', "%{$request->input('vaccine_center')}%");

        return $vaccineCenter->vaccineRegistrations()->create($request->except('vaccine_center'));

        // try {
        //     $data = $request->all();

        //     // Extract vaccine center ID from the selected option
        //     $vaccineCenterOption = $data['vaccine_center_id'];
        //     preg_match('/(\d+)/', $vaccineCenterOption, $matches);
        //     $vaccineCenterId = $matches[0];

        //     // dd($vaccineCenterId);

        //     // Extract relevant fields from the payload
        //     // $vaccineCenterId = $data['vaccine_center_id']; // Assuming this is provided in the payload
        //     $name = $data['name'];
        //     $phoneNumber = $data['phone_number'];
        //     $nid = $data['nid'];
        //     $email = $data['email'];


        //     // Create a new registration record
        //     $registration = UserVaccineRegistration::create([
        //         'vaccine_center_id' => $vaccineCenterId,
        //         'name' => $name,
        //         'phone_number' => $phoneNumber,
        //         'nid' => $nid,
        //         'email' => $email,
        //     ]);

        //     // Optional: Send a confirmation email or perform other actions

        //     return response()->json(['message' => 'Registration successful!']);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
    }
}
