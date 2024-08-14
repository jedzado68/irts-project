<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index_job_order()
{
    // Fetch data if needed
    $jobs = Job::all(); // Example of fetching jobs data

    // Return the view with data if needed
    return view('jobs.index_job_order', compact('jobs'));
}

   
public function store(Request $request)
{
    \Log::info('Store method called', $request->all());

    $data = $request->validate([
        "firstname" => 'required|string|max:255',
        "middlename" => 'required|string|max:255',
        "lastname" => 'required|string|max:255',
        "designation" => 'required|string|max:255',
        "section" => 'required|string|max:255',
        "division" => 'required|string|max:255',
        "employee_status" => 'required|string|max:255',
        "gender" => 'required|string|max:10',
        "user_id" => 'required|integer',
        "date" => 'required|date'
    ]);

    try {
        $newJob = Job::create($data);
        return response()->json(['success' => true, 'message' => 'Job created successfully.']);
    } catch (\Exception $e) {
        \Log::error('Error creating job:', ['exception' => $e]);
        return response()->json(['success' => false, 'message' => 'Error creating job.'], 500);
    }
}

public function edit($id)

{
    $job = Job::findorFail($id);
    return view('index_job_order.edit', compact('job'));
}

public function update(Request $request, $id)
{
    \Log::info('Update method called', $request->all());

    // Validate the incoming data
    $data = $request->validate([
        "firstname" => 'required|string|max:255',
        "middlename" => 'required|string|max:255',
        "lastname" => 'required|string|max:255',
        "designation" => 'required|string|max:255',
        "section" => 'required|string|max:255',
        "division" => 'required|string|max:255',
        "employee_status" => 'required|string|max:255',
        "gender" => 'required|string|max:10',
        "user_id" => 'required|integer',
        "date" => 'required|date'
    ]);

    // Find the job by ID
    $job = Job::findOrFail($id);

    // Update the job with the validated data
    $job->update($data);

    \Log::info('Job updated successfully', ['id' => $id]);

    // Redirect or return a response
    return redirect()->route('job.index_job_order')->with('success', 'Job updated successfully.');
}


}

    
