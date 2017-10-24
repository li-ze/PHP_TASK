<?php
use \Model\EmpInfo;
use \Model\AffInfo;
use \Model\PosInfo;

class Controller_Action extends Controller
{

    public function action_list()
    {
        if (Input::method() == 'POST') {
            $e_id = Input::post('e_id');
            $query = \Model\EmpInfo::del_emp($e_id);
            return Response::redirect('action/list');
        }
        $data['info'] = \Model\EmpInfo::get_info();
        return Response::forge(View::forge('action/list', $data));
    }

    public function action_regist()
    {
        $data['add'] = \Model\EmpInfo::add_id();
        return Response::forge(View::forge('action/regist', $data));
    }

    public function action_edit($e_id)
    {
	    if (Input::method() == 'GET') {
		     $data['emp'] = \Model\EmpInfo::get_emp($e_id);
		     $data['aff'] = \Model\AffInfo::get_aff($e_id);
		     $data['pos'] = \Model\PosInfo::get_pos($e_id);
		     return Response::forge(View::forge('action/edit', $data));
	    }
	   else if (Input::method() == 'POST') {
            $e_id = Input::post('e_id');
            $e_name1 = Input::post('e_name1');
            $e_name2 = Input::post('e_name2');
            $affiliation = Input::post('affiliation');
            $a_id = \Model\AffInfo::get_aid($affiliation);
            $position = Input::post('position');
            $p_id = \Model\PosInfo::get_pid($position);
            $e_img = Input::post('e_img');
            $e_info = Input::post('e_info');
            $data = array(
                'e_id' => $e_id,
                'e_name1' => $e_name1,
                'e_name2' => $e_name2,
                'a_id' => $a_id,
                'p_id' => $p_id,
                'e_img' => $e_img,
                'e_info' => $e_info
            );
            $query = \Model\EmpInfo::up_emp($data);
            return Response::redirect('action/upconfirm/' . $e_id);
        }
        $data['emp'] = \Model\EmpInfo::get_emp($e_id);
        $data['aff'] = \Model\AffInfo::get_aff($e_id);
        $data['pos'] = \Model\PosInfo::get_pos($e_id);
        return Response::forge(View::forge('action/edit', $data));

    }
    public function action_detail($e_id)
    {
            $data['emp'] = \Model\EmpInfo::get_emp($e_id);
            $data['aff'] = \Model\AffInfo::get_aff($e_id);
            $data['pos'] = \Model\PosInfo::get_pos($e_id);
            return Response::forge(View::forge('action/detail', $data));
    }

        public function action_confirm()
    {
        if (Input::method() == 'POST') {
            $e_id = Input::post('e_id');
            $e_name1 = Input::post('e_name1');
            $e_name2 = Input::post('e_name2');
            $e_img = Input::post('e_img');
            $e_info = Input::post('e_info');
            $position = Input::post('position');
            $p_id = \Model\PosInfo::get_pid($position);
            $affiliation = Input::post('affiliation');
            $a_id = \Model\AffInfo::get_aid($affiliation);

            $data = array(

                'e_id' => $e_id,
                'e_name1' => $e_name1,
                'e_name2' => $e_name2,
                'a_id' => $a_id,
                'p_id' => $p_id,
                'e_img' => $e_img,
                'e_info' => $e_info
            );
            $query = \Model\EmpInfo::add_emp($data);

            return Response::redirect('action/done/' . $e_id);
        }

            $view = View::forge('action/confirm');
            return $view;
    }

    public function action_done($e_id)
    {
        $data['emp'] = \Model\EmpInfo::get_emp($e_id);
        $data['aff'] = \Model\AffInfo::get_aff($e_id);
        $data['pos'] = \Model\PosInfo::get_pos($e_id);
        return Response::forge(View::forge('action/done', $data));
    }
    public function action_upconfirm($e_id)
    {
        if (Input::method() == 'POST') {
            $e_id = Input::post('e_id');
            $e_name1 = Input::post('e_name1');
            $e_name2 = Input::post('e_name2');
            $affiliation = Input::post('affiliation');
            $a_id = \Model\AffInfo::get_aid($affiliation);
            $position = Input::post('position');
            $p_id = \Model\PosInfo::get_pid($position);
            $e_img = Input::post('e_img');
            $e_info = Input::post('e_info');
            $data = array(
                'e_id' => $e_id,
                'e_name1' => $e_name1,
                'e_name2' => $e_name2,
                'a_id' => $a_id,
                'p_id' => $p_id,
                'e_img' => $e_img,
                'e_info' => $e_info
            );
            $query = \Model\EmpInfo::up_emp($data);
            return Response::redirect('action/done/' . $e_id);}
        $data['emp'] = \Model\EmpInfo::get_emp($e_id);
        $data['aff'] = \Model\AffInfo::get_aff($e_id);
        $data['pos'] = \Model\PosInfo::get_pos($e_id);
        return Response::forge(View::forge('action/upconfirm', $data));
        return $view;
    }
}