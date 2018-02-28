var c_answer = '';
var coins = 0;
function getApi() {
    var myURL = "https://opentdb.com/api.php?amount=10&category=15&difficulty=medium&type=multiple";

    $.getJSON(myURL, function(parameter) {
        var data = parameter.results;
        console.log(data);
        console.log(data[0].question)
        for (var i = 0; i < parameter.results.length; i++) {
            c_answer = data[i].correct_answer;
            document.getElementById("question").innerHTML = data[i].question;
            var answers = data[i].incorrect_answers.concat(data[i].correct_answer);

            function possibleAnswers(option) {
                document.getElementById(option).innerHTML = answers.splice(Math.floor(Math.random()*answers.length), 1)
            }
            possibleAnswers("answerA");
            possibleAnswers("answerB");
            possibleAnswers("answerC");
            possibleAnswers("answerD");
        }
    });
}

function showBtnText(val) {
    if(val == c_answer) {
        // console.log('correct_answer');
        // increase coins by 10 and move to the next question and show then
        // earned coin...
        $.get('increaseCoin.php', function(data) {
            alert('correct answer!');
            window.location = 'index.php';
        });
        // if the user presses stop button then redirect back to the home
        // with the earned money...
    } else {
        // console.log('wrong answer');
        // increase the counter of wrong answer and move to the next question
        // but if it is equal to 3 then redirect to home page and show score 0...
        alert('wrong answer!');
        $.get('increaseWA.php', function(data) {
            console.log(data);
            if(data.indexOf('lost') != -1) {
                // if the number of wrong answer has reched to 3...
                window.location = 'home.php';
            } else {
                // if it is a wrong answer but the number of wrong answer didn't
                // reached to 3
                window.location = 'index.php';
            }
        });

    }
}

getApi();
