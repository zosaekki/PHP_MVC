<!DOCTYPE html>
<html lang="en">
<title>detail</title>
<?php include_once "application/views/template/head.php"; ?>
<body>
    <h1>detail</h1>
    <div>
        <button id="btnDel" data-i_board=<?=$this->data->i_board?>>삭제</button>
        <a href="mod?i_board=<?=$this->data->i_board?>"><button>수정</button></a>
    </div>
    <div>글 번호 : <?=$this->data->i_board?></div>
    <div>제목 : <?=$this->data->title?></div>
    <div>내용 : <?=$this->data->ctnt?></div>
    <div>작성일 : <?=$this->data->created_at?></div>
    <div>수정일 : <?=$this->data->updated_at?></div>
    <div>글쓴이 : <?=$this->data->nm?></div>

    <!-- <?= print_r ($this)?> -->
</body>
</html>