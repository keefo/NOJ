<?php

function numberToRoman($N) 
{
	$c='IVXLCDM'; 
	for($a=5,$b=$s='';$N;$b++,$a^=7)for($o=$N%$a,$N=$N/$a^0;$o--;$s=$c[$o>2?$b+$N-($N&=-2)+$o=1:$b].$s); 
	return $s; 
}

function numberToStar($N) 
{
	$N*=1;
	$s='';
	if($N==0)return $s;
	for($i=1;$i<=$N;$i++){
		$s.='<span class="glyphicon glyphicon-star"></span>';
	}
	for(;$i<=3;$i++){
		$s.='<span class="glyphicon glyphicon-star-empty"></span>';
	}
	return $s; 
}


function countriesCode(){
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
	return $code;
}


if ( !function_exists('mysql_escape'))
{
    function mysql_escape($inp)
    { 
        if(is_array($inp)) return array_map(__METHOD__, $inp);

        if(!empty($inp) && is_string($inp)) { 
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
        } 

        return $inp; 
    }
}


function progressBar($done, $total, $label="", $size=30) {

    static $start_time;

    // if we go over our bound, just ignore it
    if($done > $total) return;

    if(empty($start_time)) $start_time=time();
    $now = time();

    $perc=(double)($done/$total);

    $bar=floor($perc*$size);

    $status_bar="\r[";
    $status_bar.=str_repeat("=", $bar);
    if($bar<$size){
        $status_bar.=">";
        $status_bar.=str_repeat(" ", $size-$bar);
    } else {
        $status_bar.="=";
    }

    $disp=number_format($perc*100, 0);

    $status_bar.="] $disp%  $done/$total";

    $rate = ($now-$start_time)/$done;
    $left = $total - $done;
    $eta = round($rate * $left, 2);

    $elapsed = $now - $start_time;

    $status_bar.= " remaining: ".number_format($eta)." sec.  elapsed: ".number_format($elapsed)." sec.";

    echo "$status_bar  ";

    flush();

    // when done, send a newline
    if($done == $total) {
        echo "\n";
    }

}

