<x-layout>    
    
    <header class="masthead">
        <div class="container h-100">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 d-flex ">
                    <h1 class="display-2  text-uppercase font-white font-weight-bold font-italic font-timmana  "><span class="font-timmana font-second "> P</span>resto </h1>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 col-md-8 offset-md-2">
                    <p class="font-timmana font-white h4">{{__('ui.descrizione')}} </p>
                </div>
                @guest
                <div class="col-12 col-md-8 offset-md-2 text-right pt-3">
                <a href="{{route('login')}}" class="btn btn-lg font-white font-weight-bold text-uppercase bg-third ">{{__('ui.annuncio')}}</a>
                </div>
                @else 
                <div class="col-12 col-md-8 offset-md-2 text-right pt-3">
                    <a href="{{route('announcement.new')}}" class="btn btn-lg font-white font-weight-bold text-uppercase bg-third ">{{__('ui.annuncio')}}</a>
                </div>
                @endguest

            </div>
        </div>
    </header>
   
    
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <h2 class="pb-5 font-third text-uppercase font-weight-bold ">{{__('ui.ultimi')}}</h2>
                <div class="row">
                    @foreach ($announcements as $announcement)
                    <div class="col-12 col-md-6 col-xl-4 ">
                        <div class="card-group">
                        @component('components.card', ['announcement'=>$announcement])
                            
                        @endcomponent
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    
</x-layout>
