<?php


use App\Models\User;
use App\Models\Problem;
use App\Models\Contest;
use App\Models\Code;
use App\Models\Submit;
use App\Models\Compileinfo;
use App\Models\Contestattend;


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;



class DatabaseSeeder extends Seeder {

	public static $uiddict = array();
	public static $piddict = array();
	public static $ciddict = array();
	public static $siddict = array();
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->call('UserTableSeeder');
        $this->call('ProblemTableSeeder');
	    $this->call('ContestTableSeeder');
	    $this->call('SubmitTableSeeder');
	    $this->call('CodeTableSeeder');
	    $this->call('CompileinfoTableSeeder');
	    $this->call('ContestattendTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Model::unguard();
		$this->command->info('UserTableSeeder start');
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('users')->truncate();
		
		$code=countriesCode();
		
		$OLD_NOJ_PWD_ENCODE_STRING = env('OLD_NOJ_PWD_ENCODE_STRING');

		$list = DB::connection('mysql2')->table('user')->leftJoin('userinfo', 'user.id', '=', 'userinfo.uid')->select('*', DB::raw('decode(pwd,\''.$OLD_NOJ_PWD_ENCODE_STRING.'\') as pwd'))->orderBy('id', 'asc')->get();
		
		$hash = array();
		$i=1;
		$n=count($list);

		foreach ($list as $item)
		{
	
			$country = 0;
			if(isset($code[$item->country])){
				$country=$code[$item->country];
			}
			
			if($item->email==''){
				continue;
			}
		
			$email = strtolower($item->email);
			$name = strtolower($item->name);
			$euser = User::where('email', '=', $email)->first();
			if($euser != null){
				continue;
			}
			$euser = User::where('name', '=', $name)->first();
			if($euser != null){
				continue;
			}
			if(isset($hash[$email]) || isset($hash[$name])){
				continue;
			}
			$hash[$email]=1;
			$hash[$name]=1;
			
	
			User::create([
		        'created_by'		   => 1,
		        'updated_by'		   => 1,
		        'created_at'		   => $item->regtime,
		        'updated_at'		   => $item->regtime,
		        'remember_token'       => '',
		        'password'    	       => bcrypt($item->pwd),
		        'passwordhash'         => User::encrypthash($item->pwd),
		        'email'    	           => $item->email,
				'emailprivate'    	   => $item->emailprivate,
		        'name'   	           => $item->name,
		        'screen_name'   	   => $item->name,
				'verified'    	       => $item->verified,
		        'submit'    	       => $item->submit,
				'solved'    	       => $item->solved,
				'gender'    	       => $item->gender,
		        'volume'    	       => $item->volume,
				'lang'    	           => $item->lang,
				'role'    	           => $item->role,
				'avatarfile'           => $item->avatarfile,
				'recoveryhash'    	   => $item->gphash,
		        'login_at'    	       => $item->logintime,
				'login_count'    	   => $item->logincount,
				'login_ip'    	       => $item->loginip,
				'nick'    	           => $item->nick,
				'nickcolor'    	       => $item->nickcolor,
				'register_at'    	   => $item->regtime,
				'register_ip'    	   => $item->regip,
				'school'    	       => $item->school,
				'birthday'    	       => $item->birthday,
				'birthdayprivate'      => $item->bdayprivate,
				'phone'    	           => '',
				'address'    	       => '',
				'country'    	       => $country,
				'state'      	       => '',
				'city'      	       => '',
				'postalcode'      	   => '',
				'location'      	   => $item->location,
				'homepage'    	       => $item->homepage,
				'qq'    	           => $item->qq,
				'qqprivate'    	       => $item->qqprivate,
				'weibo'    	           => $item->weibo,
				'twitter'    	       => $item->twitter,
				'msn'    	           => $item->msn,
				'gmail'    	           => $item->gmail,
				'gmailprivate'    	   => $item->gmailprivate,
				'github'    	       => $item->github,
				'bio'    	           => $item->info,
				'sign'    	           => $item->sign,
				'newemail'    	       => $item->newemail,
				'newemailhash'    	   => $item->newemailpin,
				'github_avatar_url'    => $item->github_avatar_url,
				'github_access_token'  => $item->github_access_token,
				'google_avatar_url'    => $item->google_avatar_url,
				'google_access_token'  => $item->google_access_token,
		    ]);
		  
		     
		    DatabaseSeeder::$uiddict[$item->id]=$i;
		    $i++;
		    
		    progressBar($i,$n,'Users');
		}
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		$this->command->info('UserTableSeeder finished');
		
	}

}




class ProblemTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('ProblemTableSeeder start');

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('problems')->truncate();
		
		$list = DB::connection('mysql2')->table('problem')->select('*')->orderBy('id', 'asc')->get();
		
		$hash = array();
		$i=1;
		$n=count($list);
		$date = new DateTime;
		
		foreach ($list as $item)
		{
			$is_special_judge = 0;
			$title = $item->title;
			if (strpos($title,'(Special Judge)') !== false) {
				$title = trim(str_replace('(Special Judge)','',$title));
				$is_special_judge=1;
			}
			$slug = str_slug($title);
			$k=1;
			while(isset($hash[$slug])){
				$slug = str_slug($title+' '+$k);
				$k++;
			}
			$hash[$slug]=1;
			
			$pub = true;
			if($item->defunct!=='N'){
				$pub = false;
			}
			
			$moduser=$item->moduser;
			if(strlen($moduser)>0){
				$moduser=substr($moduser, 0, strpos($moduser, ':'))*1;
			}else{
				$moduser=1;
			}
			
			if(strlen($item->modtime)>0){
				$date = $item->modtime;
			}
			
		
			Problem::create([
		        'created_by'		   => 1,
		        'updated_by'		   => $moduser,
		        'created_at'		   => $date,
		        'updated_at'		   => $date,
		        'published'       	   => $pub,
		        'title'    	           => $title,
		        'slug'    	           => $slug,
				'is_special_judge'     => $is_special_judge,
				'special_judger'       => '',
				'time_limit'    	   => $item->time_limit,
		        'memory_limit'   	   => $item->memory_limit,
		        'case_time_limit'      => $item->case_time_limit,
				'difficulty_level'     => $item->level,
		        'description'    	   => $item->description,
				'input'    	           => $item->input,
				'output'    	       => $item->output,
		        'sample_input'    	   => $item->sample_input,
				'sample_output'    	   => $item->sample_output,
				'hint'    	           => $item->hint,
				'analysis'             => $item->analysis,
				'source'    	       => $item->source,
		        'source_url'    	   => '',
				'author'    	       => '',
				'author_url'    	   => '',
				'accept_count'    	   => $item->accepted,
				'submit_count'    	   => $item->submit,
				'submit_user_count'    => $item->submit_user,
				'solved_user_count'    => $item->solved_user
		    ]);
		
			
			DatabaseSeeder::$piddict[$item->id]=$i;
			$i++;
			
			progressBar($i,$n,'Problems');
		}
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		$this->command->info('ProblemTableSeeder finished');

	}

}



class ContestTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('ContestTableSeeder start');

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('contests')->truncate();
		
		$list = DB::connection('mysql2')->table('contest')->select('*')->orderBy('id', 'asc')->get();
		
		$i=1;
		$n=count($list);
		$date = new DateTime;
		
		foreach ($list as $item)
		{
		
			Contest::create([
		        'created_at'		   => $date,
		        'updated_at'		   => $date,
		        'created_by'		   => 1,
		        'updated_by'		   => 1,
		        'published'       	   => $item->defunct=='Y'?0:1,
		        'title'    	           => $item->title,
		        'description'    	   => $item->description,
				'start_time'     	   => $item->start_time,
				'end_time'    	   	   => $item->end_time,
		        'private'   	  	   => $item->private,
		        'password'             => $item->password,
				'solution_report'      => $item->report,
		       ]);
		
		    DatabaseSeeder::$ciddict[$item->id]=$i;
			$i++;
			progressBar($i,$n,'Contest:');	
		}
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		$this->command->info('ContestTableSeeder finished');

	}

}



class SubmitTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('SubmitTableSeeder start');

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('submits')->truncate();
		
		$list = DB::connection('mysql2')->table('submit')->select('*')->orderBy('id', 'asc')->get();
		
		$hash = array();
		$i=1;
		$n=count($list);
		
		foreach ($list as $item)
		{
			$uid = $item->uid;
			$pid = $item->pid;
			$cid = $item->cid;
			
			if(isset(DatabaseSeeder::$uiddict[$uid]) && isset(DatabaseSeeder::$piddict[$pid])){
				$uid = DatabaseSeeder::$uiddict[$uid];
				$pid = DatabaseSeeder::$piddict[$pid];
			}
			else{
				continue;
			}
			
			if($cid!=null){
				if(isset(DatabaseSeeder::$ciddict[$cid])){
					$cid = DatabaseSeeder::$ciddict[$cid];
				}
			}
			if($cid==null){
				$cid='';
			}
		
			Submit::create([
		        'created_at'		   => $item->in_date,
		        'updated_at'		   => $item->in_date,
		        'user_id'       	   => $uid,
		        'problem_id'    	   => $pid,
		        'time'    	           => $item->time,
				'memory'     		   => $item->memory,
				'result'    	   	   => $item->result,
		        'language'   	  	   => $item->language,
		        'ip'                   => $item->ip,
				'is_valid_solution'    => $item->valid,
		        'code_length'    	   => $item->code_length,
				'shared'    	       => 0,
				'contest_id'    	   => $cid,
		    ]);
		
		       
			DatabaseSeeder::$siddict[$item->id]=$i;
			$i++;
			progressBar($i,$n,'Submit');	
		}
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		$this->command->info('SubmitTableSeeder finished');

	}

}



class CodeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('CodeTableSeeder start');

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('codes')->truncate();
		
		$list = DB::connection('mysql2')->table('code')->select('*', DB::raw('UNCOMPRESS(source) as code'))->orderBy('sid', 'asc')->get();
		
		$hash = array();
		$i=1;
		$n=count($list);
		
		foreach ($list as $item)
		{
			$sid = $item->sid;
			
			if(isset(DatabaseSeeder::$siddict[$sid])){
				$sid = DatabaseSeeder::$siddict[$sid];
			}else{
				continue;
			}
		
			$code = mysql_escape($item->code);
			
			Code::create([
		        'submit_id'		   => $sid,
		        'source_code'	   => DB::raw("COMPRESS('$code')"),
		       ]);
		       
			$i++;
			progressBar($i,$n,'Code');
		}
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		$this->command->info('CodeTableSeeder finished');

	}

}

class CompileinfoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('CompileinfoTableSeeder start');

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('compileinfos')->truncate();
		
		$list = DB::connection('mysql2')->table('compileinfo')->select('*')->orderBy('sid', 'asc')->get();
		
		$hash = array();
		$i=1;
		$n=count($list);
		
		foreach ($list as $item)
		{
			$sid = $item->sid;
			
			if(isset(DatabaseSeeder::$siddict[$sid])){
				$sid = DatabaseSeeder::$siddict[$sid];
			}else{
				continue;
			}
		
			Compileinfo::create([
		        'submit_id'		   => $sid,
		        'compile_info'	   => $item->error,
		       ]);
		       
			$i++;
			progressBar($i,$n,'Compileinfo');
		}
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		$this->command->info('CompileinfoTableSeeder finished');

	}

}


class ContestattendTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('ContestattendTableSeeder start');

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('contestattends')->truncate();
		
		$list = DB::connection('mysql2')->table('attend')->select('*')->orderBy('cid', 'asc')->get();
		
		$hash = array();
		$i=1;
		$n=count($list);
		$date = new DateTime;
		
		foreach ($list as $item)
		{
			$cid = $item->cid;
			$uid = $item->uid;
			
			if(isset(DatabaseSeeder::$ciddict[$cid])){
				$cid = DatabaseSeeder::$ciddict[$cid];
			}else{
				continue;
			}
			
			if(isset(DatabaseSeeder::$uiddict[$uid])){
				$uid = DatabaseSeeder::$uiddict[$uid];
			}else{
				continue;
			}
		
			Contestattend::create([
				'created_at'	 => $date,
		        'updated_at'	 => $date,
		        'user_id'        => $uid,
				'contest_id'     => $cid,
				'username'       => $item->username,
				'screen_name'    => $item->username,
				'nick'           => $item->nick,
				'ip'           	 => '',
				'accepts'        => $item->accepts,
				'penalty'        => $item->penalty,
				'a_time'         => $item->A_time,
				'a_failed_count' => $item->A_WrongSubmits,
				'b_time'         => $item->B_time,
				'b_failed_count' => $item->B_WrongSubmits,
				'c_time'         => $item->C_time,
				'c_failed_count' => $item->C_WrongSubmits,
				'd_time'         => $item->D_time,
				'd_failed_count' => $item->D_WrongSubmits,
				'e_time'         => $item->E_time,
				'e_failed_count' => $item->E_WrongSubmits,
				'f_time'         => $item->F_time,
				'f_failed_count' => $item->F_WrongSubmits,
				'g_time'         => $item->G_time,
				'g_failed_count' => $item->G_WrongSubmits,
				'h_time'         => $item->H_time,
				'h_failed_count' => $item->H_WrongSubmits,
				'i_time'         => $item->I_time,
				'i_failed_count' => $item->I_WrongSubmits,
				'j_time'         => $item->J_time,
				'j_failed_count' => $item->J_WrongSubmits,
				'k_time'         => $item->K_time,
				'k_failed_count' => $item->K_WrongSubmits,
				'l_time'         => $item->L_time,
				'l_failed_count' => $item->L_WrongSubmits,
				'm_time'         => $item->M_time,
				'm_failed_count' => $item->M_WrongSubmits,
				'n_time'         => $item->N_time,
				'n_failed_count' => $item->N_WrongSubmits,
				'o_time'         => $item->O_time,
				'o_failed_count' => $item->O_WrongSubmits,
				'p_time'         => $item->P_time,
				'p_failed_count' => $item->P_WrongSubmits,
				'q_time'         => $item->Q_time,
				'q_failed_count' => $item->Q_WrongSubmits,
				'r_time'         => $item->R_time,
				'r_failed_count' => $item->R_WrongSubmits,
				's_time'         => $item->S_time,
				's_failed_count' => $item->S_WrongSubmits,
				't_time'         => $item->T_time,
				't_failed_count' => $item->T_WrongSubmits,
				'u_time'         => $item->U_time,
				'u_failed_count' => $item->U_WrongSubmits,
				'v_time'         => $item->V_time,
				'v_failed_count' => $item->V_WrongSubmits,
				'w_time'         => $item->W_time,
				'w_failed_count' => $item->W_WrongSubmits,
				'x_time'         => $item->X_time,
				'x_failed_count' => $item->X_WrongSubmits,
				'y_time'         => $item->Y_time,
				'y_failed_count' => $item->Y_WrongSubmits,
				'z_time'         => $item->Z_time,
				'z_failed_count' => $item->Z_WrongSubmits,
		       ]);
		       
			$i++;
			progressBar($i,$n,'Contestattend');
		}
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		$this->command->info('ContestattendTableSeeder finished');

	}

}


