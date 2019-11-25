const name = document.getElementById('name');
const tel = document.getElementById('tel');
const email = document.getElementById('email');
const select = document.getElementById('select');
const form = document.getElementById('offer__form');
const errorBox = document.getElementById('error');
const offerContent = document.getElementById('offerContent');


form.addEventListener('submit',(e) => {
  let messages = [];
  if(name.value === ''||name.value == null){
    messages.push('Введите ваше имя');
    name.style.border = "2px solid red";
  }
  else{
    name.style.border = "none";
    name.style.borderBottom = "1px solid green";
  }
  if(tel.value === ''||tel.value == null){
    messages.push('Введите номер телефона');
    tel.style.border = "2px solid red";
  }
  else{
    tel.style.border = "none";
    tel.style.borderBottom = "1px solid green";
  }
  if(email.value === ''||email.value == null){
    messages.push('Введите Email');
    email.style.border = "2px solid red";
  }
  else{
    email.style.border = "none";
    email.style.borderBottom = "1px solid green";
  }
  if(select.value === ''||select.value == null){
    messages.push('Выберите тур');
    select.style.border = "2px solid red";
  }
  else{
    select.style.border = "none";
    select.style.borderBottom = "1px solid green";
  }
  if(messages.length > 0){
    e.preventDefault();
    errorBox.innerText = messages.join(', ');
  }
  else{
    e.preventDefault();
    form.style.display = "none";
    errorBox.style.display = "none";
    offerContent.innerText = "Предложение выслано Вам на почту";
  }
});
