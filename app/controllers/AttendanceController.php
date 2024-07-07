<?php
    use Form\AttendanceForm;
use Services\UserService;

    load(['AttendanceForm'], APPROOT.DS.'form');
    class AttendanceController extends Controller
    {
        public $form, $model, $timelogPlusModel;

        public function __construct()
        {
            parent::__construct();
            $this->form = new AttendanceForm();
            $this->model = model('AttendanceModel');
            $this->timelogPlusModel = model('TimelogPlusModel');

            $this->data['form'] = $this->form;
        }

        public function index() {
            if(isEqual(whoIs('user_type'), UserService::ADMIN)) {
                $this->data['attendanceList'] = $this->model->getAll([
                    'order' => 'id desc',
                    'where' => [
                        'timesheet.user_id' => whoIs('id')
                    ]
                ]);
            } else {
                $this->data['attendanceList'] = $this->model->getAll([
                    'order' => 'id desc'
                ]);
            }
            
            $lastLog = $this->timelogPlusModel->getLastLog(whoIs('id'));
            $timelogAction = $this->timelogPlusModel->typeOfAction($lastLog);
            
            $this->data['timelog'] = [
                'action' => $timelogAction,
                'last' => $lastLog,
                'urlAction' => _route('attendance:index')
            ]; 

            $this->data['userService'] = new UserService;

            return $this->view('attendance/index', $this->data);
        }

        /**
         * timesheets that are for approval
         * can be seen here, managers can approve the lists
         * they will have special button
         */
        public function approval() {
            $req = request()->inputs();

            if(isset($req['action'])) {
                switch($req['action']) {
                    case 'approve':
                        $this->model->approve(unseal($req['timesheet']), $req['userId']);
                    break;

                    case 'cancel':
                        $this->model->cancel(unseal($req['timesheet']), $req['userId']);
                    break;
                }
            }
            $timesheets = $this->model->getAll([
                'where' => [
                    'status' => 'pending'
                ]
            ]);

            $this->data['timesheets'] = $timesheets;
            return $this->view('attendance/approval', $this->data);
        }

        public function create() {
            $req = request()->inputs();

            if(isSubmitted()) {
                $post = request()->posts();
                $post['created_by'] = whoIs('id');
                $isOk = $this->model->manualEntry($post);
                
                if(!$isOk) {
                    Flash::set($this->model->getErrorString(), 'danger');
                    return request()->return();
                } else {
                    Flash::set("Attendance Form Submitted");
                }

                return redirect(_route('attendance:index'));
            }
            $this->form->setValue('user_id', whoIs('id'));
            $this->data['form'] = $this->form;
            return view('attendance/create', $this->data);
        }

        public function log($userId) {
            $this->timelogPlusModel->log([
                'userId' => $userId,
                'device' => 'web'
            ]);

            return request()->return();
        }

        public function loggedIn() {
            $this->data['loggedUsers'] = $this->timelogPlusModel->getOngoing();
            $this->data['QRTokenService'] = new QRTokenService;
            $this->data['token'] = QRTokenService::getLatestToken(QRTokenService::LOGIN_TOKEN);
            return $this->view('attendance/logged_in', $this->data);
        }
    }