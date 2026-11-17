<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        Quiz::query()->delete();

        $quizzes = [
            [
                'title' => 'Podstawy PHP',
                'description' => 'Sprawdź znajomość podstawowej składni języka PHP.',
                'difficulty' => 'Łatwy',
                'is_published' => true,
                'questions' => [
                    [
                        'content' => 'Jak rozpoczyna się kod PHP?',
                        'points' => 1,
                        'answers' => [
                            ['content' => '<?php', 'is_correct' => true],
                            ['content' => '<php>', 'is_correct' => false],
                            ['content' => '<script php>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'content' => 'Który znak rozpoczyna nazwę zmiennej w PHP?',
                        'points' => 1,
                        'answers' => [
                            ['content' => '$', 'is_correct' => true],
                            ['content' => '#', 'is_correct' => false],
                            ['content' => '@', 'is_correct' => false],
                        ],
                    ],
                    [
                        'content' => 'Który operator łączy teksty w PHP?',
                        'points' => 1,
                        'answers' => [
                            ['content' => '.', 'is_correct' => true],
                            ['content' => '+', 'is_correct' => false],
                            ['content' => '&', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Stolice Europy',
                'description' => 'Sprawdź swoją wiedzę o państwach i stolicach Europy.',
                'difficulty' => 'Średni',
                'is_published' => true,
                'questions' => [
                    [
                        'content' => 'Jaką stolicę ma Portugalia?',
                        'points' => 1,
                        'answers' => [
                            ['content' => 'Lizbona', 'is_correct' => true],
                            ['content' => 'Porto', 'is_correct' => false],
                            ['content' => 'Madryt', 'is_correct' => false],
                        ],
                    ],
                    [
                        'content' => 'Które miasto jest stolicą Słowacji?',
                        'points' => 1,
                        'answers' => [
                            ['content' => 'Bratysława', 'is_correct' => true],
                            ['content' => 'Praga', 'is_correct' => false],
                            ['content' => 'Lublana', 'is_correct' => false],
                        ],
                    ],
                    [
                        'content' => 'Jaką stolicę ma Finlandia?',
                        'points' => 1,
                        'answers' => [
                            ['content' => 'Helsinki', 'is_correct' => true],
                            ['content' => 'Oslo', 'is_correct' => false],
                            ['content' => 'Sztokholm', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kosmos',
                'description' => 'Pytania dotyczące planet i Układu Słonecznego.',
                'difficulty' => 'Trudny',
                'is_published' => true,
                'questions' => [
                    [
                        'content' => 'Która planeta znajduje się najbliżej Słońca?',
                        'points' => 1,
                        'answers' => [
                            ['content' => 'Merkury', 'is_correct' => true],
                            ['content' => 'Wenus', 'is_correct' => false],
                            ['content' => 'Mars', 'is_correct' => false],
                        ],
                    ],
                    [
                        'content' => 'Jak nazywa się największa planeta Układu Słonecznego?',
                        'points' => 1,
                        'answers' => [
                            ['content' => 'Jowisz', 'is_correct' => true],
                            ['content' => 'Saturn', 'is_correct' => false],
                            ['content' => 'Neptun', 'is_correct' => false],
                        ],
                    ],
                    [
                        'content' => 'Która planeta jest znana jako Czerwona Planeta?',
                        'points' => 1,
                        'answers' => [
                            ['content' => 'Mars', 'is_correct' => true],
                            ['content' => 'Wenus', 'is_correct' => false],
                            ['content' => 'Uran', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($quizzes as $quizData) {
            $questions = $quizData['questions'];
            unset($quizData['questions']);

            $quiz = Quiz::create($quizData);

            foreach ($questions as $questionData) {
                $answers = $questionData['answers'];
                unset($questionData['answers']);

                $question = $quiz->questions()->create($questionData);
                $question->answers()->createMany($answers);
            }
        }
    }
}