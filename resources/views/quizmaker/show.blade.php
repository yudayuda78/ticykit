<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        .correct {
            color: green;
            font-weight: bold;
        }
        .incorrect {
            color: red;
            font-weight: bold;
        }
        .hidden {
            display: none;
        }
        .question {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>{{ $generateSoal->judul }}</h1>
    <p>{{ $generateSoal->description }}</p>

    <form id="quizForm">
        @foreach($pertanyaans as $index => $pertanyaan)
            <div class="question" id="question-{{ $index }}">
                <h3>{{ $pertanyaan->pertanyaan }}</h3>
                <ul>
                    @foreach($pertanyaan->jawabangeneratesoal as $jawaban)
                        <li>
                            <label>
                                <input type="radio" name="question_{{ $index }}" 
                                       value="{{ $jawaban->id }}" 
                                       onclick="checkAnswer({{ $index }}, {{ $jawaban->is_correct ? 'true' : 'false' }}, this)">
                                {{ $jawaban->jawaban }}
                                <span class="feedback"></span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
        <div>
            <button type="button" onclick="prevQuestion()">Previous</button>
            <button type="button" onclick="nextQuestion()">Next</button>
        </div>
    </form>

    <script>
        let currentQuestionIndex = 0;
        const questions = document.querySelectorAll('.question');
        
        function showQuestion(index) {
            questions.forEach((q, i) => {
                q.classList.toggle('hidden', i !== index);
            });
        }

        function checkAnswer(questionIndex, isCorrect, radioButton) {
            const feedbackSpan = radioButton.nextElementSibling;

            if (isCorrect) {
                feedbackSpan.textContent = 'Jawaban Benar!';
                feedbackSpan.className = 'feedback correct';
            } else {
                feedbackSpan.textContent = 'Jawaban Salah.';
                feedbackSpan.className = 'feedback incorrect';
            }
        }

        function prevQuestion() {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                showQuestion(currentQuestionIndex);
            }
        }

        function nextQuestion() {
            if (currentQuestionIndex < questions.length - 1) {
                currentQuestionIndex++;
                showQuestion(currentQuestionIndex);
            }
        }

        // Initialize by showing the first question
        showQuestion(currentQuestionIndex);
    </script>
</body>
</html>
