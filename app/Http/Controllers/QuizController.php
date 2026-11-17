<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuizController extends Controller
{
    public function index(): View
    {
        $quizzes = Quiz::query()
            ->where('is_published', true)
            ->withCount('questions')
            ->get();

        return view('quizzes.index', [
            'quizzes' => $quizzes,
        ]);
    }

    public function show(int $id): View
    {
        return view('quizzes.show', [
            'quiz' => $this->findQuiz($id),
        ]);
    }

    public function start(int $id): View
    {
        return view('quizzes.start', [
            'quiz' => $this->findQuiz($id),
        ]);
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

    private function findQuiz(int $id): Quiz
    {
        return Quiz::query()
            ->where('is_published', true)
            ->with('questions.answers')
            ->findOrFail($id);
    }
}