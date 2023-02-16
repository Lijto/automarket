<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAnnouncementRequest extends StoreUserAnnouncementRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
//        dd($this->all());
        $rules = [
            'photos' => ['sometimes', 'array'],
            'photos.*' => ['sometimes', 'string', 'max:300']
        ];
        return array_merge(parent::rules(), $rules);
    }
}
