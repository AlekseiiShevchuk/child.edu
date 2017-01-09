<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Validation\Rule;

class CategoryRequest extends ApiRequest
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
    function rules()
    {
        $parentCategories = Category::getIDsArrayOfParentCategories();
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|max:32|unique:categories,name',
                    'parent_id' =>
                        [
                            'integer',
                            'nullable',
                            Rule::in($parentCategories)
                        ]
                ];

                break;
            case 'PUT':
            case 'PATCH':
                $currentName = $this->route('category')['original']['name'];
                return [
                    'name' =>
                        [
                            'required',
                            'max:32',
                            Rule::unique('categories')->ignore($currentName, 'name')
                        ],
                    'parent_id' =>
                        [
                            'integer',
                            'nullable',
                            Rule::in($parentCategories)
                        ]
                ];

                break;
            default:
                return [];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Category name is required',
            'name.unique' => 'Category name already exist',
            'name.max' => 'Category name is too long',
        ];
    }
}
