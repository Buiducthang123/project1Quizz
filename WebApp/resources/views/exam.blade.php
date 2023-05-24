

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trac Nghiem Online ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               
                @if (session('score'))
                    <h1>{{session('score')}}</h1>
                
                    
                @endif
                <form action="{{ route('checkCorrectoption') }}" method="post">
                    @csrf
                    <div>
                        <ul>
                            
                            
                            @foreach ($questions as $question)
                                <li class="p-2">Cau {{$loop->index+1}}: {{$question->QuestionContent}}</li>
                                    <div class="block mb-4 ml-4" >
                                        <input type="radio" name="ip_id{{$question->id}}" id="question_id{{$question->id}} " value="{{$question->OptionA}}">
                                        <label class="ml-2" for="question_id{{$question->id}}">
                                            A.{{$question->OptionA}}</label>
                                    </div>
                                    <div class="block mb-4 ml-4" >
                                        <input type="radio" name="ip_id{{$question->id}}" id="question_id{{$question->id}} " value="{{$question->OptionB}}">
                                        <label class="ml-2"  for="question_id{{$question->id}}">
                                            B.{{$question->OptionB}}</label>
                                    </div>
                                    <div class="block mb-4 ml-4" >
                                        <input type="radio" name="ip_id{{$question->id}}" id="question_id{{$question->id}} " value="{{$question->OptionC}}">
                                        <label class="ml-2"  for="question_id{{$question->id}}">
                                            C.{{$question->OptionC}}</label>
                                    </div>
                                    <div class="block mb-4 ml-4" >
                                        <input type="radio" name="ip_id{{$question->id}}" id="question_id{{$question->id}} " value="{{$question->OptionD}}">
                                        <label class="ml-2"  for="question_id{{$question->id}}">
                                            D.{{$question->OptionD}}</label>
                                    </div>
                                   
                            @endforeach

                        </ul>
                        <input type="hidden" name="test" id="" value="{{$test}}">
                        <button type="submit" class=" bg-rose-900 border-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>