<x-layout>
    {{-- <div class="container pt-costum">
        <div class="row ">
            <div class="col-12 col-md-6 align-items-cente">
                <div class="card" style="width: 25rem;">
                    <img src="https://via.placeholder.com/150.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->title}}</h5>
                        <p class="card-text">{{$announcement->body}}</p>
                        <p class="card-text">{{$announcement->price}}</p>
                        <div class="card-footer text-small text-muted d-flex justify-content-between">
                            Categoria: {{$announcement->category->name}}
                            Creato il: {{$announcement->created_at->format('d/m/Y')}} - da: {{$announcement->user->name}}
                            
                        </div>
                        <a href="{{route('home')}}" class="btn btn-color-custom">torna alla home</a>
                    </div>
                </div>
            </div>
        </div>  
    </div> --}}
    
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1 class="font-second font-weight-bold font-italic ">{{ __('ui.dettaglio_annuncio') }}</h1>
            </div>
            
            <div class="col-12 col-md-4 mt-5">
                <div class="carousel-product">
                    @if (count($announcement->images) > 0)
      
                    @foreach ($announcement->images as $image)
                    <img src="{{ $image->getUrl(400, 300) }}" class="" alt="">
                    @endforeach 
                    
                    @else
                    
                    <img src="https://via.placeholder.com/400x300.png" alt=""> 
                   
                    @endif
                    
                    
                </div>
                
            </div>
            <div class="col-12 col-md-8 ">
                <h3 class="mt-5 font-third font-weight-bold ">{{$announcement->title}} <span class="float-right">{{$announcement->price}} €</span></h3>
                
                <p class="font-italic font-third" >{{$announcement->category->name}}</p>
                

                <p class="font-italic font-third" >{{__('ui.descrizione_annuncio') }}</p>
                <p class="h5 font-third">{{$announcement->body}}</p>
               
                
                
            <p class="small"><span>{{__('ui.venduto') }}</span> {{$announcement->user->name}} - {{$announcement->created_at->format('d/m/Y')}}</p>    
                
            </div>
            </div>
        </div>
    </x-layout>