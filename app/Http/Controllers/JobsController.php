<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddJobRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Application;
use App\Models\User;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;    
    
class JobsController extends Controller
{
    public function add_job_form()
    {
        $categories = Category::all();
        return view('add_job', ['categories' => $categories]);
    }
    public function add_job(AddJobRequest $request)
    {
        if (Auth::check() && Auth::user()->role==2) 
        {
        
            $category = $request->category;
            $title = $request->title;
            $type = $request->type;
            $salary = $request->salary;
            $deadline = $request->deadline;
            $description = $request->description;

            $photo_name = null;
                if ($request->hasFile('photo') && $request->file('photo')->isValid()) 
                {
                    $photo = $request->file('photo');
                    $photo_name = $photo->hashName();
                    $photo->move("uploads/", $photo_name);
                }

            $user_id = Auth::id();

            $job = Job::create
            ([
                'user_id'=> $user_id,
                'category_id'=> $category,
                'title'=> $title,
                'type'=> $type,
                'description'=> $description,
                'salary'=> $salary,
                'deadline'=> $deadline,
                'photo'=> $photo_name,
            ]);

            return redirect('/dashboard')->with('message', 'Job created successfully!');
        }
        else
        {
            return redirect('/dashboard')->with('message', 'Login first to add a job.');

        }
    }

    public function job_list(Request $request)
    {
        // $jobs = Job::all();
        // $jobs = Job::paginate(3);
        // $id = Auth::user()->id; 
        $category_id = $request->category;
        if ($category_id) {
            $jobs = Job::where('user_id','$id' ,'category_id', $category_id)->paginate(3);
        }
        else{
            $jobs = Job::paginate(2);
        }
        
        // $jobs = Job::simplepaginate(3);
        $categories = Category::all();

        return view('jobs', ['jobs' => $jobs, 'categories'=> $categories]);
    }


    public function single_job($id)
    {
        $job = Job::find($id);
        return view ('single_job', ['job' => $job]);
    }
    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function applicants($id)
    {
        $job = Job::find($id);
        $applications = Application::where('job_id', $id)->get();
        return view('applicants', ['applications' => $applications, 'job' => $job]);
    }

    public function company(){
        $companies = Company::all();
        return view('company', ['companies'=>$companies]);
    }

    // public function company() {
    // $jobs = Job::all();
    // $companies = Company::all();
    // return view('jobs', ['jobs' => $jobs, 'company' => $companies]);
    // }

     public function destroy($id)
    {
        $job = Job::findOrFail($id);
        // Add similar permission checks as in the editJob method

        // If the user has permission, delete the job
        $job->delete();

        return redirect()->route('jobs')->with('success', 'Job deleted successfully.');
    }


//job update
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $categories = Category::all();
        return view('job_edit', compact('job', 'categories'));
    }

    public function update(Request $request, $id)
    {  
        $job = Job::findOrFail($id);
        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'deadline' => $request->deadline,
        ]);

        return redirect('jobs')->with('success', 'Job updated successfully');
    }
    public function apply_job_form($id)
    {
      $job = Job::find($id);
      return view('apply_job', ['job'=> $job]);
    }

    public function apply_job(Request $request)
    {
      $job_id= $request->input('job_id');
 $user_id = Auth::id();

    // Check if the user has already applied to this job
    $existing_application = Application::where('job_id', $job_id)
                                       ->where('user_id', $user_id)
                                       ->exists();

    if ($existing_application) {
        return redirect('jobs')->with('message', 'You have already applied to this job!');
    }
      $cover_letter = $request->input('cover_letter');

      $file_name = null;
      if($request->hasFile('attachment') && $request->file('attachment')->isValid()){
       $attachment = $request->file('attachment');
       $file_name = $attachment->hashName();
       $attachment->move('uploads/', $file_name);
      }
      
      $user_id = Auth::id();

       $application = Application:: create([
        'job_id' => $job_id, 
        'user_id'=> $user_id,
        'cover_letter' => $cover_letter,
        'attachment' => $file_name,
       ]);
        if($application){

          return redirect('jobs')->with('message', 'Application sent successfully!');
        }
        else{

          return redirect('jobs')->with('message', 'Application  unsuccessful!');
        }
    }

    public function showAllApplications()
{
    // Retrieve the authenticated user
    $user = Auth::user();

    // Check if the user is authenticated and has the role of a company user
    if ($user && $user->role == 2 && $user->company) {
        // Fetch jobs posted by the user (company user)
        $jobs = Job::where('user_id', $user->id)->with('applications.user')->get();

        // Collect applications from fetched jobs
        $applications = collect();
        foreach ($jobs as $job) {
            $applications = $applications->merge($job->applications);
        }

        // Pass the applications to the view
        return view('all_applications', compact('applications'));
    }

    // If the user is not authenticated or doesn't have the role of a company user, or the company is not associated, return empty
    return view('all_applications', ['applications' => collect()]);
}

// public function index()
// {
//     $categories = Category::all(); // Fetch all categories

//     // Assuming you're passing other data to the view as well
//     return view('company', compact('categories'));
// }



// class AppliedJobsController extends Controller
// {
//     public function index()
//     {
//         // Assuming you have a relationship set up between User and Job models
//         // and 'jobs' table has a 'user_id' column to store the user who applied for the job
//         $appliedJobs = auth()->user()->jobs()->paginate(10); // Fetch applied jobs for the currently logged-in user

//         return view('applied_jobs', compact('appliedJobs'));
//     }
// }

public function showCompanies()
    {
        // Fetch all companies from the database
        $companies = Company::all();

        // Pass the companies data to the view
        return view('company', ['companies' => $companies]);
    }

    public function index()
    {
        $user = auth()->user();
        $applications = $user->applications()->with('job')->get();
        return view('applied_jobs', compact('applications'));
    }

    // public function deleteApplication($id)
    // {
    //     // Find the application by ID
    //     $application = Application::find($id);

    //     // Check if the application exists
    //     if (!$application) {
    //         return redirect()->route('dashboard')->with('error', 'Application not found.');
    //     }

    //     // Delete the application
    //     $application->delete();

    //     // Redirect back to the dashboard with success message
    //     return redirect()->route('dashboard')->with('success', 'Application deleted successfully.');
    // }

//     public function applyJob(Request $request, $id) {
//     // Validate the form data
//     $request->validate([
//         'cover_letter' => 'required|string',
//         'attachment' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust file types and size as needed
//     ]);

//     // Save CV file to a directory
//     $cvFileName = time().'_'.$request->file('attachment')->getClientOriginalName();
//     $request->file('attachment')->move(public_path('cv_files'), $cvFileName);

//     // Store application details in the database
//     $application = new Application();
//     $application->job_id = $id;
//     $application->cover_letter = $request->input('cover_letter');
//     $application->cv_file = $cvFileName; // Save the CV file name or path
//     // Save other application details if any
//     $application->save();

//     // Redirect or return response as needed
// }

}
 

