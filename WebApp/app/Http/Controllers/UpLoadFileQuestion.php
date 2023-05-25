<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use League\Csv\Reader;

class UpLoadFileQuestion extends Controller
{
    //
    public function index()
    {
        $tests = Test::all();
        return view('admin.question.upLoadFile',['tests'=>$tests]);
    }
    public function processUpLoad(Request $request)
    {
        # code...
        $request->validate([
            
            'csv_file' => 'required|mimes:csv,txt|max:2048' // Quy tắc cho tệp tin CSV
        ]);
        // $path = $request->file('csv_file')->getRealPath();
        // dd($request->file('csv_file'));
        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');

            $handle = fopen($file->getPathname(), 'r');
            $header = fgetcsv($handle);
            // Skip the header row if needed
            // fgetcsv($handle);

            while (($data = fgetcsv($handle)) !== false) {
                // Access the data of each row
                // $name = $data[0];
                // $email = $data[1];
                Question::create([
                    'test_id'=>$request->input('test'),
                    'QuestionContent' => $data[0].'',
                    'OptionA' => $data[1].'',
                    'OptionB' => $data[2].'',
                    'OptionC' => $data[3].'',
                    'OptionD' => $data[4].'',
                    'CorrectOption'=>$data[5].''
                    
                ]);

                // Process the data as needed
            }

            fclose($handle);

            return redirect('admin/questions');
        }

        // return redirect()->back()->with('success', 'CSV file uploaded and processed successfully!');


















        // Xử lý tệp CSV ở đây
        // Ví dụ: đọc tệp CSV và lưu dữ liệu vào cơ sở dữ liệu

        // Lưu thành công, chuyển hướng hoặc thực hiện các hành động khác
        // return redirect()->back()->with('success', 'Tệp CSV đã được tải lên và xử lý thành công!');
    }
}