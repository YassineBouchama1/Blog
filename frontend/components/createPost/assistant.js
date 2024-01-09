
let chatgptBtn = document.getElementById('chatgpt')
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

                 The Text is : how to learn typscript.
                 
                 Please only return the artical ,
                 Please artical length should be min 20 word and max 30 word
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

            const messageElement = document.createElement("div");
            messageElement.classList.add("mb-2");
            messageElement.innerHTML = `<p id='think' class="absolute top-2 left-2  text-gray-700 rounded-lg py-2 px-4 flex justify-start items-center gap-x-1">Thinking
         <div class="flex items-center">
         <span class='h-1.5 w-1.5 bg-gray-300 rounded-full animate-bounce [animation-delay:-0.1s]'></span>
         <span class='h-1.5 w-1.5 bg-gray-300 rounded-full animate-bounce [animation-delay:-0.15s]'></span>
         <span class='h-1.5 w-1.5 bg-gray-300 rounded-full animate-bounce'></span>
         </div>
        </p>`;
            content.appendChild(messageElement);

        } else {
            // content.innerHTML = ''
            content.innerHTML = text
        }
    }


}
