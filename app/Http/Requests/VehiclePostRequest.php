<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiclePostRequest extends FormRequest
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
            'vehicle_model' => 'required|min:2|max:50',
            'color' => 'sometimes|max:50',
            'vin' => 'required|size:17',
            'in_service' => 'boolean',
            'constructor_id' => 'numeric'
        ];
    }
}
