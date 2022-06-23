<!DOCTYPE html>
<html lang="en">
<title>detail</title>
<?php include_once "application/views/template/head.php"; ?>
<body>
    <h1>detail</h1>
    <?php if(isset(($_SESSION[_LOGINUSER]->i_user)) && $_SESSION[_LOGINUSER]->i_user === $this->data->i_user) { ?>
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
    <h3>댓글목록</h3>
    <?php foreach($this->reply as $item) { ?>
    <div>작성자 : <?=$item->nm?></div>
    <div>내용 : <?=$item->content?></div>
    <div>작성일 : <?=$item->reply_at?></div>
    <hr>
    <?php } ?>
    <h4>댓글작성</h4>
    <form action="replyProc" method="POST">
        <input type="hidden" name="i_board" value="<?=$this->data->i_board?>">
        <input type="hidden" name="nm" value="<?=$_SESSION[_LOGINUSER]->nm?>">
        <div>
            <textarea name="content"></textarea>
            <input type="submit" value="댓글작성">
        </div>
    </form>
</body>
</html>