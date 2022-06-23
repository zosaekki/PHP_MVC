<!DOCTYPE html>
<html lang="en">
<title>detail</title>
<?php include_once "application/views/template/head.php"; ?>
<body>
    <h1>detail</h1>
    <?php if(($_SESSION[_LOGINUSER]->i_user) === $this->data->i_user) { ?>
        <div>
            <button id="btnDel" data-i_board=<?=$this->data->i_board?>>삭제</button>
            <a href="mod?i_board=<?=$this->data->i_board?>"><button>수정</button></a>
        </div>
    <?php }?>
    <div>글 번호 : <?=$this->data->i_board?></div>
    <div>제목 : <?=$this->data->title?></div>
    <div>내용 : <?=$this->data->ctnt?></div>
    <div>작성일 : <?=$this->data->created_at?></div>
    <div>수정일 : <?=$this->data->updated_at?></div>
    <div>글쓴이 : <?=$this->data->nm?></div>
    <!-- <?= print_r ($this)?> -->
    <hr>
    <h3>댓글</h3>
    <div>작성자 : <?=$this->reply->nm?></div>
    <div>내용 : <?=$this->reply->content?></div>
    <div>작성일 : <?=$this->reply->reply_at?></div>
    <form action="replyProc">
        
    </form>
</body>
</html>