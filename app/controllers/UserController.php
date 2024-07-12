<?php 
	load(['UserForm'] , APPROOT.DS.'form');
	use Form\UserForm;
	class UserController extends Controller
	{

		public function __construct()
		{
			parent::__construct();

			$this->model = model('UserModel');
			
			$this->data['page_title'] = ' Users ';
			$this->data['user_form'] = new UserForm();
			$this->modelOrder = model('OrderModel');
		}

		public function index()
		{
			_requireAuth();
			$params = request()->get();

			if(!empty($params))
			{
				$this->data['users'] = $this->model->getAll([
					'where' => $params
				]);
			}else{
				$this->data['users'] = $this->model->getAll( );
			}

			return $this->view('user/index' , $this->data);
		}

		public function create()
		{
			_requireAuth();
			if(isSubmitted()) {
				$post = request()->posts();
				$post['is_active'] = true;

				$user_id = $this->model->create($post , 'profile');
				if(!$user_id){
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}
				return redirect( _route('user:show' , $user_id , ['user_id' => $user_id]) );
			}
			$this->data['user_form'] = new UserForm('userForm');

			$this->data['user_form']->setValue('user_type', 'staff');
			$this->data['daysoftheweek'] = dayOfWeeks();

			return $this->view('user/create' , $this->data);
		}

		public function edit($id)
		{
			_requireAuth();
			if(isSubmitted()) {
				$post = request()->posts();
				// dd($post);
				$res = $this->model->update($post , $post['id']);
				
				if($res) {
					Flash::set( $this->model->getMessageString());
					return redirect( _route('user:show' , $id) );
				}else
				{
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}
			}

			$user = $this->model->get($id);

			$this->data['id'] = $id;
			$this->data['user_form']->init([
				'url' => _route('user:edit',$id)
			]);

			$this->data['user_form']->setValueObject($user);
			$this->data['user_form']->addId($id);
			$this->data['user_form']->remove('submit');
			$this->data['user_form']->remove('user_type');

			$this->data['user_form']->add([
				'name' => 'password',
				'type' => 'password',
				'class' => 'form-control',
				'options' => [
					'label' => 'Password'
				]
			]);
			// dump($user);

			$this->data['daysoftheweek'] = dayOfWeeks();
			$this->data['user'] = $user;

			if(!isEqual(whoIs('user_type'), 'admin'))
				$this->data['user_form']->remove('user_type');

			return $this->view('user/edit' , $this->data);
		}

		public function show($id)
		{
			_requireAuth();
			$user = $this->model->get($id);

			if(!$user) {
				Flash::set(" This user no longer exists " , 'warning');
				return request()->return();
			}
			$this->data['user'] = $user;
			$this->data['is_admin'] = $this->is_admin;

			$this->data['orders'] = $this->modelOrder->all([
				'customer_id' => whoIs('id')
			], 'id desc');

			$this->data['req'] = request()->get();
			$this->data['id'] = $id;
			return $this->view('user/show' , $this->data);
		}

		public function profile() {
			$this->show(whoIs('id'));
		}

		public function sendCredential($id)
		{
			$this->model->sendCredential($id);
			Flash::set("Credentials has been set to the user");
			return request()->return();
		}
	}