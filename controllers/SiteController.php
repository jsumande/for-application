<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Customers;
use app\models\Sales;
use yii\db\Query;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'inventory';
        //return $this->render('index');
        return $this->render('dashboard');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionDashboard()
    {
        $this->layout = 'inventory';

        return $this->render('dashboard');
    
    }

    public function actionReport() {
        $this->layout = 'inventory';

        $sales = new Sales;
        $customers = new Customers;
        $query = new Query;
        $items = [];
        $groupLists = [];
        $sales_id = 0;
        $x = 0;
        // $query->select([
        //         'c.id', 'c.customername']
        //         )  
        //     ->from('sales AS s')
        //     ->join('LEFT JOIN', 'customers AS c',
        //                 's.customerid = c.id')      
        //     ->join('LEFT JOIN', 'sales_items AS si', 
        //                 's.id = si.sales_id')
        //     ->groupBy('c.customername')
        //     ->LIMIT(10);
                
        // $command = $query->createCommand();
        // $data = $command->queryAll();

        $data = $customers->find()
                ->select(['id', 'customername'])
                ->all();

        if(isset(Yii::$app->request->queryParams['Sales'])) {
            $query->select([
                    's.id as sales_id',
                    's.date',
                    's.modeofpayment',
                    'c.id',
                    'c.customername',
                    's.soor',
                    'si.description',
                    'si.qty',
                    'si.item_unit_price',
                    '(si.qty * si.item_unit_price) AS amount',
                    's.totalcharge',
                    's.agent' 
                ])->from('sales AS s')
                ->join('LEFT JOIN', 'customers AS c',
                        's.customerid = c.id')      
                ->join('LEFT JOIN', 'sales_items AS si', 
                        's.id = si.sales_id')
                ->where(['c.id' => Yii::$app->request->queryParams['Sales']['customerid']]);
                //->groupBy(['s.id', 'si.description']);
            
            $command = $query->createCommand();
            $lists = $command->queryAll();

            //group the query pero sales_id
            foreach ($lists as $key => $value) {

                if($sales_id === $value['sales_id']) {
                    $groupLists[$x][] = $value; 
                } else {
                    $x++;
                    $groupLists[$x][] = $value;
                    $sales_id = $value['sales_id'];

                }

            }

            $y = 0;
            $tmp ='';

            // echo "<pre>";
            // var_dump($lists);exit;
            // var_dump($groupLists);exit;

            

            foreach ($groupLists as $key => $value) {

                $count = count($value);
                $tempArray = [];
                for($x = 0; $x < $count; $x++) {
                    if(isset($tempArray)) {
                        $tempArray[] .= "<td>". $value[$x]['date'] ."</td>
                                    <td>". $value[$x]['qty'] ."</td>
                                    <td>". $value[$x]['description'] ."</td>
                                    <td>". $value[$x]['item_unit_price'] ."</td>
                                    <td>". $value[$x]['amount'] ."</td>
                                    </tr>";
                    } else {
                        $tmp = $tempArray[0];
                

                        $tempArray[] = $tmp . "<tr><td>". $value[$x]['date'] ."</td>
                                    <td>". $value[$x]['qty'] ."</td>
                                    <td>". $value[$x]['description'] ."</td>
                                    <td>". $value[$x]['item_unit_price'] ."</td>
                                    <td>". $value[$x]['amount'] ."</td>
                                    </tr>";
                    }
                    
                } 

                $items[$key] = [
                    'label' => 'sales: ' . $value[0]['sales_id'] . ' - ' . $value[0]['date'],
                    'content' => 
                        "
                            <div class='row'>
                                <div class='col-md-12'>
                                    Date: ". $value[0]['date'] ."
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    Agent: ". $value[0]['agent'] ."
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    OR Number: ". $value[0]['soor'] ."
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    Total Charge: ". $value[0]['totalcharge'] ." 
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    Mode of Payment: ". $value[0]['modeofpayment'] ."
                                </div>
                            </div>
                            
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='table-responsive'>
                                        <table class='table table-bordered table-hover table-striped' >
                                            <thead>
                                                <tr>
                                                    <td>Date</td>
                                                    <td>Quantity</td>
                                                    <td>Description</td>
                                                    <td>Unit Price</td>
                                                    <td>Amount</td>
                                                </tr>
                                            </thead>
                                             " . implode($tempArray)
                                            . "
                                        </table>
                                    </div>
                                </div>
                            </div>
                            "
                ];
               
            }

            // echo "<pre>";
            // var_dump($items);
            // exit;
        }

        return $this->render('report', [
            'modelSales' => $sales,
            'data'       => $data,
            'items'      => $items,
            'client'     => (isset($lists[0]['customername']) ? $lists[0]['customername'] : '')
        ]);
        // return $this->render('report');
    }

    public function actionReportPerClient() {
        $this->layout = 'inventory';

        

    }

}
