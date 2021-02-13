<?php



class DataController extends Controller
{
    /**
     * Данные из формы от пользователя
     *
     * @var [array]
     */
    public $data;



    public function index()
    {

        $this->data = Validator::ch_filter($_POST);

        if ((!Validator::chekData($this->data))) {

            $this->response();
            die();
        }

        $this->message('Заполните все поля!');
    }


    /**
     * Формирует вид ответа, если поля формы были заполнены
     *
     * @return void
     */
    public function response()
    {
        $this->view->path = 'data/fromform';

        $this->view->layout = 'data/fromform';

        $this->view->render('fform', $this->data);
    }


    /**
     * формирует сообщеие если поля не все заполнены в форме
     *
     * @param [string] $str
     * @return void
     */
    public function message($str)
    {
        $this->view->path = 'data/error';

        $this->view->layout = 'data/error';

        $this->view->render('error', $str);
    }
}
