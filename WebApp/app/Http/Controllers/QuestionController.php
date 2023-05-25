<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Models\Result;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          //ham index
          $questions= Question::all();
          $test= Test::all();
          return view('admin.question.show',[
            'questions'=>$questions,
            'test'=>$test,
            'select_option'=>0
        ]);
    }
    public function search(Request $request)
    {
        # code...
        
        $a = $request->input('search');
        $test= Test::all();
        $b = $request->input('typeOfTest');
       
        if($b==0){
            $questions = Question::where('QuestionContent','like','%'.$a.'%')->get();
        }
        else{

            $questions = Question::where('test_id',$b)->where('QuestionContent','like','%'.$a.'%')->get();
        }
   

          return view('admin.question.show',[
            'questions'=>$questions,
            'test'=>$test,
            'select_option'=>$b
        ]);
        
        
    }
    public function findTest($id)
    {
        # code...
        //Lấy ra 40 item models ngẫu nhiên và giới hạn số lượng kết quả trả về là 40
         $question = Question::where('test_id',$id)->inRandomOrder()->take(40)->get();
        
        return view("exam",['questions'=>$question,'test'=>$id]);
    }

    public function checkCorrectOption(Request $request)
    {
        # code...
        $questions = Question::where('test_id',$request->input('test'))->get();
       
        $score = 0;
        $dtb = 10 / $questions->count();
        $true_question = 0;
        foreach ($questions as $value) {
            if ($request->input("ip_id" . $value->id) == $value->CorrectOption) {
                $score = $score + $dtb;
                $true_question++;
            }
        }
        
        $true_question = $true_question . "/" . $questions->count();

        Result::create([
                'user_id' =>auth()->user()->id,	
                'test_id'=>$request->input('test'),
                'DateTaken'=>'kb',
                'Score'=>round($score, 2),
                'Duration'=>50,
                'Status'=>1,
        ]);
        
        return redirect('question/result_exam')->with([
            'score' => $score,
            'true_question' => $true_question,
        ]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.question.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
      $question = new Question;
      $question->create($request->all());
    //   or
    //   Question::create($request->all());
      return redirect('admin/questions');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
       
        return view('admin.question.update',['question'=>$question]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
        $question->update($request->all());
        return redirect('admin/questions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
       
        $question->delete();
        return redirect('admin/questions');
    }
}
