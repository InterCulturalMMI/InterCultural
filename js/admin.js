function sssrank(){
  var cacher = document.getElementById('ombremage');
  var jj = document.getElementsByClassName('lumieremage');
  if(cacher.classList.contains('lumieremage')){
    cacher.classList.remove('lumieremage');
    cacher.classList.add('apparition');
  }
  else{
    cacher.classList.remove('apparition');
    cacher.classList.add('lumieremage');
  }
}