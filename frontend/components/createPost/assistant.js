
let chatgptBtn = document.getElementById('chatgpt')
let bot_creating_msg = document.getElementById('bot_creating')
let contentForBot = document.getElementById('content')

chatgptBtn.addEventListener('click', respondToUser)





// function conect with chatgpt
async function respondToUser() {
    console.log('chatbot')
    // chatbot logic
    const API_URL = 'https://api.openai.com/v1/chat/completions';
    // change key with you'rs
    const API_KEY = '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';


    //display msg thinging
    addBotThinking(true)

    const prompt = `i will give you a prompt to generate artical  from text i will end to you the text is

                 The Text is : ${title.value}.
                 
                 Please only return the artical ,
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
            console.log(data)
            //remove msg thinging
            //display msg bot
            addBotThinking(false, data.choices[0].message.content);

        })
        .catch(error => {

            // if there is an error display it in chat
            console.log('Oops something went wrong, Please try again .APi KEY', 'bg-red-50 text-red-500');


            //remove msg thinking
            addBotThinking(false)
        });





    //create msg that bot thinking
    function addBotThinking(reponded, text = '') {
        if (reponded) {

            bot_creating_msg.classList.remove('hidden')


        } else {
            // content.innerHTML = ''
            bot_creating_msg.classList.add('hidden')
            content.textContent = text
            content.value = text
        }
    }


}
