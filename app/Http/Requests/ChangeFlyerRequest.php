<?php

namespace App\Http\Requests;

use App\Flyer;
use Illuminate\Foundation\Http\FormRequest;

class ChangeFlyerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Flyer::where([
                    'street' => $this->street,
                    'zip_code' => $this->zip_code,
                    'user_id' => $this->user()->id,
                ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'required|mimes:png,jpg,jpeg,bmp'
        ];
    }
}
