<x-layout>
  <div class="container pt-custom pb-5">
    <div class="row">
      <div class="col-12 ">
        <h2 class="pb-5 font-third text-uppercase font-weight-bold ">Pubblica il tuo annuncio gratis!</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      {{-- <h3>debug::secret{{$uniqueSecret}}</h3> --}}

        
        <form action="{{route('announcement.create')}}" method="POST">
          @csrf
        <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
          <div class="form-group">
            <label for="title" class="font-third text-uppercase font-weight-bold">Titolo annuncio</label>
            <input type="string" class="form-control" name="title" value="{{old('title')}}" >
          </div>
          <div class="form-group " >
            <label for="price"class="font-third text-uppercase font-weight-bold">Prezzo annuncio</label>
            <input type="float" class="form-control" name="price" value="{{old('price')}}" >
          </div>
          <div class="form-group">
            <label for="body"class="font-third text-uppercase font-weight-bold">Inserisci la descrizione</label>
            <textarea class="form-control" name="body" cols="30" rows="10">{{old('body')}}</textarea> 
          </div>
          
          <div class="form-group">
            <label for="categories"class="font-third text-uppercase font-weight-bold">Categoria</label>
            
              
                <select name="category" >
                  
                  @foreach ($categories as $category)
                <option value="{{$category->id}}"{{old('category')==$category->id ? 'selected':''}}>{{$category->name}}</option>
                      
                  @endforeach
                </select>
                @error('category')
              <span class="invalid-feedback" role="alert">{{$message}}</span>
                    
                @enderror
              
            
          </div>

          <div class="form-group">
            <label for="images" class="font-third text-uppercase font-weight-bold">Immagini</label>
            <div class="col-md-12">
              <div class="dropzone" id="drophere"></div>
              @error('images')
              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    
              @enderror

            </div>
          </div>

          <span class="float-right"><button type="submit" class="btn btn-lg btn-color-custom text-uppercase font-weight-bold">Invia</button></span>
        </form>

        
        
      </div>
    </div>
  </div>
  
  
</x-layout>
