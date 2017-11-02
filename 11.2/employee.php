<?php
use Model\Employee;
use Fuel\Core\Input;
use Fuel\Core\View;
use Fuel\Core\Response;
use Model\Affiliation;
use Model\Position;

class Controller_Employee extends \Fuel\Core\Controller{
	public function action_list() {
		$data = array();
		$data['employees'] = Employee::list_employee()->as_array();
		$data['count'] = Employee::get_count();
		return View::forge('employee/list', $data);
	}

    public function action_delete()
    {

  		$e_id = Input::get('e_id');
  		if (!empty($e_id)) {
	           $result = Employee::delete_employee($e_id)  ;
         Response::redirect('employee/list');
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
            $data['p_id'] = Input::param('p_id');
            $data['a_id'] = Input::param('a_id');
            $data['e_name11'] = Input::param('e_name11');
            $data['e_name12'] = Input::param('e_name12');
            $data['e_name21'] = Input::param('e_name21');
            $data['e_name22'] = Input::param('e_name22');
            $data['title'] = '新規登録';
            $data['title1'] = '社員情報入力';
            $data['position_condition'] = !empty(Input::param('p_id'));
            $data['affiliation_condition'] = !empty(Input::param('a_id'));

            return View::forge('employee/regist',$data);
        }
        else if($mark =='update'){
            $e_id =Input::param('e_id');
            $p_id = Input::param('p_id');
            $a_id = Input::param('a_id');
            $e_name11 = Input::param('e_name11');
            $e_name12 = Input::param('e_name12');
            $e_name21 = Input::param('e_name21');
            $e_name22 = Input::param('e_name22');
            $data['title'] = '社員情報編集';
            $data['title1'] = '社員情報入力';
            $data['position_condition'] = true;
            $data['affiliation_condition'] = true;
                if(!empty($name11) && !empty($name12) && !empty($name21) && !empty($name22)&& !empty($p_id)&& !empty($a_id)){
                    $data['e_id'] =$e_id;
                    $data['p_id'] = $p_id;
                    $data['a_id'] = $a_id;
                    $data['e_name11'] = $e_name11;
                    $data['e_name12'] = $e_name12;
                    $data['e_name21'] = $e_name21;
                    $data['e_name22'] = $e_name22;
                }
                else{
                    $employees = Employee::get_employee($e_id);
                    $data['e_id'] =$employees[0]['e_id'];
                    $data['p_id'] = $employees[0]['p_id'];
                    $data['a_id'] = $employees[0]['a_id'];
                    $data['e_name11'] = $employees[0]['e_name11'];
                    $data['e_name12'] = $employees[0]['e_name12'];
                    $data['e_name21'] = $employees[0]['e_name21'];
                    $data['e_name22'] = $employees[0]['e_name22'];
                }
                return View::forge('employee/regist',$data);
    	}
	}

    public function action_confirm(){
        $mark = Input::post('mark');
        $p_id = Input::post('p_id');
        $a_id = Input::post('a_id');
        $e_name11 = Input::param('e_name11');
        $e_name12 = Input::param('e_name12');
        $e_name21 = Input::param('e_name21');
        $e_name22 = Input::param('e_name22');
        $affiliation = Affiliation::get_affiliation($a_id)[0]['affiliation'];
        $position = Position::get_position($p_id)[0]['position'];
        $data =array(
            'p_id'=>$p_id,
            'a_id'=>$a_id,
            'position'=>$position,
            'affiliation'=>$affiliation,
            'e_name11'=>$e_name11,
            'e_name12'=>$e_name12,
            'e_name21'=>$e_name21,
            'e_name22'=>$e_name22,
        );
        if($mark =='update'){
            $data['title']='社員情報編集確認';
            $e_id =Input::post('e_id');
            $data['e_id']=$e_id;
          //  $data['data'] = 'mark=update&employee_id=' . $employee_id . '&name='. $name . '&kana=' . $kana . '&position_id=' . $position_id . '&affiliation_id=' . $affiliation_id;
       //  $data['data']='mark=update&employee_id ='.$employee_id.'&name ='.$name.'&full_name='.$full_name.'&kana='.$kana.'&full_kana='.$full_kana.'&position_id='.$position_id.'&affiliation_id ='.$affiliation_id;
            $data['data'] = 'mark=update'.'&e_id='.$e_id . '&e_name11='. $e_name11.'&e_name12='.$e_name12 .'&e_name21='.$e_name21.'&e_name22='.$e_name22.'&p_id='.$p_id.'&a_id='.$a_id;
        }
        else if ($mark =='insert'){
            $data['data']='mark=insert&e_name11='. $e_name11.'&e_name12='.$e_name12 .'&e_name21='.$e_name21.'&e_name22='.$e_name22.'&p_id='.$p_id.'&a_id='.$a_id;
            $data['title']='社員情報入力確認';
        }
        return View::forge('employee/confirm',$data);
    }

    public function action_done(){
        $mark = Input::post('mark');
        $p_id = Input::post('p_id');
        $a_id =Input::post('a_id');
        $e_name11 = Input::post('e_name11');
        $e_name12 = Input::post('e_name12');
        $e_name21 = Input::post('e_name21');
        $e_name22 = Input::post('e_name22');
        $employee_props = array(
            // 单引号里面是表的一列的名字，箭头后面是要插入的值
            'p_id' => $p_id,
            'a_id' => $a_id,
            'e_name11'=>$e_name11,
            'e_name12'=>$e_name12,
            'e_name21'=>$e_name21,
            'e_name22'=>$e_name22,);
        if($mark =='update'){
            $e_id = Input::post('e_id');
            $employee_props['e_id']=$e_id;
            $result = Employee::update_employee($employee_props);
            $employee = Employee::get_employee($e_id)->as_array()[0];
            $employee['mark']='update';


        }
        else if($mark=='insert'){
            $result = Employee::insert_employee($employee_props);
            $employee = Employee::get_employee($result[0])->as_array()[0];
            $employee['mark']='insert';
        }
        return View::forge('employee/done',$employee);

    }


}