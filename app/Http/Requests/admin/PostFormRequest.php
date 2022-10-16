<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        $rules = [
            'categorie_id' =>[
                'required',
                'integer'

            ],
            'name' =>[
                'required',
                'string',
                'max:200'
            ],
            'slug' =>[
                'required',
                'string',
                'max:200'
            ],
            'description' =>[
                'required',
                'string'
            ],
            'yt_iframe' =>[
                'nullable',
                'string'

            ],
            'meta_title' =>[
                'required',
                'string',
                'max:200'
            ],
            'meta_description' =>[
                'required',
                'string'
            ],
            'meta_keyword' =>[
                'required',
                'string'
            ],
            'status' =>[
                'nullable',
                
            ]

            ];
        return $rules;
    }
}
