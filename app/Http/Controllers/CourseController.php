<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
class CourseController extends Controller
{
    public function index() {
    
    $courses = Course::all();
    
    return view('index', ['courses' => $courses]);
    }

    public function create(){
        return view('courses.create');
    }


    public function store(Request $request) {
        $course= new Course;

        $course->course_title = $request->title;
        $course->course_description = $request->description;
        $user = auth()->user();
        $course->user_id = $user->id;

        $course->save();

        return redirect('/')->with('msg', 'Curso criado com sucesso!');
    }

    public function show($id) {

        $course = Course::findOrFail($id);

        $user = auth()->user();

        if($user) {

            $userEvents = $user->eventsAsParticipant->toArray();

            foreach($userEvents as $userEvent) {
                if($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }

        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('courses.show', ['course' => $course, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
        
    }


        public function dashboard() {

            $user = auth()->user();

            $courses = $user->courses;


            return view('courses.dashboard', 
                ['courses' => $courses]
            );

        }
    }