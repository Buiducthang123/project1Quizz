<h3><a href="{{ route('history') }}">Lich su lam bai</a></h3>

<div style="display: flex; justify-content: center; align-items: center;">
    <div style="width: 300px; height: 300px; background-color: #1a0a75; border-radius: 20px">
        <div
            style="width: 100%; height: 100%; padding-top: 40px;">
            <div style="width: 100%; text-align: center; padding-top: 15px;">
                <h1 class="" style="color: aliceblue;font-size: 36px">
                    @if (session('score') == false)
                        Score: 0
                    @else
                       {{ session('score') }}
                    @endif
                    

                </h1>
               
            </div>
            <div style="width: 100%; text-align: center" >
                <h1 style="color:aliceblue;font-size: 28px">
                    @if (session('true_question'))
                        So cau tra loi dung: {{ session('true_question') }}
                    @endif
                </h1>
                

            </div>
        </div>
    </div>
</div>
