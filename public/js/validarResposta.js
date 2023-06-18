/*document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('validate-question');
    var button = document.getElementById('botaoAdicionarAula');
  
    button.addEventListener('click', function(event) {
      event.preventDefault();
  
      // Obter a resposta selecionada pelo usuário
      var answer = document.querySelector('input[name="answer"]:checked');
      var questionId = document.querySelector('input[name="questionId"]');
      if (answer) {
        // Enviar a resposta para validação no servidor usando uma requisição AJAX
        var formData = new FormData();
        formData.append('answer', answer.value);
        formData.append('questionId', questionId.value);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/validate-answer');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
  
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var isCorrect = xhr.responseText === 'correct';

                // Adicionar classe de estilo correta ou errada à resposta selecionada
                if (isCorrect) {
                  answer.parentNode.classList.add('correctanswer');
                } else {
                  var correctAnswer = document.querySelector('.correct_answer');
                  answer.parentNode.classList.add('wronganswer');
                  correctAnswer.parentNode.classList.add('correctanswer');
                }
              
                // Alterar texto do botão para "Continuar"
                button.textContent = 'Continuar';
              
                // Redirecionar para a rota "next" no QuestionController
                form.action = '/next';
              }
          }
        };
        console.log ([...formData]);
        xhr.send(formData);
      }
    });
  });*/

  document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('validate-question');
    var button = document.getElementById('botaoAdicionarAula');
  
    button.addEventListener('click', function(event) {
      event.preventDefault();
  
      // Obter a resposta selecionada pelo usuário
      var answer = document.querySelector('input[name="answer"]:checked');
      var selectedAnswer = answer && answer.value;
      var questionId = document.querySelector('input[name="questionId"]');

      if (answer) {
        // Enviar a resposta para validação no servidor usando uma requisição AJAX
        var formData = new FormData();
        formData.append('answer', selectedAnswer);
        formData.append('questionId', questionId.value);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/validate-answer');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
  
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              var response = JSON.parse(xhr.responseText);
              var correctAnswer = response.correctAnswer;
  
              if (selectedAnswer === correctAnswer) {
                // Resposta correta
                answer.parentNode.classList.add('correctanswer');
              } else {
                // Resposta incorreta
                // Adicionar classe correta à resposta correta
                var correctOption = document.querySelector(`input[value="${correctAnswer}"]`);
                if (correctOption) {
                  correctOption.parentNode.classList.add('correctanswer');
                }
                // Adicionar classe errada à resposta selecionada
                answer.parentNode.classList.add('wronganswer');
              }
            } else {
              // Resposta inválida
              // Adicionar classe errada à resposta selecionada
              answer.parentNode.classList.add('wronganswer');
            }
            // Redirecionar para a rota "next" no QuestionController
            //form.action = '/next';
            // Alterar texto do botão para "Continuar"
            button.value = 'Continuar';
          }
        };
  
        xhr.send(formData);
      }
    });
  });
  