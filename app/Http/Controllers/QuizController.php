<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuizController extends Controller
{
    public function index(): View
    {
        return view('quizzes.index', ['quizzes' => $this->quizzes()]);
    }

    public function show(int $id): View
    {
        $quiz = collect($this->quizzes())->firstWhere('id', $id);

        abort_if($quiz === null, 404);

        return view('quizzes.show', ['quiz' => $quiz]);
    }

    public function start(int $id): string
    {
        return "Rozpoczynasz quiz nr {$id}";
    }

    public function rules(): View
    {
        return view('rules');
    }

    public function acceptRules(Request $request): RedirectResponse
    {
        $request->session()->put('quiz_rules_accepted', true);

        return redirect()
            ->intended(route('quizzes.index'))
            ->with('success', 'Zasady zostały zaakceptowane.');
    }

    private function quizzes(): array
    {
        return [
            ['id' => 1, 'title' => 'Podstawy PHP', 'difficulty' => 'Łatwy'],
            ['id' => 2, 'title' => 'Stolice Europy', 'difficulty' => 'Średni'],
            ['id' => 3, 'title' => 'Kosmos', 'difficulty' => 'Trudny'],
        ];
    }
}