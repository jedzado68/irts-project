<?php

namespace App\Http\Controllers;
use App\Models\Release;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class ReleaseController extends Controller
{
    public function index_regular()
    {
        $releases = Release::paginate(10);
        return view('releases.index_regular',  compact('releases'));
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
            "user_id" => 'required',
            "date" => 'required|date'
        ]);
    
        $newRelease = Release::create($data);
    
        \Log::info('New Release created', $newRelease->toArray());
    
        return back()->with('success', 'Record created successfully.');
    }
    
    public function update(Request $request, Release $release)
    {
        $data = $request->validate([
            "firstname" => 'required|string|max:255',
            "middlename" => 'required|string|max:255',
            "lastname" => 'required|string|max:255',
            "designation" => 'required|string|max:255',
            "section" => 'required|string|max:255',
            "division" => 'required|string|max:255',
            "employee_status" => 'required|string|max:255',
            "gender" => 'required|string|max:10',
            "user_id" => 'required',
            "date" => 'required|date'
        ]);
    
        // Update the record with new data
        $release->update($data);
          
        return redirect(route('releases.index_regular'))->with('success', 'Release Updated Successfully');

    }
    
    public function edit($id)
    {
        $release = Release::findorFail($id);
        return view('index_regular.edit', compact('release'));
    }

   
public function destroy(Release $release)

{
    $release->delete();
    return redirect(route('release.index_regular'))->with('success', 'Release Updated Successfully');
}

public function indexRegular()
{
    // Your logic to fetch data and return the view
    return view('releases.index_regular'); // Ensure this view exists
}
   
public function search(){
    return view('releases.search');
}

public function search2(Request $request)
{
    $query = $request->input('query');

    // Perform the search query on the Release model
    $releases = Release::where('firstname', 'LIKE', "%{$query}%")
                       ->orWhere('lastname', 'LIKE', "%{$query}%")
                       ->get();

    // Return the search results to a view
    return view('releases.index_regular', compact('releases', 'query'));
}

}
   
  

  


      
     
  
    



