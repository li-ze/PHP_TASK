
<?php
use Model\Employee;
use Fuel\Core\Input;
use Fuel\Core\View;
use Fuel\Core\Response;
use Model\Affiliation;
use Model\Position;

class Controller_Employee extends \Fuel\Core\Controller{
	public function action_index() {
		$data = array();
		$data['employees'] = Employee::list_employee()->as_array();
		return View::forge('list', $data);
	}

    public function action_delete()
    {
  	  // 从页面获取要删除的员工 ID
  		  $employee_id = Input::get('employee_id');
        // 如果指定了员工 ID 就删除员工
  		if (!empty($employee_id)) {
	           $result = Employee::delete_employee($employee_id)  ;
        Response::redirect('/employee/index');
  	  }
	}


	public function action_regist(){
	    $mark =Input::param('mark');
	    $data =array();
	    $positions = \Model\Position::list_position()->as_array();
	    $affiliations = \Model\Affiliation::list_affiliation()->as_array();
        $data['positions']=$positions;
        $data['affiliations']=$affiliations;

        if($mark == 'insert'){
            $data['position_id'] = Input::param('position_id');
            $data['affiliation_id'] = Input::param('affiliation_id');
            $data['name'] = Input::param('name');
            $data['full_name'] = Input::param('full_name');
            $data['kana'] = Input::param('kana');
            $data['full_kana'] = Input::param('full_kana');
            $data['title'] = '社員情報入力';
            $data['position_condition'] = !empty(Input::param('position_id'));
            $data['affiliation_condition'] = !empty(Input::param('affiliation_id'));

            return View::forge('regist',$data);
        }
        else if($mark =='update'){
            $employee_id =Input::param('employee_id');
            $position_id = Input::param('position_id');
            $affiliation_id = Input::param('affiliation_id');
            $name = Input::param('name');
            $full_name = Input::param('full_name');
            $kana = Input::param('kana');
            $full_kana = Input::param('full_kana');
            $data['title'] = '社員情報編集';
            $data['position_condition'] = true;
            $data['affiliation_condition'] = true;
                if(!empty($name) && !empty($full_name) && !empty($kana) && !empty($full_kana)&& !empty($position_id)&& !empty($affiliation_id)){
                    $data['employee_id'] =$employee_id;
                    $data['position_id'] = $position_id;
                    $data['affiliation_id'] = $affiliation_id;
                    $data['name'] = $name;
                    $data['full_name'] = $full_name;
                    $data['kana'] = $kana;
                    $data['full_kana'] = $full_kana;
                }
                else{
                    $employees = Employee::get_employee($employee_id);
                    $data['employee_id'] =$employees[0]['employee_id'];
                    $data['position_id'] = $employees[0]['position_id'];
                    $data['affiliation_id'] = $employees[0]['affiliation_id'];
                    $data['name'] = $employees[0]['name'];
                    $data['full_name'] = $employees[0]['full_name'];
                    $data['kana'] = $employees[0]['kana'];
                    $data['full_kana'] = $employees[0]['full_kana'];
                }
                return View::forge('regist',$data);
    	}
	}

    public function action_confirm(){
        $mark = Input::post('mark');
        $position_id = Input::post('position_id');
        $affiliation_id = Input::post('affiliation_id');
        $name = Input::post('name');
        $full_name = Input::post('full_name');
        $kana = Input::post('kana');
        $full_kana = Input::post('full_kana');
        $affiliation = Affiliation::get_affiliation($affiliation_id)[0]['affiliation'];
        $position = Position::get_position($position_id)[0]['position'];
        $data =array(
            'position_id'=>$position_id,
            'affiliation_id'=>$affiliation_id,
            'position'=>$position,
            'affiliation'=>$affiliation,
            'name'=>$name,
            'full_name'=>$full_name,
            'kana'=>$kana,
            'full_kana'=>$full_kana,
        );
        if($mark =='update'){
            $data['title']='社員情報編集確認';
            $employee_id =Input::post('employee_id');
            $data['employee_id']=$employee_id;
          //  $data['data'] = 'mark=update&employee_id=' . $employee_id . '&name='. $name . '&kana=' . $kana . '&position_id=' . $position_id . '&affiliation_id=' . $affiliation_id;
       //  $data['data']='mark=update&employee_id ='.$employee_id.'&name ='.$name.'&full_name='.$full_name.'&kana='.$kana.'&full_kana='.$full_kana.'&position_id='.$position_id.'&affiliation_id ='.$affiliation_id;
            $data['data'] = 'mark=update'.'&employee_id='.$employee_id . '&name='. $name.'&full_name='.$full_name .'&kana='.$kana.'&full_kana='.$full_kana.'&position_id='.$position_id.'&affiliation_id='.$affiliation_id; ;
        }
        else if ($mark =='insert'){
            $data['data']='mark=insert&name='.$name.'&full_name='.$full_name.'&kana='.$kana.'&full_kana='.$full_kana.'&position_id='.$position_id.'&affiliation_id='.$affiliation_id;
            $data['title']='社員情報入力確認';
        }
        return View::forge('confirm',$data);
    }

    public function action_done(){
        $mark = Input::post('mark');
        $position_id = Input::post('position_id');
        $affiliation_id =Input::post('affiliation_id');
        $name = Input::post('name');
        $full_name = Input::post('full_name');
        $kana = Input::post('kana');
        $full_kana = Input::post('full_kana');
        $employee_props = array(
            // 单引号里面是表的一列的名字，箭头后面是要插入的值
            'position_id' => $position_id,
            'affiliation_id' => $affiliation_id,
            'name' => $name,
            'full_name' => $full_name,
            'kana' => $kana,
            'full_kana' => $full_kana,);
        if($mark =='update'){
            $employee_id = Input::post('employee_id');
            $employee_props['employee_id']=$employee_id;
            $result = Employee::update_employee($employee_props);
            $employee = Employee::get_employee($employee_id)->as_array()[0];
            $employee['mark']='update';


        }
        else if($mark=='insert'){
            $result = Employee::insert_employee($employee_props);
            $employee = Employee::get_employee($result[0])->as_array()[0];
            $employee['mark']='insert';
        }
        return View::forge('done',$employee);

    }


}