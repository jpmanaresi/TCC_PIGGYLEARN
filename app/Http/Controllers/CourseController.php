<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Test;
class CourseController extends Controller
{

    public function index() {
    $courses = Course::where('setvisible', '1')->get();
    
    return view('index', ['courses' => $courses]);
    
    }

    public function calculator(){
        return view('calc');
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
        if(auth()->user() != $course->user) {
            return redirect()->route('home');
        }
        return view('courses.create', [ 'id' => $id, 'course' => $course, 'lessons'=> $lessons]);
    }

    public function store(Request $request) {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            // Adicione outras validações necessárias
        ]);
        $course= new Course;

        $course->course_title = $request->title;
        $course->course_description = $request->description;
        $user = auth()->user();
        $course->user_id = $user->id;
        $course->setvisible = $request->filled('setvisible') ? $request->setvisible : false;
        $course->save();
        //var_dump($request->all());
        if ($request->action==='Criar Curso') {
            
        return redirect()->route('dashboard')->with('msg', 'Curso criado com sucesso!');
        // return ($course); 
        }elseif ($request->action==='Adicionar?') {
            //return ($course);
            return redirect()->route('lessons.create', ['id' => $course->id]);
        }

    }

    public function update(Request $request)
{
    $user = auth()->user();
    $data=$request->all();
    $course = Course::findOrFail($data['id']);

    // verifica se o formulário está sendo utilizado para edição
    $isEdit = $request->input('is_edit') === 'true';

    // se for edição, atualiza os dados do curso
        if ($isEdit) {

        $course->update([
        'course_title' => $request->input('title'),
        'course_description' => $request->input('description'),
        'setvisible' => $request->filled('setvisible') ? $request->setvisible : false
        ]);

        //var_dump($request->all());
         if  ($request->action==='Salvar Alterações') {

            return redirect()->route('dashboard')->with('msg', 'Edição no curso: '.$course->course_title.' realizada com sucesso!');

        }elseif ($request->has('create_course_and_add_lesson')) {

        return redirect()->route('lessons.create', ['id' => $course->id]);

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
            return redirect()->route('dashboard')->with('msg', 'Curso criado com sucesso!');
        } elseif ($request->has('adicionar_aula')) {

            return view('lessons.create', compact('course', 'lesson'));
        }
    }
}
public function destroy($id)
    {
        $user = auth()->user();
        $course = Course::find($id);

        $course->delete();

        return redirect()->route('dashboard')->with('msg', 'Curso: '.$course->course_title.' excluído com sucesso!');

    }

    public function show($id) {

        $course = Course::findOrFail($id);
        $user = auth()->user();
    
        // Buscar as lições completas do usuário no curso
        $completedLessons = $course->lessons()
            ->whereHas('user_lessons', function ($query) use ($user) {
                $query->where('user_id', $user->id)->where('completed', true);
            })
            ->get()
            ->toArray();
    
        // Buscar as lições incompletas do curso
        $incompleteLessons = $course->lessons()
            ->where(function ($query) use ($user) {
                $query->whereDoesntHave('user_lessons', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->orWhereHas('user_lessons', function ($query) use ($user) {
                    $query->where('user_id', $user->id)->where('completed', false);
                });
            })
            ->get()
            ->toArray();
    
        if ($course->setvisible <> 1) {
            return redirect()->route('home');
        }
    
        $hasJoined = $user->user_courses()
            ->where('course_id', $course->id)
            ->exists();
    
        if ($hasJoined) {
            $userhasjoined = true;
    
            $completed = $user->user_courses()
                ->where('course_id', $course->id)
                ->where('completed', true)
                ->exists(); 
    
            if ($completed) {
                $firstLesson = Lesson::where('course_id', $course->id)
                    ->orderBy('seq')
                    ->firstOrFail();
    
                $userhascompleted = true;
    
                return view('courses.show', [
                    'course' => $course,
                    'completelessons' => $completedLessons,
                    'incompletelessons' => $incompleteLessons,
                    'hasjoined' => $userhasjoined,
                    'completed' => $userhascompleted,
                    'firstlesson' => $firstLesson
                ]);
            } else {
                $nextLesson = Lesson::where('course_id', $course->id)
                ->where(function ($query) use ($user) {
                    $query->whereDoesntHave('user_lessons', function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    })->orWhereHas('user_lessons', function ($query) use ($user) {
                        $query->where('user_id', $user->id)
                            ->where('completed', false);
                    });
                })
                ->orderBy('seq')
                ->first();

    
                return view('courses.show', [
                    'course' => $course,
                    'completelessons' => $completedLessons,
                    'incompletelessons' => $incompleteLessons,
                    'hasjoined' => $userhasjoined,
                    'nextlesson' => $nextLesson
                ]);
            }
        }
    
        return view('courses.show', [
            'course' => $course,
            'completelessons' => $completedLessons,
            'incompletelessons' => $incompleteLessons
        ]);
    }
    

        public function dashboard() {

            $user = auth()->user();
            $courses = $user->courses;
            $completedCourses = $user->user_courses()
            ->where('completed', true)
            ->get()->toArray();
            $incompleteCourses = $user->user_courses()
            ->where('completed', false)
            ->get();
            //return($completedCourses);
            return view('courses.dashboard', 
                ['courses' => $courses, 'completedCourses' => $completedCourses, 'incompleteCourses' => $incompleteCourses]
            );

        }

        public function start($course) {
            $course= Course::findOrFail($course);
            //return ($course);
            $user= auth()->user();
            $user->user_courses()->syncWithoutDetaching([
                $course->id => ['completed' => false]
            ]);
            $firstLesson= Lesson::where('course_id', $course->id)->orderBy('seq')->firstOrFail();

            return redirect()->route('lessons.show',
            ['course'=>$course->id,
            'lesson' => $firstLesson->id
            ]);
        }
    }