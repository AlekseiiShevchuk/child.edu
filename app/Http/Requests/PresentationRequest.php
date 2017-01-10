<?php

namespace App\Http\Requests;

class PresentationRequest extends ApiRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'title' => 'required|max:255',
                    'description' => 'required|max:2000',
                    'description_audio_file_path' => 'max:255',
                    'category_id' => 'required|integer|exists:categories,id',
                    'isActive' => 'sometimes|nullable|boolean',
                    'media_content_description' => 'sometimes|nullable|max:255',
                    'media_content_description_audio_file_path' => 'sometimes|nullable|max:255',
                    'media_content_image_file_path' => 'sometimes|nullable|max:255',
                    'media_content_youtube_video' => 'sometimes|nullable|max:1024',
                ];

                break;
            case 'PUT':
            case 'PATCH':
                return [
                    'title' => 'required|max:255',
                    'description' => 'required|max:2000',
                    'description_audio_file_path' => 'max:255',
                    'category_id' => 'required|integer|exists:categories,id',
                    'isActive' => 'sometimes|nullable|boolean',
                    'media_content_description' => 'sometimes|nullable|max:255',
                    'media_content_description_audio_file_path' => 'sometimes|nullable|max:255',
                    'media_content_image_file_path' => 'sometimes|nullable|max:255',
                    'media_content_youtube_video' => 'sometimes|nullable|max:1024',
                ];

                break;
            default:
                return [];
        }
    }

    public function messages()
    {
        return [
//            'name.required' => 'Category name is required',
//            'name.unique' => 'Category name already exist',
//            'name.max' => 'Category name is too long',
        ];
    }
}
