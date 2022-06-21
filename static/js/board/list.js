(function () {
    const trList = document.querySelectorAll('tbody > tr');
    
    //dataset 사용방법 알기
    // const tr1 = trList[1];
    // console.log(tr1.dataset.i_board);
    
    /*
    trList.forEach(function (e) {
        const url = e.dataset.i_board;
        e.addEventListener('click', () => {
            location.href = `detail.php?i_board=${url}`;
        })
    })
    */

    trList.forEach(item => {
        item.addEventListener('click', e => {
            location.href = `detail?i_board=${item.dataset.i_board}`;
        })
    })
})(); // 변수 스코프 때문에 이렇게 씀, 충돌나지 않도록...