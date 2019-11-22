const name = document.getElementById('name');
const tel = document.getElementById('tel');
const email = document.getElementById('email');
const select = document.getElementById('select');
const form = document.getElementById('offer__form');
const errorBox = document.getElementById('error');

form.addEventListener('submit',(e) => {
  let messages = [];
  if(name.value === ''||name.value == null){
    messages.push('Введите ваше имя');
  }
  if(tel.value === ''||tel.value == null){
    messages.push('Введите номер телефона');
  }
  if(email.value === ''||email.value == null){
    messages.push('Введите Email');
  }
  if(select.value === ''||select.value == null){
    messages.push('Выберите тур');
  }
  if(messages.length > 0){
    e.preventDefault();
    errorBox.innerText = messages.join(', ');
  }
  else{
    alert('Предложение выслано Вам на почту');
  }
})
