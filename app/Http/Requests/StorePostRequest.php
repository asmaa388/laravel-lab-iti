<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
                'title' =>['required','unique:posts', 'min:3'],
                'description' => ['required', 'min:10'],
                'user_id' => ['exists:users,id'] //to make sure that no one hacks you and send an id of post creator that doesn’t exist in the database
            
        ];

    }
    
    public function messages(){
            
        return[
            'title.required'=>'my custom message',
            'title.min'=>'my custom message for min rule',
        ];
        }
}
