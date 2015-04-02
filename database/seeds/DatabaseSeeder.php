<?php


use App\Models\User;
use App\Models\Problem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->call('UserTableSeeder');
        $this->call('ProblemTableSeeder');
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
		
		$code['RD']=0;//Reserved 
		$code['AF']=4; 
		$code['AX']=248; 
		$code['AL']=8; 
		$code['DZ']=12; 
		$code['AS']=16; 
		$code['AD']=20; 
		$code['AO']=24; 
		$code['AI']=660; 
		$code['AQ']=10; 
		$code['AG']=28; 
		$code['AR']=32; 
		$code['AM']=51; 
		$code['AW']=533; 
		$code['AU']=36; 
		$code['AT']=40; 
		$code['AZ']=31; 
		$code['BS']=44; 
		$code['BH']=48; 
		$code['BD']=50; 
		$code['BB']=52; 
		$code['BY']=112; 
		$code['BE']=56; 
		$code['BZ']=84; 
		$code['BJ']=204; 
		$code['BM']=60; 
		$code['BT']=64; 
		$code['BO']=68; 
		$code['BQ']=535; 
		$code['BA']=70; 
		$code['BW']=72; 
		$code['BV']=74; 
		$code['BR']=76; 
		$code['IO']=86; 
		$code['BN']=96; 
		$code['BG']=100; 
		$code['BF']=854; 
		$code['BI']=108; 
		$code['KH']=116; 
		$code['CM']=120; 
		$code['CA']=124; 
		$code['CV']=132; 
		$code['KY']=136; 
		$code['CF']=140; 
		$code['TD']=148; 
		$code['CL']=152; 
		$code['CN']=156; 
		$code['CX']=162; 
		$code['CC']=166; 
		$code['CO']=170; 
		$code['KM']=174; 
		$code['CG']=178; 
		$code['CD']=180; 
		$code['CK']=184; 
		$code['CR']=188; 
		$code['CI']=384; 
		$code['HR']=191; 
		$code['CU']=192; 
		$code['CW']=531; 
		$code['CY']=196; 
		$code['CZ']=203; 
		$code['DK']=208; 
		$code['DJ']=262; 
		$code['DM']=212; 
		$code['DO']=214; 
		$code['EC']=218; 
		$code['EG']=818; 
		$code['SV']=222; 
		$code['GQ']=226; 
		$code['ER']=232; 
		$code['EE']=233; 
		$code['ET']=231; 
		$code['FK']=238; 
		$code['FO']=234; 
		$code['FJ']=242; 
		$code['FI']=246; 
		$code['FR']=250; 
		$code['GF']=254; 
		$code['PF']=258; 
		$code['TF']=260; 
		$code['GA']=266; 
		$code['GM']=270; 
		$code['GE']=268; 
		$code['DE']=276; 
		$code['GH']=288; 
		$code['GI']=292; 
		$code['GR']=300; 
		$code['GL']=304; 
		$code['GD']=308; 
		$code['GP']=312; 
		$code['GU']=316; 
		$code['GT']=320; 
		$code['GG']=831; 
		$code['GN']=324; 
		$code['GW']=624; 
		$code['GY']=328; 
		$code['HT']=332; 
		$code['HM']=334; 
		$code['VA']=336; 
		$code['HN']=340; 
		$code['HK']=344; 
		$code['HU']=348; 
		$code['IS']=352; 
		$code['IN']=356; 
		$code['ID']=360; 
		$code['IR']=364; 
		$code['IQ']=368; 
		$code['IE']=372; 
		$code['IM']=833; 
		$code['IL']=376; 
		$code['IT']=380; 
		$code['JM']=388; 
		$code['JP']=392; 
		$code['JE']=832; 
		$code['JO']=400; 
		$code['KZ']=398; 
		$code['KE']=404; 
		$code['KI']=296; 
		$code['KP']=408; 
		$code['KR']=410; 
		$code['KW']=414; 
		$code['KG']=417; 
		$code['LA']=418; 
		$code['LV']=428; 
		$code['LB']=422; 
		$code['LS']=426; 
		$code['LR']=430; 
		$code['LY']=434; 
		$code['LI']=438; 
		$code['LT']=440; 
		$code['LU']=442; 
		$code['MO']=446; 
		$code['MK']=807; 
		$code['MG']=450; 
		$code['MW']=454; 
		$code['MY']=458; 
		$code['MV']=462; 
		$code['ML']=466; 
		$code['MT']=470; 
		$code['MH']=584; 
		$code['MQ']=474; 
		$code['MR']=478; 
		$code['MU']=480; 
		$code['YT']=175; 
		$code['MX']=484; 
		$code['FM']=583; 
		$code['MD']=498; 
		$code['MC']=492; 
		$code['MN']=496; 
		$code['ME']=499; 
		$code['MS']=500; 
		$code['MA']=504; 
		$code['MZ']=508; 
		$code['MM']=104; 
		$code['NA']=516; 
		$code['NR']=520; 
		$code['NP']=524; 
		$code['NL']=528; 
		$code['NC']=540; 
		$code['NZ']=554; 
		$code['NI']=558; 
		$code['NE']=562; 
		$code['NG']=566; 
		$code['NU']=570; 
		$code['NF']=574; 
		$code['MP']=580; 
		$code['NO']=578; 
		$code['OM']=512; 
		$code['PK']=586; 
		$code['PW']=585; 
		$code['PS']=275; 
		$code['PA']=591; 
		$code['PG']=598; 
		$code['PY']=600; 
		$code['PE']=604; 
		$code['PH']=608; 
		$code['PN']=612; 
		$code['PL']=616; 
		$code['PT']=620; 
		$code['PR']=630; 
		$code['QA']=634; 
		$code['RE']=638; 
		$code['RO']=642; 
		$code['RU']=643; 
		$code['RW']=646; 
		$code['BL']=652; 
		$code['SH']=654; 
		$code['KN']=659; 
		$code['LC']=662; 
		$code['MF']=663; 
		$code['PM']=666; 
		$code['VC']=670; 
		$code['WS']=882; 
		$code['SM']=674; 
		$code['ST']=678; 
		$code['SA']=682; 
		$code['SN']=686; 
		$code['RS']=688; 
		$code['SC']=690; 
		$code['SL']=694; 
		$code['SG']=702; 
		$code['SX']=534; 
		$code['SK']=703; 
		$code['SI']=705; 
		$code['SB']=90; 
		$code['SO']=706; 
		$code['ZA']=710; 
		$code['GS']=239; 
		$code['SS']=728; 
		$code['ES']=724; 
		$code['LK']=144; 
		$code['SD']=729; 
		$code['SR']=740; 
		$code['SJ']=744; 
		$code['SZ']=748; 
		$code['SE']=752; 
		$code['CH']=756; 
		$code['SY']=760; 
		$code['TW']=158; 
		$code['TJ']=762; 
		$code['TZ']=834; 
		$code['TH']=764; 
		$code['TL']=626; 
		$code['TG']=768; 
		$code['TK']=772; 
		$code['TO']=776; 
		$code['TT']=780; 
		$code['TN']=788; 
		$code['TR']=792; 
		$code['TM']=795; 
		$code['TC']=796; 
		$code['TV']=798; 
		$code['UG']=800; 
		$code['UA']=804; 
		$code['AE']=784; 
		$code['GB']=826; 
		$code['US']=840; 
		$code['UM']=581; 
		$code['UY']=858; 
		$code['UZ']=860; 
		$code['VU']=548; 
		$code['VE']=862; 
		$code['VN']=704; 
		$code['VG']=92; 
		$code['VI']=850; 
		$code['WF']=876; 
		$code['EH']=732; 
		$code['YE']=887; 
		$code['ZM']=894; 
		$code['ZW']=716; 
		
		$OLD_NOJ_PWD_ENCODE_STRING = env('OLD_NOJ_PWD_ENCODE_STRING');

		$oldusers = DB::connection('mysql2')->table('user')->leftJoin('userinfo', 'user.id', '=', 'userinfo.uid')->select('*', DB::raw('decode(pwd,\''.$OLD_NOJ_PWD_ENCODE_STRING.'\') as pwd'))->orderBy('id', 'asc')->get();
		
		$hash = array();
		$i=0;
		$n=count($oldusers);
		
		//DB::beginTransaction();
		foreach ($oldusers as $user)
		{
			//var_dump($user);
			
			$country = 0;
			if(isset($code[$user->country])){
				$country=$code[$user->country];
			}
			
			if($user->email==''){
				continue;
			}
		
			$email = strtolower($user->email);
			$name = strtolower($user->name);
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
		        'created_at'		   => $user->regtime,
		        'updated_at'		   => $user->regtime,
		        'remember_token'       => '',
		        'password'    	       => bcrypt($user->pwd),
		        'passwordhash'         => User::encrypthash($user->pwd),
		        'email'    	           => $user->email,
				'emailprivate'    	   => $user->emailprivate,
		        'name'   	           => $user->name,
		        'screen_name'   	   => $user->name,
				'verified'    	       => $user->verified,
		        'submit'    	       => $user->submit,
				'solved'    	       => $user->solved,
				'gender'    	       => $user->gender,
		        'volume'    	       => $user->volume,
				'lang'    	           => $user->lang,
				'role'    	           => $user->role,
				'avatarfile'           => $user->avatarfile,
				'recoveryhash'    	   => $user->gphash,
		        'login_at'    	       => $user->logintime,
				'login_count'    	   => $user->logincount,
				'login_ip'    	       => $user->loginip,
				'nick'    	           => $user->nick,
				'nickcolor'    	       => $user->nickcolor,
				'register_at'    	   => $user->regtime,
				'register_ip'    	   => $user->regip,
				'school'    	       => $user->school,
				'birthday'    	       => $user->birthday,
				'birthdayprivate'      => $user->bdayprivate,
				'phone'    	           => '',
				'address'    	       => '',
				'country'    	       => $country,
				'state'      	       => '',
				'city'      	       => '',
				'postalcode'      	   => '',
				'location'      	   => $user->location,
				'homepage'    	       => $user->homepage,
				'qq'    	           => $user->qq,
				'qqprivate'    	       => $user->qqprivate,
				'weibo'    	           => $user->weibo,
				'twitter'    	       => $user->twitter,
				'msn'    	           => $user->msn,
				'gmail'    	           => $user->gmail,
				'gmailprivate'    	   => $user->gmailprivate,
				'github'    	       => $user->github,
				'bio'    	           => $user->info,
				'sign'    	           => $user->sign,
				'newemail'    	       => $user->newemail,
				'newemailhash'    	   => $user->newemailpin,
				'github_avatar_url'    => $user->github_avatar_url,
				'github_access_token'  => $user->github_access_token,
				'google_avatar_url'    => $user->google_avatar_url,
				'google_access_token'  => $user->google_access_token,
		    ]);
		    		    
		    $i++;
		    
		    //if($user->id%10==0){
			//    DB::commit();
		    //}
		    $this->command->info(sprintf("%.2f%%  %d", $i/$n*100, $user->id));

		}
		
		//DB::commit();
		$this->command->info("100%%\n");
		
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
		
		$oldproblems = DB::connection('mysql2')->table('problem')->select('*')->orderBy('id', 'asc')->get();
		
		$hash = array();
		$i=0;
		$n=count($oldproblems);
		
		//DB::beginTransaction();
		foreach ($oldproblems as $problem)
		{
			$slug = str_slug($problem->title);
			$k=1;
			while(isset($hash[$slug])){
				$slug = str_slug($problem->title+' '+$k);
				$k++;
			}
			$hash[$slug]=1;
			
			$pub = true;
			if($problem->defunct!=='N'){
				$pub = false;
			}
			
			$moduser=$problem->moduser;
			if(strlen($moduser)>0){
				$moduser=substr($moduser, 0, strpos($moduser, ':'))*1;
			}else{
				$moduser=1;
			}
			
			//$this->command->info($slug);
			//$this->command->info($problem->moduser);
			//$this->command->info($moduser);
			
			$date = new DateTime;
			
			if(strlen($problem->modtime)>0){
				$date = $problem->modtime;
			}
			
			//$this->command->info($problem->id);

			Problem::create([
		        'created_by'		   => 1,
		        'updated_by'		   => $moduser,
		        'created_at'		   => $date,
		        'updated_at'		   => $date,
		        'published'       	   => $pub,
		        'title'    	           => $problem->title,
		        'slug'    	           => $slug,
				'is_special_judge'     => 0,
				'special_judger'       => '',
				'time_limit'    	   => $problem->time_limit,
		        'memory_limit'   	   => $problem->memory_limit,
		        'case_time_limit'      => $problem->case_time_limit,
				'difficulty_level'     => $problem->level,
		        'description'    	   => $problem->description,
				'input'    	           => $problem->input,
				'output'    	       => $problem->output,
		        'sample_input'    	   => $problem->sample_input,
				'sample_output'    	   => $problem->sample_output,
				'hint'    	           => $problem->hint,
				'analysis'             => $problem->analysis,
				'source'    	       => $problem->source,
		        'source_url'    	   => '',
				'author'    	       => '',
				'author_url'    	   => '',
				'accept_count'    	   => $problem->accepted,
				'submit_count'    	   => $problem->submit,
				'submit_user_count'    => $problem->submit_user,
				'solved_user_count'    => $problem->solved_user
		    ]);
			
		}
		
		//DB::commit();
		//$this->command->info("100%%");
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		$this->command->info('ProblemTableSeeder finshed');

	}

}

