<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //

    public function create ($course, $lesson, $id) {
        $test = Test::Find($id);
        $lesson = Lesson::Find($lesson);
        //return ($test);
        return view('courses.lessons.tests.questions.create', ['course' => $test->lesson->course, 'lesson' => $lesson, 'test' => $test]);
    }
    public function edit ($test, $id) {
        $question = Question::Find($id);
        $test = Test::Find($test);
        //return($question);
        return view('courses.lessons.tests.questions.create', ['test' => $test, 'question' => $question]);
    }

    public function store(Request $request) {
        $request->validate([
            'question' => 'required',
            'alt_1' => 'required',
            'alt_2' => 'required',
            'alt_3' => 'required',
            'alt_4' => 'required',
            'answer' => 'required'
        ]);

        $lastSeq = Question::where('test_id', $request->test_id)->orderByDesc('seq')->first()?->seq ?? 0;
        $question = new Question; 
        $question->seq = $lastSeq + 1;
        $question->question = $request->question;
        $question->alt_1 = $request->alt_1;
        $question->alt_2 = $request->alt_2;
        $question->alt_3 = $request->alt_3;
        $question->alt_4 = $request->alt_4;
        $question->answer = $request->answer;
        $question->test_id = $request->test_id;
        $question->save();

        $action= $request->action;
        //return ($request);
        if ($action==='create_and_new'){
            return redirect()->route('questions.create', ['course' => $question->test->lesson->course, 'lesson' => $question->test->lesson, 'test' => $question->test]);
        } else {
            
            return redirect()->route('tests.edit', ['lesson' => $question->test->lesson, 'test'=> $question->test_id]);
        }
    }
    public function update(Request $request, $id){
        $question = Question::FindOrFail($id);
        $question->update([
            'question' => $request->question,
            'alt_1' => $request->alt_1,
            'alt_2' => $request->alt_2,
            'alt_3' => $request->alt_3,
            'alt_4' => $request->alt_4,
            'answer' => $request->answer,
        ]);
        $action= $request->action;
        //return ($request);
        if ($action==='create_and_new'){
            return redirect()->route('questions.create', ['course' => $question->test->lesson->course, 'lesson' => $question->test->lesson, 'test' => $question->test]);
        }else{
            return redirect()->route('tests.edit',['lesson'=>$question->test->lesson, 'test'=> $question->test]);
        }
    }
    public function destroy($id)
    {
        $question = Question::find($id);

        //return($test->lesson->course->id);
        $question->delete();

        return redirect()->route('tests.edit', 
        ['course' => $question->test->lesson->course->id,
        'lesson'=> $question->test->lesson->id,
        'test'=> $question->test->id]); 

    }
    public function show($course,$lesson,$test,$question){
        $question = Question::FindOrFail($question); 
        return view('courses.lessons.tests.questions.show',['course'=> $course, 'lesson' => $lesson, 'test' => $test, 'question' =>$question]);
    }

    public function validateAnswer(Request $request)
{
    $questionId = $request->input('questionId');
    $selectedAnswer = $request->input('answer');
    $user = auth()->user();

    // Lógica para verificar se a resposta selecionada está correta
    $question = Question::find($questionId);
    $isCorrect = ($selectedAnswer == $question->answer);
    $user->user_questions()->syncWithoutDetaching([$questionId => ['passed' => $isCorrect]]);
       // Retorne a resposta em formato JSON
    return response()->json([
        'is_correct' => $isCorrect,
        'correctAnswer' => $question->answer
    ]);
    
}
public function next(Request $request){
    $question = Question::FindOrFail($request->questionId);
    $user= auth()->user();
    $nextQuestion = Question::where('test_id', $question->test_id)->where('seq', '>', $question->seq)->orderBy('seq')->first()?->id ?? 0; // Se for a última lição do curso, seta o valor para 0.
    //Se for a última questão do teste redireciona para a rota end.
    if ($nextQuestion == 0) {
        $test = Test::FindOrFail($question->test_id);
        $testcompleted = false;
        $totalQuestions = Question::where('test_id', $question->test_id)->orderByDesc('seq')->first()->seq;  
        $countPassedQuestions = $test->questions()
            ->whereHas('user_questions', function ($query) use ($user) {
                $query->where('user_id', $user->id)->where('passed', true);
            })->count();
                //Marca o teste como como passed dependendo se o usuário acertou todas as questões ou não.
                
        if($totalQuestions==$countPassedQuestions){        
        $user->user_tests()->updateExistingPivot($test->id, ['passed' => true]);
        } else {
            $user->user_tests()->updateExistingPivot($test->id, ['passed' => false]);
        }
        $isTestPassed = $user->user_tests()->where('test_id', $test->id)->value('passed');
        if ($isTestPassed) {
        // Teste passado, redirecionar para a próxima aula
            $user->user_lessons()->syncWithoutDetaching([
            $test->lesson->id => ['completed' => true]
        ]);
        $testcompleted = true;
    } else {
        // Teste não passado, redirecionar para a lição atual
        $testcompleted = false;
    }
    //return ($testcompleted);
    //return($isTestPassed);
        //Redireciona para a rota end do teste.
        return redirect()->route('tests.end', ['test' => $test->id]);
    }
    
    //Avançar para a próxima aula
    return redirect()->route('questions.show', [
        'course'=> $question->test->lesson->course_id,
        'lesson'=> $question->test->lesson->id,
        'test'=>$question->test->id,
        'question' =>$nextQuestion
    ]);

}
}
