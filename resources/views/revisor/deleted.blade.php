<x-layout>
    {{-- <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4">
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
                    <form action="{{route('revisor.undo',$announcement->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">recupera</button>
                        </form>
                </div>
                @endforeach
            </div>            
        </div>
    </div> --}}
<div class="container pt-custom pb-5">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome Annuncio</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Recupera</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($announcements as $announcement)
                        
                        <tr>
                            <th scope="row">{{ $announcement->id }}</th>
                            <td>{{$announcement->title}}</td>
                            <td>{{Str::limit($announcement->body,200)}}</td>
                            <td><form action="{{route('revisor.undo',$announcement->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn" ><i class="fas fa-trash-restore font-third"></i></button>
                                </form></td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
</x-layout>