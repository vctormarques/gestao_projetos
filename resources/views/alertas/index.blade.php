    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        
    @elseif(session()->has('success'))   
        <div class="success">       
            {{ session('success') }}  
        </div>  
    @endif 

    @if(session('message'))
        <div class="alert alert-success succes-alert">
            <p>{{session('message')}}</p>
        </div>
    @endif       