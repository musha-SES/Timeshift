<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\i18n\FrozenDate;
use Cake\Chronos\Chronos;
use Cake\I18n\Date;
use PHPExcel_IOFactory;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xls as XlsReader;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Cake\Http\CallbackStream;

use PhpOffice\PhpSpreadsheet\Writer\Pdf;

/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 *
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface ($object = null, array $settings = [])
 */
class MembersController extends AppController
{

    public $paginate = [
		'limit' => 3 // 1ページに表示するデータ件数
	];


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $members = $this->paginate($this->Members);


        $this->set(compact('members'));
        // echo $this->Auth->user('role');
        if($this->Auth->user('role') == 'user'){
            $this->Flash->success(__('不正なURLです'));
            // $this->render('/Members/login');
            $id = $this->Auth->user('id');
            return $this->redirect(['action' => 'users',$id]);
        }

    }

    /**
     * View method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => ['Works'],
        ]);

        // $id = $this->Auth->user('id');
        // $work = $this->Works->find()->where(['member_id' => $id])->all();
        // print_r($work);
        $date = Date::now();

        //そのユーザーの最新のレコードのIDと退勤データの有無を取得
        $checkout[] =['','1'];
        $wid[] ='';
        foreach($member->works as $work){
            // echo $work->check_in;
            if($work->created == $date){
            $checkout[0]= $work->check_out;
            $checkin[0]= $work->check_in;
            $wid[0]=$work->id;
        }
        }
        // print_r($wid);
        // print_r($checkout);

        //最新の勤怠データに退勤がある場合
        if($checkout[0] !=''){
            $this->Flash->success(__('出勤していません'));
        }
            // print_r($this->Members->get($id)->id);


        $this->set('member', $member);
        $this->set('wid',$wid[0]);
        if(isset($checkin)){
            $this->set('checkout',$checkout[0]);
        }else{
            $this->set('checkout','1');
        }
    }

    /**
     * View method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function users($id = null)
    {
        $date = Date::now();

        try {
            // $this->paginate = [
            //     'contain' => ['Members'],
            // ];
            $member = $this->Members->get($id,[
            'contain' =>  $this->paginate = ['Works'],
        ]);
        // print_r($member);
        $checkout[] =['','1'];
        $wid[] ='';
        foreach($member->works as $work){
            // echo $work->check_in;
            if($work->created == $date){
            $checkout[0]= $work->check_out;
            $checkin[0]= $work->check_in;
            $wid[0]=$work->id;
        }
        }

            if($this->Members->get($id)->id !== $this->Auth->user('id') && $this->Auth->user('role') !== 'admin'){
                $this->Flash->success(__('不正なURLです'));
                $id = $this->Auth->user('id');
            return $this->redirect(['action' => 'users',$id]);
        }
            $this->set('member', $member);
            $this->set('wid',$wid[0]);
            $this->set('id',$id);
            if(isset($checkin)){
                $this->set('checkout',$checkout[0]);
            }else{
                $this->set('checkout','1');
            }
        } catch(\Exception $e) {
            // ここに例外が発生した際の処理を書く
            $this->Flash->success(__('不正なURLです'));
            $id = $this->Auth->user('id');
            return $this->redirect(['action' => 'users',$id]);
          }


    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $member = $this->Members->newEntity();
        if ($this->request->is('post')) {
            $member = $this->Members->patchEntity($member, $this->request->getData());
            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The member could not be saved. Please, try again.'));
        }
        $this->set(compact('member'));

        $gender = [1=>'男性', 2=>'女性', 3=>'その他'];

        $this->set('gender', $gender);
    }

    /**
     * Edit method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $member = $this->Members->patchEntity($member, $this->request->getData());
            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The member could not be saved. Please, try again.'));
        }
        $this->set(compact('member'));

        $gender = [1=>'男性', 2=>'女性', 3=>'その他'];

        $this->set('gender', $gender);
    }

    /**
     * Delete method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $member = $this->Members->get($id);
        if ($this->Members->delete($member)) {
            $this->Flash->success(__('The member has been deleted.'));
        } else {
            $this->Flash->error(__('The member could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $member = $this->Members->newEntity();
        if ($this->request->is('post')) {
            $member = $this->Members->patchEntity($member, $this->request->data);
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $id = $this->Auth->user('id');

                $this->Auth->setUser($user);

                if ($user["role"] == "user") {
                    return $this->redirect(["action" => "users", $id]);
                } else {
                    return $this->redirect($this->Auth->redirectUrl());
                }
            } else {
                $this->Flash->error(__('メールアドレスかパスワードが間違っています'));
            }
        }
        $this->set(compact($member));
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function download ($id=null){
        $date = Date::now();
        $today = date('d');

        $member = $this->Members->get($id, [
            'contain' => ['Works'],
        ]);
        // print_r($member);
        $this->loadModel('Works');
        $count=$this->Works->find()->where(['member_id'=>$id])->count();
        $spreadsheet = new Spreadsheet();

        // ファイルのプロパティを設定
        $spreadsheet->getProperties()
        ->setTitle('タイトル')
        ->setSubject('サブタイトル')
        ->setCreator('作成者')
        ->setCompany('会社名')
        ->setManager('管理者')
        ->setCategory('分類')
        ->setDescription('コメント')
        ->setKeywords('キーワード');
        $i=0;
        $counter = 0;
        $today = FrozenDate::now();

        // print_r($works->created);
        // for($i=1;$i<=$count;$i++){
        foreach (array_reverse($member->works) as $works){
            $kongetsu = new FrozenDate($works->created);
            if ($today->diffInMonths($kongetsu) ==0) {
                $i++;

                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('B'.($i+1), $i)
                ->setCellValue('C'.($i+1), date($works->created))
                ->setCellValue('E'.($i+1), $works->check_in)
                ->setCellValue('H'.($i+1), $works->check_out);
            }
            // }
        }
        $sheet = $spreadsheet->getActiveSheet();
        $sheet
        ->setCellValue('A1', $member->name)
        ->setCellValue('C1', '日時')
        ->setCellValue('E1', '出勤時間')
        ->setCellValue('H1', '退勤時間');

        // // テキストの中央寄せ
        // $sheet->getStyle('B1:C1')->applyFromArray(['alignment'=>['horizontal'=>Alignment::HORIZONTAL_CENTER]]);

        // // 列の横幅を設定
        $sheet->getColumnDimension('C')->setWidth(8);

        // // セルを連結
        // $sheet->mergeCells('D1:E1');

        // // テキストの縦寄せ
        // $sheet->getStyle('D1:E1')->getAlignment()->setVertical(Alignment::VERTICAL_TOP);

        // // テキストの折り返しを設定
        // $sheet->getStyle('D1')->getAlignment()->setWrapText(true);

        // // 配列の形で値を設定
        // $dataList = [
        //     [NULL, 2018, 2019, 2020],
        //     ['Q1', 10, 20, 30],
        //     ['Q2', 40, 50, 50],
        //     ['Q3', 60, 70, 80],
        //     ['Q4', 90, 100, 110],
        // ];
        // $sheet->fromArray($dataList, NULL, 'B6', true);

        // // 枠線を設定
        // $sheet->getStyle('B6:E10')->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN);

        // バッファをクリア
        ob_end_clean();

        $fileName = $id.'_'.$date."sample.xlsx";

        // ダウンロード
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
        header('Cache-Control: cache, must-revalidate');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit();
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');



        if (in_array($action, ['index','login','logout','users','download'])) {
            return true;
        }
        $id = (int)$this->request->getParam('pass.0');
        if(($id == $user['id'])) {
            if (in_array($action,['users'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public function initialize() {
        parent::initialize();

        $this->loadComponent('Paginator');
    }
}

