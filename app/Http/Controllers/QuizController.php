<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitQuizRequest;
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

    public function submit(SubmitQuizRequest $request, int $id): View
    {
        $quiz = $this->findQuiz($id);
        $selectedAnswers = $request->validated('answers');
        $score = 0;
        $results = [];

        foreach ($quiz->questions as $question) {
            $selectedAnswer = $question->answers->firstWhere(
                'id',
                (int) $selectedAnswers[$question->id]
            );

            $correctAnswer = $question->answers->firstWhere(
                'is_correct',
                true
            );

            $isCorrect = $selectedAnswer->is_correct;

            if ($isCorrect) {
                $score += $question->points;
            }

            $results[] = [
                'question' => $question,
                'selectedAnswer' => $selectedAnswer,
                'correctAnswer' => $correctAnswer,
                'isCorrect' => $isCorrect,
            ];
        }

        $maximumScore = $quiz->questions->sum('points');

        $percentage = $maximumScore > 0
            ? (int) round(($score / $maximumScore) * 100)
            : 0;

        return view('quizzes.result', [
            'quiz' => $quiz,
            'score' => $score,
            'maximumScore' => $maximumScore,
            'percentage' => $percentage,
            'results' => $results,
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