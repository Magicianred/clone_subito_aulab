<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Mail\ContactMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;

use App\Jobs\GoogleVisionWatermark;
use App\Jobs\GoogleVisionLabelImage;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');  
        
        
        $categories = Category::all();
        View::share('categories',$categories);
    }
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function home()
    {
        return view('home');
    }
    
    public function announcements(Request $request)
    {
        $uniqueSecret=$request->old('uniqueSecret',base_convert(sha1(uniqid(mt_rand())),16,36));
        return view('announcement.new', compact('uniqueSecret'));
    }
    
    public function create(AnnouncementRequest $request)
    {
        
        $a = new Announcement();
        $a->title = $request->input('title');
        $a->body = $request->input('body');
        $a->price = $request->input('price');
        $a->user_id = Auth::id();
        $a->category_id = $request->input('category');
        $a->save();
        $uniqueSecret= $request->input('uniqueSecret');
        
        $images=session()->get("images.{$uniqueSecret}", []);
        $removedImages=session()->get("removedimages.{$uniqueSecret}",[]);
        $images=array_diff($images, $removedImages);
        foreach ($images as $image) {
            $i=new AnnouncementImage();
            $fileName = basename($image);
            $newFileName = "public/announcements/{$a->id}/{$fileName}";
            
            Storage::move($image, $newFileName );
           
            $i->file = $newFileName;
            $i->announcement_id = $a->id;
            $i->save();

            GoogleVisionSafeSearchImage::withChain([ 
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id), 
                new GoogleVisionWatermark($i->id),
                new ResizeImage($i->file, 300, 150),
                new ResizeImage($i->file, 400, 300),
                

               

            ])->dispatch($i->id);
        }
        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
        
        return redirect(route('thankyou2'));
    }
    
    public function email()
    {
        return view('form-email');
    }
    public function submit(Request $request)
    {
        $email=$request->input('email');      
        $body=$request->input('body');
        $contact=compact('email','body');
        Mail::to($email)->send(new ContactMail($contact));
        
        
        return redirect(route('thankyou'));
    }
    public function thankyou()
    {
        return view('thankyou');
    }
    public function thankyou2()
    {
        return view('thankyou2');
    }
    
    
    public function uploadImage(Request $request){
        
        // dd($request->input());
        
        $uniqueSecret = $request->input('uniqueSecret');
        
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");
        
        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));
        
        session()->push("images.{$uniqueSecret}" , $fileName);
        
        return response() -> json([
            
            
            'id'=>$fileName,
            
            ]
            
        );
    }
    public function removeImage(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->input('id');
        session()->push("removedimages.{$uniqueSecret}" , $fileName);
        Storage::delete($fileName);

        return response()->json('ok');
    }
    public function getImages(Request $request)
    {
        $uniqueSecret=$request->input('uniqueSecret');
        $images=session()->get("images.{$uniqueSecret}", []);

        $removedImages=session()->get("removedimages.{$uniqueSecret}",[]);
        $images=array_diff($images, $removedImages);

        $data=[];

        foreach ($images as $image){
            $data[]=[
                'id'=>$image,
                'src'=>AnnouncementImage::getUrlByFilePath($image, 120, 120)
            ];
        }
        

        return response()->json($data);
    }

}


