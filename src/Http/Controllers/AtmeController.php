<?php

namespace Suite\Bec\Http\Controllers;

use Gmf\Sys\Http\Controllers\Controller; 
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use Gmf\Sys\Builder;
use Suite\Bec\Models;

class AtmeController extends Controller
{
	public $entId = ''; 
    public $title = '';
    public $summary = '';
    public $atmeId = '';//atmeID
    public $atmeUrl = '';//atmeURL
    public $content = '';//atme内容
    public $name = '';//atme行业名称
    public $tradeList = '';//atme行业列表
    public $ruleAreaVo = '';//agme法规所属地区(当为国家法规时此项为空)
    //suite_bec_posts   amb表
    public function index(){
    	set_time_limit(0);
        if (empty($this->entId)) {
            $this->entId = config('gmf.ent.id');
        }
    	$this ->getNews(1);
 		$data = $this ->getStatute(1);
		$this ->getKnowledge(1);
		return view('index') ->with('data', $data);
    }
    public function other(){
        return $this ->getIndustry();
        // return $this ->getAreas();
        // return $this ->getTags();
    }
    //同步行业
    public function getIndustry(){
        //访问地址
        $uri='/v1/trades';
        //条件
        $array = [];
        $data = $this -> getData($uri,$array); 
        $de_json = json_decode($data,TRUE);
        for ($i = 0; $i < count($de_json); $i++){
            $this->atmeId = $de_json[$i]['id'];
            $this->name = $de_json[$i]['name'];
            Models\Industry::build(function (Builder $b) {
                $b->atme_id($this->atmeId)
                ->name($this->name);
            });
        }
        return $de_json;
    }
    //同步地区
    public function getAreas(){
        //访问地址
        $uri='/v1/areas';
        //条件
        $array = [];
        $data = $this -> getData($uri,$array); 
        $de_json = json_decode($data,TRUE);
        for ($i = 0; $i < count($de_json); $i++){
            $this->atmeId = $de_json[$i]['id'];
            $this->name = $de_json[$i]['name'];
            Models\Areas::build(function (Builder $b) {
                $b->atme_id($this->atmeId)
                ->name($this->name);
            });
        }
        return $de_json;
    }
    //同步标签
    public function getTags(){
        //访问地址
        $uri='/v1/tags';
        //条件
        $array = [];
        $data = $this -> getData($uri,$array); 
        $de_json = json_decode($data,TRUE);
        for ($i = 0; $i < count($de_json); $i++){
            // $de_json[$i]['id'];
            // $de_json[$i]['name'];
            
        }
    }
    //同步资讯
    public function getNews($page){    	
    	//访问地址
    	$uri='/v1/cms/contents/';
    	//每页条数
    	$count=10;
    	//条件
    	$array = [
    		'count' => $count,
    		'page' => $page,
            'type' => '4',
    	];
    	$data = $this -> getData($uri,$array); 
    	$de_json = json_decode($data,TRUE); 
        
        $next=false;
        for ($i = 0; $i < count($de_json); $i++){
            $this->title = $de_json[$i]['title'];
            $this->summary = $de_json[$i]['summary'];
            // $this->content = $de_json[$i]['content'];
            $this->atmeId = $de_json[$i]['id'];
            $this->atmeUrl='https://wenku.atme8.com/show/detail/'.$this->atmeId;
            if (Models\Post::where('atme_id', $this->atmeId)->where('type_enum','news')->count()) {
                $next=false;
                break;
            }else{
                $next=true;
                Models\Post::build(function (Builder $b) {
                    $b->ent_id($this->entId)
                    ->title($this->title)
                    ->summary($this->summary)
                    ->atme_id($this->atmeId)
                    ->atme_url($this->atmeUrl)
                    // ->content($this->content)
                    ->type_enum("news");
                });
            } 
        }
        if($next){
            if(count($de_json)==$count){
            	$this ->getNews($page+1);
            }
        }
    }
    //同步法规
    //statute
    public function getStatute($page){
    	date_default_timezone_set('Asia/Shanghai');
    	$date =  date("Y-m-d H:i:s"); 
    	//访问地址
    	$uri='/v1/rules';
    	//每页条数
    	$count=10;
    	//条件
    	$array = [
    		'count' => $count,
    		'page' => $page,
    	];  
    	$data = $this -> getData($uri,$array); 
    	$de_json = json_decode($data,TRUE); 
    	$jsonArr = $de_json["content"];
        $next=false;
        for ($i=0; $i < count($jsonArr); $i++){
            $this->title = $jsonArr[$i]['sub_title'];
            $this->summary = $jsonArr[$i]['title'];
            // $this->content = $jsonArr[$i]['content'];
            $this->atmeId = $jsonArr[$i]['id'];
            $this->atmeUrl='https://wenku.atme8.com/rule/detail/'.$this->atmeId;
            if (Models\Post::where('atme_id', $this->atmeId)->where('type_enum','statute')->count()) {
                $next=false;
                break;
            }else{

                $this->ruleAreaVo = $jsonArr[$i]['ruleAreaVo']['id'];
               
                $next=true;
                Models\Post::build(function (Builder $b) {
                    $b->ent_id($this->entId)
                    ->title($this->title)
                    ->summary($this->summary)
                    ->atme_id($this->atmeId)
                    ->atme_url($this->atmeUrl)
                    ->ruleAreaVo($this->ruleAreaVo)
                    // ->content($this->content)
                    ->type_enum("statute");
                });
            }
        }
        if($next){
            if(count($jsonArr)==$count){
            	$this ->getStatute($page+1);
            }
        }
    }
    //同步全部知识
    public  function getKnowledge($page){ 
    	date_default_timezone_set('Asia/Shanghai');
    	$date =  date("Y-m-d H:i:s"); 
    	//访问地址
    	$uri='/v1/cms/knowledges';
    	//每页条数
    	$count=10;
    	//条件
    	$array = [
    		'count' => $count,
    		'page' => $page
    	];  
    	$data = $this -> getData($uri,$array);
    	$de_json = json_decode($data,TRUE);  
        $next=false; 
        for ($i = 0; $i < count($de_json); $i++){
            $this->title = $de_json[$i]['title'];
            $this->summary = $de_json[$i]['summary'];
            // $this->content = $de_json[$i]['content'];
            $this->atmeId = $de_json[$i]['id'];
            $this->atmeUrl='https://wenku.atme8.com/knowledge/detail/'.$this->atmeId;
            if (Models\Post::where('atme_id', $this->atmeId)->where('type_enum','knowledge')->count()) {
                $next=false;
                break;
            }else{
                $trade_Arr=$de_json[$i]['tradeList'];
                for ($j = 0; $j < count($trade_Arr); $j++){
                    if(count($trade_Arr)==$j+1){
                        $this->tradeList=$this->tradeList.$trade_Arr[$j]['id'];
                    }else{
                        $this->tradeList=$this->tradeList.$trade_Arr[$j]['id'].',';
                    }
                } 
                $next=true;
                Models\Post::build(function (Builder $b) {
                    $b->ent_id($this->entId)
                    ->title($this->title)
                    ->summary($this->summary)
                    ->atme_id($this->atmeId)
                    ->atme_url($this->atmeUrl)
                    ->tradeList($this->tradeList)
                    // ->content($this->content)
                    ->type_enum("knowledge");
                });
                $this->tradeList='';
            }
        }
        if($next){
            if(count($de_json)==$count){
        	   $this ->getKnowledge($page+1);
            }
        }
    }
    //组成获取数据条件，进行获取数据
    //$uri 访问地址
    //$array 取数条件
    public function getData($uri,$array){
    	date_default_timezone_set('Asia/Shanghai');
    	$host ='https://api.atme8.com';
		$ak = 'HW7uEFD9QzEP27zi';
		$sk = '+lexDLPL';
    	$date =  date("Y-m-d H:i:s"); 
    	
    	$condition = $this -> createParamString($array);
    	$rous = "GET\n".$date ."\n". $uri.'?'.$condition;
    	$signature = $this -> getSignature($ak,$rous);
    	$signature1 = $sk .':'."".$signature;
    	$data = $this -> getJSON($host.$uri.'?'.$condition,$date,$signature1);
    	return $data;
    }
    //计算签名
    public function getSignature($key,$str) {
	    $signature = "";  
	    if (function_exists('hash_hmac')) {  
	        $signature = base64_encode(hash_hmac("sha1", $str, $key, true));  
	    } else {  
	        $blocksize = 64;  
	        $hashfunc = 'sha1';  
	        if (strlen($key) > $blocksize) {  
	            $key = pack('H*', $hashfunc($key));  
	        }  
	        $key = str_pad($key, $blocksize, chr(0x00));  
	        $ipad = str_repeat(chr(0x36), $blocksize);  
	        $opad = str_repeat(chr(0x5c), $blocksize);  
	        $hmac = pack(
	                'H*', $hashfunc(  
	                        ($key ^ $opad) . pack(  
	                                'H*', $hashfunc(  
	                                        ($key ^ $ipad) . $str  
	                                )
	                        )
	                )
	        );
	        $signature = base64_encode($hmac);  
	    }
	    return $signature;  
    }
    //拼接条件字符串
    public function createParamString($array){
   		ksort($array);
    	$arr = array_keys($array);
    	$string = '';
    	for ($i = 0; $i <count($arr) ; $i++) {
    		$aa = "&";
    		if($i == count($arr)-1){
    			$aa = "";
    		}
    		$string = $string . $arr[$i] ."=" .$array[$arr[$i]]. $aa;
    	}
    	return $string;
    }
    //发送https请求获得json数据
    public function getJSON($url,$date,$signature){
		$headers =array(
			'Date:'.$date,
   			'Authorization:'.$signature,
      	);
		$curl = curl_init(); 
		//设置请求url
		curl_setopt($curl, CURLOPT_URL,$url);
		//设置请求头
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);		
        // 执行后不直接打印出来 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        // 跳过证书检查 
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // 不从证书中检查SSL加密算法是否存在 
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$data = curl_exec($curl);
		curl_close($curl); 
		return $data;
    }
}
