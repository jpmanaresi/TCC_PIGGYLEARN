<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Lesson;
class CourseController extends Controller
{
    public function index() {
    
    $courses = Course::all();
    
    return view('index', ['courses' => $courses]);
    }

    public function create(){
        $course = new Course();
        $lessons = collect([new Lesson()]);

        return view('courses.create', [
        'course' => $course->exists ? $course : null,
        'lessons' => $course->exists ? $course->lessons()->orderBy('seq')->get() : $lessons,
    ]);
    }

    public function edit($id){
        $course= Course::findOrFail($id);
        $lessons= Lesson::where('course_id',$course->id)->get()->toArray();
        return view('courses.create', [ 'id' => $id, 'course' => $course, 'lessons'=> $lessons]);
    }

    public function store(Request $request) {
        $course= new Course;

        $course->course_title = $request->title;
        $course->course_description = $request->description;
        $user = auth()->user();
        $course->user_id = $user->id;

        $course->save();

        if ($request->has('create_course_and_add_lesson')) {

        return redirect()->route('lessons.create', ['id' => $course->id]);

        }elseif ($request->has('concluir')) {
            return redirect()->route('cursos.index')->with('msg', 'Curso criado com sucesso!');
        } elseif ($request->has('adicionar_aula')) {

            return view('lessons.create', compact('course', 'lesson'));
        }
    }

    public function update(Request $request, $id)
{
    $curso = Curso::findOrFail($id);

    // verifica se o formulário está sendo utilizado para edição
    $isEdit = $request->input('is_edit') === 'true';

    // se for edição, atualiza os dados do curso
        if ($isEdit) {
            $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $course->update($validatedData);

         if ($request->has('create_course_and_add_lesson')) {

        return redirect()->route('lessons.create', ['id' => $course->id]);

        }elseif ($request->has('concluir')) {
            return redirect()->route('cursos.index')->with('msg', 'Edição no curso: '.$course->course_title.' realizada com sucesso!');
        } elseif ($request->has('adicionar_aula')) {

            return view('lessons.create', compact('course', 'lesson'));
        }
    } else {
        // se for criação, cria um novo curso
        $course = new Course([
            // campos do curso
        ]);
        $course->save();

        // redireciona para a página de criação de aula, passando o id do curso
         if ($request->has('create_course_and_add_lesson')) {

            return redirect()->route('lessons.create', ['id' => $course->id]);

        }elseif ($request->has('concluir')) {
            return redirect()->route('/dashboard')->with('msg', 'Curso criado com sucesso!');
        } elseif ($request->has('adicionar_aula')) {

            return view('lessons.create', compact('course', 'lesson'));
        }
    }
}

    public function show($id) {

        $course = Course::findOrFail($id);

        $user = auth()->user();
      
        return view('courses.show', ['course' => $course]);
        
    }


        public function dashboard() {

            $user = auth()->user();

            $courses = $user->courses;


            return view('courses.dashboard', 
                ['courses' => $courses]
            );

        }
    }