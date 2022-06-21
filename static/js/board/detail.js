(function () {
    const btnDel = document.getElementById("btnDel")

    btnDel.addEventListener('click', e => {
      if (confirm('삭제하시겠습니까?')); {
        alert('삭제완료');
        location.href = `del?i_board=${btnDel.dataset.i_board}`;
        }
    });
})();

/*
const btnDel = document.querySelector('#btnDel');
const i_board = new URLSearchParams(location.search).get('i_board');

btnDel.addEventListener('click', function(){
  const del = confirm('삭제하시겠습니까?');
  if(del){
    location.href = `del?i_board=${i_board}`;
  }
})
*/