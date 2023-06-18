$(document).ready(function() {
    $('#validate-question').submit(function(e) {
        e.preventDefault(); // Impede o envio do formulário
        var selectedAnswer = $('input[name="answer"]:checked'); // Obtém a resposta selecionada
        var questionId = selectedAnswer.data('question-id'); // Obtém o ID da pergunta

        // Executa a requisição AJAX
        $.ajax({
            url: '/validate-answer',
            method: 'POST',
            data: {
                question_id: questionId,
                selected_answer: selectedAnswer.val()
            },
            success: function(response) {
                // Remove as classes CSS existentes
                $('input[name="answer"]').parent().removeClass('wronganswer correctanswer');

                // Aplica as classes CSS adequadas às respostas
                selectedAnswer.parent().addClass(response.is_correct ? 'correctanswer' : 'wronganswer');
                if (!response.is_correct) {
                    // Adiciona a classe CSS 'correctanswer' à resposta correta
                    $('input[name="answer"][value="' + response.correct_answer + '"]').parent().addClass('correctanswer');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
