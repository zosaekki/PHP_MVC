<?php
    namespace application\controllers;

    use application\models\BoardModel;

    class BoardController extends Controller {
        public function write() {
            $this->addAttribute(_TITLE, "WRITE");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/write.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            return "template/t1.php";
        }

        public function writeProc() {
            $param = [
                'i_user' => $_SESSION[_LOGINUSER]->i_user,
                'title' => $_POST['title'],
                'ctnt' => $_POST['ctnt']
            ];

            $model = new BoardModel();
            $model->insBoard($param);
            return "redirect:/board/list";
        }

        public function list() {
            $model = new BoardModel();
            //$this->list = $model->selBoardList();
            $this->addAttribute(_TITLE, "게시판");
            $this->addAttribute("list", $model->selBoardList());
            $this->addAttribute(_JS, ["board/list"]);
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/list.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            return "template/t1.php"; // view 파일명!!
        }

        public function detail() {
            $i_board = $_GET['i_board'];
            $model = new BoardModel();
            // print "i_board : ${i_board}";
            $param = ["i_board" => $i_board];
            $this->addAttribute(_TITLE, "detail");
            $this->addAttribute("data", $model->selBoard($param));
            $this->addAttribute("reply", $model->reply($param));
            $this->addAttribute("js", ["board/detail"]);
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/detail.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            return "template/t1.php";
        }
        
        public function replyProc() {
            $i_board = $_POST['i_board'];
            $nm = $_POST['nm'];
            $uid = $_POST['uid'];
            $upw = $_POST['upw'];
            $content = $_POST['content'];

            $param = [
                'i_board' => $i_board,
                'nm' => $nm,
                'uid' => $uid,
                'upw' => $upw,
                'content' => $content
            ];
            $model = new BoardModel();
            $model->insReply($param);
            return "redirect:/board/detail?i_board={$i_board}";
        }

        public function mod() {
            $i_board = $_GET['i_board'];
            $model = new BoardModel();
            $param = ["i_board" => $i_board];
            $this->addAttribute("data", $model->selBoard($param));

            $this->addAttribute(_TITLE, "수정");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("board/mod.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            return "template/t1.php";
        }

        public function modProc() {
            $i_user = $_SESSION[_LOGINUSER]->i_user;
            $i_board = $_POST['i_board'];
            $title = $_POST['title'];
            $ctnt = $_POST['ctnt'];

            $param = [
                'i_user' => $i_user,
                'i_board' => $i_board,
                'title' => $title,
                'ctnt' => $ctnt
            ];
            $model = new BoardModel();
            $model->updBoard($param);

            // return "redirect:/board/list";
            return "redirect:/board/detail?i_board={$i_board}";
        }

        public function del() {
            $i_user = $_SESSION[_LOGINUSER]->i_user;
            $i_board = $_GET['i_board'];
            $param = [
                'i_user' => $i_user,
                'i_board' => $i_board
            ];

            $model = new BoardModel();
            $model->delBoard($param);
            return "redirect:/board/list"; // Controller.php
        }
    }