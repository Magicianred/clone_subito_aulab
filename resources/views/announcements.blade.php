<x-layout>
    <div class="container pt-custom ">
        <div class="row ">
            <div class="col-12">
                <h1 class="font-third text-uppercase font-weight-bold">{{$category->name}}</h1>
                
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
                
            </div>
            
            <div class="row justify-content-between">
                <div class="col-md-8">
                    {{$announcements->links()}}
                </div>
            </div>
            
        </div>
        
        
    </div>
</x-layout>