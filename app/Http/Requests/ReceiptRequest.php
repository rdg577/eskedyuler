<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReceiptRequest extends Request
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
            'starting_number' => 'required|numeric|less_than_or_equal:ending_number',
            'ending_number' => 'required|numeric',
            'series_number' => 'required'
        ];
    }
}
