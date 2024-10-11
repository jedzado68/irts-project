<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    // Show the form for employee logs
     public function employee_logs()
     {
      // Retrieve all logs from the database
         $logs = Log::paginate(4); // You can use pagination if needed, e.g., Log::paginate(10);
    
    //Pass the logs to the view
         return view('logs.employee_log', compact('logs')); // Adjust the view path accordingly
     }
    

    // Store the employee log data
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'date' => 'required|date',
            'purpose' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'complete_name' => 'required|string|max:255',
            'signature' => 'required|string', // Base64 encoded string
        ]);
    
        // Decode the base64 signature
        $signature = $request->signature;
        $signature = str_replace('data:image/png;base64,', '', $signature);
        $signature = str_replace(' ', '+', $signature);
        $signatureData = base64_decode($signature);
    
        // Create a unique filename for the signature
        $filename = 'signature_' . time() . '.png';
    
        // Save the signature image to the signatures directory
        $path = public_path('signatures/' . $filename);
        file_put_contents($path, $signatureData);
    
        // Create a new log entry
        Log::create([
            'date' => $request->date,
            'purpose' => $request->purpose,
            'location' => $request->location,
            'complete_name' => $request->complete_name,
            'signature' => $filename, // Save the filename instead of base64
        ]);
    
        // Redirect with a success message
        return redirect()->route('logs.employee_logs')->with('success', 'Log entry created successfully!');
    }
    
    public function showLogs()
{
    $logs = Log::all(); // Fetch all logs

    return view('logs.show_logs', compact('logs')); // Adjust the view path accordingly
}
public function employeeLog()
{
    // Return the view or handle the request here
    return view('logs.employee_log');
}

public function dashboard()
{
    // Return the view or handle the request here
    return view('jobs.dashboard');
}
}

    

