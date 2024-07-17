<?php

namespace App\Http\Requests;

use App\Enums\CustomTypeEnum;
use App\Helpers\EnumHelper;
use App\Models\City;
use App\Models\Country;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:rfc,dns',
            'country_id' => 'required|integer|exists:' . Country::class . ',id',
            'city_id' => 'required|integer|exists:' . City::class . ',id',
        ];

        if ($this->isMethod('post')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['password'] = 'nullable|string|min:8|confirmed';
        }

        return $rules;
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }
}
