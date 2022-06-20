<?php
    namespace application\controllers;

    use application\models\BoardModel;

    class BoardController extends Controller {
        public function list() {
            $model = new BoardModel();
            //$this->list = $model->selBoardList();
            $this->addAttribute("list", $model->selBoardList());
            return "board/list.php"; // view 파일명!!
        }
    }