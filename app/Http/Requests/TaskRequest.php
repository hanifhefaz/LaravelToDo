<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            "title"=>'required',
            "description"=>'required',
            "status"=>'required',
            "category_id"=>'required',
        ];
    }

    public function messages()
    {

        return [
            "title.required" => "Please enter task's title",
            "description.required" => "Please enter task's description",
            "status.required" => "Please select the status of the task!",
            "category_id.required" => "Please select task's category!",
        ];
    }
}
