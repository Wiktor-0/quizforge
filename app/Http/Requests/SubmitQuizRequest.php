<?php

namespace App\Http\Requests;

use App\Models\Quiz;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubmitQuizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $quiz = Quiz::query()
            ->where('is_published', true)
            ->with('questions')
            ->findOrFail((int) $this->route('id'));

        $rules = [
            'answers' => [
                'required',
                'array',
                'size:' . $quiz->questions->count(),
            ],
        ];

        foreach ($quiz->questions as $question) {
            $rules['answers.' . $question->id] = [
                'required',
                'integer',
                Rule::exists('answers', 'id')
                    ->where('question_id', $question->id),
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'answers.required' => 'Zaznacz odpowiedzi na wszystkie pytania.',
            'answers.array' => 'Odpowiedzi mają nieprawidłowy format.',
            'answers.size' => 'Musisz odpowiedzieć na wszystkie pytania.',
            'answers.*.required' => 'Wybierz odpowiedź na to pytanie.',
            'answers.*.integer' => 'Wybrana odpowiedź jest nieprawidłowa.',
            'answers.*.exists' => 'Wybrana odpowiedź nie należy do tego pytania.',
        ];
    }
}