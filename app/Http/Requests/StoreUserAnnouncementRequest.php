<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAnnouncementRequest extends FormRequest
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
        return [
            'state' => ['required', 'integer', 'exists:states,id'],
            'town' => ['required', 'integer', 'exists:towns,id'],
            'vehicle_type' => ['required', 'integer', 'exists:vehicle_types,id'],
            'vehicle_name' => ['required', 'integer', 'exists:vehicle_names,id'],
            'vehicle_model' => ['required', 'integer', 'exists:vehicle_models,id'],
            'fuel_type' => ['required', 'integer', 'exists:fuel_types,id'],
            'volume_of_engine' => ['required', 'integer', 'exists:volume_of_engines,id'],
            'transmission' => ['required', 'integer', 'exists:transmissions,id'],
            'vehicle_color' => ['required', 'integer', 'exists:colors,id'],
            'kilometres' => ['required', 'integer'],
            'owners' => ['required', 'integer'],
            'year' => ['required', 'integer', 'exists:years,id'],
            'price' => ['required', 'integer'],
            'text' => ['required', 'string', 'max:5000'],
            'photos' => ['required', 'array'],
            'photos.*' => ['required', 'string', 'max:300']
        ];
    }
}
