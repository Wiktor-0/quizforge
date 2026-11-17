<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuizController extends Controller
{
    public function index(): View
    {
        return view('quizzes.index', [
            'quizzes' => $this->quizzes(),
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

    private function findQuiz(int $id): array
    {
        $quiz = collect($this->quizzes())->firstWhere('id', $id);

        abort_if($quiz === null, 404);

        return $quiz;
    }

    private function quizzes(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Podstawy PHP',
                'difficulty' => 'Łatwy',
                'description' => 'Sprawdź znajomość podstawowej składni języka PHP.',
                'questions' => [
                    [
                        'id' => 1,
                        'content' => 'Jak rozpoczyna się kod PHP?',
                        'answers' => [
                            '<?php',
                            '<php>',
                            '<script php>',
                        ],
                    ],
                    [
                        'id' => 2,
                        'content' => 'Który znak rozpoczyna nazwę zmiennej w PHP?',
                        'answers' => [
                            '$',
                            '#',
                            '@',
                        ],
                    ],
                    [
                        'id' => 3,
                        'content' => 'Które słowo służy do wyświetlania tekstu w PHP?',
                        'answers' => [
                            'echo',
                            'printText',
                            'show',
                        ],
                    ],
                ],
            ],
            [
                'id' => 2,
                'title' => 'Stolice Europy',
                'difficulty' => 'Średni',
                'description' => 'Sprawdź swoją wiedzę o państwach i stolicach Europy.',
                'questions' => [
                    [
                        'id' => 1,
                        'content' => 'Jaką stolicę ma Portugalia?',
                        'answers' => [
                            'Lizbona',
                            'Porto',
                            'Madryt',
                        ],
                    ],
                    [
                        'id' => 2,
                        'content' => 'Które miasto jest stolicą Słowacji?',
                        'answers' => [
                            'Bratysława',
                            'Praga',
                            'Lublana',
                        ],
                    ],
                    [
                        'id' => 3,
                        'content' => 'Jaką stolicę ma Finlandia?',
                        'answers' => [
                            'Helsinki',
                            'Oslo',
                            'Sztokholm',
                        ],
                    ],
                ],
            ],
            [
                'id' => 3,
                'title' => 'Kosmos',
                'difficulty' => 'Trudny',
                'description' => 'Pytania dotyczące planet i Układu Słonecznego.',
                'questions' => [
                    [
                        'id' => 1,
                        'content' => 'Która planeta znajduje się najbliżej Słońca?',
                        'answers' => [
                            'Merkury',
                            'Wenus',
                            'Mars',
                        ],
                    ],
                    [
                        'id' => 2,
                        'content' => 'Jak nazywa się największa planeta Układu Słonecznego?',
                        'answers' => [
                            'Jowisz',
                            'Saturn',
                            'Neptun',
                        ],
                    ],
                    [
                        'id' => 3,
                        'content' => 'Która planeta jest znana jako Czerwona Planeta?',
                        'answers' => [
                            'Mars',
                            'Wenus',
                            'Uran',
                        ],
                    ],
                ],
            ],
        ];
    }
}