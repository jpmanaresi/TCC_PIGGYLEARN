
  document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('validate-question');
    var button = document.getElementById('btnvalidar');
  
    button.addEventListener('click', function(event) {
      event.preventDefault();
      // Obter a resposta selecionada pelo usuário
      var answer = document.querySelector('input[name="answer"]:checked');
      var selectedAnswer = answer && answer.value;
      var questionId = document.querySelector('input[name="questionId"]');
  
      if (answer) {
        // Enviar a resposta para validação no servidor usando fetch
        var formData = new FormData();
        formData.append('answer', selectedAnswer);
        formData.append('questionId', questionId.value);
  
        fetch('/validate-answer', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: formData
        })
        .then(function(response) {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error('Erro ao validar a resposta');
          }
        })
        .then(function(response) {
          var correctAnswer = response.correctAnswer;
          console.log(response);
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
            console.log(response)
          }
  
          var answerInputs = document.querySelectorAll('input[name="answer"]');
          answerInputs.forEach(function(input) {
            input.readOnly = true;
          });
  
          // Redirecionar para a rota "next" no QuestionController
          form.id = 'next';
          form.action = '/questions/next';
          // Alterar texto do botão para "Continuar"
          button.value = 'Continuar';
          button.setAttribute('form', 'next');
          var continueButton = document.createElement('button');
          continueButton.textContent = 'Continuar';
          continueButton.type = 'submit';
          continueButton.className = button.className; // Copiar as classes do botão "BotaoAdicionarAula"
  
          // Adicionar o botão "Continuar" abaixo do botão de "Validar"
          button.parentNode.insertBefore(continueButton, button.nextSibling);
          form.appendChild(continueButton);
          button.style.display = 'none';
        })
        .catch(function(error) {
          // Resposta inválida
          // Adicionar classe errada à resposta selecionada
          answer.parentNode.classList.add('wronganswer');
          console.error(error);
        });
      }
    });
  });