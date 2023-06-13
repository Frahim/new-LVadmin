<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandFormRequest extends FormRequest
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
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'description' => [
                'string'
            ],
            'other_description' => [
                'string'
            ],
            'about_brand' =>  [
                'string'
            ],
            'short_description' => [
                'string'
            ],
            'address' => [
                'string'
            ],
            'housenumber' => [
                'string'
            ],           
            'postalcode' => [
                'string'
            ],
            'city' => [
                'string'
            ],
            'phonenumber' => [
                'string'
            ],
            'mobile' => [
                'string'
            ],
            'email' => [
                'string'
            ],
            'logo' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'bandr_image' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'Vedio' => [
                'nullable',
                'mimes:jpg,jpeg,png,mp4'
            ],

            'meta_title' => [
                'string'
            ],
            'meta_keyword' => [
                'string'
            ],
            'meta_description' => [
                'string'
            ],

        ];
    }
}
