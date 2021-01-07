<x-layout>
    <div class="container pt-custom ">
        <div class="row ">
            <div class="col-12">
                <h1 class="font-third text-uppercase font-weight-bold">Risultato ricerca per: {{$q}}</h1>  
            </div>
        </div>
        <div class="row">
           
            
            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4">
                    <div class="card-group">
                    @component('components.card', ['announcement'=>$announcement])
                            
                    @endcomponent
                    </div>
                </div>
                @endforeach

            {{-- <div class="col-12 col-md-4">
                <x-card-announcement
                a="{{ $announcement->id }}"
                title="{{$announcement->title}}"
                body="{{$announcement->body}}"
                date="{{$announcement->created_at->format('d/m/Y')}}"
                user="{{$announcement->user->name}}"
                name="{{$announcement->category->name}}"
                id="{{$announcement->category->id}}"
                price="{{$announcement->price}}"
                />
            </div> --}}
            
        </div> 
    </div>
</div>
</x-layout>