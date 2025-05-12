function readCode(dataz){
    
    let index=dataz.indexOf("Start");
    let endIndex=dataz.indexOf("End");
    let result=(dataz.slice(index+24,endIndex-5));
    return result;
}


function readContent(content){
    let Ztring; let Output;
    Ztring=document.getElementById("hid").textContent;
    
    let index=Ztring.indexOf("Start");
    let endIndex=Ztring.indexOf("End");
    
    let output=(Ztring.slice(index+16, endIndex));
    
    if(output.indexOf("Start")==-1){
        document.getElementById("output").textContent=output;
    }
    else{
        let newoutput;
        newoutput=readCode(output);
        document.getElementById("output").textContent=newoutput;
    }
}

function audioInput(){
const startBtn = document.getElementById('startBtn');
const output = document.getElementById('output');

// Check if the browser supports the Web Speech API
  const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

  if (!SpeechRecognition) {
      alert("Your browser does not support Speech Recognition. Try Chrome or Edge.");
  } else {
      const recognition = new SpeechRecognition();
      recognition.lang = 'en-US';         // Set language
      recognition.interimResults = false; // Only final results
      recognition.maxAlternatives = 1;    // Only best result
      
      recognition.start();
      startBtn.textContent = "🎙️ Listening...";

    
    recognition.addEventListener('result', (event) => {
        const transcript = event.results[0][0].transcript;
        output.textContent = `You said: "${transcript}"`
        //here/
        let shark=document.querySelector("form#tomatoe input[name=\"key\"]");
        shark.value=transcript;
        shark.form.submit();
          startBtn.textContent = "🎙️ Start Recording";
    });
    
    recognition.addEventListener('speechend', () => {
      recognition.stop();
      startBtn.textContent = "🎙️ Start Recording";
    });

    recognition.addEventListener('error', (event) => {
      output.textContent = `Error occurred: ${event.error}`;
      startBtn.textContent = "🎙️ Start Recording";
    });
  }};

