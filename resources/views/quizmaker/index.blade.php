
<a href="{{ route('kumpulansoal') }}">Lihat Kumpulan Soal</a>
<a href="{{ route('mysoal') }}">My soal</a>



<form id="quizForm" action="/generatesoal" method="POST">
    @csrf
    <input type="text" name="judul" placeholder="Judul Quiz" required>
    <input type="text" name="description" placeholder="Deskripsi Quiz" required>
    
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    
    <div id="questions">
        <div class="question">
            <input type="text" name="questions[0][question_text]" placeholder="Pertanyaan" required>
            <div class="answers">
                <div>
                    <input type="text" name="questions[0][answers][0][answer_text]" placeholder="Jawaban" required>
                    <input type="checkbox" name="questions[0][answers][0][is_correct]"> Jawaban Benar
                    <button type="button" class="remove-answer" onclick="removeAnswer(this)">Hapus Pilihan Jawaban</button>
                </div>
            </div>
            <button type="button" onclick="addAnswer(this)">Tambah Jawaban</button>
            <button type="button" class="remove-question" onclick="removeQuestion(this)">Hapus Pertanyaan</button>
        </div>
    </div>

    <button type="button" onclick="addQuestion()">Tambah Pertanyaan</button>
    <button type="submit">Submit Quiz</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    let questionIndex = 1;

    function addQuestion() {
        let questionsDiv = document.getElementById('questions');
        let newQuestionDiv = document.createElement('div');
        newQuestionDiv.classList.add('question');
        newQuestionDiv.innerHTML = `
            <input type="text" name="questions[${questionIndex}][question_text]" placeholder="Question Text" required>
            <div class="answers">
                <div>
                    <input type="text" name="questions[${questionIndex}][answers][0][answer_text]" placeholder="Jawaban" required>
                    <input type="checkbox" name="questions[${questionIndex}][answers][0][is_correct]"> Jawaban Benar
                    <button type="button" class="remove-answer" onclick="removeAnswer(this)">Hapus Jawaban</button>
                </div>
            </div>
            <button type="button" onclick="addAnswer(this)">Tambah Pilihan Jawaban</button>
            <button type="button" class="remove-question" onclick="removeQuestion(this)">Remove Question</button>
        `;
        questionsDiv.appendChild(newQuestionDiv);
        questionIndex++;
    }

    function addAnswer(button) {
        let answersDiv = button.previousElementSibling;
        let answerIndex = answersDiv.children.length;
        let newAnswerDiv = document.createElement('div');
        newAnswerDiv.innerHTML = `
            <input type="text" name="questions[${questionIndex - 1}][answers][${answerIndex}][answer_text]" placeholder="Jawaban" required>
            <input type="checkbox" name="questions[${questionIndex - 1}][answers][${answerIndex}][is_correct]"> Jawaban Benar
            <button type="button" class="remove-answer" onclick="removeAnswer(this)">Hapus Pilihan Jawaban</button>
        `;
        answersDiv.appendChild(newAnswerDiv);
    }

    function removeQuestion(button) {
        button.parentElement.remove();
    }

    function removeAnswer(button) {
        button.parentElement.remove();
    }


    
</script>
