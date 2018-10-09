<?php

namespace App\Http\Requests\User\Hrc;

use App\Http\Requests\Request;

class AnswerTestOnlineRequest extends Request
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
        $questionsId = [
            1, 2, 3, 4, 5, 6, 7, 8
        ];

        return [
            'question_id' => 'required|in:'.implode(',', $questionsId),
            'answer' => 'required|in:'.implode(',', [
                'A', 'B', 'C', 'D'
            ]),
        ];
    }

    public function messages()
    {
        return [
            // Nothing
        ];
    }
}