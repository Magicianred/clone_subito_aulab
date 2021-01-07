      <x-layout>
        
        @if ($announcement)
        
        <div class="container my-5 py-5">
            <div class="row py-5 ">
                <div class="col-12">
                    <h1 class="font-weight-bold font-third ">Annunci da revisionare</h1>
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header h3 font-third text-uppercase font-weight-bold">Annuncio #{{$announcement->id}}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4 class="font-third text-uppercase font-weight-bold">Utente</h4>
                                </div>
                                <div class="col-md-10 font-third">
                                    #{{$announcement->user->id}},
                                    {{$announcement->user->name}},
                                    {{$announcement->user->email}},
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <h4 class="font-third text-uppercase font-weight-bold">Titolo</h4>
                                </div>
                                <div class="col-md-10 font-third">
                                    {{$announcement->title}},
                                    
                                    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <h4 class="font-third text-uppercase font-weight-bold">Descrizione</h4>
                                </div>
                                <div class="col-md-10 font-third">
                                    {{$announcement->body}},
                                    
                                    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <h4 class="font-third text-uppercase font-weight-bold">Immagini</h4>
                                </div>
                                <div class="col-md-10">
                                    
                                    @foreach ($announcement->images as $image)
                                    <div class="row mb-2">
                                        
                                        <div class="col-12 col-md-4">
                                            <img src="{{$image->getUrl(300, 150)}}" class="img-fluid rounded" alt="">
                                        </div>
                                        
                                        <div class="col-12 col-md-8 ">
                                            <p class="font-third mt-2">Violenza</p>
                                            <div class="progress ">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $image->violence }}%;" aria-valuenow="{{ $image->violence }}" aria-valuemin="0" aria-valuemax="100">{{ $image->violence }}%</div>
                                            </div>
                                            <p class="font-third mt-2">Esplicito</p>
                                            <div class="progress ">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $image->adult }}%;" aria-valuenow="{{ $image->adult }}" aria-valuemin="0" aria-valuemax="100">{{ $image->adult }}%</div>
                                            </div>
                                            <p class="font-third mt-2">Satira</p>
                                            <div class="progress ">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $image->spoof }}%;" aria-valuenow="{{ $image->spoof }}" aria-valuemin="0" aria-valuemax="100">{{ $image->spoof }}%</div>
                                            </div>
                                            <p class="font-third mt-2">Medicina</p>
                                            <div class="progress ">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $image->medical }}%;" aria-valuenow="{{ $image->medical }}" aria-valuemin="0" aria-valuemax="100">{{ $image->medical }}%</div>
                                            </div>
                                            <p class="font-third mt-2">Razzismo</p>
                                            <div class="progress ">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $image->racy }}%;" aria-valuenow="{{ $image->racy }}" aria-valuemin="0" aria-valuemax="100">{{ $image->racy }}%</div>
                                            </div>
                                            
                                            <div class="accordion my-3" id="accordionExample">
                                                <div class="card">
                                                  <div class="card-header" id="headingOne">
                                                    <h2 class="mb-0">
                                                      <button class="btn btn-link font-third font-weight-bold text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        Labels
                                                      </button>
                                                    </h2>
                                                  </div>
                                              
                                                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body font-third">
                                                        @if ($image->labels)
                                                        @foreach ($image->labels as $label)
                                                        
                                                        <li>{{$label}}</li>
                                                        @endforeach
                                                        
                                                        @endif
                                                    </div>
                                                  </div>
                                                </div>
                                               
                                                
                                              </div>
                                            
                                            
{{--                                             
                                            <b>Lables</b>
                                            <br>
                                            <ul>
                                                @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                
                                                <li>{{$label}}</li>
                                                @endforeach
                                                
                                                @endif
                                            </ul> --}}
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    @endforeach
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="row  mt-5 py-5">
                <div class="col-4">
                    <form action="{{route('revisor.reject',$announcement->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn bg-danger font-white text-uppercase font-weight-bold">rifiuta</button>
                    </form>
                </div>
                <div class="col-4 text-center">
                    <form action="{{route('revisor.accept',$announcement->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn bg-success font-white text-uppercase font-weight-bold">accetta</button>
                    </form>
                </div>
                
                <div class="col-4 text-right">
                    <a href="{{route('revisor.deleted',$announcement->id)}}"  type="submit" class="btn bg-third text-uppercase font-white font-weight-bold">Cestino</a>
                    
                </div>
            </div>
        </div>
        
    </div>
    @else
    
    <div class="container  pt-custom pb-5" style="height: 70vh;">
        <div class="row">
            <div class="div-12">
                <p class="h2 font-weight-bold font-third pb-5" >Non ci sono annunci da revisionare</p>
                <a href="{{route('revisor.deleted')}}"  type="submit" class="btn bg-third text-uppercase font-white font-weight-bold">Cestino</a>
                
                
            </div>
        </div>
    </div>
    
    @endif 
</x-layout> 