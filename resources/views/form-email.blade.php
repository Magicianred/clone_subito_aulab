<x-layout>
    <div class="container pt-custom ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card pb-4">
                <div class="card-header bg-third font-white h4 font-weight-bold">Invia la tua candidatura!</div>
                    <div class="card-body">
                        <form action="{{ route('contacts.submit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Indirizzo Email</label>
                                <input type="string" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="body">Presentati in poche righe</label>
                                <textarea class="form-control" name="body" cols="30" rows="10">{{old('body')}}</textarea> 
                                
                            </div>
                            
                            
                            
                            
                            <button type="submit" class="btn btn-color-custom text-uppercase">Invia</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>


