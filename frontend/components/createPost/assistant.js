
document.addEventListener('DOMContentLoaded', function () {


    let bot_creating_msg = document.getElementById('bot_creating')



    let yes_botBtn = document.getElementById('yes_bot')
    let robot_avatar = document.getElementById('robot_avatar')
    let popup_robot = document.getElementById('popup_robot')
    let no_botBtn = document.getElementById('no_bot')
    let bot_validator_msg = document.getElementById('bot_validator_msg')





    //controlle close or open popup
    title.addEventListener('input', function () {
        popup_robot.classList.add('scale-100');
    });

    no_botBtn.addEventListener('input', function () {
        popup_robot.classList.remove('scale-100');
        popup_robot.classList.add('scale-0');
    });


    robot_avatar.addEventListener('click', onToggle);

    // generate article
    yes_botBtn.addEventListener('click', respondToUser)

    function onToggle() {

        if (popup_robot.classList.contains('scale-0')) {
            popup_robot.classList.remove('scale-0');
            popup_robot.classList.add('scale-100');

        } else {
            popup_robot.classList.remove('scale-100');
            popup_robot.classList.add('scale-0');
        }

    }











    // function conect with chatgpt
    async function respondToUser() {
        console.log('chatbot')
        // chatbot logic
        const API_URL = 'https://api.openai.com/v1/chat/completions';
        // change key with you'rs
        const API_KEY = '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';


        if (title.value.trim() === '') {
            return bot_validator_msg.textContent = 'write title first'
        }

        //display msg thinging
        addBotThinking(true)

        const prompt = `i will give you a prompt to generate artical  from text i will end to you the text is

    The Text is : ${title.value}.
                 
    Please only return the artical ,
    Please only text even the text is one word just imagin random aricle ,
    `

        const requestOptions = {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
                'Authorization': `Bearer ${API_KEY}`
            },
            body: JSON.stringify({
                model: "gpt-3.5-turbo",
                max_tokens: 100,
                messages: [{
                    role: "user",
                    content: `${prompt}`
                }]
            })
        };

        fetch(API_URL, requestOptions)
            .then(res => res.json())
            .then(data => {
                console.log(data.choices[0].message.content.length)
                // hide popup
                onToggle()
                //remove msg thinging
                //display repond  bot
                addBotThinking(false);
                let contentAI = data.choices[0].message.content
                typeWriter(contentAI)
                bot_validator_msg.textContent = ''
            })
            .catch(error => {
                onToggle()
                // if there is an error display it in chat
                console.log('Oops something went wrong, Please try again .APi KEY', 'bg-red-50 text-red-500');


                //remove msg thinking
                addBotThinking(false)
            });


    }



    //create msg that bot thinking
    function addBotThinking(reponded) {
        if (reponded) {

            bot_creating_msg.classList.remove('hidden')


        } else {
            // content.innerHTML = ''
            bot_creating_msg.classList.add('hidden')

        }
    }


    let index = 0;

    function typeWriter(text) {
        if (index < text.length) {
            content.innerHTML += text.charAt(index);
            index++;
            setTimeout(function () {
                typeWriter(text);
            }, 50);
        }
    }



})