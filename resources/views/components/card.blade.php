<div id="card" class="card  mt-5 border-costum shadow "
style="width: 20rem;  ">
<div class="carousel-product">
    @if (count($announcement->images) > 0)
      
    @foreach ($announcement->images as $image)
    <img src="{{ $image->getUrl(300, 150) }}" class="" alt="">
    @endforeach 
    
    @else
    
    <img src="https://via.placeholder.com/300x150.png" alt=""> 
   
    @endif
    
    </div>
    <div class="card-body">
        <h5 class="card-title font-second font-weight-bold">{{$announcement->title}} </h5>
        
        <p class="card-text small">{{Str::limit($announcement->body,50)}}</p>
        <p class=" font-third font-weight-bold">{{ $announcement->price }}€</p>
        <div class="pb-2 small d-flex justify-content-between">
            <a class=" text-decoration-none"href="{{route('public.announcements.category' ,[$announcement->category->name, $announcement->category->id])}}">{{$announcement->category->name}}</a>
            <p>{{$announcement->createdAt}} </p>  
            
            
        </div>
        
        <a href="{{route('detail', ['id'=>$announcement->id])}}" class="btn btn-color-custom font-weight-bold btn-sm text-uppercase float-right">{{__('ui.dettaglio')}}</a>    
        
    </div>
</div>