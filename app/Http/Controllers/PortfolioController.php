 <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Contact;

class PortfolioController extends Controller
{
    public function index()
    {
        // 1. Fetch skills ordered by category to ensure proper grouping
        $skills = Skill::orderBy('category')->get()->groupBy('category');

        // 2. Fetch latest projects and ensure technologies are properly casted/decoded
        $projects = Project::latest()->get()->map(function ($project) {
            if (is_string($project->technologies)) {
                $project->technologies = json_decode($project->technologies, true) 
                    ?? array_map('trim', explode(',', $project->technologies));
            }
            return $project;
        });

        return view('portfolio', compact('skills', 'projects'));
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Explicitly pass validated data for mass-assignment security
        Contact::create($validated);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}