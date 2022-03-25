<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'registration_no' => 'required|string|unique:vehicles|min:7|max:7',
            'capacity' => 'required|integer|min:1|max:5',
            'vehicle_type' => 'required|string|min:3'
        ];
    }
}
