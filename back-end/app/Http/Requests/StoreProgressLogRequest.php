<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgressLogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool Returns true if the user is authorized, false otherwise.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> The validation rules for the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'story_id' => 'required|exists:stories,id',
            'chapter_id' => 'required|exists:chapters,id,story_id,' . $this->story_id,
            'riddle_id' => 'required|exists:riddles,id,chapter_id,' . $this->chapter_id,
            'points' => 'required|integer'
        ];
    }
}
