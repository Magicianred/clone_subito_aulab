<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return true;
    }
    
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'title'=>'required|min:5|max:200',
            'body'=>'required|min:10|max:1000',
            'price'=>'required',
            'category' => 'required'
        ];
    }
    
    public function messages(){
        
        return [
            'title.required' => 'inserisci titolo',
            'title.min'=>'inserisci un titolo con almeno 5 caratteri',
            'title.max'=>'inserisci un titolo con massimo 50 caratteri',
            'body.required' => 'inserisci contenuto del post',
            'body.min'=>'inserisci una descrizione con almeno 10 caratteri',
            'body.max'=>'inserisci una descrizione con massimo 500 caratteri',
            
        ];
    }
}
